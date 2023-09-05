@extends('layouts.nav3')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table mt-5" id="example">
                            <thead>
                            <tr>
                                <th scope="col">ID narudzbe</th>
                                <th scope="col">Datum narudzbe</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total=0;
                            @endphp
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a
                                            href="javascript:void(0)"
                                            id="show-order-details"
                                            data-url="{{ route('show', $order->id) }}"
                                            class="btn btn-sm btn-success"
                                        >Show</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="showModal">
                                        <table class="table mt-5" id="modal-table">

                                            <tbody id="modalBody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=" card-footer" id="total">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close-modal"
                                        data-bs-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
