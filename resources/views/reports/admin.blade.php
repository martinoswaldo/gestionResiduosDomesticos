@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Reporte General</h2>

    <form method="GET" action="{{ route('reports.admin') }}" class="mb-3 row g-3">
        <div class="col-md-4">
            <input type="text" name="localidad" class="form-control" placeholder="Localidad" value="{{ request('localidad') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <a href="{{ route('reports.admin.pdf', request()->all()) }}" class="btn btn-success mb-3">Descargar PDF</a>

    @foreach ($collections as $type => $items)
        <h5 class="mt-4">Tipo: {{ ucfirst($type) }}</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Localidad</th>
                    <th>Peso</th>
                    <th>Puntos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $c)
                    <tr>
                        <td>{{ $c->user->name }}</td>
                        <td>{{ $c->scheduled_date }}</td>
                        <td>{{ $c->time }}</td>
                        <td>{{ $c->location }}</td>
                        <td>{{ $c->weight }}</td>
                        <td>{{ $c->points_earned }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection