<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\VideoRepositoryInterface;
use App\DataTables\Dashboard\Admin\VideoDataTable;
use App\Jobs\StreamVideo;
use App\Models\Course;
use App\Models\Video;
use App\Models\Playlist;
use App\Models\Academic;
use Illuminate\Foundation\Bus\DispatchesJobs;  // Add this
use Illuminate\Support\Facades\Storage;
use App\Models\Concerns\VideoUpload;

class VideoController extends Controller implements VideoRepositoryInterface {
    use DispatchesJobs, VideoUpload;  // Add this

    public function __construct(protected VideoDataTable $videoDataTable, protected VideoRepositoryInterface $videoRepositoryInterface) {
        $this->videoRepositoryInterface = $videoRepositoryInterface;
        $this->videoDataTable = $videoDataTable;
    }

    public function index(VideoDataTable $videoDataTable) {
        return $this->videoRepositoryInterface->index($this->videoDataTable);
    }

    public function create() {
        Video::whereNull('playlist_id')->whereNull('course_id')->delete();
        $playlists = Playlist::get();
        $courses = Course::get();
        return view('dashboard.Admin.videos.create', ['pageTitle' => trans('dashboard/admin.playlists')],  compact('playlists', 'courses'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'path' => 'required|file|max:20480',
            'playlist_id' => 'nullable|exists:playlists,id',
            'course_id' => 'nullable|exists:courses,id',
            'academic_id' => 'nullable|exists:academics,id',
            'allow_likes' => 'nullable|boolean',
            'allow_comments' => 'nullable|boolean',
        ]);
        $academic = $request->academic_id ? Academic::find($request->academic_id) : null;
        $academicName = $academic ? strtolower(str_replace(' ', '_', $academic->name)) : null;
        $course = Course::find($request->course_id);
        $playlist = Playlist::find($request->playlist_id);
        if ($request->hasFile('path')) {
            $videoPath = $this->uploadVideo(
                $request->file('path'),
                $academicName,
                strtolower(str_replace(' ', '_', $course->name)),
                strtolower(str_replace(' ', '_', $playlist->name)),
            );
            if (!$videoPath)
                return redirect()->back()->withErrors(['path' => trans('dashboard/admin.upload_failed')])->withInput();
            Video::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'path' => $videoPath,
                'playlist_id' => $validated['playlist_id'] ?? null,
                'course_id' => $validated['course_id'] ?? null,
                'allow_likes' => $validated['allow_likes'] ?? false,
                'allow_comments' => $validated['allow_comments'] ?? false,
            ]);
        }
        return redirect()->route('admin.videos.index')->with('success', trans('dashboard/admin.video_uploaded_successfully'));
    }

    public function edit(Video $video) {
        $playlists = Playlist::get();
        $courses = Course::get();
        return view('dashboard.Admin.videos.edit', ['pageTitle' => trans('dashboard/admin.Update Video')],  compact('video', 'playlists', 'courses'));
    }

    public function update(Request $request, Video $video) {
        $validatedData = $request->validate([
            'name' => 'required|unique:videos,name,' . $video->id,
            'description' => 'required',
            'course_id' => 'required|exists:courses,id',
            'playlist_id' => 'required|exists:playlists,id',
        ]);
        $video->update($validatedData);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('admin.videos.index');
    }

    public function destroy(Video $video) {
        Storage::disk('local')->delete($video->path);
        Storage::disk('local')->deleteDirectory('public/videos/' . $video->id);
        $video->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('admin.videos.index');

    }//end of destroy

    public function getPlaylistsByCourse($courseId)
    {
        $playlists = Playlist::where('course_id', $courseId)->get();
        return response()->json($playlists);
    }
}
