@extends('layout')
@section('title', 'Dashboard')

@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Welcome, {{Auth::user()->name}}</h6>
                </div>
            </div>
            <!-- BEGIN: Card Stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">A</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$data['total']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-archive-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">B</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$data['basah']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                        <i class="ni ni-tag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">C</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$data['digital']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-folder-17"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">D</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$data['selesai']}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="fa fa-inbox"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Card Stats -->
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    @if (Auth::user()->email_verified_at != null)
    <div class="row">
        <div class="col-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Akses Dokumen</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="chart">
                        <div id="chart-bars-1" class="chart-canvas"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Akses & Status Dokumen</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="chart">
                        <div id="chart-bars-2" class="chart-canvas"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Verifikasi {{Auth::user()->email_verified_at == null ? "Email " : ""}}</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            @if (Auth::user()->email_verified_at == null)
                            <p class="mb-0">Mohon lakukan verifikasi email melalui tautan pada email yang kami kirim ke alamat email yang Anda daftarkan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('script')
<script>
    var options = {
        series: [{
            data: <?= json_encode($data["chart1"]); ?>
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Viewer', 'Signer', 'Editor', 'Owner'],
        }
    };
    var chart1 = new ApexCharts(document.querySelector("#chart-bars-1"), options);
    chart1.render();

    var options = {
        series: <?= json_encode($data["chart2"]) ?>,
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: false,
            offsetX: 0,
            style: {
                fontSize: '12px',
                colors: ['#fff']
            }
        },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff']
        },
        tooltip: {
            shared: true,
            intersect: false
        },
        xaxis: {
            categories: ['Viewer', 'Signer', 'Editor', 'Owner'],
        },
    };
    var chart2 = new ApexCharts(document.querySelector("#chart-bars-2"), options);
    chart2.render();
</script>
@endsection
