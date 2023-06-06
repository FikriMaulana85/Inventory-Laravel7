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
    <div class=" container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel w-100  documentation">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        @yield('row')
                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
        </div>
    </div>
    <!-- container-scroller -->
</body>
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

</html>
