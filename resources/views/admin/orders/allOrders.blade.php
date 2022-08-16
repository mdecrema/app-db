@extends('layouts.dashboard_page')

@section('page-title')
    Pending orders
@endsection

@section('content')
<div class="container" style="font-family: 'Roboto', sans-serif">
  <div class="row">
    @section('menu_link')
      Elenco degli ordini
    @endsection

      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
          <label>Filtra per:</label>
          <select id="filterOrderSelect" onchange="filterOrder()" class="form-control">
            <option value="0">tutti gli ordini</option>
            <option value="1">ordini in attesa</option>
            <option value="2">ordini in lavorazione</option>
            <option value="3">ordini completati</option>
          </select>
        </div>
      </div>
      <div class="col-12">
          <table id='myTable' class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Cliente</th>
                  {{-- <th scope="col">Items</th> --}}
                  <th scope="col">Effettuato</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody id="tableOrderBody">
                  @foreach($orders as $order)
                  <tr onclick="navigateToDetails('{{ $order->id }}')" class="orderRow" style="cursor: pointer">
                    <th scope="row" style="position: relative">
                        @if ($order->newOrder == true)
                          <span class="badge badge-success">new</span>
                        @else 
                          {{ $order->id }}
                        @endif
                      </th>
                      <td>{{ $order->firstName }} {{ $order->lastName }}</td>
                      {{-- <td>{{ $order->items_id }}</td> --}}
                      <td>{{ $order->created_at }}</td>

                      @if($order->inProgress == true && $order->delivered == false)
                        <td class="orderStatus" data-attr="2">
                          in progress
                        </td>
                      @elseif ($order->inProgress == false && $order->delivered == true) 
                        <td class="orderStatus" data-attr="3">
                          completato
                        </td>
                      @else 
                        <td class="orderStatus" data-attr="1">
                          in attesa                        
                        </td>
                      @endif

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

  function filterOrder() {
    var table, tr, td, i, txtValue;
  
    var filter = document.getElementById('filterOrderSelect').value.toLowerCase();

    console.log(filter);
    
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  console.log(tr);
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2].getAttribute("data-attr");
    console.log(td);
    if (td) {
      if (filter === '0') {
        tr[i].style.display = "";
      } else if (td === filter) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
  }
</script>
@endsection