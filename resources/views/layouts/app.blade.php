<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wowdash.wowtheme7.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Jun 2025 08:26:15 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} - Sistem Pelayanan Surat Kelurahan Cikundul</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo_cikundul.png') }}" sizes="16x16" />
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/remixicon.css" />
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/apexcharts.css" />
    <!-- Data Table css -->
    {{-- <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/dataTables.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.11/css/jquery.dataTables.min.css">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/editor-katex.min.css" />
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/editor.atom-one-dark.min.css" />
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/editor.quill.snow.css" />
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/flatpickr.min.css" />
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/full-calendar.css" />
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/jquery-jvectormap-2.0.5.css" />
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/magnific-popup.css" />
    <!-- Filepond -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/slick.css" />
    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/prism.css" />
    <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/file-upload.css" />

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/lib/audioplayer.css" />
    <!-- main css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>

    </style>
    @yield('css')
</head>

<body class="bg-neutral-100 dark:bg-neutral-800 dark:text-white"></body>

</html>

@include('layouts.navigation')
@include('layouts.topbar')
@include('layouts.breadcumb')
@include('layouts.footer')
