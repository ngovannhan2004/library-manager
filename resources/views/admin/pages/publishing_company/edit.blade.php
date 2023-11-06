@extends('admin.layouts.main')
@section('title_page')
    Create Category - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
    Nam 077
@endsection
@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>
@endsection
@section('menu')
    @php
        $menu_parent = 'category';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
    Category
@endsection
@section('title_layout')
    Create Category
@endsection
@section('actions_layout')
    <a href="{{route('admin.categories.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Category
    </a>
@endsection
@section('title_card')
    Create Category
@endsection
@section('content_card')
    <form action="{{route('admin.categories.update', $category->id)}}" method="post" class="form-control-sm">
        @csrf
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Name Category</label>
            <input name="name" value="{{$category -> name}}" type="text" class="form-control form-control-solid"
                   placeholder="Enter name category" {{old('name')}}>
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Parent Category</label>
            <select class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category" data-select2-id="1" name="parent_id">
                <option></option>
                <option value="0">None</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Name Category</label>
            <textarea name="description" id="" cols="20" rows="10" class="form-control form-control-solid">{{$category -> name}}</textarea>
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

