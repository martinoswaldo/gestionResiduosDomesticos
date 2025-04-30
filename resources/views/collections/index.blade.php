@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis Recolecciones</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Peso (kg)</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $c)
            <tr>
                <td>{{ ucfirst($c->type) }}</td>
                <td>{{ $c->scheduled_date }}</td>
                <td>{{ ucfirst($c->status) }}</td>
                <td>{{ $c->weight ?? '-' }}</td>
                <td>{{ $c->points_earned }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection