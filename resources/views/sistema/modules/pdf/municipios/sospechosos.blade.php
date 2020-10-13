<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Municipios</title>
    <style>
        .titulo{
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

    </style>
</head>
<body>
    <div class ="titulo">
        <h1>{{ $municipio }}</h1>
    </div>
    <div>
        <div>
            Total de Casos Recuperados {{ $totalSospechosos }}
        </div>
        <table>
            <thead>
                <tr>
                    <th>Persona</th>
                    <th>Municipio</th>
                    <th>Caso</th>
                    <th>Fecha</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($sospechosos as $sospechoso)
                <tr>
                    <td>{{ $sospechoso->nombre }} {{ $sospechoso->apellidos }}</td>
                    <td>{{ $sospechoso->municipio }}</td>
                    <td>{{ $sospechoso->estado }}</td>
                    <td>{{ $sospechoso->fecha }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>