<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from atmos.atomui.com/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Feb 2021 16:40:58 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="author" />
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
    <link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
    <link rel='stylesheet' href="{{asset('assets/css/pace.css')}}" />
    <link rel='stylesheet' href="{{asset('assets/css/pace.min.js')}}" />
    <!--vendors-->
    <link rel='stylesheet' href="{{asset('assets/css/vendor.css')}}" />
    <link rel='stylesheet' href="{{asset('assets/css/vendor-addon.css')}}" />

    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
    <link rel='stylesheet' href="https://d33wubrfki0l68.cloudfront.net/css/04cc97dcdd1c8f6e5b9420845f0fac26b54dab84/default/assets/fonts/jost/jost.css" />
    <!--Material Icons-->
    <link rel='stylesheet' type='text/css'
        href='https://d33wubrfki0l68.cloudfront.net/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css' />
    <!-- <link rel='stylesheet' href="{{asset('assets/css/materialdesignicons.min')}}" /> -->
    <link rel='stylesheet' href="{{asset('assets/css/admin.css')}}" />
    <link rel='stylesheet' href="{{asset('assets/css/theme-default.min.css')}}" />
    <link rel='stylesheet' href="{{asset('assets/css/datatable.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body class="sidebar-pinned page-home">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-brand">
            <!-- begin sidebar branding-->
            <img class="admin-brand-logo" src="assets/img/logo.png" width="40" alt="atmos Logo">
            <span class="admin-brand-content font-secondary"><a href='{{url("/home")}}'> {{env('APP_NAME')}}</a></span>
            <!-- end sidebar branding-->
            <div class="ml-auto">
                <!-- sidebar pin-->
                <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
                <!-- sidebar close for mobile device-->
                <a href="#" class="admin-close-sidebar"></a>
            </div>
        </div>
        <div class="admin-sidebar-wrapper js-scrollbar">
            @include('Admin.Layout.sidebar')
        </div>

    </aside>
    <main class="admin-main">
        <!--site header begins-->
        <header class="admin-header">

            <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

            <nav class=" mr-auto my-auto">
                <ul class="nav align-items-center">

                    <li class="nav-item">
                        <a class="nav-link" data-target="#siteSearchModal" data-toggle="modal" href="#">
                            <i class=" mdi mdi-magnify mdi-24px align-middle"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <nav class=" ml-auto">
                <ul class="nav align-items-center">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-24px mdi-bell-outline"></i>
                                <span class="notification-counter"></span>
                            </a>

                            <div class="dropdown-menu notification-container dropdown-menu-right">
                                <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                                    <a href="#!" class="mdi mdi-18px mdi-settings text-muted"></a>
                                    <span class="h5 m-0">Notifications</span>
                                    <a href="#!" class="mdi mdi-18px mdi-notification-clear-all text-muted"></a>
                                </div>
                                <div class="notification-events bg-gray-300">
                                    <div class="text-overline m-b-5">today</div>
                                    <a href="#" class="d-block m-b-10">
                                        <div class="card">
                                            <div class="card-body"> <i class="mdi mdi-circle text-success"></i> All systems operational.</div>
                                        </div>
                                    </a>
                                    <a href="#" class="d-block m-b-10">
                                        <div class="card">
                                            <div class="card-body"> <i class="mdi mdi-upload-multiple "></i> File upload successful.</div>
                                        </div>
                                    </a>
                                    <a href="#" class="d-block m-b-10">
                                        <div class="card">
                                            <div class="card-body">
                                                <i class="mdi mdi-cancel text-danger"></i> Your holiday has been denied
                                            </div>
                                        </div>
                                    </a>


                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-sm avatar-online">
                                <span class="avatar-title rounded-circle bg-dark">V</span>

                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right">
                            <a class="dropdown-item" href="#"> Add Account
                            </a>
                            <a class="dropdown-item" href="#"> Reset Password</a>
                            <a class="dropdown-item" href="#"> Help </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"> Logout</a>
                        </div>
                    </li>

                </ul>

            </nav>
        </header>
        <!-- Modal -->
        <div class="modal fade modal-slide-right" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoLabel">Demos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="https://atmos.atomui.com/demos.html" height="100%" width="100%" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                        <div class="text-muted"><i class="mdi mdi-information"></i>Demos will open in new tab</div>
                    </div>
                </div>
            </div>
        </div>
        @include('Admin.Layout.flash-message')
        @yield('content')

    </main>

    <div class="modal modal-slide-left  fade" id="siteSearchModal" tabindex="-1" role="dialog" aria-labelledby="siteSearchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body p-all-0" id="site-search">
                    <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-dark bg-dark text-white p-t-60 p-b-20 bg-dots">
                        <h3 class="text-uppercase    text-center  fw-300 "> Search</h3>

                        <div class="container-fluid">
                            <div class="col-md-10 p-t-10 m-auto">
                                <input type="search" placeholder="Search Something" class=" search form-control form-control-lg">

                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="bg-dark text-muted container-fluid p-b-10 text-center text-overline">
                            results
                        </div>
                        <div class="list-group list  ">


                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-3.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Eric Chen</div>
                                    <div class="text-muted">Developer</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-4.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Sean Valdez</div>
                                    <div class="text-muted">Marketing</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img class="avatar-img rounded-circle" src="assets/img/users/user-8.jpg" alt="user-image"></div>
                                </div>
                                <div class="">
                                    <div class="name">Marie Arnold</div>
                                    <div class="text-muted">Developer</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-pdf"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">SRS Document</div>
                                    <div class="text-muted">25.5 Mb</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-document-box"></i></div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">Design Guide.pdf</div>
                                    <div class="text-muted">9 Mb</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar avatar-sm  ">
                                            <div class="avatar-title bg-primary rounded"><i class="mdi mdi-24px mdi-code-braces"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">response.json</div>
                                    <div class="text-muted">15 Kb</div>
                                </div>


                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar avatar-sm ">
                                            <div class="avatar-title bg-info rounded"><i class="mdi mdi-24px mdi-file-excel"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="name">June Accounts.xls</div>
                                    <div class="text-muted">6 Mb</div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    
    <script src="{{asset('assets/js/vendors.js')}}"></script>

    <!--page specific scripts for demo-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66116118-3"></script> -->
    <!-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-66116118-3');
    </script> -->
    <script src="{{asset('assets/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard-01.js')}}"></script>
    <script src="{{asset('assets/js/vendor.js')}}"></script>
    <script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>

    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
</body>

<!-- Mirrored from atmos.atomui.com/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Feb 2021 16:42:18 GMT -->

</html>