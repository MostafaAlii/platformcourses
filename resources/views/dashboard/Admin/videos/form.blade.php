    <div class="form-group">
        <label for="video">{{ trans('dashboard/admin.upload_video') }}</label>
        <input type="file" name="path" class="form-control-file">
    </div>
    <div class="form-group row" class="my-2">
        <div class="col-lg-6">
            <label class="mb-2">{{ __('dashboard/forms.fullname') }}</label>
            <input name="name" type="text" id="video_name" class="form-control form-control-solid" placeholder="Name"
                value="{{ old('name', isset($video) ? $video->name : '') }}" />
            <span class="form-text text-muted">Name</span>
        </div>
        <div class="col-lg-6">
            <label for="exampleTextarea" class="mb-2">{{ __('dashboard/forms.desc') }}</label>
            <textarea name="description" class="form-control form-control-solid" rows="1" placeholder="Description">{{ old('description', isset($video) ? $video->description : '') }}</textarea>
            <span class="form-text text-muted">Description</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label class="my-2">{{ __('dashboard/forms.courses') }}</label>
            <select name="course_id" id="course_id" class="form-control form-control-solid">
                <option value="">Select Your Course ...</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ old('playlist_id', isset($video) && $course->id == $video->course_id ? 'selected' : '') }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <span class="form-text text-muted">Please select the course</span>
        </div>

        <div class="col-lg-6">
            <label class="my-2">{{ __('dashboard/forms.playlists') }}</label>
            <select name="playlist_id" id="playlist_id" class="form-control form-control-solid">
                <option value="">Select Your Playlist ...</option>

                    @foreach ($playlists as $playlist)
                        <option value="{{ $playlist->id }}" {{-- $playlist->id == $video->playlist_id ? 'selected' : '' --}}>{{ $playlist->name }}</option>
                    @endforeach

            </select>
            <span class="form-text text-muted">Please select playlist</span>
        </div>

        <div class="form-group">
            <label for="allow_likes">{{ trans('dashboard/admin.allow_likes') }}</label>
            <input type="checkbox" name="allow_likes" value="1" {{ old('allow_likes') ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="allow_comments">{{ trans('dashboard/admin.allow_comments') }}</label>
            <input type="checkbox" name="allow_comments" value="1" {{ old('allow_comments') ? 'checked' : '' }}>
        </div>
    </div>

