@extends('layouts.admin')

@section('content')
    <div class="card-k">
        <div class="card-header">
            <h4>Podkategorija</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class ="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Kategorija</th>
                    <th>Naziv</th>
                    <th>Opis</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subcategory as $item)
                    <tr>
                        <td>{{ $item->categories->naziv}}</td>
                        <td>{{ $item->naziv}}</td>
                        <td>{{ $item->opis}}</td>
                        <td>
                            <a href="{{ url('edit-subcategory/'.$item->id) }}" class="btn btn-info"> Uredi </a>


                            <a href="{{ url('delete-subcategory/'.$item->id) }}" class="btn btn-primary"> Obrisi </a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
