@extends('layouts.nav3')

@section('title')
  Checkout
@endsection

@section('content')

   <div class="container mt-5">
       <form action="{{ url('place-order') }}" method="POST" enctype="multipart/form-data">
           @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6> Detalji </h6>
                    <hr>
                    <div  class="row checkout-form">
                        <div  class="col-md-6">
                            <label for=""> Ime </label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" placeholder="Upišite ime">
                           </div>
                        <div  class="col-md-6">
                            <label for=""> Prezime </label>
                            <input type="text" class="form-control" value="{{Auth::user()->prezime}}" name="prezime" placeholder="Upišite prezime">

                        </div> <div  class="col-md-6 mt-3">
                            <label for=""> Email </label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Upišite email">

                        </div> <div  class="col-md-6 mt-3">
                            <label for=""> Adresa </label>
                            <input type="text" class="form-control" value="{{Auth::user()->adresa}}" name="adresa" placeholder="Upišite adresu">

                        </div> <div  class="col-md-6 mt-3">
                            <label for=""> Broj telefona </label>
                            <input type="text" class="form-control" value="{{Auth::user()->brojtelefona}}" name="brojtelefona" placeholder="Upišite kontakt broj">
                        </div>
                </div>
            </div>
            </div>

        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
            <h6>  Detalji narudžbe </h6>
              <hr>
              <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Naziv </th>
                        <th> Količina </th>
                        <th> Cijena </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cartitems as $item)
                <tr>
                    <td>  {{$item->products->naziv_proizvoda}}</td>
                    <td>  {{$item->prod_qty}}</td>
                    <td>  {{$item->products->cijena}}</td>
                </tr>
              @endforeach

                </tbody>
              </table>
              <hr>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info mt-3 float-end"> Naručiti</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
       </form>

   </div>
@endsection




