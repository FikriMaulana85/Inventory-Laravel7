<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <title>Add IP</title> --}}
    @yield('title')
    @include('partials.css')
</head>

<body class="boxed-layout">
    <div class="container-scroller">
        @include('partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('row')
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        @include('partials.js')
        <script>
            (function($) {
                'use strict';
                $(function() {
                    $('#order-listing').DataTable({
                        "aLengthMenu": [
                            [5, 10, 15, -1],
                            [5, 10, 15, "All"]
                        ],
                        "iDisplayLength": 10,
                        "language": {
                            search: ""
                        }
                    });
                    $('#order-listing').each(function() {
                        var datatable = $(this);
                        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                        var search_input = datatable.closest('.dataTables_wrapper').find(
                            'div[id$=_filter] input');
                        search_input.attr('placeholder', 'Search');
                        search_input.removeClass('form-control-sm');
                        // LENGTH - Inline-Form control
                        var length_sel = datatable.closest('.dataTables_wrapper').find(
                            'div[id$=_length] select');
                        length_sel.removeClass('form-control-sm');
                    });
                });
            })(jQuery);
        </script>
</body>

</html>
