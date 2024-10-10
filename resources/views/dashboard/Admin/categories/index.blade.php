@extends('dashboard.layouts.master')

@section('css')


@endsection

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('content')
    @include('dashboard.layouts.common._partial.messages')
    <div id="kt_content_container" class="container-xxl">
        <div class="mb-5 card card-xxl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="pt-5 border-0 card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="mb-1 card-label fw-bolder fs-3">{{$pageTitle}}</span>
                    <span class="mt-1 text-muted fw-bold fs-7">{{$pageTitle}}</span>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" >
                        {{--<a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-light btn-active-primary">--}}
                        <a class="btn btn-sm btn-light btn-active-success x-small" href="#" data-toggle="modal" data-target="{{ '#add_' . $pageTitle }}">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            Add New {{ $pageTitle }}
                        </a>
                    </div>
                </h3>
            </div>
            <div class="py-3 card-body">
                <!--begin::Table container-->
                <a href="" class="hidden showbtn delete_cat" data-toggle="modal" data-target="#exampleModalCenter"><button class="mx-1 btn btn-danger ">{{ trans('dashboard/general.delete')}}</button></a>
                <a href="" class="hidden showbtn edit_cat"><button class="btn btn-info">{{ trans('dashboard/general.update')}}</button></a>
                <div id="jstree"></div>
                <input type="hidden" name="parent" id="parent" class="parent" value="" />
                <!--end::Table container-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
        </div>
        @include('dashboard.Admin.categories.btn.create')

    </div>
@endsection

@push('js')

<script>
    /*document.querySelector('.btn-active-success').addEventListener('click', function(e) {
        e.preventDefault();
        var modalId = '#add_' + "{{ $pageTitle }}";
        $(modalId).modal('show');
    });
    document.querySelector('.reset').addEventListener('click', function() {
        var modalId = '#add_' + "{{ $pageTitle }}";
        $(modalId).modal('hide');
    });
    document.querySelector('.close').addEventListener('click', function() {
        var modalId = '#add_' + "{{ $pageTitle }}";
        $(modalId).modal('hide');
    });*/
    function handleModalActions(action) {
        var modalId = '#add_' + "{{ $pageTitle }}";
        if (action === 'show') {
            $(modalId).modal('show');
        } else if (action === 'hide') {
            $(modalId).modal('hide');
        }
    }
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-active-success')) {
            e.preventDefault();
            handleModalActions('show');
        }
        if (e.target.classList.contains('reset') || e.target.classList.contains('close')) {
            handleModalActions('hide');
        }
    });


    $('#jstree').jstree({
        "core" : {
            'data' : {!! loadcategories(old('parent')) !!},
            "themes" : {
                "variant" : "large"
            }
        },
        "checkbox" : {
        "keep_selected_style" : false
        },
        "plugins" : [ "wholerow" ] // add later checkbox for bulk
    });
    $('#jstree').on('changed.jstree',function(e, data) {
        var i, j, r = [];
        for (i = 0, j = data.selected.length; i < j; i++) {
            r.push(data.instance.get_node(data.selected[i]).id);
        }
        $('.parent').val(r.join(', '));
        if(r.join(', ') != '') {
            $('.showbtn').removeClass('hidden');
            var urledit = '{{ route("admin.categories.edit", ":id") }}';  // Placeholder :id
            urledit = urledit.replace(':id', r.join(', '));
            $('.edit_cat').attr('href', urledit);
        }else {
            $('.showbtn').addClass('hidden')
        }
    });
</script>


<script>
        $('#categoryJstree').jstree({
            "core": {
                'data': {!! loadcategories(old('parent')) !!},
                "themes": {
                    "variant": "large"
                }
            },
            "checkbox": {
                "keep_selected_style": false
            },
            "plugins": ["wholerow"]
        });
        $('#categoryJstree').on('changed.jstree',function(e, data) {
            var i, j, r = [];
            for (i = 0, j = data.selected.length; i < j; i++) {
                r.push(data.instance.get_node(data.selected[i]).id);
            }
            $('.parent').val(r.join(', '));
        });
    </script>



@endpush
