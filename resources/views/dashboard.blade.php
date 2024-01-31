@extends('layouts/app')

@php
    $useHeader = true;
    $useCompactHeader = false;
@endphp

@section('header-icon', 'activity')
@section('header-title', 'Dashboard')
@section('header-subtitle', 'Dashboard Indonesia Multimedia Project')

@section('content')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n15">

        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-end align-items-sm-center flex-column flex-sm-row mb-4">
            <!-- Date range picker example-->
            <form method="post" class='d-flex justify-content-end align-items-sm-center flex-column flex-sm-row mb-4'
                enctype="multipart/form-data" action="{{ route('filter') }}">
                @csrf
                <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                    <input class="form-control ps-0 pointer" id="litepickerRangeDashboard" name="filter_date"
                        placeholder="Select date range..." />
                </div>
                <div class="ms-2">
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </form>
        </div>

        <!-- Include Alert Component -->
        @if (session('success'))
            @component('components.alert')
                @slot('alertType', 'success')
                @slot('alertMessage')
                    {{ session('success') }}
                @endslot
            @endcomponent
        @elseif(session('warning'))
            @component('components.alert')
                @slot('alertType', 'warning')
                @slot('alertMessage')
                    {{ session('warning') }}
                @endslot
            @endcomponent
        @elseif(session('danger'))
            @component('components.alert')
                @slot('alertType', 'danger')
                @slot('alertMessage')
                    {{ session('danger') }}
                @endslot
            @endcomponent
        @else
        @endif

        <div class="row">
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 1-->
                <a class="card lift h-100" href="{{ route('event.index') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                <i class="feather-xl text-primary mb-3" data-feather="briefcase"></i>
                                <h5 class="text-primary">Event</h5>
                                <div class="text-muted small">To create informative visual elements on your pages</div>
                            </div>
                            <img src={{ asset('tamplate/assets/img/illustrations/total-event.svg') }} alt="..."
                                style="width: 8rem" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 2-->
                <a class="card lift h-100" href="{{ route('inventory.index') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                <i class="feather-xl text-secondary mb-3" data-feather="package"></i>
                                <h5 class="text-secondary">Inventory</h5>
                                <div class="text-muted small">To keep you on track when working with our toolkit</div>
                            </div>
                            <img src={{ asset('tamplate/assets/img/illustrations/total-invent.svg') }} alt="..."
                                style="width: 8rem" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('karyawan.index') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                <i class="feather-xl text-green mb-3" data-feather="user"></i>
                                <h5 class="text-success">Crew</h5>
                                <div class="text-muted small">To help get you started when building your new UI</div>
                            </div>
                            <img src={{ asset('tamplate/assets/img/illustrations/total-crew.svg') }} alt="..."
                                style="width: 8rem" />
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-8">

                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <!-- Dashboard card navigation-->
                        <ul class="nav nav-tabs card-header-tabs" id="dashboardNav" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="calendar-pill" href="#calendarEvent"
                                    data-bs-toggle="tab" role="tab" aria-controls="calendarEvent"
                                    aria-selected="false">Calendar Event</a></li>
                            <li class="nav-item me-1"><a class="nav-link " id="overview-pill" href="#overview"
                                    data-bs-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Total
                                    Event Bulanan</a></li>
                            <li class="nav-item"><a class="nav-link" id="activities-pill" href="#activities"
                                    data-bs-toggle="tab" role="tab" aria-controls="activities"
                                    aria-selected="false">Inventory Log</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="dashboardNavContent">

                            <!-- Calendar Tabs -->
                            <div class="tab-pane fade show active" id="calendarEvent" role="tabpanel"
                                aria-labelledby="calendar-pill">
                                <div class="card">
                                    <div>
                                        <div class="row gx-0">
                                            <div class="col-lg-12">
                                                <div class="p-4 calender-sidebar app-calendar">
                                                    <div id="calendar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bar Chart Tabs-->
                            <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-pill">
                                <div class="chart-area mb-4 mb-lg-0" style="height: 20rem">
                                    <canvas id="myBarChart" width="100%" height="30"></canvas>
                                </div>
                            </div>

                            <!-- Inventory Log Tabs-->
                            <div class="tab-pane fade" id="activities" role="tabpanel"
                                aria-labelledby="activities-pill">
                                <div class="table-responsive">
                                    @if (count($logs) > 0)
                                        <table class="table" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($logs as $log)
                                                    <tr>
                                                        <td> {{ $log->getTanggalDashboard() }}</td>
                                                        <td>
                                                            <i class="me-2 text-green" data-feather="archive"></i>
                                                            {{ $log->inventory->nama }}
                                                        </td>
                                                        <td>{{ $log->jumlah }}&nbsp;{{ $log->inventory->satuan }}</td>
                                                        <td>
                                                            @if ($log->status == 'Barang Masuk')
                                                                <span class="badge bg-success">
                                                                    {{ $log->status }}
                                                                </span>
                                                            @elseif($log->status == 'Barang Keluar')
                                                                <span class="badge bg-danger">
                                                                    {{ $log->status }}
                                                                </span>
                                                            @else
                                                                <span class="badge bg-secondary">
                                                                    {{ $log->status }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $log->getTimeFormatted() }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p class='text-center'>Tidak terdapat data</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4">
                <div class="row">
                    <div class="col-xl-6 col-xxl-12">
                        <!-- Team members / people dashboard card example-->
                        <div class="card mb-2">
                            <div class="card-header">Rekap Job Crew</div>
                            <div class="card-body">
                                @if (count($crewEvents) > 0)
                                    <!-- Item 1-->
                                    <div class="table-responsive">
                                        <table class="table" id="recapCrewDashboard">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($crewEvents as $crew)
                                                    <tr>
                                                        <th>
                                                            <div class="avatar avatar-xl me-3 bg-gray-200">
                                                                <img class="avatar-img img-fluid"
                                                                    src="{{ asset('tamplate/assets/img/illustrations/profiles/profile-2.png') }}"
                                                                    alt="" />
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="d-flex flex-column fw-bold">
                                                                <a class="text-dark line-height-normal mb-1"
                                                                    href="{{ url('karyawan/' . $crew->id) }}">{{ $crew->nama }}</a>
                                                            </div>
                                                        </td>
                                                        <td>{{ $crew->jumlah_event }} &nbsp;Event</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p class='text-center'>Tidak terdapat data</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6 col-xxl-12">
                    <!-- Rekap Inventory -->\
                    <div class="card mb-2">
                        <div class="card-header">Rekap Inventory</div>
                        <div class="card-body">
                            @if (count($inventories) > 0)
                                <div class="table-responsive">
                                    <table class="table" id="recapInventory">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Barang</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inventories as $row)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $row->nama }}</td>
                                                    <td>{{ $row->jumlah }} &nbsp;{{ $row->satuan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class='text-center'>Tidak terdapat data</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('tamplate/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('tamplate/js/fullcalendar/index.global.min.js') }}"></script>

    {{-- Date Picker Script --}}
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const litepickerRangeDashboard = document.getElementById('litepickerRangeDashboard');
            if (litepickerRangeDashboard) {
                const startDateSession = '{{ session('start_date') }}';
                const endDateSession = '{{ session('end_date') }}';

                const startDate = startDateSession ? new Date(startDateSession) : new Date();
                const endDate = endDateSession ? new Date(endDateSession) : new Date();

                new Litepicker({
                    element: litepickerRangeDashboard,
                    startDate: startDate,
                    endDate: endDate,
                    singleMode: false,
                    numberOfMonths: 2,
                    numberOfColumns: 2,
                    format: 'MMM DD, YYYY',
                    plugins: ['ranges'],
                    dropdowns: {
                        months: true,
                        years: true
                    },
                });
            }
        });
    </script>

    {{-- Bar Chart Script --}}
    <script>
        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");

        // Ambil data dari blade untuk labels dan data
        var labels = <?php echo json_encode($labels); ?>;

        var data = <?php echo json_encode($data); ?>;

        var myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Total Events",
                    backgroundColor: "rgba(0, 97, 242, 1)",
                    hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
                    borderColor: "#4e73df",
                    data: data,
                    maxBarThickness: 25
                }]
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: labels.length
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            maxTicksLimit: 5,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex].label || "";
                            return datasetLabel + ": " + tooltipItem.yLabel;
                        }
                    }
                }
            }
        });
    </script>

    // Calender Script
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            /*=================*/
            //  Calender Date variable
            /*=================*/
            var newDate = new Date();

            function getDynamicMonth() {
                getMonthValue = newDate.getMonth();
                _getUpdatedMonthValue = getMonthValue + 1;
                if (_getUpdatedMonthValue < 10) {
                    return `0${_getUpdatedMonthValue}`;
                } else {
                    return `${_getUpdatedMonthValue}`;
                }
            }
            /*=================*/
            // Calender Modal Elements
            /*=================*/
            var getModalTitleEl = document.querySelector("#event-title");
            var getModalStartDateEl = document.querySelector("#event-start-date");
            var getModalEndDateEl = document.querySelector("#event-end-date");
            var calendarsEvents = {
                Danger: "danger",
                Success: "success",
                Primary: "primary",
                Warning: "warning",
            };

            /*=====================*/
            // Calendar Elements and options
            /*=====================*/
            var calendarEl = document.querySelector("#calendar");
            var checkWidowWidth = function() {
                if (window.innerWidth <= 1199) {
                    return true;
                } else {
                    return false;
                }
            };
            var calendarHeaderToolbar = {
                left: "prev next",
                center: "title",
                right: "dayGridMonth",
            };

            var calendarEventsList = <?php echo json_encode($calendarEventsList); ?>;

            console.log(calendarEventsList);

            /*=====================*/
            // Calendar Select fn.
            /*=====================*/
            var calendarSelect = function(info) {

            };

            /*=====================*/
            // Calender Event Function
            /*=====================*/
            var calendarEventClick = function(info) {
                // Mendapatkan ID peristiwa dari calendarEventsList berdasarkan judul peristiwa yang dipilih
                var selectedEventTitle = info.event.title;

                // Mencari objek peristiwa dalam calendarEventsList berdasarkan judul
                var selectedEvent = calendarEventsList.find(function(event) {
                    return event.title === selectedEventTitle;
                });

                // Mengambil ID dari objek peristiwa yang sesuai
                var eventId = selectedEvent.id;

                // Mengarahkan ke URL dengan menggunakan ID peristiwa
                window.location.href = '/event/' + eventId;
            };

            /*=====================*/
            // Active Calender
            /*=====================*/
            var calendar = new FullCalendar.Calendar(calendarEl, {
                selectable: false,
                height: checkWidowWidth() ? 900 : 1052,
                initialView: checkWidowWidth() ? "listWeek" : "dayGridMonth",
                initialDate: `${newDate.getFullYear()}-${getDynamicMonth()}-07`,
                headerToolbar: calendarHeaderToolbar,
                events: calendarEventsList,
                select: calendarSelect,
                unselect: function() {
                    console.log("unselected");
                },
                eventClassNames: function({
                    event: calendarEvent
                }) {
                    const getColorValue =
                        calendarsEvents[calendarEvent._def.extendedProps.calendar];
                    return [
                        "fc-bg-" + getColorValue,
                    ];
                },

                eventClick: calendarEventClick,
                windowResize: function(arg) {
                    if (checkWidowWidth()) {
                        calendar.changeView("listWeek");
                        calendar.setOption("height", 900);
                    } else {
                        calendar.changeView("dayGridMonth");
                        calendar.setOption("height", 1052);
                    }
                },
            });
            /*=====================*/
            // Calendar Init
            /*=====================*/
            calendar.render();
        });
    </script>

@endsection
