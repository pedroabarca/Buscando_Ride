@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--panel contenedor de los taps: cuenta, rides, configuración-->
        <div ng-controller="DashboardController" class="container-fluid panel">
            <nav class="row">
                <!-- Nav tabs: cuenta, rides, editar, config -->
                <div class="col-xs-12">
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li role="presentation" class="active"><a data-target="#cuenta" role="tab" data-toggle="tab">Mis Rides</a></li>
                        <li role="presentation"><a data-target="#rideEdit" role="tab" data-toggle="tab">Editar Ride</a></li>
                        <li role="presentation"><a data-target="#rides" role="tab" data-toggle="tab">Crear Ride</a></li>
                        <li role="presentation"><a data-target="#configuracion" role="tab" data-toggle="tab">Editar Perfil</a>
                        </li>
                    </ul>
                </div>

            </nav>
            <!-- Contenedor de los tabs-pane -->
            <div class="tab-content">
                <!-- Mis Rides-->
                <div role="tab-pane" class="tab-pane active" id="cuenta">

                    <!--Migajas de pan-->
                    <div class="tab-panel" id="migas">
                        <ol class="breadcrumb">
                            <li class="active">Mis Rides</li>
                            <li><a>...</a></li>
                        </ol>
                    </div>


                    <!--lista de tus rides-->
                    <div class="well">
                        <table class="table">
                            <thead class="row">
                            <tr>
                                <th class="col-lg-2 col-xs-1">Nombre</th>
                                <th class="col-lg-4 col-xs-3">Salida</th>
                                <th class="col-lg-4 col-xs-3">Destino</th>
                                <th class="col-lg-2 col-xs-3">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($rides as $ride)
                                    <tr>
                                        <td>{{$ride->name}}</td>
                                        <td>{{$ride->departure}}</td>
                                        <td>{{$ride->destination}}</td>
                                        <td><a href=""  data-target="#rideEdit" data-toggle="tab" ><span class="label label-info">Ver</span></a>
                                            <a href="{{ url('/home/update, $ride->id')}}" data-target="#rideEdit" data-toggle="tab"><span class="label label-success">Editar</span></a>
                                            <a href="" data-target="#rideEdit" data-toggle="tab"><span class="label label-danger">Eliminar</span></a> </td>
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--rides-editar-->
                <div role="tab-pane" class="tab-pane" id="rideEdit">

                    <!--Migajas de pan-->
                    <div class="tab-panel" id="migase">
                        <ol class="breadcrumb">
                            <li><a>Mis Rides</a></li>
                            <li><a>Crear Ride</a></li>
                            <li class="active">Editar Ride</li>
                        </ol>
                    </div>

                    <!--Panel-->
                    <div class="well">
                        <!--form-->

                    </div>

                </div>

                <!--Crear Ride-->
                <div role="tab-pane" class="tab-pane" id="rides">

                    <!--Migajas de pan-->
                    <div class="tab-panel" id="migaso">
                        <ol class="breadcrumb">
                            <li><a>Mis Rides</a></li>
                            <li><a>Crear Ride</a></li>
                            <li class="active">Nuevo Ride</li>
                        </ol>
                    </div>

                    <!--Panel-->
                        <div class="panel panel-default well">
                           <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/home/store') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('departure') ? ' has-error' : '' }}">
                                        <label for="departure" class="col-md-4 control-label">Departure</label>

                                        <div class="col-md-6">
                                            <input id="departure" type="text" class="form-control" name="departure" value="{{ old('departure') }}" required autofocus>

                                            @if ($errors->has('departure'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('departure') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
                                        <label for="destination" class="col-md-4 control-label">Destination</label>

                                        <div class="col-md-6">
                                            <input id="destination" type="text" class="form-control" name="destination" value="{{ old('destination') }}" required autofocus>

                                            @if ($errors->has('destination'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('destination') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-4 control-label">Description</label>

                                        <div class="col-md-6">
                                            <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" rows="5" cols="40" required></textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('departure_time') ? ' has-error' : '' }}">
                                        <label for="departure_time" class="col-md-4 control-label">Departure Time</label>

                                        <div class="col-md-6">
                                            <input id="departure_time" type="time" class="form-control" name="departure_time" value="{{ old('departure_time') }}" required>

                                            @if ($errors->has('departure_time'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('departure_time') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('days[]') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Days</label>

                                        <div class="col-md-6">

                                            @foreach($days as $day)
                                                <label><input name="days[]" type="checkbox" value="{{$day->id}}" checked>{{$day->name}}</label>
                                            @endforeach

                                            @if ($errors->has('days[]'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('days[]') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Create
                                            </button>
                                            @if(Session::has('message'))
                                                <div class="alert alert-{{Session::get('class')}}">{{Session::get('message')}}</div>
                                             @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <!-- Configuracion-->
                <div role="tab-pane" class="tab-pane" id="configuracion">

                    <div role="tab-pane" class="tab-pane" id="ridese">
                        <!--Migajas de pan-->
                        <div class="tab-panel" id="migass">
                            <ol class="breadcrumb">
                                <li><a>Mi Cuenta</a></li>
                                <li><a>Rides</a></li>
                                <li class="active">Editar Perfil</li>
                            </ol>
                        </div>

                        <!--Panel-->
                        <div class="well">
                           <!-- form-->
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection
