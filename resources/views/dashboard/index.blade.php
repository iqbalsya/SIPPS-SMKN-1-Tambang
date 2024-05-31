<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-md text-dark fw-normal mb-0 mt-3 text-capitalize">Jumlah siswa</p>
                                <h4 class="mb-0 pe-2">{{ $totalSiswa }}</h4>
                            </div>
                        </div>
                        <div class="card-footer p-1 mt-0">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-md text-dark fw-normal mb-0 mt-3 text-capitalize">Siswa Laki-laki</p>
                                <h4 class="mb-0 pe-2">{{ $siswaLakiLaki }}</h4>
                            </div>
                        </div>
                        <div class="card-footer p-1 mt-0">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-md text-dark fw-normal mb-0 mt-3 text-capitalize">Siswa Perempuan</p>
                                <h4 class="mb-0 pe-2">{{ $siswaPerempuan }}</h4>
                            </div>
                        </div>
                        <div class="card-footer p-1 mt-0">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">local_library</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-md text-dark fw-normal mb-0 mt-3 text-capitalize">Jumlah Guru</p>
                                <h4 class="mb-0 pe-2">{{ $totalGuru }}</h4>
                            </div>
                        </div>
                        <div class="card-footer p-1 mt-0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-6 col-md-6 mt-5 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-warning shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <h6 class="mb-0 ">Grafik Total Pelanggaran Siswa</h6>
                            <p class="text-sm fw-normal">Jumlah pelanggaran yang terjadi setiap bulan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-5 mb-4">
                    <div class="card z-index-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-info shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line-terlambat" class="chart-canvas" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <h6 class="mb-0 ">Grafik Keterlambatan Siswa</h6>
                            <p class="text-sm fw-normal">Jumlah siswa yang terlambat datang ke sekolah setiap bulan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-info shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line-alpa" class="chart-canvas" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-2">
                            <h6 class="mb-0 ">Grafik Ketidakhadiran Siswa</h6>
                            <p class="text-sm fw-normal">Jumlah siswa yang tidak menghadiri sekolah tanpa keterangan.</p>
                        </div>
                    </div>
                </div>

            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-info shadow-dark border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-doughnut" class="chart-canvas" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-2">
                        <h6 class="mb-0 ">Grafik Siswa Setiap Jurusan</h6>
                        <p class="text-sm fw-normal">Jumlah siswa yang ada di setiap jurusan.</p>
                    </div>
                </div>

            </div>

        </div>
    </main>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
            var ctxLine = document.getElementById("chart-line").getContext("2d");
            var ctxLineTerlambat = document.getElementById("chart-line-terlambat").getContext("2d");
            var ctxLineAlpa = document.getElementById("chart-line-alpa").getContext("2d");
            var doughnutChartCanvas = document.getElementById("chart-doughnut").getContext("2d");

            $.ajax({
                url: '/api/pelanggaran-bulanan',
                method: 'GET',
                success: function(data) {
                    new Chart(ctxLine, {
                        type: "line",
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            datasets: [{
                                label: "Pelanggaran",
                                tension: 0,
                                borderWidth: 0,
                                pointRadius: 5,
                                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                                pointBorderColor: "transparent",
                                borderColor: "rgba(255, 255, 255, .8)",
                                borderWidth: 4,
                                backgroundColor: "transparent",
                                fill: true,
                                data: data,
                                maxBarThickness: 6
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgba(255, 255, 255, .2)'
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#f8f9fa',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#f8f9fa',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });


            $.ajax({
                url: '/api/pelanggaran-terlambat',
                method: 'GET',
                success: function(data) {
                    new Chart(ctxLineTerlambat, {
                        type: "line",
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            datasets: [{
                                label: "Siswa Terlambat",
                                tension: 0,
                                borderWidth: 0,
                                pointRadius: 5,
                                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                                pointBorderColor: "transparent",
                                borderColor: "rgba(255, 255, 255, .8)",
                                borderWidth: 4,
                                backgroundColor: "transparent",
                                fill: true,
                                data: data,
                                maxBarThickness: 6
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgba(255, 255, 255, .2)'
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#f8f9fa',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#f8f9fa',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });


            $.ajax({
                url: '/api/pelanggaran-alpa',
                method: 'GET',
                success: function(data) {
                    new Chart(ctxLineAlpa, {
                        type: "line",
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            datasets: [{
                                label: "Siswa Alpa",
                                tension: 0,
                                borderWidth: 0,
                                pointRadius: 5,
                                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                                pointBorderColor: "transparent",
                                borderColor: "rgba(255, 255, 255, .8)",
                                borderWidth: 4,
                                backgroundColor: "transparent",
                                fill: true,
                                data: data,
                                maxBarThickness: 6
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                        color: 'rgba(255, 255, 255, .2)'
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#f8f9fa',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#f8f9fa',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            weight: 300,
                                            family: "Roboto",
                                            style: 'normal',
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });


            $.ajax({
                    url: '/api/jumlah-siswa-per-jurusan',
                    method: 'GET',
                    success: function(data) {
                        var labels = data.map(function(jurusan) {
                            return jurusan.jurusan;
                        });
                        var values = data.map(function(jurusan) {
                            return jurusan.jumlah;
                        });

                        var ctx = document.getElementById('chart-doughnut').getContext('2d');
                        new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Jumlah Siswa',
                                    data: values,
                                    backgroundColor: [
                                        '#f5365c',
                                        '#11cdef',
                                        '#2dce89',
                                        '#fb6340',
                                        '#f4f4f8',
                                        '#172b4d',
                                        '#5e72e4',
                                        '#2bffc6',
                                        '#ffb8b8',
                                        '#800000'
                                    ],
                                    hoverBackgroundColor: [
                                        '#f5365c',
                                        '#11cdef',
                                        '#2dce89',
                                        '#fb6340',
                                        '#f4f4f8',
                                        '#172b4d',
                                        '#5e72e4',
                                        '#2bffc6',
                                        '#ffb8b8',
                                        '#800000'
                                    ]
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        color: 'white'
                                    }
                                }
                            }
                            }
                        });
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
        });


    </script>
    @endpush
</x-layout>
