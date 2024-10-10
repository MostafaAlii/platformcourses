<div class="d-flex">


    @if ($course->deleted_at == null)
        <form id="delete-form-{{ $course->id }}" action="{{ route('admin.courses.destroy', $course->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger mx-1">{{ trans('dashboard/general.delete')}}</button>


        </form>
    @else
        <form action="{{ route('admin.restore',$course->id) }}" method="post">
            @csrf

            <button class="btn btn-danger mx-1">{{ trans('dashboard/general.restore')}}</button>


        </form>
    @endif

    <form action="{{ route('admin.courses.edit' ,$course->id ) }}">
        @csrf
        <button class="btn btn-info">{{ trans('dashboard/general.update')}}</button>

    </form>

</div>


    <script>
        function deleteAdmin(id) {
            if (confirm("Are you sure you want to delete this admin?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>

