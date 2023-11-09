@extends('admin.layouts.main')
@section('title_page')
    Edit Author - Admin - {{ config('app.name') }}
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
        $menu_parent = 'author';
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
    <a href="{{route('admin.authors.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Author
    </a>
@endsection
@section('title_card')
    Edit Role
@endsection
@section('content_card')
    <form action="{{route('admin.authors.update',$author->id)}}" method="post">
        @csrf
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Name</label>
            <input type="text" name="name" id="exampleFormControlInput1" class="form-control" value="{{$author->name}}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput2" class="required form-label">Address</label>
            <input type="text" name="address" id="exampleFormControlInput2" class="form-control"  value="{{ $author->address }}">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput3" class="required form-label">Phone</label>
            <input type="text" name="phone" id="exampleFormControlInput3" class="form-control" value="{{ $author->phone  }}">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput4" class="required form-label">Email</label>
            <input type="email" name="email" id="exampleFormControlInput4" class="form-control" value="{{$author->email }}">

            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-10">
            <label for="gender" class="required form-label">Gender</label>
            <select name="gender" class="form-control form-control-solid">
                <option value="Nam" {{ old('gender') === 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ old('gender') === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                <option value="Khác" {{ old('gender') === 'Khác' ? 'selected' : '' }}>Khác</option>
            </select>

            @error('gender')
            <div class="text-danger">{{ $message }}</div>
            @enderror
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

