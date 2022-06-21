<!--
    =========================================================
    * Argon Dashboard - v1.2.0
    =========================================================
    * Product Page: https://www.creative-tim.com/product/argon-dashboard


    * Copyright  Creative Tim (http://www.creative-tim.com)
    * Coded by www.creative-tim.com



    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="https://helenhadi.ifubaya.id/portfolio" target="_blank">
                    {{-- <img src="{{ asset('assets/img/brand/white.png') }}" style="max-width: 100px"> --}}
                    <h1 style="color: white;"><b>{{env('APP_NAMA') ?? "StegSign"}}</b></h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-primary">
                    <ul class="navbar-nav ml-lg-auto">
                        @include('includes.menu')
                    </ul>

                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            @yield('content')
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; {{date('Y')}} <a href="javascript:;" class="font-weight-bold ml-1"><a href="https://helenhadi.ifubaya.id/portfolio" target="_blank">{{env('APP_NAMA') ?? "StegSign"}}</a></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('includes.modal')
    @include('includes.script')
</body>
</html>
