<?php

/** @var yii\web\View $this */

$this->title = 'LAB CENTER';
?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
    <div class="col">
        <div class="card radius-10 border-0 border-start border-primary border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">Total Admin</p>
                        <h4 class="mb-0 text-primary"><?= $totalpeminjaman ?></h4>
                    </div>
                    <div class="ms-auto widget-icon bg-primary text-white">
                        <i class="bi bi-basket2-fill"></i>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-0 border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">Total Penanggung Jawab</p>
                        <h4 class="mb-0 text-success"><?= $totalmaintanance ?></h4>
                    </div>
                    <div class="ms-auto widget-icon bg-success text-white">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-0 border-start border-danger border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">Total LAB</p>
                        <h4 class="mb-0 text-danger"><?= $totalkalibrasi ?></h4>
                    </div>
                    <div class="ms-auto widget-icon bg-danger text-white">
                        <i class="bi bi-graph-down-arrow"></i>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-0 border-start border-warning border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">Total Alat</p>
                        <h4 class="mb-0 text-warning"><?= $totalalat ?></h4>
                    </div>
                    <div class="ms-auto widget-icon bg-warning text-dark">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h6 class="mb-0 fw-bold">Total Pemakain Alat</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                            data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chart1"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h6 class="mb-0 fw-bold">Statistic</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                            data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chart2"></div>
            </div> 
            <ul class="list-group list-group-flush mb-0">
                <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">
                    Peminjaman Eksternal<span class="badge bg-success rounded-pill">
                        <?= $totalpeminjamaneksternal ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    Peminjaman Internal<span class="badge bg-primary rounded-pill">
                        <?= $totalpeminjamaninternal ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    Maintanance<span class="badge bg-danger rounded-pill"> <?= $totalmaintanance ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    Kalibrasi<span class="badge bg-warning rounded-pill"> <?= $totalkalibrasi ?>
                    </span>
                </li>
            </ul>
        </div>
    </div>

</div>
<!--end row-->

<script lang="javascript">
$(function() {
    "use strict";


    // chart 1
    var options = {
        series: [{
            name: 'Sales Overview',
            data: [
                <?php for ($i = 1; $i <= 12; $i++): ?>
                <?php for ($j = 0; $j < count($finaldata); $j++): ?>
                <?php if($finaldata[$j]['month'] == $i): ?>
                <?= $finaldata[$j]['jumlah'] ?>,
                <?php else: ?>
                <?= 0 ?>,
                <?php endif; ?>
                <?php endfor; ?>
                <?php endfor; ?>
            ]
        }],
        chart: {
            foreColor: '#9ba7b2',
            height: 330,
            type: 'bar',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
        },
        stroke: {
            width: 0,
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "30%",
                endingShape: "rounded"
            }
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.15)',
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#01e195'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
            }
        },
        colors: ['#0d6efd'],
        dataLabels: {
            enabled: false,
            enabledOnSeries: [1]
        },
        xaxis: {
            categories: [

                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ],
        },
    };
    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();




    // chart 2

    var options = {
        series: [
            <?= $totalpeminjamaneksternal ?>,
            <?= $totalpeminjamaninternal ?>,
            <?= $totalmaintanance ?>,
            <?= $totalkalibrasi ?>,
        ],
        chart: {
            height: 255,
            type: 'donut',
        },
        legend: {
            position: 'bottom',
            show: false,
        },
        plotOptions: {
            pie: {
                // customScale: 0.8,
                donut: {
                    size: '80%'
                }
            }
        },
        colors: ["#198754", "#0d6efd", "#dc3545", "#FFC107"],
        dataLabels: {
            enabled: false
        },
        labels: ['Peminjaman Eksternal', 'Peminjaman Internal', 'Maintanance', 'Kalibrasi'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();



    // chart 3

    var options = {
        series: [{
            name: 'Monthly Views',
            data: [10, 25, 42, 12, 55, 30, 63, 27, 20]
        }],
        chart: {
            foreColor: '#9ba7b2',
            height: 250,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
        },
        stroke: {
            width: 4,
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "30%",
                endingShape: "rounded"
            }
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.15)',
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#01e195'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
            }
        },
        colors: ['#0d6efd'],
        dataLabels: {
            enabled: false,
            enabledOnSeries: [1]
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
    };
    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();






    // chart 4

    var options = {
        series: [{
            name: 'Monthly Users',
            data: [2, 45, 30, 80, 55, 30, 63, 27, 5]
        }],
        chart: {
            foreColor: '#9ba7b2',
            height: 250,
            type: 'area',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
        },
        stroke: {
            width: 3,
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "30%",
                endingShape: "rounded"
            }
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.15)',
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#01e195'],
                inverseColors: false,
                opacityFrom: 0.8,
                opacityTo: 0.2,
            }
        },
        colors: ['#0d6efd'],
        dataLabels: {
            enabled: false,
            enabledOnSeries: [1]
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
    };
    var chart = new ApexCharts(document.querySelector("#chart4"), options);
    chart.render();









});
</script>

<!--end row-->