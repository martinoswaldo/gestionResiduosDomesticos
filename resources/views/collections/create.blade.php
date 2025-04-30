@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Programar Recolección</h2>
    <form method="POST" action="{{ route('collections.store') }}">
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">Tipo de residuo</label>
            <select name="type" id="type" class="form-select" required>
                <option value="inorganico">Inorgánico reciclable</option>
                <option value="peligroso">Peligroso</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="scheduled_date" class="form-label">Fecha de recolección</label>
            <input type="date" name="scheduled_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Programar</button>
    </form>
</div>
@endsection