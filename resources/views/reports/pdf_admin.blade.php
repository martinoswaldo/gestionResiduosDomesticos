<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte General</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #eef; }
        h4 { margin-top: 30px; }
    </style>
</head>
<body>
    <h2>Reporte General por Tipo de Residuo</h2>

    @foreach ($collections as $type => $items)
        <h4>Tipo: {{ ucfirst($type) }}</h4>
        <table>
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
</body>
</html>