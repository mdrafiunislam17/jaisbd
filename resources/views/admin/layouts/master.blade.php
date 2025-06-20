<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- ✅ SEO Tags --}}
{{--    <meta name="title" content="@yield('meta_title', 'Default Title')">--}}
{{--    <meta name="description" content="@yield('meta_description', 'Your page description here')">--}}
{{--    <meta name="keywords" content="@yield('meta_keywords', 'admin, dashboard, laravel')">--}}
{{--    <meta name="author" content="Your Company Name">--}}

    {{-- ✅ Robots (admin panel usually noindex) --}}
{{--    <meta name="robots" content="noindex, nofollow">--}}

    {{-- ✅ Canonical link (optional for public pages) --}}
    {{-- <link rel="canonical" href="{{ url()->current() }}"> --}}

    <title>@yield("title", "Admin")</title>

    {{-- Existing links --}}
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    @stack("styles")
</head>


<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include("admin.layouts.aside")
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Navbar -->
            @include("admin.layouts.nav")
            <!-- End of Navbar -->

            <!-- Begin Page Content -->
            @yield("content")
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include("admin.layouts.footer")
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route("logout") }}">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
@stack("scripts")

<script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset("vendor/jquery-easing/jquery.easing.min.js") }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset("js/sb-admin-2.min.js") }}"></script>

<!-- Page level plugins -->
<script src="{{ asset("vendor/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("vendor/datatables/dataTables.bootstrap4.min.js") }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset("js/demo/datatables-demo.js") }}"></script>


</body>
</html>
