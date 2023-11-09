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
        @csrf
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Name </label>
            <input name="name" type="text" class="form-control form-control-solid"
                   placeholder="Enter name category" {{old('name')}} value="{{$book->name}}">
        </div>
        <div class="mb-10">
            <label for="category_id" class="required form-label">Thể loại</label>
            <select name="category_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category" data-select2-id="1">
                <option value="0">None</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-10">
            <label for="publisher_id" class="required form-label">Nhà Xuất Bản</label>
            <select name="publisher_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category" data-select2-id="1">
                <option value="0">None</option>
                @foreach($publishing_companies as $publishing_company)
                    <option value="{{ $publishing_company->id }}">{{ $publishing_company->name }}</option>

                @endforeach
            </select>
        </div>
        <div class="mb-10">
            <label for="statuses_id" class="required form-label">Trạng thái</label>
            <select name="statuses_id" cclass="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select parent category" data-select2-id="1">
                <option value="0">None</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
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

