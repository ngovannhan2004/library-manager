@extends('admin.layouts.main')
@section('title_page')
    List Book - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
    {{auth()->user()->name}}
@endsection
@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#kt_datatable_books').DataTable({
                dom: 'Bfrtip',
                order: [],
            });
        });
    </script>
@endsection
@section('menu')
    @php
        $menu_parent = 'books';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Book
@endsection
@section('title_layout')
    List Book
@endsection
@section('actions_layout')
    <a href="{{route('admin.books.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-plus"></i> Add Book
    </a>
@endsection
@section('title_card')
    List Book
@endsection
@section('content_card')
    <div class="table-responsive">
        <table id="kt_datatable_books" class="table table-row-dashed gy-5 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800">
                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.9px;">
                </th>
                <th class="min-w-50">ID</th>
                <th class="min-w-100px">Name</th>
                <th class="min-w-50px">Book code</th>
                <th class="min-w-20px">Quantity</th>
                <th class="min-w-100px">Category</th>
                <th class="min-w-50px">Condition</th>
                <th class="min-w-100px">Authors</th>
                <th class="min-w-100px">Publishing Companies</th>
                <th class="min-w-200px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>
                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->book_code}}</td>
                    <td>{{$book->quantity}}</td>
                    <td>{{$book->category->name}}</td>
                    <td><span class="badge badge-success">{{$book->condition->name}}</span></td>
                    <td>
                        @foreach($book->authors as $author)
                            <span class="badge badge-success">{{$author->name}}</span>
                        @endforeach
                    </td>
                    <td>{{$book->publishingCompany->name}}</td>
                    <td>
                        <a href="{{route('admin.books.edit', $book->id)}}"
                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-primary mr-2"
                           title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if($book->deleted_at == null)
                            <a href="{{route('admin.books.delete', $book->id)}}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-danger"
                               title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        @else
                            <a href="{{route('admin.books.restore', $book->id)}}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-warning"
                               title="Restore">
                                <i class="fa fa-undo"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
@section('footer_card')
    {{--    {{$books->links()}}--}}

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

