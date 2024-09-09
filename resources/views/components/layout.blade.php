<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
@props(['bodyClass'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/smk1.png">
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/smk1.png">
    <title>
        SIPPS SMKN 1 Tambang
    </title>

    {{-- Yajra Datatables --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css" rel="stylesheet">
    
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <style>

        /* Pastikan pesan kesalahan ditampilkan */
        .invalid-feedback {
            display: block !important;
            color: #dc3545 !important; /* warna merah untuk pesan error */
        }


        /* CSS button close */
        .btn-close {
            color: rgb(70, 70, 70);
            opacity: 1;
        }
        .btn-close:hover {
            color: rgb(150, 150, 150);
            opacity: 1;
        }

        /* css form */
        .form-bordered .form-control {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
        .form-bordered .form-group {
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem; /* Adjusts the space between form groups */
        }
        .form-group label {
            display: block;
            margin-bottom: 1rem; /* Adjusts the space between form groups */
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 0.5rem 1rem; /* Adds padding to the input */
            border: 1px solid #ced4da; /* Default border */
            border-radius: 0.25rem; /* Rounded corners */
            box-sizing: border-box; /* Ensures padding is included in the width */
            transition: border-color 0.3s ease; /* Smooth transition for border color */
        }
        .form-control:focus {
            border-color: #4ba64f; /* Border color when input is focused */
            outline: none; /* Removes default outline */
            box-shadow: 0 0 0 0.1rem rgba(0, 172, 86, 0.25); /* Adds a shadow effect */
        }
        .form-control:not(:focus) {
            border-color: #ced4da; /* Reverts to default border color */
        }
        .form-group {
            padding-left: 1rem; /* Adds left padding to the form group */
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem; /* Adds space between label and select */
            font-weight: bold;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem; /* Adds space between label and select */
            font-weight: bold;
        }
        .form-group .form-select {
            width: 100%;
            padding: 0.5rem 1rem; /* Adds padding to the select */
            padding-right: 2.5rem;
            border: 1px solid #ced4da; /* Default border */
            border-radius: 0.25rem; /* Rounded corners */
            box-sizing: border-box; /* Ensures padding is included in the width */
            transition: border-color 0.3s ease;
            color: #000; /* Warna teks hitam */
            background-color: #fff; /* White background */
            -webkit-appearance: none; /* Removes default styling in WebKit browsers */
            -moz-appearance: none; /* Removes default styling in Firefox */
            appearance: none; /* Removes default styling in modern browsers */
            background-repeat: no-repeat;
            background-position: right 1rem center;
        }
        /* Styling form-select when focused */
        .form-select:focus {
            border-color: #4ba64f; /* Border color when input is focused */
            outline: none; /* Removes default outline */
            box-shadow: 0 0 0 0.1rem rgba(0, 172, 86, 0.25); /* Adds a shadow effect */
        }
        /* Adjustments to handle validation icons */
        .form-control.is-invalid {
            padding-right: 2.5rem; /* Adds padding to make space for validation icon */
            background-position: right 1rem center; /* Ensures background icon remains in place */
        }
        .form-select.is-invalid {
            padding-right: 3.5rem !important;
            background-position: right 1rem right !important;
        }

        .was-validated .form-select:invalid:not([multiple]):not([size]), .was-validated .form-select:invalid:not([multiple])[size="1"], .form-select.is-invalid:not([multiple]):not([size]), .form-select.is-invalid:not([multiple])[size="1"] {
            padding-right: 1rem;
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e), url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23fd5c70' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23fd5c70' stroke='none'/%3e%3c/svg%3e);
            background-position: right 2.5rem center, center right 1rem !important;
            background-size: 16px 12px, 1rem 1rem;
        }



        /* css modal */
        .modal-content {
            border-radius: 0.5rem;
            border: 1px solid #ced4da;
        }
        .modal-header {
            border-bottom: 1px solid #dee2e6;
        }
        .modal-footer {
            border-top: 1px solid #dee2e6;
        }
        .modal-header {
            width: 97.2%;
            display: block; /* atau display: flex; */
        }


        /* css table datatables */
        .dataTables_wrapper .dataTables_sort_wrapper .sortable {
            vertical-align: middle !important;
        }
        .data-table tbody td {
            vertical-align: middle;
        }
        .data-table {
            border: 1px solid #d4d4d4;
        }
        .table.data-table {
            margin-bottom: 16px !important;
        }
        .data-table th, .data-table td {
            border: 1px solid gainsboro !important;
            border-right: 1px solid gainsboro;
        }
        .table.table-bordered.dataTable {
            border-right-width: 1px !important;
        }
        .data-table thead tr:last-child th {
            border-bottom: 2px solid gainsboro !important;
        }


        /* CSS pagination datatableas */
        .dataTables_paginate .paginate_button {
            border: 1px solid transparent;
        }

        .page-item.active .page-link {
            border-radius: 28% !important;
            color: #fff;
            background-color: #4ba64f;
            border-color: rgb(189, 189, 189);
            margin: 0;
        }

        .page-pelanggaran .page-item.active .page-link {
            border-radius: 28% !important;
            color: #fff;
            background-color: #f44335;
            border-color: rgb(189, 189, 189);
            margin: 0;
        }

        .page-tipe-pelanggaran .page-item.active .page-link {
            border-radius: 28% !important;
            color: #fff;
            background-color: #f44335;
            border-color: rgb(189, 189, 189);
            margin: 0;
        }

        .page-sanksi-pelanggaran .page-item.active .page-link {
            border-radius: 28% !important;
            color: #fff;
            background-color: #f44335;
            border-color: rgb(189, 189, 189);
            margin: 0;
        }

        .page-detail-pelanggaran .page-item.active .page-link {
            border-radius: 28% !important;
            color: #fff;
            background-color: #f44335;
            border-color: rgb(189, 189, 189);
            margin: 0;
        }

        .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7b809a;
            font-size: 1rem;
            border-radius: 28% !important;
            margin: 0;
        }

        .page-item .page-link:active,
        .page-item .page-link:focus {
            outline: 3px solid rgba(147, 255, 153, 0.5) !important; /* Warna outline saat ditekan */
        }


        /* CSS pencarian DataTables */
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem;
            border: 1px solid #ddd;
            padding: 0.5rem;
            transition: border-color 0.3s ease; /
        }
        .dataTables_wrapper .dataTables_filter input:hover {
            border-color: #4ba64f; /* Warna border saat di-hover */
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #4ba64f; /* Warna border saat input fokus */
            outline: none; /* Menghilangkan outline default pada input fokus */
        }


        /* CSS datatables entri */
        .dataTables_wrapper .dataTables_length select {
            width: 38px !important; /* Menyesuaikan lebar secara otomatis */
            padding: 0.25rem 0.20rem; /* Padding pada bagian atas dan bawah */
            font-size: 0.875rem; /* Ukuran font */
            line-height: 1.5; /* Ketinggian baris */
            border-radius: 4px; /* Membuat sudut border membulat */
            border: 1px solid #ced4da; /* Warna border */
            margin: 0 4px;
        }
        .dataTables_wrapper .dataTables_length select:focus {
            border-color: #4ba64f; /* Warna border saat fokus */
            outline: 0; /* Hilangkan outline */
            box-shadow: 0 0 0 0.1rem #4ba650a9(0, 255, 42, 0.336); /* Efek bayangan saat fokus */
        }


        /* CSS panah sort datatables */
        table.dataTable>thead .sorting:before, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_desc_disabled:before {
            right: 1em;
            content: "↑";
            bottom: 27%;
        }
        table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:after {
            right: .5em;
            content: "↓";
            bottom: 27%;
        }

    </style>


</head>
<body class="{{ $bodyClass }}">

{{ $slot }}

<script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
@stack('js')
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.0"></script>
</body>
</html>
