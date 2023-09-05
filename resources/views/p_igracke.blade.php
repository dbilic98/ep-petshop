@extends('layouts.nav3')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <form class="mx-auto border-0" method="GET"
                  action="{{route('p_igracke',[$min_cijena ?? '',$max_cijena ?? ''])}}">
                <div class=" col-12 col-md-3">
                    <div class="card px-mt-5">
                        <h2 class="text-center">Filter</h2>
                        <hr>
                        <h4>Cijena:</h4>
                        <div class="card-body">
                            <form id="price-range-form">
                                <label for="min-price" class="form-label">Najniža cijena: </label>
                                <span id="min-price-txt">KM0</span>
                                <input type="range" name="min_cijena" class="form-range" min="0" max="99"
                                       id="min-price" step="1"
                                       value="0">
                                <label for="max-price" class="form-label">Najveća cijena: </label>
                                <span id="max-price-txt">KM100</span>
                                <input type="range" name="max_cijena" class="form-range" min="1" max="100"
                                       id="max-price" step="1"
                                       value="100">
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 p-0">
                        <button class="btn btn-md btn-info text-white mt-4 ms-1" type="submit">Filter</button>
                    </div>
                </div>
            </form>


    <div class="col-12 col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="row" id="display-items-div">

                    @foreach($dogProducts as $dogProduct)
                        @if($dogProduct->categories->naziv=='Pas')
                            @if($dogProduct->subcategories->naziv=='Igračke')
                                <div class="col-md-3 mb-3">
                                    <div class="card product_data p-3">
                                        <img src="{{asset('assets/uploads/products/'.$dogProduct->slika)}}" class="card-img mx-auto" alt="..." style="width: 12rem; height:12rem; ">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{$dogProduct->naziv_proizvoda}}</h5>
                                            <p class="card-text">{{$dogProduct->opis}}</p>
                                            <p class="fw-bold">{{$dogProduct->cijena}} KM</p>
                                        </div>
                                        @if($dogProduct->kolicina > 0)
                                            <label class ="badge bg-success">Na stanju</label>
                                        @else
                                            <label class ="badge bg-danger">Nema zaliha</label>
                                        @endif
                                        <div class = "row mt-2">
                                            <div class ="col-md-9">
                                                <input type="hidden" value="{{$dogProduct->id}}" class="prod_id">
                                                <label for="kolicina">Kolicina</label>
                                                <div class="input-group text-center mb-3" style="width: 130px;">
                                                    <button class ="input-group-text decrement-btn">-</button>
                                                    <input type="text" name="kolicina" class="form-control kolicina-input text-center" value="1">
                                                    <button class ="input-group-text increment-btn">+</button>
                                                </div>
                                            </div>
                                            @if($dogProduct->kolicina > 0)
                                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Dodaj u košaricu <i class ="fa fa-shopping-cart"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){

            $('.addToCartBtn').click(function (e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.kolicina-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function (response) {
                        alert(response.status);

                    }
                });
            });

            $('.increment-btn').click(function (e) {
                e.preventDefault();

                var inc_value = $(this).closest('.product_data').find('.kolicina-input').val();
                /* var inc_value = $('.kolicina-input').val(); */
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10)
                {
                    value++;
                    $(this).closest('.product_data').find('.kolicina-input').val(value);
                    /* $('.kolicina-input').val(value); */
                }
            });
            $('.decrement-btn').click(function (e) {
                e.preventDefault();

                var dec_value = $(this).closest('.product_data').find('.kolicina-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 1)
                {
                    value--;
                    $(this).closest('.product_data').find('.kolicina-input').val(value);
                }
            });
        });
        $('#min-price').on("change mousemove", function () {
            min_price = parseInt($('#min-price').val());
            $('#min-price-txt').text('KM' + min_price);
            showItemsFiltered();
        });
        $('#max-price').on("change mousemove", function () {
            max_price = parseInt($('#max-price').val());
            $('#max-price-txt').text('KM' + max_price);
            showItemsFiltered();
        });

    </script>
@endsection
