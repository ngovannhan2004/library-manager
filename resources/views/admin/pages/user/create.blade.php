@extends('admin.layouts.main')
@section('title_page')
    Create User - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
    {{auth()->user()->name}}

@endsection
@section('email_user')
    {{auth()->user()->email}}
@endsection
@section('css_custom')
    <!-- Tempus Dominus Styles -->
@endsection
@section('js_custom')

    <script>
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization"), {
            localization: {
                locale: "de",
                startOfTheWeek: 1,
                format: "dd/MM/yyyy"
            }
        });
    </script>
@endsection
@section('menu')
    @php
        $menu_parent = 'user';
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
    <a href="{{route('admin.users.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List User
    </a>
@endsection
@section('title_card')
    Create User
@endsection
@section('content_card')
    <form action="{{ route('admin.users.store') }}" method="post" class="form-control-sm">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-10">
            <label for="name" class="required form-label">Name</label>
            <input name="name" type="text" class="form-control form-control-solid" placeholder="Nhập tên"
                   value="{{ old('name') }}">

            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="email" class="required form-label">Email</label>
            <input name="email" type="text" class="form-control form-control-solid" placeholder="Nhập email"
                   value="{{ old('email') }}">

            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-10">
            <label for="password" class="required form-label">Mật khẩu</label>
            <input name="password" type="password" class="form-control form-control-solid" placeholder="Nhập mật khẩu"
                   value="{{ old('password') }}">


            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-10">
            <label for="namsinh" class="required form-label">Năm sinh</label>
            <div class="input-group" id="kt_td_picker_localization" data-td-target-input="nearest"
                 data-td-target-toggle="nearest">
                <input type="text" class="form-control" name="namsinh" data-td-target="#kt_td_picker_localization"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_localization"
                      data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
            </div>
        </div>

        <div class="mb-10">
            <label for="gender" class="required form-label">Gender</label>
            <select name="gender" class="form-control form-control-solid">
                <option value="nam" {{ old('') === 'nam' ? 'selected' : '' }}>Nam</option>
                <option value="nu" {{ old('') === 'nu' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>

        <div class="mb-10">
            <label for="sdt" class="required form-label">Số Điện Thoại</label>
            <input name="sdt" type="text" class="form-control form-control-solid" placeholder="Nhập số điện thoại"
                   value="{{ old('sdt') }}">

            @error('sdt')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="role" class="required form-label">Role</label>
            <select name="role" class="form-control form-control-solid">
                <option value="admin" {{ old('') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('') === 'user' ? 'selected' : '' }}>User</option>
            </select>
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

