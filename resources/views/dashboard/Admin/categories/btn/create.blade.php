<div class="modal fade" id="{{ 'add_' . $pageTitle }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                    id="exampleModalLabel">
                    <i class="fa fa-pencil" aria-hidden="true"> </i>
                    {{ 'Add New ' . $pageTitle }}
                </h5>
                <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form class="form" method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="my-4 form-group">
                            <label>{{ __('dashboard/forms.fullname') }}</label>
                            <input name="name[ar]" type="text" class="form-control form-control-solid" placeholder="Enter Arabic name"
                                value="{{ old('name.ar') }}" />
                            <input name="name[en]" type="text" class="mt-2 form-control form-control-solid"
                                placeholder="Enter English name" value="{{ old('name.en') }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="my-4 form-group">
                            <label>{{ __('dashboard/forms.desc') }}</label>
                            <input name="description[ar]" type="text" class="form-control form-control-solid"
                                placeholder="Enter Arabic description" value="{{ old('description.ar') }}" />
                            <input name="description[en]" type="text" class="mt-2 form-control form-control-solid"
                                placeholder="Enter English description" value="{{ old('description.en') }}" />
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span>{{ __('dashboard/forms.parent') }}</span>

                            <div class="py-3 card-body">
                                <!-- jstree -->
                                <div id="categoryJstree"></div>

                            </div>


                            <input type="hidden" name="parent" id="parent" class="parent" value="{{ old('parent') }}" />
                            @error('parent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="mr-2 btn btn-primary">تأكيد</button>
                        <button type="reset" class="reset btn btn-secondary">إلغاء</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
