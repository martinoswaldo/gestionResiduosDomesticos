@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="waste-collection-container">
                        <h2 class="waste-collection-title">Agendar Recolección de Residuos</h2>
                        
                        <table class="waste-collection-table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Tipo de Residuo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($futureSlots as $slot)
                                    <tr>
                                        <td>{{ $slot['date'] }}</td>
                                        <td>{{ $slot['time'] }}</td>
                                        <td>{{ $slot['type'] }}</td>
                                        <td>
                                            @php
                                                $startTime = \Carbon\Carbon::createFromFormat('H:i', explode('-', $slot['time'])[0])
                                                    ->setDateFrom(\Carbon\Carbon::parse($slot['date']));
                                                $isPast = $startTime->isPast();
                                            @endphp
                        
                                            <button class="waste-collection-btn" {{ $isPast ? 'disabled' : '' }}>
                                                Agendar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h3 class="waste-collection-title">O solicita una fecha personalizada</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="waste-collection-form" method="POST" action="{{ route('collections.store') }}">
                            @csrf
                            <div class="waste-collection-form-group">
                                <label for="collection_date">Fecha de recolección:</label>
                                <input type="date" id="collection_date" name="collection_date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                            </div>
                            
                            <div class="waste-collection-form-group">
                                <label for="collection-time">Hora preferida:</label>
                                <select id="collection_time" name="collection_time" required>
                                    <option value="08:00-10:00">08:00 - 10:00</option>
                                    <option value="10:00-12:00">10:00 - 12:00</option>
                                    <option value="14:00-16:00">14:00 - 16:00</option>
                                    <option value="16:00-18:00">16:00 - 18:00</option>
                                </select>
                            </div>
                            
                            <div class="waste-collection-form-group">
                                <label for="type">Tipo de residuo:</label>
                                <select id="type" name="type" required>
                                    <option value="organicos">Orgánico</option>
                                    <option value="inorganico">Inorgánico</option>
                                    <option value="peligroso">peligroso</option>
                                </select>
                            </div>
                            <div class="waste-collection-form-group">
                                <label for="location">Ubicación:</label>
                                <input type="text" id="location" name="location" placeholder="Ej. Calle 123, Barrio Verde">
                            </div>
                            <button type="submit" class="waste-collection-btn">Solicitar Recolección</button>
                        </form>
                    </div>
                </div>
                @if($collections->isNotEmpty())
    <h3 class="waste-collection-title mt-4">Tus Recolecciones Agendadas</h3>

    <table class="waste-collection-table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Tipo de Residuo</th>
                <th>Estado</th>
                <th>Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($collections as $collection)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($collection->scheduled_date)->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($collection->type) }}</td>
                    <td>{{ ucfirst($collection->status) }}</td>
                    <td>{{ $collection->location ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush
