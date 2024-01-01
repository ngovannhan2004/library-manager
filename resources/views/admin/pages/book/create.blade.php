@extends('admin.layouts.main')
@section('title_page')
    Create Book - Admin - {{ config('app.name') }}
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
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js') }}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'book';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    Create Book
@endsection
@section('title_layout')
    Create Book
@endsection
@section('actions_layout')
    <a href="{{route('admin.books.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Book
    </a>
@endsection
@section('title_card')
    Create Book
@endsection
@section('content_card')

    <form action="{{ route('admin.books.store') }}" method="post" class="form-control-sm">
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
            <label for="quantity" class="required form-label">Quantity</label>
            <input name="quantity" type="text" class="form-control form-control-solid" placeholder="Nhập số lượng"
                   value="{{ old('quantity') }}">
            @error('quantity')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="category_id" class="required form-label">Category</label>
            <select name="category_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category" data-select2-id="1">
                <option value="0">None</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="publisher_id" class="required form-label">Publishing Companies</label>
            <select name="publisher_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select Publishing Companies">
                @foreach($publishingCompanies as $publishingCompany)
                    <option value="{{ $publishingCompany->id }}">{{ $publishingCompany->name }}</option>
                @endforeach
            </select>

            @error('publisher_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="condition_id" class="required form-label">Status</label>
            <select name="condition_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select Status">
                @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                @endforeach
            </select>
            @error('condition_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="author_ids" class="required form-label">Author</label>
            <select name="author_ids[]" class="form-select form-select-solid" data-control="select2" multiple
                    data-placeholder="Select Authors">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_ids')
            <div class="text-danger">{{ $message }}</div>
            @enderror
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

