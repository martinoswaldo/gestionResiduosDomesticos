<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Recolecciones</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #e0f7e9; }
    </style>
</head>
<body>
    <h2>Mis Recolecciones</h2>
    <table>
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
                    <td>{{ $c->weight ?? 'N/A' }}</td>
                    <td>{{ ucfirst($c->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>