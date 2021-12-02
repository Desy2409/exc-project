@extends('layouts.app')
@section('page-title', 'Tableau de bord')
@section('content-title', 'Tableau de bord')
{{-- @section('breadcrumb', 'Tableau de bord') --}}
@section('page-content')
    <div class="row">
        <div class="mt-5 mb-5">
            <a href="{{route('push')}}" class="btn btn-outline-primary btn-block">Make a Push Notification!</a>

        </div>
        <div class="col-12 col-sm-6 col-xxl-4 d-flex">
            <div class="card illustration flex-fill">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="col-6">
                            <div class="illustration-text p-3 m-1">
                                <h4 class="illustration-text">Ravi de vous revoir, <br>{{ Auth::user()->name }}</h4>
                                {{-- <p class="mb-0">AppStack Dashboard</p> --}}
                            </div>
                        </div>
                        <div class="col-6 align-self-end text-end">
                            <img src="{{ asset('assets/admin/img/illustrations/customer-support.png') }}" alt="Customer Support" class="img-fluid illustration-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">$ 24.300</h3>
                            <p class="mb-2">Total Earnings</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success me-2"> +5.35% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <i class="align-middle text-success" data-feather="dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">43</h3>
                            <p class="mb-2">Pending Orders</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-danger me-2"> -4.25% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <i class="align-middle text-danger" data-feather="shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">$ 18.700</h3>
                            <p class="mb-2">Total Revenue</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success me-2"> +8.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <i class="align-middle text-info" data-feather="dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <div class="dropdown position-relative">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Sales / Revenue</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="chartjs-dashboard-bar"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <span class="badge bg-info float-end">Today</span>
                    <h5 class="card-title mb-0">Daily feed</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <img src="{{ asset('assets/admin/img/avatars/avatar-5.jpg') }}" width="36" height="36" class="rounded-circle me-2" alt="Ashley Briggs">
                        <div class="flex-grow-1">
                            <small class="float-end">5m ago</small>
                            <strong>Ashley Briggs</strong> started following <strong>Stacie Hall</strong><br />
                            <small class="text-muted">Today 7:51 pm</small><br />

                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img src="{{ asset('assets/admin/img/avatars/avatar.jpg') }}" width="36" height="36" class="rounded-circle me-2" alt="Chris Wood">
                        <div class="flex-grow-1">
                            <small class="float-end">30m ago</small>
                            <strong>Chris Wood</strong> posted something on <strong>Stacie Hall</strong>'s timeline<br />
                            <small class="text-muted">Today 7:21 pm</small>

                            <div class="border text-sm text-muted p-2 mt-1">
                                Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing...
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img src="{{ asset('assets/admin/img/avatars/avatar-4.jpg') }}" width="36" height="36" class="rounded-circle me-2" alt="Stacie Hall">
                        <div class="flex-grow-1">
                            <small class="float-end">1h ago</small>
                            <strong>Stacie Hall</strong> posted a new blog<br />

                            <small class="text-muted">Today 6:35 pm</small>
                        </div>
                    </div>

                    <hr />
                    <div class="d-grid">
                        <a href="#" class="btn btn-primary">Load more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card flex-fill">
        <div class="card-header">
            <div class="card-actions float-end">
                <div class="dropdown position-relative">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <h5 class="card-title mb-0">Latest Projects</h5>
        </div>
        <table id="datatables-dashboard-projects" class="table table-striped my-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="d-none d-xl-table-cell">Start Date</th>
                    <th class="d-none d-xl-table-cell">End Date</th>
                    <th>Status</th>
                    <th class="d-none d-md-table-cell">Assignee</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Project Apollo</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-success">Done</span></td>
                    <td class="d-none d-md-table-cell">Carl Jenkins</td>
                </tr>
                <tr>
                    <td>Project Fireball</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                    <td class="d-none d-md-table-cell">Bertha Martin</td>
                </tr>
                <tr>
                    <td>Project Hades</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-success">Done</span></td>
                    <td class="d-none d-md-table-cell">Stacie Hall</td>
                </tr>
                <tr>
                    <td>Project Nitro</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-warning">In progress</span></td>
                    <td class="d-none d-md-table-cell">Carl Jenkins</td>
                </tr>
                <tr>
                    <td>Project Phoenix</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-success">Done</span></td>
                    <td class="d-none d-md-table-cell">Bertha Martin</td>
                </tr>
                <tr>
                    <td>Project X</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-success">Done</span></td>
                    <td class="d-none d-md-table-cell">Stacie Hall</td>
                </tr>
                <tr>
                    <td>Project Romeo</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-success">Done</span></td>
                    <td class="d-none d-md-table-cell">Ashley Briggs</td>
                </tr>
                <tr>
                    <td>Project Wombat</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-warning">In progress</span></td>
                    <td class="d-none d-md-table-cell">Bertha Martin</td>
                </tr>
                <tr>
                    <td>Project Zircon</td>
                    <td class="d-none d-xl-table-cell">01/01/2021</td>
                    <td class="d-none d-xl-table-cell">31/06/2021</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                    <td class="d-none d-md-table-cell">Stacie Hall</td>
                </tr>
            </tbody>
        </table>
    </div>


    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Last year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .325,
                        categoryPercentage: .5
                    }, {
                        label: "This year",
                        backgroundColor: window.theme["primary-light"],
                        borderColor: window.theme["primary-light"],
                        hoverBackgroundColor: window.theme["primary-light"],
                        hoverBorderColor: window.theme["primary-light"],
                        data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
                        barPercentage: .325,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cornerRadius: 15,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                stepSize: 20
                            },
                            stacked: true,
                        }],
                        xAxes: [{
                            gridLines: {
                                color: "transparent"
                            },
                            stacked: true,
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#datetimepicker-dashboard").datetimepicker({
                inline: true,
                sideBySide: false,
                format: "L"
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Direct", "Affiliate", "E-mail", "Other"],
                    datasets: [{
                        data: [2602, 1253, 541, 1465],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger,
                            "#E8EAED"
                        ],
                        borderWidth: 5,
                        borderColor: window.theme.white
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    cutoutPercentage: 70,
                    legend: {
                        display: false
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#datatables-dashboard-projects").DataTable({
                pageLength: 6,
                lengthChange: false,
                bFilter: false,
                autoWidth: false
            });
        });
    </script>
@endsection
