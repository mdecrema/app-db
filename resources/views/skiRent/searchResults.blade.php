@extends('layouts.app')

@section('page-title')
    Ski Rent
@endsection

@section('content')
<h2>Risultati</h2>
<div style="font-size: 16px">
    Dal: <strong style="padding: 5px 10px;">{{ $dataInizio }}</strong>
    Al: <strong style="padding: 5px 10px;">{{ $dataFine }}</strong>
    <em>- {{ $daysRange }} giorni -</em>
</div>

<div style="margin: 30px 0">

    <h5>Sci disponibili</h5>
    @foreach($skiArray as $ski)
    <div style="padding: 10px 20px; margin: 5px 0; border: 1px solid lightgrey; list-style: none; cursor: pointer; position: relative">
        <h4>{{ $ski['brand'] }}</h4>
        <span>{{ $ski['model'] }}</span>
        <form action="{{ route('rentEquipment') }}" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; border: none;">
            <input style="visibility: hidden" type="text" name="ski_id" value="{{ $ski['id'] }}">
            <input style="visibility: hidden" type="text" name="dataInizio" value="{{ $dataInizio }}">
            <input style="visibility: hidden" type="text" name="dataFine" value="{{ $dataFine }}">
            <input style="visibility: hidden" type="text" name="daysRange" value="{{ $daysRange }}">
            <button type="submit" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; background-color: transparent; border: none"></button>
        </form>
    </div>
    @endforeach

        <!--<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
               <!--     </div>
                </div>
            </div>
        </div>
    </div>

    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                data-attr="" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

</div>

<script>
     $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
</script>-->

@endsection