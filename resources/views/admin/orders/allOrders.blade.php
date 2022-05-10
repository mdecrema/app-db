@extends('layouts.app')

@section('page-title')
    Pending orders
@endsection

@section('content')
<div class="container" style="font-family: 'Roboto', sans-serif">
  <div class="row">
      <div class="col-12" style="margin: 15px 0;">
          <h2>Elenco degli ordini</h2>
      </div>
      <div class="col-12">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Cliente</th>
                  {{-- <th scope="col">Items</th> --}}
                  <th scope="col">Effettuato</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($orders as $order)
                  <tr onclick="navigateToDetails('{{ $order->id }}')" style="cursor: pointer">
                    <th scope="row" style="position: relative">
                        @if ($order->pending == true)
                          <span class="badge badge-success">new</span>
                        @else 
                          {{ $order->id }}
                        @endif
                      </th>
                      <td>{{ $order->firstName }} {{ $order->lastName }}</td>
                      {{-- <td>{{ $order->items_id }}</td> --}}
                      <td>{{ $order->created_at }}</td>
                      <td>
                        @if($order->inProgress == true && $order->delivered == false)
                          in progress
                        @elseif ($order->inProgress == false && $order->delivered == true)
                          completato
                        @else 
                          in attesa
                        @endif
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
      </div>
  </div>
</div>

<script>
  function navigateToDetails(id) {
    console.log('row'+id);
    window.location.href = '/admin/dashboard/orders/orderDetails/'+id;
  }
</script>
@endsection