@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ auth()->user()->facebook_avatar }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ auth()->user()->name }}</h5>
                            <p class="card-text">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <button onclick="sendNotif()">enviar notificacion</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function sendNotif(){
            Push.config({
                serviceWorker: "./sw.js"
            });
            Push.create("Castex App", {
                body: "Tienes una nueva notificacion!",
                icon: "hospital-icon.png",
                link: "https://www.castexapp.com/home",
                vibrate: [200,100,200,100]
            });
        }
    </script>
@endsection
