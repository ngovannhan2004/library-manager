@extends('admin.layouts.main')
@section('title_page')
    Edit Role - Admin - {{ config('app.name') }}
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
    <script>
        $(document).ready(function () {
            let child_all = $(document).find('tbody').find('.child-permission').length;
            let child_all_checked = $(document).find('tbody').find('.child-permission:checked').length;
            if (child_all === child_all_checked) {
                $(document).find('#kt_roles_select_all').prop('checked', true);
            } else {
                $(document).find('#kt_roles_select_all').prop('checked', false);
            }
            let tr = $(document).find('#permission_table tbody').find('tr');
            console.log(tr);
            tr.each(function () {
                let child = $(this).find('.child-permission').length;
                let child_checked = $(this).find('.child-permission:checked').length;
                if (child === child_checked) {
                    $(this).find('.parent-permission').prop('checked', true);
                }
            })
        });
        $(document).on('click', '#kt_roles_select_all', function () {
            console.log('click');
            if ($(this).is(':checked')) {
                $('.child-permission').prop('checked', true);
                $('.parent-permission').prop('checked', true);

            } else {
                $('.child-permission').prop('checked', false);
                $('.parent-permission').prop('checked', false);
            }
        })
        $(document).on('click', '.parent-permission', function () {
            if ($(this).is(':checked')) {
                $(this).closest('tr').find('.child-permission').prop('checked', true);
                let child_all = $(this).closest('tbody').find('.child-permission').length;
                let child_all_checked = $(this).closest('tbody').find('.child-permission:checked').length;
                if (child_all === child_all_checked) {
                    $(this).closest('tbody').find('#kt_roles_select_all').prop('checked', true);
                }
            } else {
                $(this).closest('tr').find('.child-permission').prop('checked', false);
                $(this).closest('tbody').find('#kt_roles_select_all').prop('checked', false);
            }
        })
        $(document).on('click', '.child-permission', function () {
            if ($(this).is(':checked')) {
                let child = $(this).closest('tr').find('.child-permission').length;
                let child_checked = $(this).closest('tr').find('.child-permission:checked').length;
                let child_all = $(this).closest('tbody').find('.child-permission').length;
                let child_all_checked = $(this).closest('tbody').find('.child-permission:checked').length;
                if (child === child_checked) {
                    $(this).closest('tr').find('.parent-permission').prop('checked', true);
                }
                if (child_all === child_all_checked) {
                    $(this).closest('tbody').find('#kt_roles_select_all').prop('checked', true);
                }
            } else {
                $(this).closest('tr').find('.parent-permission').prop('checked', false);
                $(this).closest('tbody').find('#kt_roles_select_all').prop('checked', false);
            }

        })
    </script>
@endsection
@section('menu')
    @php
        $menu_parent = 'role';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
    Role
@endsection
@section('title_layout')
    Edit Role
@endsection
@section('actions_layout')
    <a href="{{route('admin.permission-categories.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Role
    </a>
@endsection
@section('title_card')
    Edit Role
@endsection
@section('content_card')
    <form action="{{route('admin.roles.update',$role->id)}}" method="post">
        @csrf
        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
             data-kt-scroll-dependencies="#kt_modal_update_role_header"
             data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px"
             style="max-height: 418px;">
            <!--begin::Input group-->
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="fs-5 fw-bold form-label mb-2">
                    <span class="required">Role name</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-solid" placeholder="Enter a role name" name="name"
                       value="{{$role->name}}" type="text" required>
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->
            <!--begin::Permissions-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                <!--end::Label-->
                <!--begin::Table wrapper-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="permission_table">
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold" id="kt_permissions_list">
                        <!--begin::Table row-->
                        <tr>
                            <td class="text-gray-800">Administrator Access
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                   aria-label="Allows a full access to the system" data-kt-initialized="1"></i></td>
                            <td>
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                    <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all">
                                    <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                </label>
                                <!--end::Checkbox-->
                            </td>
                        </tr>
                        <!--end::Table row-->
                        <!--begin::Table row-->
                        @foreach($permissionCategories as $permissionCategory)
                            <tr>
                                <td class="text-gray-800">
                                    <div class="d-flex">
                                        <label
                                            class="form-check form-check-custom form-check-danger form-check-solid">
                                            <input class="form-check-input parent-permission" type="checkbox"
                                                   value="{{$permissionCategory->id}}">
                                            <span class="form-check-label">{{$permissionCategory->name}}</span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <!--begin::Wrapper-->
                                    <div class="row">
                                        @foreach($permissionCategory->permissions as $permission)
                                            <div class="col col-auto min-w-175px">
                                                <label
                                                    class="form-check form-check-custom form-check-solid form-check-@if($permission->value == 'view')success @elseif($permission->value == 'create')success @elseif($permission->value == 'edit')warning @elseif($permission->value == 'delete')danger @elseif($permission->value == 'restore')warning @endif">
                                                    <input class="form-check-input child-permission" type="checkbox"
                                                           value="{{$permission->id}}"
                                                           name="permissions[]"
                                                           @if($role->permissions->contains($permission->id)) checked
                                                           @endif
                                                           id="kt_permission_category_{{$permissionCategory->id}}_{{$permission->id}}">
                                                    <span class="form-check-label"
                                                          for="kt_permission_category_{{$permissionCategory->id}}_{{$permission->id}}">{{ucfirst($permission->value)}}</span>
                                                </label>
                                            </div>

                                        @endforeach

                                        <!--end::Checkbox-->
                                    </div>
                                    <!--end::Wrapper-->
                                </td>
                                <!--end::Input group-->
                            </tr>
                        @endforeach
                        <!--end::Table row-->

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table wrapper-->
            </div>
            <!--end::Permissions-->
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

