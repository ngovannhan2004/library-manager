@extends('admin.layouts.main')
@section('title_page')
    Create Permission - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
    {{auth()->user()->name}}

@endsection
@section('email_user')
    {{auth()->user()->email}}
@endsection
@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'permission';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    Permission
@endsection
@section('title_layout')
    Create Permission
@endsection
@section('actions_layout')
    <a href="{{route('admin.permissions.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Permission
    </a>
@endsection
@section('title_card')
    Create Permission
@endsection
@section('content_card')

    <form action="{{route('admin.permissions.store')}}" method="post" class="form-control-sm">
        @csrf


        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Category Permission</label>
            <select class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select category" data-select2-id="1" name="id_permission_category">
                @foreach($permissionCategories as $permissionCategory)
                    <option value="{{$permissionCategory->id}}">{{$permissionCategory->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Choose Permission</label>
            <div class="mb-10">
                <div class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" checked name="permissions[]" value="list">
                    <label class="form-check-label" for="">
                        View Permission
                    </label>
                </div>
            </div>
            <div class="mb-10">
                <div class="form-check form-check-custom form-check-success form-check-solid">
                    <input class="form-check-input" type="checkbox" checked name="permissions[]" value="create">
                    <label class="form-check-label" for="">
                        Create Permission
                    </label>
                </div>
            </div>
            <div class="mb-10">
                <div class="form-check form-check-custom form-check-warning form-check-solid">
                    <input class="form-check-input" type="checkbox" checked name="permissions[]" value="edit">
                    <label class="form-check-label" for="">
                        Edit Permission
                    </label>
                </div>
            </div>
            <div class="mb-10">
                <div class="form-check form-check-custom form-check-danger form-check-solid">
                    <input class="form-check-input" type="checkbox" checked name="permissions[]" value="delete">
                    <label class="form-check-label" for="">
                        Delete Permission
                    </label>
                </div>
            </div>
            <div class="mb-10">
                <div class="form-check form-check-custom form-check-warning form-check-solid">
                    <input class="form-check-input" type="checkbox" checked name="permissions[]" value="restore">
                    <label class="form-check-label" for="">
                        Restore Permission
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-10">
            <button class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
                <i class="fa fa-save"></i> Save
            </button>
        </div>

    </form>
@endsection
@section('footer_card')

@endsection
@section('content_layout')
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title">@yield('title_card')</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                @yield('content_card')
            </div>
            <div class="card-footer">
                @yield('footer_card')
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection

