@extends('admin.layouts.main')
@section('title_page')
    Edit Loan Slip - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
    {{auth()->user()->name}}

@endsection
@section('email_user')
    {{auth()->user()->email}}
@endsection
@section('css_custom')
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
        $menu_parent = 'loan_slip';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
    Edit Loan Slip
@endsection
@section('title_layout')
    Edit Loan Slip
@endsection
@section('actions_layout')
    <a href="{{route('admin.loan_slips.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Loan Slip
    </a>
@endsection
@section('title_card')
    Edit User
@endsection
@section('content_card')
    <form action="{{route('admin.loan_slips.update', $loanSlip->id)}}" method="post" class="form-control-sm">
        @csrf
        <div class="mb-10">
            <label for="borrowed_days" class="required form-label">Borrowed Days</label>
            <div class="input-group" id="kt_td_picker_localization" data-td-target-input="nearest"
                 data-td-target-toggle="nearest">
                <input type="text" class="form-control" name="borrowed_days"
                       data-td-target="#kt_td_picker_localization"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_localization"
                      data-td-toggle="datetimepicker">
        <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
            </div>

            @error('borrowed_days')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-10">
            <label for="book_ids" class="required form-label">Book</label>
            <select name="book_ids[]" class="form-select form-select-solid" data-control="select2" multiple
                    data-placeholder="Select Books">
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>

            @error('book_ids')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="reader_id" class="required form-label">Reader</label>
            <select name="reader_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select Reader">
                @foreach($readers as $reader)
                    <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                @endforeach
            </select>
            @error('reader_id')
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

