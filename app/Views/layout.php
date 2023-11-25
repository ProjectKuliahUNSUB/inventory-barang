<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | Dashboard 2</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <script src="<?= base_url('plugins/echarts/echarts.min.js'); ?>"></script>
    <style>
        .bg-header {
            background: #363062;
        }
        .bg-sidebar {
            background: #363062;
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
    </style>
</head>

<body class="hold-transition   sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">

            <img class="animation__wobble" src="<?= base_url('assets/loading.svg') ?>" alt="AdminLTELogo" height="60"
                width="60">
        </div>

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

        <footer class="main-footer">
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
    <script src="<?= base_url('plugins/chart.js/Chart.min.js'); ?>"></script>

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
    <script>
        $(function () {
            $("#table-main").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table-main_wrapper .col-md-6:eq(0)');

        });
    </script>
    <script>
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

    </script>
    <script>
        // Get the current URL path
        var currentUrl = window.location.pathname;

        // Split the path into segments
        var pathSegments = currentUrl.split('/').filter(function (segment) {
            return segment !== '';
        });

        // Set the page title to the last segment of the path in Title Case
        document.getElementById('page-title').innerText = toTitleCase(pathSegments[pathSegments.length - 1].replace(/-/g, ' '));

        // Generate breadcrumb items
        var breadcrumbList = document.getElementById('breadcrumb-list');
        var pathSoFar = '';
        for (var i = 0; i < pathSegments.length; i++) {
            pathSoFar += '/' + pathSegments[i];
            var listItem = document.createElement('li');
            var link = document.createElement('a');
            link.classList.add("breadcrumb-item")
            link.innerText = toTitleCase(pathSegments[i].replace(/-/g, ' '));
            listItem.appendChild(link);
            breadcrumbList.appendChild(listItem);

            // Add a separator after each breadcrumb item except the last one
            if (i < pathSegments.length - 1) {
                var separator = document.createElement('span');
                separator.innerText = ' / ';
                listItem.appendChild(separator);
                link.classList.add("active")


            } else {

                link.href = pathSoFar; // Set the actual link here
            }
        }

        // Function to convert a string to Title Case
        function toTitleCase(str) {
            return str.replace(/\w\S*/g, function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }
    </script>
</body>

</html>