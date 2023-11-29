@extends('admin.layouts.main')
@section('title_page')
    List Payment Slip - Admin - {{ config('app.name') }}
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
        $menu_parent = 'payment_slip';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
   Payment Slip
@endsection
@section('title_layout')
    List Payment Slip
@endsection
@section('actions_layout')
    <a href="{{route('admin.payment_slips.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-plus"></i> Add Payment Slip
    </a>
@endsection
@section('title_card')
    List Payment Slip
@endsection
@section('content_card')
    <div class="table-responsive">
        <table id="kt_datatable_horizontal_scroll" class="table table-row-dashed gy-5 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800">
                <th class="min-w-50"></th>
                <th class="min-w-50">ID</th>
                <th class="min-w-150px">Return Days</th>
                <th class="min-w-150px">Violated</th>
                <th class="min-w-150px">Book</th>
                <th class="min-w-150px">Reader</th>
                <th class="min-w-200px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payment_slips as $payment_slip)
                <tr>
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>
                    <td>{{$payment_slip->id}}</td>
                    <td>{{$payment_slip->returned_days}}</td>
                    <td>{{$payment_slip->violated}}</td>
                    <td>{{$payment_slip->book->name}}</td>
                    <td>{{$payment_slip->reader->name}}</td>
                    <td>
                        <a href="{{route('admin.payment_slips.edit', $payment_slip->id)}}"
                           class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-primary mr-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if($payment_slip->deleted_at == null)
                            <a href="{{route('admin.payment_slips.delete', $payment_slip->id)}}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md btn-circle btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        @else
                            <a href="{{route('admin.payment_slips.restore', $payment_slip->id)}}"
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
    {{--    {{$payment_slips->links()}}--}}

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

