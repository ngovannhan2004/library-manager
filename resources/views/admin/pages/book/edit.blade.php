@extends('admin.layouts.main')
@section('title_page')
    Edit Book - Admin - {{ config('app.name') }}
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

@endsection
@section('menu')
    @php
        $menu_parent = 'book';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
    Edit Book
@endsection
@section('title_layout')
    Edit Book
@endsection
@section('actions_layout')
    <a href="{{route('admin.books.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Book
    </a>
@endsection
@section('title_card')
    Edit Book
@endsection
@section('content_card')
    <form action="{{route('admin.books.update', $book->id)}}" method="post" class="form-control-sm">
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
                   value="{{$book->name }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
            <div class="mb-10">
                <label for="book_code" class="required form-label">Book code</label>
                <input name="book_code" type="text" class="form-control form-control-solid" placeholder="Nhập mã sách"
                       value="{{$book->book_code }}">
                @error('book_code')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-10">
                <label for="quantity" class="required form-label">Quantity</label>
                <input name="quantity" type="text" class="form-control form-control-solid" placeholder="Nhập số lượng"
                       value="{{$book->quantity }}">
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
                    <option @if($book->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-10">
            <label for="publisher_id" class="required form-label">Publishing Companies</label>
            <select name="publisher_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category">
                @foreach($publishingCompanies as $publishingCompany)
                    <option @if($book->publisher_id == $publishingCompany->id) selected @endif value="{{ $publishingCompany->id }}">{{ $publishingCompany->name }}</option>
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
                    <option @if($book->condition_id == $condition->id) selected @endif value="{{ $condition->id }}">{{ $condition->name }}</option>
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
                    <option @if(in_array($author->id, $book->authors->pluck('id')->toArray())) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_ids')
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

