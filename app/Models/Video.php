<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
class Video extends Model {
    use HasFactory;
    protected $guarded=[];
    public function scopeWhenSearch($query, $search) {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }


    public function playlist() {
        return $this->belongsTo(Playlist::class,'playlist_id');
    }

    public function course() {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function getCourseName() {
        return $this->course ? $this->course->name : 'No course assigned';
    }

    public function getDuration() {
        $videoPath = storage_path('app/' . $this->path);
        //dd($videoPath);
        if (file_exists($videoPath)) {
            try {
                $ffmpeg = FFMpeg::open($videoPath);
                $format = $ffmpeg->getFFProbe()->format($videoPath);
                $durationInSeconds = $format->get('duration');
                return gmdate("i:s", $durationInSeconds);
            } catch (\Exception $e) {
                \Log::error('Error getting video duration: ' . $e->getMessage());
                return '00:00';
            }
        } else {
            return 'File not found';
        }
    }

}
