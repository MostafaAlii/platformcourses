<?php
namespace App\Models\Concerns;
use Illuminate\Support\Facades\{Storage, Log};
use FFMpeg\FFMpeg;
use FFMpeg\Exception\RuntimeException;
use Illuminate\Support\Str;
trait VideoUpload {
    public function uploadVideo($video, $academic, $course, $playlist, $numSegments = null) {
        try {
                $videoFolder = 'videos';
                $admin = 'admins';
                if ($academic) {
                    $academicFolder = $videoFolder . '/' . $academic;
                    $courseFolder = $academicFolder . '/' . $course;
                    $playlistFolder = $courseFolder . '/' . $playlist;
                } else {
                    $adminFolder = $videoFolder . '/' . $admin . '/' . strtolower(str_replace(' ', '_', get_user_data()->name));
                    $courseFolder = $adminFolder . '/' . $course;
                    $playlistFolder = $courseFolder . '/' . $playlist;
                }

                if (isset($academicFolder) && !Storage::disk('public')->exists($academicFolder))
                    Storage::disk('public')->makeDirectory($academicFolder);

                if (!Storage::disk('public')->exists($courseFolder))
                    Storage::disk('public')->makeDirectory($courseFolder);

                if (!Storage::disk('public')->exists($playlistFolder))
                    Storage::disk('public')->makeDirectory($playlistFolder);

                $originalFileName = pathinfo($video->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $video->getClientOriginalExtension();
                $fileName = $this->generateUniqueFileName($originalFileName, $extension, $playlistFolder);
                $videoPath = $playlistFolder . '/' . $fileName;
                Storage::disk('public')->put($videoPath, fopen($video->getRealPath(), 'r+'));
                $videoSize = $video->getSize() / (1024 * 1024);
                $maxSize = 2; // 2MB
                Log::info("Video size: $videoSize MB");
                if ($videoSize > $maxSize) {
                    $splitFolder = $playlistFolder . '/' . pathinfo($fileName, PATHINFO_FILENAME);
                    if (!Storage::disk('public')->exists($splitFolder))
                        Storage::disk('public')->makeDirectory($splitFolder);
                    $this->splitVideo(storage_path('app/public/' . $videoPath), $splitFolder, $numSegments);

                }
                return $videoPath;
        } catch (\Exception $e) {
            Log::error("خطأ أثناء رفع الفيديو: " . $e->getMessage());
            return null;
        }
    }

    /*public function splitVideo($videoPath, $numSegments = 4) {
        $ffmpeg = FFMpeg::create();
        $ffprobe = \FFMpeg\FFProbe::create();
        $video = $ffmpeg->open($videoPath);
        $outputFolder = pathinfo($videoPath, PATHINFO_DIRNAME) . '/segments/';
        if (!Storage::disk('public')->exists($outputFolder))
            Storage::disk('public')->makeDirectory($outputFolder);
        $duration = floatval($ffprobe->format($videoPath)->get('duration'));
        $numSegments = intval($numSegments);
        if (is_numeric($duration) && $duration > 0 && $numSegments > 0) {
            $segmentDuration = ceil($duration / $numSegments);
            $hours = floor($duration / 3600);
            $minutes = floor(($duration % 3600) / 60);
            $seconds = $duration % 60;
            $formattedDuration = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
            Log::info("Duration of the video: $formattedDuration");
            $segmentCount = 0;
            for ($start = 0; $start < $duration; $start += $segmentDuration) {
                $segmentFilename = sprintf('%s/%s_%03d.mp4', $outputFolder, pathinfo($videoPath, PATHINFO_FILENAME), ++$segmentCount);
                Log::info("Creating segment: $segmentFilename from second $start");
                $clipDuration = min($segmentDuration, $duration - $start);
                $video->filters()
                    ->clip(\FFMpeg\Coordinate\TimeCode::fromSeconds($start), \FFMpeg\Coordinate\TimeCode::fromSeconds($clipDuration));
                $video->save(new \FFMpeg\Format\Video\X264('aac', 'libx264'), $segmentFilename);
            }
        } else {
            Log::info("Duration is not a valid number or numSegments is invalid");
        }
    }*/
    
    public function splitVideo($videoPath, $numSegments = 4) {
        try {
            $ffmpeg = FFMpeg::create();
            $ffprobe = \FFMpeg\FFProbe::create();
            $video = $ffmpeg->open($videoPath);
            $outputFolder = pathinfo($videoPath, PATHINFO_DIRNAME) . '/segments/';
            if (!Storage::disk('public')->exists($outputFolder)) {
                Storage::disk('public')->makeDirectory($outputFolder);
            }
            $duration = floatval($ffprobe->format($videoPath)->get('duration'));
            $numSegments = intval($numSegments);
            if (is_numeric($duration) && $duration > 0 && $numSegments > 0) {
                $segmentDuration = ceil($duration / $numSegments);
                $hours = floor($duration / 3600);
                $minutes = floor(($duration % 3600) / 60);
                $seconds = $duration % 60;
                $formattedDuration = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                Log::info("Duration of the video: $formattedDuration");
                $segmentCount = 0;
                for ($start = 0; $start < $duration; $start += $segmentDuration) {
                    $segmentFilename = sprintf('%s/%s_%03d.mp4', $outputFolder, pathinfo($videoPath, PATHINFO_FILENAME), ++$segmentCount);
                    Log::info("Creating segment: $segmentFilename from second $start");
                    $clipDuration = min($segmentDuration, $duration - $start);
                    $video->filters()
                        ->clip(\FFMpeg\Coordinate\TimeCode::fromSeconds($start), \FFMpeg\Coordinate\TimeCode::fromSeconds($clipDuration));
                    $video->save(new \FFMpeg\Format\Video\X264('aac', 'libx264'), $segmentFilename);
                }
            } else {
                Log::info("Duration is not a valid number or numSegments is invalid");
            }
        } catch (\Exception $e) {
            Log::error("خطأ أثناء تقسيم الفيديو: " . $e->getMessage());
        }
    }

    /*private function generateUniqueFileName($originalName, $extension, $folder) {
        $cleanName = preg_replace('/[^a-zA-Z0-9]/', '_', str_replace(' ', '_', $originalName));
        $randomPart = Str::random(4);
        $timestampPart = substr(microtime(true), 2, 4);
        $baseFileName = $randomPart . '_' . $timestampPart . '_' . $cleanName;
        $fileName = $baseFileName . '.' . $extension;
        $counter = 1;
        while (Storage::exists($folder . '/' . $fileName)) {
            $fileName = $baseFileName . '_' . $counter++ . '.' . $extension;
        }
        return $fileName;
    }*/

    private function generateUniqueFileName($originalName, $extension, $folder) {
        try {
            $cleanName = preg_replace('/[^a-zA-Z0-9]/', '_', str_replace(' ', '_', $originalName));
            $randomPart = Str::random(4);
            $timestampPart = substr(microtime(true), 2, 4);
            $baseFileName = $randomPart . '_' . $timestampPart . '_' . $cleanName;
            $fileName = $baseFileName . '.' . $extension;
            $counter = 1;
            while (Storage::exists($folder . '/' . $fileName)) {
                $fileName = $baseFileName . '_' . $counter++ . '.' . $extension;
            }
            return $fileName;
        } catch (\Exception $e) {
            Log::error("خطأ أثناء إنشاء اسم  : " . $e->getMessage());
            return null;
        }
    }
}
