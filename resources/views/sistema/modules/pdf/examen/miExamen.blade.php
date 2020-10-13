<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examen PDF</title>
</head>
<style>
    body{
        padding: 0;
        margin: 0;
    }
    .contenedor{
        background-color:aliceblue;
        border: solid 1px #000;
        padding: 10px;

    }
    .hospital{
        background-color:aliceblue;
        align-items: center;
        text-align: center;
        border: solid 1px #000;
        padding: 30px;
    }
    h1{
        font: 700;
    }
    .header{
        padding: 10;
    }
    .especialidad{
        font-family: 'Times New Roman', Times, serif;
        font-size: small;
    }
    .diagnostico{
        background-color:aliceblue;
        align-items: center;
        text-align: center;
        border: solid 1px #000;
        padding: 30px; 
    }
    .footer{
        padding: 10;
    }
    .border{
        border: dotted #000 1px;
    }
</style>
<body>
    <div class="contenedor">
        <div class='hospital'>
            <h1>Centro Medico</h1>
            <h2>{{ $hospital->nombre }}</h2>
        </div>
        <div class="header" >
            <div class="medico">
                <p> <strong>Medico :</strong> {{ $personaMedico->nombre }} {{ $personaMedico->apellidos }}</p>
                <p><strong>Paciente: </strong>{{ $personaPaciente->nombre }} {{ $personaPaciente->apellidos }} </p>
            </div>
        </div>
        <div class="diagnostico">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th >Resultado</th>
                            <th >Examen</th>
                            <th >Fecha Resultado</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td>{{ $examenes->resultado }}</td> 
                                <td>{{ $tipo->nombre }}</td> 
                                <td>{{ $examenes->fecha_resultado }}</td> 
                             
                            </tr>  
                    </tbody>
                </table>
        </div>
        </div>
        <div class="footer">
          Fecha Consulta : {{ $consulta->fecha_programada }}
        </div>
    </div>
    

</body>
</html>