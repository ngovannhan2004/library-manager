@extends('admin.layouts.main')
@section('title_page')
    List Loan Slip - Admin - {{ config('app.name') }}
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
    <script !src="">
        $("#kt_datatable_horizontal_scroll").DataTable({
            dom: 'Bfrtip',
            order: [],
        });
    </script>
@endsection
@section('menu')
    @php
        $menu_parent = 'loan slip';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Loan Slip
@endsection
@section('title_layout')
    List Loan Slip
@endsection
@section('actions_layout')
    <a href="{{route('admin.loan_slips.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-plus"></i> Add Loan Slip
    </a>
@endsection
@section('title_card')
    List User
@endsection
@section('content_card')
    <div class="table-responsive">
        <table id="kt_datatable_horizontal_scroll" class="table table-row-dashed gy-5 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800">
                <th class="min-w-50"></th>
                <th class="min-w-50">ID</th>
                <th class="min-w-50px">Borrowed Days</th>
                <th class="min-w-50px">Payment Deadline</th>
                <th class="min-w-150px">Book</th>
                <th class="min-w-150px">Reader</th>
                <th class="min-w-100px">Note</th>
                <th class="min-w-200px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($loan_slips as $loan_slip)
                <tr>
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>
                    <td>{{$loan_slip->id}}</td>
                    <td>{{$loan_slip->borrowed_days}}</td>
                    <td>{{$loan_slip->payment_deadline}}</td>
                    <td>
                        @foreach($loan_slip->books as $book)
                            <span class="badge badge-success">{{$book->book_code}} - {{$book->name}} </span>
                        @endforeach
                    </td>
                    <td>{{$loan_slip->reader->reader_code}}-{{$loan_slip->reader->name}}</td>
                    @if ($loan_slip->daysDifference < 0)
                        <td style="color: red;"><b>Trễ hạn {{ abs($loan_slip->daysDifference) }} ngày.</b></td>
                    @elseif ($loan_slip->daysDifference == 0)
                        <td style="color: orange;"><b>Đúng hạn trả.</b></td>
                    @elseif ($loan_slip->daysDifference > 0)
                        <td style="color: green;"><b>Sắp đến hạn trả.</b></td>
                    @endif


                    <td>
                        <a href="{{route('admin.loan_slips.edit', $loan_slip->id)}}"
                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-primary mr-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if($loan_slip->deleted_at == null)
                            <a href="{{route('admin.loan_slips.delete', $loan_slip->id)}}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        @else
                            <a href="{{route('admin.loan_slips.restore', $loan_slip->id)}}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-warning" title="Restore">
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
    {{--    {{$loan_slips->links()}}--}}

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

