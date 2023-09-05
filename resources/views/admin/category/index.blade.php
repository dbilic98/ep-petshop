@extends('layouts.admin')

@section('content')
<div class="card-k">
    <div class="card-header">
    <h4>Kategorija</h4>
    <hr>
    </div>
    <div class="card-body">
    <table class ="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naziv</th>
                <th>Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
            <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->naziv}}</td>
                    <td>
                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-info"> Uredi </a>


                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-primary"> Obrisi </a>

                    </td>
            </tr>
            @endforeach

       </tbody>
    </table>
    </div>
</div>
@endsection
