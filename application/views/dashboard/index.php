<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Dashboard</h4>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon mr-2"><i class="mdi mdi-refresh"></i></button>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <strong>Hello, <?= ucwords($this->session->userdata('nama_user')) ?></strong>
                <h5 class="mt-1">WELCOME TO CHING LUH - EQUIPMENT MANAGEMENT</h5>
            </div>
            <div class="col-md-6"><img src="../../assets/img/brand/logo.png" class="logo-1" alt="logo" style="height: 100%"></div>
        </div>
    </div>
</div>
<div class="my-auto">
    <div class="row row-sm">
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-primary-gradient text-white ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-shopping-bag tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">Entry Machine Data</span>
                                <h2 class="text-white mb-0"><?= $equipment_entry ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-danger-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-bar-chart-2 tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">Machine Data Out</span>
                                <h2 class="text-white mb-0"><?= $machine_out ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-success-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-settings tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">Already Maintenance</span>
                                <h2 class="text-white mb-0"><?= $already_maintenance ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-warning-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-pie-chart tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">Not Yet Maintenance</span>
                                <h2 class="text-white mb-0"><?= $not_yet_maintenance ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Summary Machine Entry</div>
            </div>
            <div class="card-body">
                <div id="machine_entry" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Summary Machine Out</div>
            </div>
            <div class="card-body">
                <div id="machine_out" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

<script>
    new Morris.Bar({

        // ID of the element in which to draw the chart.
        element: 'machine_entry',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: <?= $machine_entry ?>,
        // The name of the data record attribute that contains x-values.
        xkey: 'machine_enter_line',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['total_entry'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Equipment Entry']
    });
    new Morris.Bar({

        // ID of the element in which to draw the chart.
        element: 'machine_out',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: <?= $machine_out_chart ?>,
        // The name of the data record attribute that contains x-values.
        xkey: 'date_shrinkage',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['total_out'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Equipment Out']
    });
</script>