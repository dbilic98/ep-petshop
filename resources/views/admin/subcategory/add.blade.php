@extends('layouts.admin')

@section('content')

    <div class="card2">
        <div class="card-header">
            <h4>Dodaj podkategoriju</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-subcategory') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-6">
                        <div class="col-75">
                        <select class="form-select" name="category_id">
                            <option value="">Odaberi kategoriju</option>
                            @foreach($category as $item)
                                <option value="{{ $item->id }}"> {{ $item->naziv }}</option>

                            @endforeach

                        </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-6">
                        <label for="">Naziv</label>
                        <div class="col-75">
                        <input type="text" class="form-control" name="naziv">
                    </div>
                    </div>

                    <div class="col-md-12 mb-6">
                        <label for="">Opis</label>
                        <div class="col-75">
                            <textarea name="opis" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info mt-3"> Spremi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
