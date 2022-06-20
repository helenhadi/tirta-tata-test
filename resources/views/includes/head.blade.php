<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Helen's bachelor degree final project.">
<meta name="author" content="Helen Hadi">
<title>@yield('title') - {{env('APP_NAMA') ?? "StegSign"}}</title>
<!-- Favicon -->
<link rel="icon" href="{{ asset('/assets/img/brand/favicon.png') }}" type="image/png">
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
<!-- Icons -->
<link rel="stylesheet" href="{{ asset('/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
<!-- Page plugins -->
<!-- Argon CSS -->
<link rel="stylesheet" href="{{ asset('/assets/css/argon.css?v=1.2.0') }}" type="text/css">
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<style>
    .select2-selection__rendered {
        line-height: 3em !important;
    }
    .select2-container .select2-selection--single {
        height: 3em !important;
    }
    .select2-selection__arrow {
        height: 3em !important;
    }
</style>
