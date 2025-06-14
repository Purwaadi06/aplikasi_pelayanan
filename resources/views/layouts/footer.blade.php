</div>
<footer class="d-footer">
    <div class="flex items-center justify-between gap-3 flex-wrap">
        <p class="mb-0 text-neutral-600">&copy; 2024 WowDash. All Rights Reserved.</p>
        <p class="mb-0">Made by <a href="https://themeforest.net/user/wowtheme7/portfolio"
                class="text-primary-600 dark:text-primary-600 hover:underline">wowtheme7</a></p>
    </div>
</footer>
</main>

<!-- jQuery library js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
<!-- Apex Chart js -->
<script src="{{ asset('template') }}/assets/js/lib/apexcharts.min.js"></script>
<!-- Data Table js -->
{{-- <script src="{{ asset('template') }}/assets/js/lib/simple-datatables.min.js"></script> --}}
<!-- Iconify Font js -->
<script src="{{ asset('template') }}/assets/js/lib/iconify-icon.min.js"></script>
<!-- jQuery UI js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-ui.min.js"></script>
<!-- Vector Map js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
<script src="{{ asset('template') }}/assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
<!-- Popup js -->
<script src="{{ asset('template') }}/assets/js/lib/magnifc-popup.min.js"></script>
<!-- Slick Slider js -->
<script src="{{ asset('template') }}/assets/js/lib/slick.min.js"></script>
<!-- prism js -->
<script src="{{ asset('template') }}/assets/js/lib/prism.js"></script>
<!-- file upload js -->
<script src="{{ asset('template') }}/assets/js/lib/file-upload.js"></script>
<!-- audio player -->
<script src="{{ asset('template') }}/assets/js/lib/audioplayer.js"></script>

<script src="{{ asset('template') }}/assets/js/flowbite.min.js"></script>
<script src="https://cdn.datatables.net/1.13.11/js/jquery.dataTables.min.js"></script>
<!-- main js -->
<script src="{{ asset('template') }}/assets/js/app.js"></script>

<script src="{{ asset('template') }}/assets/js/homeOneChart.js"></script>


@yield('js')
@include('sweetalert::alert')
</body>

</html>
