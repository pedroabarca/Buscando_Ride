<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Buscando Ride</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }
            .content-blue {
                background-color: #222222;
            }
            .f-white{
                color: white;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                     @endif
                </div>
            @endif

            <div class="content">
                <h1 class="title m-b-md">
                    ¿Buscando Ride?
                </h1>
            </div>
                <div class="content flex-center">
                  <img src="/images/arrow_down.png" alt="" class="img-responsive">
                </div>

        </div>

        <div class="content-blue full-height">
            <br>
            <h1 class="flex-center f-white" >¡Ecuentralo Aquí!</h1>
            <br>
            <br>
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10 well">
                    <table class="table">
                        <thead class="row">
                        <tr>

                            <th class="col-xs-2">Usuario</th>
                            <th class="col-xs-2">Nombre</th>
                            <th class="col-xs-3">Salida</th>
                            <th class="col-xs-3">Destino</th>
                            <th class="col-xs-2">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rides as $ride)
                            <tr>
                                <td>{{$ride->user->name}}</td>
                                <td>{{$ride->name}}</td>
                                <td>{{$ride->departure}}</td>
                                <td>{{$ride->destination}}</td>

                                <td>
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        <a href="{{ url('/home/update, $ride->id')}}"><span class="label label-success">Ver</span></a>
                                    @else
                                        <a href="{{ url('/home')}}"><span class="label label-success">Ver</span></a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{ $rides->links() }}
            </div>
        </div>
        </div>
    </body>
</html>
