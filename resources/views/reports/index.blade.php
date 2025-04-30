@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Mis Reportes de Recolección</h2>

    @if ($collections->isEmpty())
        <div class="alert alert-info">No se han registrado recolecciones aún.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Peso (kg)</th>
                    <th>Puntos</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collections as $c)
                    <tr>
                        <td>{{ $c->scheduled_date }}</td>
                        <td>{{ $c->time }}</td>
                        <td>{{ ucfirst($c->type) }}</td>
                        <td>{{ $c->weight ?? '-' }}</td>
                        <td>{{ $c->points_earned ?? '-' }}</td>
                        <td>{{ ucfirst($c->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection