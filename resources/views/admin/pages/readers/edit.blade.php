@extends('admin.layouts.main')
@section('title_page')
    Edit Reader - Admin - {{ config('app.name') }}
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
        $menu_parent = 'reader';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
   Reader
@endsection
@section('title_layout')
    Edit Reader
@endsection
@section('actions_layout')
    <a href="{{route('admin.readers.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Reader
    </a>
@endsection
@section('title_card')
    Edit Role
@endsection
@section('content_card')
    <form action="{{route('admin.readers.update',$reader->id)}}" method="post">
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
            <label for="exampleFormControlInput1" class="required form-label">Name</label>
            <input type="text" name="name" id="exampleFormControlInput1" class="form-control" value="{{$reader->name}}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
            <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Reader code</label>
            <input type="text" name="reader_code" id="exampleFormControlInput1" class="form-control" value="{{$reader->reader_code}}">
            @error('reader_code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput2" class="required form-label">Address</label>
            <input type="text" name="address" id="exampleFormControlInput2" class="form-control"  value="{{ $reader->address }}">

            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput3" class="required form-label">Phone</label>
            <input type="text" name="phone" id="exampleFormControlInput3" class="form-control" value="{{ $reader->phone  }}">

            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-10">
            <label for="exampleFormControlInput4" class="required form-label">Email</label>
            <input type="email" name="email" id="exampleFormControlInput4" class="form-control" value="{{$reader->email }}">

            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-10">
            <label for="gender" class="required form-label">Gender</label>
            <select name="gender" class="form-control form-control-solid">
                <option value="Male" {{$reader->gender == 'Male' ? 'selected' : ''}}>Male</option>
                <option value="Female" {{$reader->gender == 'Female' ? 'selected' : ''}}>Female</option>
            </select>
        </div>
        <div class="mb-10">
            <label for="year_birth" class="required form-label">Year_birth</label>
            <div class="input-group" id="kt_td_picker_localization" data-td-target-input="nearest"
                 data-td-target-toggle="nearest">
                <input type="text" class="form-control" name="year_birth" value="{{$reader->year_birth}}" data-td-target="#kt_td_picker_localization"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_localization"
                      data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
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

