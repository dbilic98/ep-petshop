@extends('layouts.admin')

@section('scripts')
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('35e98156f6027cfe1a71', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('product-channel');
        channel.bind('product-quantity', function (data) {
            try {
                const cleanedJsonString = data.message.replace(/\\/g, '');
                const dataArray = JSON.parse(cleanedJsonString);
                for (let i = 0; i < dataArray.length; i++) {
                    const productIdToUpdate = dataArray[i].product_id;
                    const newQuantity = dataArray[i].quantity;
                    var rowToUpdate = document.querySelector('#product-row-' + productIdToUpdate);
                    if (rowToUpdate) {
                        var quantityCell = rowToUpdate.querySelector('.quantity-cell');
                        if (quantityCell) {
                            quantityCell.textContent = newQuantity;
                        }
                    }
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
@endsection

@section('content')
    <div class="card-k">
        <div class="card-header">
            <h4>Proizvod</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Kategorija</th>
                    <th>Podkategorija</th>
                    <th>Naziv</th>
                    <th>Opis</th>
                    <th>Cijena</th>
                    <th>Kolicina</th>
                    <th>Slika</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($product as $item)
                    <tr id="product-row-{{ $item->id }}">
                        <td>{{ $item->categories->naziv}}</td>
                        <td>{{ $item->subcategories->naziv}}</td>
                        <td>{{ $item->naziv_proizvoda}}</td>
                        <td>{{ $item->opis}}</td>
                        <td>{{ $item->cijena}}</td>
                        <td class="quantity-cell">{{ $item->kolicina}}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/products/'.$item->slika) }}" class="cate-image" alt="">
                        </td>
                        <td>
                            <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-info">Uredi</a>

                            <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-primary">Obrisi</a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
