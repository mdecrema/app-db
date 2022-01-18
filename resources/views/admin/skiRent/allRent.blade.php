@extends('layouts.app')

@section('page-title')
    All Equipment Rented
@endsection

@section('content')
<ul style="list-style: none">
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.allEquipment') }}">Tutto il materiale</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.addEquipment') }}">Aggiungi materiale</a></li>
</ul>
<h2>Attrezzatura noleggiata</h2>

@if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

<div class="row" style="margin: 10px 0 30px 0">
    <div class="form-row" style="margin-bottom: 30px">
        <label for="cerca">Filtra prenotazioni <i class="fad fa-search"></i></label>
        <input onkeyup="filterByName()" type="text" class="form-control" name="cerca" id="cerca" placeholder="Cerca per nome">
    </div>
    <!--<div class="form-row">
        <input id="dataInizio" name="dataInizio" type='date' class="form-control"/>
        <input id="dataFine" name="dataFine" type='date' min="" class="form-control"/>
        <input type="" name="daterange" value="" class="form-control" onfocus="blur()" style="font-weight: bold" />
    </div>-->

    @foreach($allRent as $item)
        <div style="padding: 10px 20px; margin: 5px 0; border: 1px solid lightgrey; list-style: none; cursor: pointer; position: relative" class="cardPrenotazioni">
            <a href="{{ route('admin.skiRent.rentDetails', $item->id) }}">
                <h4>{{ $item->ski_id }}</h4>
                <h5 class="namePrenotazioniToBeFilter">{{ $item->name }}</h5>
                <h5>{{ date("d-m-Y", ($item->date / 1000))  }}</h5>
                <a href="deleteRent/{{$item['id']}}" style="width: 30px; height: 50%; position: absolute; top: 0; right: 0; text-align: right; padding: 5px 10px;">
                    <i class="far fa-times-circle"></i>
                </a>
                <!-- bar code-->
                <div style="width: 150px; height: 30px; padding: 0 5px; background-color: #15AABF; border-radius: 30px; line-height: 30px; cursor: pointer; color: #fff">
                    <div style="width: 20px; height: 20px; border-radius: 100%; text-align: center; background-color: #fff; line-height: 20px; display: inline-block; color: #15AABF">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <span style="color: #fff; padding: 0 2px; display: inline-block">Scan Bar Codes</span>
                </div>
            </a>
        </div>
    @endforeach
    </ul>
</div>
<!-- !! AGGIUNGERE ROUTING ALLE SPECIFICHE DEL 'RENT SELEZIONATO' !! -->

<script>
    // document.getElementById('cerca').addEventListener('change', filterByName);

    function filterByName() {
       
        var filter, card, name, a, i, txtValueA;
        var richiesteWord = document.getElementById('cerca');
        filter = richiesteWord.value.toLowerCase();
        console.log(filter);
        card = $('.cardPrenotazioni');
        name = $('.namePrenotazioniToBeFilter');
        console.log(name);
        for (i = 0; i < name.length; i++) {
            a = name[i];
            txtValueA = a.textContent || a.innerText;
            if (txtValueA.toLowerCase().indexOf(filter) > -1) {
                card[i].style.display = "";
            } else {
                card[i].style.display = "none";
            }
        }
    }


    $('input[name="daterange"]').daterangepicker({
    opens: 'left',
  //  displayMonths : 1,
    minDate: new Date(),
    locale: {
        format: 'DD-MM-YYYY'
    }
  }, function(start, end, label) {
    dataInizio=start.format('YYYY-MM-DD');
    dataFine=end.format('YYYY-MM-DD');
    rangeOfDays(start, end);
    document.getElementById('dataInizio').value=dataInizio;
    document.getElementById('dataFine').value=dataFine;
  });

</script>
 
@endsection