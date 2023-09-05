@extends('layouts.admin')

@section('content')

<div class="card2">
    <div class="card-header">
    <h4>Dodaj proizvod</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="row">
               <div class="col-md-12 mb-6">
                <select class="form-select" name="category_id">
                <option value="">Odaberi kategoriju</option>
                    @foreach($category as $item)
                         <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->naziv }}</option>
                    @endforeach
                </select>
                   <select class="form-select" name="subcategory_id">
                       <option value="">Odaberi podkategoriju</option>
                       @foreach($subcategory as $item)
                           <option value="{{ $item->id }}" {{ $item->id == $product->subcategory_id ? 'selected' : '' }}>{{ $item->naziv }}</option>
                       @endforeach

                   </select>
               </div>
                <div class="col-md-6 mb-6">
                    <label for="">Naziv_proizvoda</label>
                    <input type="text" class="form-control" value="{{$product->naziv_proizvoda}}" name="naziv_proizvoda">
                </div>

               <div class="col-md-6 mb-6">
                    <label for="">Cijena</label>
                    <input type="number" class="form-control" value="{{$product->cijena}}" name="cijena">
                </div>

                <div class="col-md-6 mb-12">
                    <label for="">Kolicina</label>
                    <input type="number" class="form-control" value="{{$product->kolicina}}" name="kolicina">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Opis</label>
                    <div class="col-75">
                    <textarea name="opis" rows="3" class="form-control">{{$product->opis}}</textarea>
               </div>


               @if($product->image)
               <img src= "{{ asset('assets/uploads/products/'.$product->slika) }}">
               @endif

               <div class="col-md-12 mb-3">
                   <input type="file" name="slika" class="form-control">
               </div>


               <div class="col-md-12 mb-3">
                   <button type="submit" class="btn btn-primary"> Spremi</button>
               </div>
           </div>
        </form>
    </div>
</div>

@endsection
