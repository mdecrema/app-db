@extends('layouts.app')

@section('page-title')
    Pending orders
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Ordini pending</h2>
    </div>
    <div class="col-12">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome/Cognome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Numero</th>
                <th scope="col">Effettuato</th>
              </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
              <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->firstName }} {{ $order->lastName }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection