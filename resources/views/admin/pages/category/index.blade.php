@extends('admin.layouts.main')
@section('title_page')
    List Category - Admin - {{ config('app.name') }}
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
        $menu_parent = 'category';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Category
@endsection
@section('title_layout')
    List Category
@endsection
@section('actions_layout')
    <a href="{{route('admin.categories.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-plus"></i> Add Category
    </a>
@endsection
@section('title_card')
    List Category
@endsection
@section('content_card')
    <div class="table-responsive">
        <table id="kt_datatable_horizontal_scroll" class="table table-row-dashed gy-5 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800">
                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.9px;">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                               data-kt-check-target="#kt_datatable_horizontal_scroll .form-check-input" value="1">
                    </div>
                </th>
                <th class="min-w-50">#</th>
                <th class="min-w-200px">Name Category</th>
                <th class="min-w-150px">Slug</th>
                <th class="min-w-200px">Description</th>
                <th class="min-w-200px">Parent Category</th>
                <th class="min-w-200px">Count Blog</th>
                <th class="min-w-100px">Status</th>
                <th class="min-w-200px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td>{{$category->blogs->count()}}</td>
                    <td>
                        @if($category->status == 1)
                            <span class="badge badge-success">Active</span>
                        @elseif($category->status == 0)
                            <span class="badge badge-info">Inactive</span>
                        @elseif($category->status == 2)
                            <span class="badge badge-warning">Pending</span>
                        @elseif($category->status == 3)
                            <span class="badge badge-danger">Delete</span>
                    @endif
                    <td>
                        <a href="{{route('admin.categories.edit', $category->id)}}"
                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-primary mr-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if($category->deleted_at == null)
                            <a href="{{route('admin.categories.delete', $category->id)}}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        @else
                            <a href="{{route('admin.categories.restore', $category->id)}}"
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
@endsection
@section('footer_card')
    {{$categories->links()}}

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

