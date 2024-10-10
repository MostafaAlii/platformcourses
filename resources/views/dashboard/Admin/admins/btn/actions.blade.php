<div class="d-flex">


    @if ($admin->deleted_at == null)
        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.destroy', $admin->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger mx-1">{{ trans('dashboard/general.delete')}}</button>


        </form>
    @else
        <form action="{{ route('admin.restore',$admin->id) }}" method="post">
            @csrf

            <button class="btn btn-danger mx-1">{{ trans('dashboard/general.restore')}}</button>


        </form>
    @endif

    <form action="{{ route('admin.admins.edit',$admin->id) }}">
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

