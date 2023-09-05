<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
    <!-- Nucleo Icons -->

    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">


</head>
<body>

@include('layouts.inc.frontnav2')
<div class="content">
    @yield('content')

</div>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>


@yield('scripts')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $('body').on('click', '#show-order-details', function () {
            var userURL = $(this).data('url');
            $.get(userURL, function (data) {
                $('#userShowModal').modal('show');
                const table = document.getElementById("modal-table");


                function addCell(tr, text) {
                    var td = tr.insertCell();
                    td.textContent = text;
                    return td;
                }

                // create header
                var thead = table.createTHead();
                var headerRow = thead.insertRow();
                addCell(headerRow, 'NAZIV PROIZVODA');
                addCell(headerRow, 'CIJENA');
                addCell(headerRow, 'KOLICINA');
                let total = 0;
                // insert data
                data.forEach(function (item) {
                    var row = table.insertRow();
                    addCell(row, item.products.naziv_proizvoda);
                    addCell(row, item.cijena+' KM');
                    addCell(row, item.kolicina);
                    total += item.cijena * item.kolicina;
                });
                var totalDiv = document.getElementById('total');
                var h6 = document.createElement('h6');
                h6.innerHTML = 'Ukupna cijena : '+total+' KM';
                totalDiv.append(h6);
            });
        });
    });

    $(document).ready(function () {
        $('body').on('click', '#close-modal', function () {
            $('#modal-table').empty();
            $('#total').empty();
        });
    });


</script>
</html>
