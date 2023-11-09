@extends('admin.layouts.main')
@section('title_page')
    Create Payment Slip - Admin - {{ config('app.name') }}
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
        $menu_parent = 'payment_slip';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    Create Payment Slip
@endsection
@section('title_layout')
    Create Payment Slip
@endsection
@section('actions_layout')
    <a href="{{route('admin.payment_slips.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Payment Slip
    </a>
@endsection
@section('title_card')
    Create User
@endsection
@section('content_card')
    <form action="{{ route('admin.payment_slips.store') }}" method="post" class="form-control-sm">
        @csrf
        <div class="mb-10">
            <label for="name" class="required form-label">Name</label>
            <input name="name" type="text" class="form-control form-control-solid" placeholder="Nhập tên"
                   value="{{ old('name') }}">
        </div>

        <div class="mb-10">
            <label for="borrowed_days" class="required form-label">Borrowed Days</label>
            <div class="input-group" id="kt_td_picker_localization" data-td-target-input="nearest"
                 data-td-target-toggle="nearest">
                <input type="text" class="form-control" name="borrowed_days" data-td-target="#kt_td_picker_localization"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_localization"
                      data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
            </div>
        </div>

        <div class="mb-10">
            <label for="return_days" class="required form-label">Return Days</label>
            <div class="input-group" id="kt_td_picker_localization" data-td-target-input="nearest"
                 data-td-target-toggle="nearest">
                <input type="text" class="form-control" name="returned_days" data-td-target="#kt_td_picker_localization"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_localization"
                      data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
            </div>
        </div>

        <div class="mb-10">
            <label for="violated" class="required form-label">Violated</label>
            <input name="violated" type="text" class="form-control form-control-solid" placeholder="Nhập vi phạm"
                   value="{{ old('violated') }}">
        </div>



        <div class="mb-10">
            <label for="category_id" class="required form-label">Thể loại</label>
            <select name="category_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category" data-select2-id="1">
                <option value="0" >None</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-10">
            <label for="publisher_id" class="required form-label">Nhà Xuất Bản</label>
            <select name="publisher_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category" data-select2-id="1">
                <option value="0" >None</option>
                @foreach($publishing_companies as $publishing_company)
                    <option value="{{ $publishing_company->id }}">{{ $publishing_company->name }}</option>

                @endforeach
            </select>
        </div>
        <div class="mb-10">
            <label for="books" class="required form-label">Book</label>
            <select name="books" cclass="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select " data-select2-id="1">
                <option value="0" >None</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-10">
            <label for="reader" class="required form-label">Book</label>
            <select name="reader" cclass="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select " data-select2-id="1">
                <option value="0" >None</option>
                @foreach($readers as $reader)
                    <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                @endforeach
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

