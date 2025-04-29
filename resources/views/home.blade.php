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
                                <tr>
                                    <td>2023-11-15</td>
                                    <td>08:00 - 10:00</td>
                                    <td>Orgánico</td>
                                    <td><button class="waste-collection-btn">Agendar</button></td>
                                </tr>
                                <tr>
                                    <td>2023-11-16</td>
                                    <td>10:00 - 12:00</td>
                                    <td>Reciclable</td>
                                    <td><button class="waste-collection-btn">Agendar</button></td>
                                </tr>
                                <tr>
                                    <td>2023-11-17</td>
                                    <td>14:00 - 16:00</td>
                                    <td>No reciclable</td>
                                    <td><button class="waste-collection-btn">Agendar</button></td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="waste-collection-title">O solicita una fecha personalizada</h3>
                        
                        <form class="waste-collection-form">
                            <div class="waste-collection-form-group">
                                <label for="collection-date">Fecha de recolección:</label>
                                <input type="date" id="collection-date" name="collection-date" required>
                            </div>
                            
                            <div class="waste-collection-form-group">
                                <label for="collection-time">Hora preferida:</label>
                                <select id="collection-time" name="collection-time" required>
                                    <option value="08:00-10:00">08:00 - 10:00</option>
                                    <option value="10:00-12:00">10:00 - 12:00</option>
                                    <option value="14:00-16:00">14:00 - 16:00</option>
                                    <option value="16:00-18:00">16:00 - 18:00</option>
                                </select>
                            </div>
                            
                            <div class="waste-collection-form-group">
                                <label for="waste-type">Tipo de residuo:</label>
                                <select id="waste-type" name="waste-type" required>
                                    <option value="organic">Orgánico</option>
                                    <option value="recyclable">Reciclable</option>
                                    <option value="non-recyclable">No reciclable</option>
                                    <option value="hazardous">Peligroso</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="waste-collection-btn">Solicitar Recolección</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush
