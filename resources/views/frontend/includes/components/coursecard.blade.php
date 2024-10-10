
<div class="card shadow-sm">
    <a href="{{ route('site.courses.show',$course-> id) }}">
        @if($course->hasMedia('courses'))
            <img src="{{ $course->getFirstMediaUrl('courses')  }}" class="card-img-top" alt="{{ $course->name }}">
        @else
        <svg class="image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path
              d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"
            ></path>
          </svg>
        @endif
    </a>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <p class="card-text text-center online"></p>
            <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>

        </div>
        <a href="{{ route('site.courses.show',$course-> id) }}" class="text-decoration-none text-dark">
            <h5 class="card-title cardCourseTitle">{{ $course -> name }}</h5>
        </a>




        @if($course -> Price == 0)

        <h5 class="card-title text-danger cardCourseTitle">FREE</h5>

        @else

        <h5 class="card-title text-danger cardCourseTitle">{{ $course -> Price }}$</h5>
        @endif

        <div class="d-flex justify-content-between">
            <p class="Location">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                    class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>

            </p>

            <p class="Location">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                    class="bi bi-calendar" viewBox="0 0 16 16">
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg>

                {{ $course->videos()->count() }} videos
            </p>
        </div>
    </div>
</div>
