<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory |
        <?= $title ?? '' ?>
    </title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <script src="<?= base_url('plugins/echarts/echarts.min.js'); ?>"></script>
    <style>
        .bg-header {
            background: #363062;
        }

        .bg-sidebar {
            background: #FAF0E6 !important;
        }

        .text-header {
            color: #FAF0E6 !important;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #435585 !important;
        }

        .bg-main-menu-selected-open {
            background: #eab2a0;
        }

        .bg-background-conten {
            background: #818fb4;
        }

        .bg-background-component {
            background: #363062;
        }

        .image-container {
            position: relative;
        }


        #loadingIndicator {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;

        }


        #selectedImage {
            width: 200px;
            height: 250px;
        }

        .select2-container .select2-selection--single {

            /* height: 36px !important; */
            padding: 0 !important;

        }
    </style>
</head>

<body class="hold-transition   sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- <div class="preloader bg-sidebar flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<= base_url('assets/loading.svg') ?>" alt="AdminLTELogo" height="60"
                width="60">
        </div> -->
        <nav class="main-header  bg-header navbar navbar-expand ">
            <?= view('header') ?>
        </nav>
        <aside class="main-sidebar bg-sidebar elevation-4">
            <?= view('aside') ?>
        </aside>
        <div class="content-wrapper bg-background-conten">
            <div class="content-header">
                <?= view('content-header') ?>
            </div>
            <section class="content">
                <?= $content ?? '' ?>
            </section>
        </div>
        <footer class="main-footer  bg-header">
            <?= view('footer') ?>
        </footer>
    </div>
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <script src="<?= base_url('dist/js/adminlte.js'); ?>"></script>
    <script src="<?= base_url('plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
    <script src="<?= base_url('plugins/raphael/raphael.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jquery-mapael/jquery.mapael.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jquery-mapael/maps/usa_states.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?= base_url('dist/js/pages/dashboard2.js'); ?>"></script>
    <script src="<?= base_url('plugins/moment/moment.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <script src="<?= base_url('plugins/select2/js/select2.full.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script>
        var start = moment().subtract(29, 'days');
        var end = moment();
        $('#date-dashboard').daterangepicker({
            showDropdowns: true,
            startDate: start,
            endDate: end,
        });
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
        });
        var successMessage = '<?= session()->getFlashdata('success') ?>';
        if (successMessage) {
            Toast.fire({
                icon: 'success',
                title: successMessage
            });
        }
        var errorMessage = '<?= session()->getFlashdata('error') ?>';
        if (errorMessage) {
            Toast.fire({
                icon: 'error',
                title: errorMessage
            });
        }
        function confirmDelete(url) {
            var confirmMessage = "Are you sure you want to delete?";
            if (window.confirm(confirmMessage)) {
                window.location.href = url;
            }
        }
        $('a[rel=popover]').popover({
            html: true,
            trigger: 'hover',
            placement: 'left',
            content: function () { return '<img style="width: 200px !important; height: 250px !important;" alt="..." class=" rounded"  src="' + $(this).data('img') + '" />'; }
        });
        $(function () {
            $("#table-main-mb").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: [
                    {
                        text: '<i class="fas fa-solid fa-plus"></i> Tambah',
                        className: 'bg-success',
                        action: function (e, dt, node, config) {
                            const currentURL = window.location.href;
                            window.location.href = `${currentURL}/tambah`;
                        },
                    },
                    {
                        extend: 'spacer',
                        style: 'bar'
                    },
                    {
                        text: '<i class="fas fa-print"></i> Print Laporan',
                        className: 'bg-warning',
                        action: function (e, dt, node, config) {
                            const currentURL = window.location.href;
                            window.location.href = `<?= base_url(strtolower(session('user')['role'] ?? '') . '/laporan') ?>`;
                        },
                    },
                ],
            }).buttons().container().appendTo('#table-main-mb_wrapper .col-md-6:eq(0)');

            $("#table-main").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: [
                    {
                        text: '<i class="fas fa-solid fa-plus"></i> Tambah',
                        className: 'bg-success',
                        action: function (e, dt, node, config) {
                            const currentURL = window.location.href;
                            window.location.href = `${currentURL}/tambah`;
                        },
                    },
                    {
                        extend: 'spacer',
                        style: 'bar'
                    },
                    {
                        extend: 'excel',
                        className: 'bg-info',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'bg-primary',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'bg-warning',
                        text: '<i class="fas fa-print"></i> Print',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                ],
            }).buttons().container().appendTo('#table-main_wrapper .col-md-6:eq(0)');
            $("#table-main-laporan").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: [

                    {
                        extend: 'excel',
                        className: 'bg-info',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'bg-primary',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'bg-warning',
                        text: '<i class="fas fa-print"></i> Print',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },

                ],

            }).buttons().container().appendTo('#table-main-laporan_wrapper .col-md-6:eq(0)');

        });

        const currentURL = window.location.href;
        const menuItems = document.querySelectorAll(".nav-item");
        for (const menuItem of menuItems) {
            const href = menuItem.querySelector("a").href;
            const subMenuItems = menuItem.querySelectorAll(".nav-item");
            let hasActiveChild = false;
            for (const subMenuItem of subMenuItems) {
                const subMenuItemHref = subMenuItem.querySelector("a").href;
                if (currentURL === subMenuItemHref) {
                    subMenuItem.querySelector("a").classList.add("active");
                    subMenuItem.querySelector("a").classList.add("text-white");
                    hasActiveChild = true;
                }
            }
            if (currentURL === href || hasActiveChild) {
                menuItem.classList.add("menu-open");
                menuItem.querySelector("a").classList.add("active");
            }
        }
        var currentUrl = window.location.pathname;
        var pathSegments = currentUrl.split('/').filter(function (segment) {
            return segment !== '';
        });
        var breadcrumbList = document.getElementById('breadcrumb-list');
        // var pathSoFar = '';
        var excludedKeywords = ['public', 'index.php', 'admin', 'operator'];
        for (var i = 0; i < pathSegments.length; i++) {
            if (excludedKeywords.some(keyword => pathSegments[i].includes(keyword))) {
                continue;
            }
            // pathSoFar += '/' + pathSegments[i];
            var listItem = document.createElement('li');
            var link = document.createElement('a');
            link.classList.add("breadcrumb-item");
            link.innerText = toTitleCase(pathSegments[i].replace(/-/g, ' '));
            listItem.appendChild(link);
            breadcrumbList.appendChild(listItem);
            if (i < pathSegments.length - 1) {
                var separator = document.createElement('span');
                separator.innerText = ' / ';
                separator.classList.add("text-gray");
                separator.classList.add("font-weight-bold");
                listItem.appendChild(separator);
                link.classList.add("active");
                link.classList.add("text-black");
                link.classList.add("font-weight-bold");
            } else {
                // link.href = pathSoFar;
                link.classList.add("text-black");
            }
        }
        function toTitleCase(str) {
            return str.replace(/\w\S*/g, function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }
    </script>
</body>

</html>