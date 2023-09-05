@extends('layouts.admin')

@section('content')

<div class="card2">
    <div class="card-header">
    <h4>Dodaj kategoriju</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="">Naziv</label>
                    <div class="col-75">
                    <input type="text" class="form-control" name="naziv">
                </div>
                </div>
               <div class="col-md-12">
                   <button type="submit" class="btn btn-info mt-3"> Spremi</button>
               </div>
           </div>
        </form>
    </div>
</div>
@endsection
