@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Mis recolecciones</h2>
    <a href="{{ route('reports.user.pdf') }}" class="btn btn-success mb-3">Descargar PDF</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo</th>
                <th>Peso (kg)</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $c)
                <tr>
                    <td>{{ $c->scheduled_date }}</td>
                    <td>{{ $c->time }}</td>
                    <td>{{ ucfirst($c->type) }}</td>
                    <td>{{ $c->weight ?? 'No registrado' }}</td>
                    <td>{{ ucfirst($c->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection