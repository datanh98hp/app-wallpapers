<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin - Girl</title>

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ url('/admin') }}">
                    <span class="align-middle">AdminKit</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Danh muc
                    </li>

                    <li class="sidebar-item @if ($path === 'girls') active @endif ">
                        <a class="sidebar-link" href="{{ url('/girls') }}">
                            <i class="align-middle me-2" data-feather="users"></i> <span class="align-middle">Girl</span>
                        </a>
                    </li>

                    <li class="sidebar-item @if ($path === 'client-users') active @endif">
                        <a class="sidebar-link" href="{{ url('/client-users') }}">
                            <i class="align-middle me-2" data-feather="user"></i> <span class="align-middle">Tai khoan
                                nguoi dung</span>
                        </a>
                    </li>

                    <li class="sidebar-item @if ($path === 'policy') active @endif">
                        <a class="sidebar-link" href="{{ url('/policy') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            </svg> <span class="align-middle">Thong tin chinh sach</span>
                        </a>
                    </li>

                    <li class="sidebar-item @if ($path === 'contact') active @endif">
                        <a class="sidebar-link" href="{{ url('/contact') }}">
                            <i class="align-middle me-2" data-feather="phone-call"></i> <span class="align-middle">Thong
                                tin lien lac</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-blank.html">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Tools & Components
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="ui-buttons.html">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="ui-forms.html">
                            <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="ui-cards.html">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="ui-typography.html">
                            <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="icons-feather.html">
                            <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Plugins & Addons
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="charts-chartjs.html">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="maps-google.html">
                            <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                        </a>
                    </li> --}}
                </ul>


            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="{{ URL::asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div> --}}
                                @guest

                                @else
                                <a class="dropdown-item" href="{{ route('signout') }}">Log out</a>
                                @endguest

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><strong> /</strong> {{ $title }}</h1>
                    {{ $slot }}
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        {{-- <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a> &copy;
                            </p>
                        </div> --}}
                        <div class="col-6 text-end">
                            <ul class="list-inline">

                                <li class="list-inline-item">
                                    <a class="text-muted" href="/" target="_blank">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="/" target="_blank">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="/" target="_blank">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ URL::asset('js/app.js') }}"></script>
    {{--

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line"
                , data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                    , datasets: [{
                        label: "Sales ($)"
                        , fill: true
                        , backgroundColor: gradient
                        , borderColor: window.theme.primary
                        , data: [
                            2115
                            , 1562
                            , 1584
                            , 1892
                            , 1587
                            , 1923
                            , 2566
                            , 2448
                            , 2805
                            , 3438
                            , 2917
                            , 3327
                        ]
                    }]
                }
                , options: {
                    maintainAspectRatio: false
                    , legend: {
                        display: false
                    }
                    , tooltips: {
                        intersect: false
                    }
                    , hover: {
                        intersect: true
                    }
                    , plugins: {
                        filler: {
                            propagate: false
                        }
                    }
                    , scales: {
                        xAxes: [{
                            reverse: true
                            , gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                        , yAxes: [{
                            ticks: {
                                stepSize: 1000
                            }
                            , display: true
                            , borderDash: [3, 3]
                            , gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie"
                , data: {
                    labels: ["Chrome", "Firefox", "IE"]
                    , datasets: [{
                        data: [4306, 3801, 1689]
                        , backgroundColor: [
                            window.theme.primary
                            , window.theme.warning
                            , window.theme.danger
                        ]
                        , borderWidth: 5
                    }]
                }
                , options: {
                    responsive: !window.MSInputMethodContext
                    , maintainAspectRatio: false
                    , legend: {
                        display: false
                    }
                    , cutoutPercentage: 75
                }
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar"
                , data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                    , datasets: [{
                        label: "This year"
                        , backgroundColor: window.theme.primary
                        , borderColor: window.theme.primary
                        , hoverBackgroundColor: window.theme.primary
                        , hoverBorderColor: window.theme.primary
                        , data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]
                        , barPercentage: .75
                        , categoryPercentage: .5
                    }]
                }
                , options: {
                    maintainAspectRatio: false
                    , legend: {
                        display: false
                    }
                    , scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            }
                            , stacked: false
                            , ticks: {
                                stepSize: 20
                            }
                        }]
                        , xAxes: [{
                            stacked: false
                            , gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var markers = [{
                    coords: [31.230391, 121.473701]
                    , name: "Shanghai"
                }
                , {
                    coords: [28.704060, 77.102493]
                    , name: "Delhi"
                }
                , {
                    coords: [6.524379, 3.379206]
                    , name: "Lagos"
                }
                , {
                    coords: [35.689487, 139.691711]
                    , name: "Tokyo"
                }
                , {
                    coords: [23.129110, 113.264381]
                    , name: "Guangzhou"
                }
                , {
                    coords: [40.7127837, -74.0059413]
                    , name: "New York"
                }
                , {
                    coords: [34.052235, -118.243683]
                    , name: "Los Angeles"
                }
                , {
                    coords: [41.878113, -87.629799]
                    , name: "Chicago"
                }
                , {
                    coords: [51.507351, -0.127758]
                    , name: "London"
                }
                , {
                    coords: [40.416775, -3.703790]
                    , name: "Madrid "
                }
            ];
            var map = new jsVectorMap({
                map: "world"
                , selector: "#world_map"
                , zoomButtons: true
                , markers: markers
                , markerStyle: {
                    initial: {
                        r: 9
                        , strokeWidth: 7
                        , stokeOpacity: .4
                        , fill: window.theme.primary
                    }
                    , hover: {
                        fill: window.theme.primary
                        , stroke: window.theme.primary
                    }
                }
                , zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true
                , prevArrow: "<span title=\"Previous month\">&laquo;</span>"
                , nextArrow: "<span title=\"Next month\">&raquo;</span>"
                , defaultDate: defaultDate
            });
        });

    </script> --}}

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}

</body>

</html>
