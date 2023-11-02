@extends('admin.layouts.main')
@section('title_page')
    List Permission - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
    Nam 077
@endsection
@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>

@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script !src="">
        $("#kt_datatable_horizontal_scroll").DataTable({
            dom: 'Bfrtip',
            order: [],
        });
    </script>
@endsection
@section('menu')
    @php
        $menu_parent = 'permission';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Permission
@endsection
@section('title_layout')
    List Permission
@endsection
@section('actions_layout')
    <a href="{{route('admin.permissions.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-plus"></i> Add Permission
    </a>
@endsection
@section('title_card')
    List Permission
@endsection

@section('footer_card')
{{--    {{$permissionCategories->links()}}--}}

@endsection
@section('content_layout')
    <!--begin::Card-->
    @foreach($permissionCategories as $permissionCategory)
    <div class="card shadow-sm card-bordered mb-10">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible{{$permissionCategory->id}}">
            <h3 class="card-title">{{$permissionCategory -> name}}</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>


        <div id="kt_docs_card_collapsible{{$permissionCategory->id}}" class="collapse show">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="kt_datatable_horizontal_scroll{{$permissionCategory->id}}" class="table table-row-dashed gy-5 gs-7">
                        <thead>
                        <tr class="fw-semibold fs-6 text-gray-800">
                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.9px;">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#kt_datatable_horizontal_scroll{{$permissionCategory->id}} .form-check-input" value="1">
                                </div>
                            </th>
                            <th class="min-w-50">#</th>
                            <th class="min-w-200px">Name Permission</th>
                            <th class="min-w-150px">Slug</th>
                            <th class="min-w-200px">Description</th>
                            <th class="min-w-200px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissionCategory->permissions as $permission)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1">
                                    </div>
                                </td>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->slug}}</td>
                                <td>{{$permission->description}}</td>

                                <td>
                                    @if($permission->deleted_at == null)
                                        <a href="{{route('admin.permissions.delete', $permission->id)}}"
                                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-danger" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{route('admin.permissions.restore', $permission->id)}}"
                                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-warning" title="Restore">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                @yield('footer_card')
            </div>
        </div>
    </div>
    <!--end::Card-->
    @endforeach
@endsection

