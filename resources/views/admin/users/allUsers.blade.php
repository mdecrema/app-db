@extends('layouts.dashboard_page')

@section('page-title')
    All User Registered
@endsection

@section('content')
<div class="container">
    <div class="row">
        Utenti registrati
        @endsection

        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 20px">
            <div id="10" onclick="changeRole(10)" class="role_menu_btn active" style="width: calc(100%/3); float: left; text-align: center; border: 1px solid #183153">Superadmin</div>
            <div id="20" onclick="changeRole(20)" class="role_menu_btn" style="width: calc(100%/3); float: left; text-align: center; border: 1px solid #183153">Admin</div>
            <div id="30" onclick="changeRole(30)" class="role_menu_btn" style="width: calc(100%/3); float: left; text-align: center; border: 1px solid #183153">Utenti</div>
        </div>

        <div class="col-12">
            @foreach($users as $user)
            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 card">
                {{ $user->name }}
            </div>
            @endforeach
        </div>

        <!-- sessioni -->
        <div class="mt-4">
            @foreach($sessions as $session)
            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 mb-2 card" style="border: 1px solid darkgrey">
                <strong>IP Address: </strong> {{ $session->ip_address }}<br>
                <strong>User-agent: </strong> {{ $session->user_agent }}<br>
                <strong>Ultima attività: </strong> {{ $session->last_activity }}
            </div>
            @endforeach
        </div>
    </div>  
</div>

<script>
    function changeRole(role) {
        switch (role) {
        case 10:
            $('.role_menu_btn').removeClass('active');
            $('#10').addClass('active');
            break;
        case 20:
            $('.role_menu_btn').removeClass('active');
            $('#20').addClass('active');
            break;
        case 30:
            $('.role_menu_btn').removeClass('active');
            $('#30').addClass('active');
            break;
        default:
        console.log(`Sorry, we are out of ${expr}.`);
        }
    }
</script>

@endsection