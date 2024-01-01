@extends('admin.layouts.main')
@section('title_page')
   Statistic - Admin - {{ config('app.name') }}
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
        $menu_parent = 'Statistic';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Statistic
@endsection
@section('title_layout')
    Statistic
@endsection
@section('actions_layout')
@endsection
@section('title_card')
    Statistic
@endsection
@section('content_card')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="display: flex; flex-direction: column; align-items: center; margin-right: 20px;">
            <canvas id="borrowersChart" width="300" height="300"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                let borrowersCount = {!! json_encode($uniqueReadersCount) !!};
                let ctxBorrowers = document.getElementById('borrowersChart').getContext('2d');
                let borrowersChart = new Chart(ctxBorrowers, {
                    type: 'pie',
                    data: {
                        labels: ['Người mượn sách'],
                        datasets: [{
                            label: 'Người mượn sách',
                            data: [borrowersCount],
                            backgroundColor: ['rgba(255, 99, 132, 0.6)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: false
                    }
                });
            </script>
            <h2 style="margin-top: 20px; text-align: center;">Biểu đồ thống kê số người mượn sách</h2>
        </div>
    </div>

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="display: flex; flex-direction: column; align-items: center; margin-right: 20px;">
            <canvas id="borrowChart" width="700" height="400"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                let borrowData = {!! json_encode($borrowData) !!};
                let bookNames = borrowData.map(item => item.name);
                let borrowCounts = borrowData.map(item => item.borrow_count);
                let ctxBorrow = document.getElementById('borrowChart').getContext('2d');
                let borrowChart = new Chart(ctxBorrow, {
                    type: 'bar',
                    data: {
                        labels: bookNames,
                        datasets: [{
                            label: 'Số lượt mượn',
                            data: borrowCounts,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 10
                            }
                        }
                    }
                });
            </script>
            <h2 style="margin-top: 20px; text-align: center;">Biểu đồ thống kê số lượt mượn của từng sách</h2>
        </div>
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

