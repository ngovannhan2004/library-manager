@extends('admin.layouts.main')
@section('title_page')
    Create Đầu Sách - Admin - {{ config('app.name') }}
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
        $menu_parent = 'dausach';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    User
@endsection
@section('title_layout')
    Create User
@endsection
@section('actions_layout')
    <a href="{{route('admin.users.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Dau Sach
    </a>
@endsection
@section('title_card')
    Create Dau Sach
@endsection
@section('content_card')
    <form action="{{ route('admin.users.store') }}" method="post" class="form-control-sm">
        @csrf
        <div class="mb-10">
            <label for="name" class="required form-label">Name</label>
            <input name="name" type="text" class="form-control form-control-solid" placeholder="Nhập tên" value="{{ old('name') }}">
        </div>
        <div class="mb-10">
            <label for="email" class="required form-label">Email</label>
            <input name="email" type="text" class="form-control form-control-solid" placeholder="Nhập email" value="{{ old('email') }}">
        </div>
        <div class="mb-10">
            <label for="password" class="required form-label">Mật khẩu</label>
            <input name="password" type="password" class="form-control form-control-solid" placeholder="Nhập mật khẩu" value="{{ old('password') }}">
        </div>
        <div class="mb-10">
            <label for="namsinh" class="required form-label">Năm Sinh</label>
            <input name="namsinh" type="text" class="form-control form-control-solid" placeholder="Nhập năm sinh" value="{{ old('namsinh') }}">
        </div>
        <div class="mb-10">
            <label for="gender" class="required form-label">Gender</label>
            <select name="gender" class="form-control form-control-solid">
                <option value="Nam" {{ old('gender') === 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ old('gender') === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                <option value="Khác" {{ old('gender') === 'Khác' ? 'selected' : '' }}>Khác</option>
            </select>
        </div>

        <div class="mb-10">
            <label for="sdt" class="required form-label">Số Điện Thoại</label>
            <input name="sdt" type="text" class="form-control form-control-solid" placeholder="Nhập số điện thoại" value="{{ old('sdt') }}">
        </div>
        <div class="mb-10">
            <label for="role" class="required form-label">Role</label>
            <input name="role" type="text" class="form-control form-control-solid" placeholder="Nhập role" value="{{ old('role') }}">
        </div>
        <div class="mb-10">
            <button class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
                <i class="fa fa-save"></i> Lưu
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

