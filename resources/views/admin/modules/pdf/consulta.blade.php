<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            h4{
            text-align: center;
            text-transform: uppercase;
            }
            .contenido{
            font-size: 20px;
            }
            #primero{
            background-color: #ccc;
            }
            #segundo{
            color:#44a359;
            }
            #tercero{
            text-decoration:line-through;
            }
        </style>
        <style>
            .factura {
                table-layout: fixed;
              }
              
              .fact-info > div > h5 {
                font-weight: bold;
              }
              
              .factura > thead {
                border-top: solid 3px #000;
                border-bottom: 3px solid #000;
              }
              
              .factura > thead > tr > th:nth-child(2), .factura > tbod > tr > td:nth-child(2) {
                width: 300px;
              }
              
              .factura > thead > tr > th:nth-child(n+3) {
                text-align: right;
              }
              
              .factura > tbody > tr > td:nth-child(n+3) {
                text-align: right;
              }
              
              .factura > tfoot > tr > th, .factura > tfoot > tr > th:nth-child(n+3) {
                font-size: 24px;
                text-align: right;
              }
              
              .cond {
                border-top: solid 2px #000;
              }
        </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    </div><div id="app" class="col-11">

        <h2>Factura</h2>
    
        <div class="row my-3">
          <div class="col-10">
            <h1>Mil Pasos</h1>
            <p>Av. Winston Churchill</p>
            <p>Plaza Orleans 3er. nivel</p>
            <p>local 312</p>
          </div>
          <div class="col-2">
            <img src="~/images/Mil-Pasos_Negro.png" />
          </div>
        </div>
      
        <hr />
      
        <div class="row fact-info mt-3">
          <div class="col-3">
            <h5>Facturar a</h5>
            <p>
              Arian Manuel Garcia Reynoso
            </p>
          </div>
          <div class="col-3">
            <h5>Enviar a</h5>
            <p>
              Cotui, Sanchez Ramirez
              Santa Fe, #19
              arianmanuel75@gmail.com
            </p>
          </div>
          <div class="col-3">
            <h5>N° de factura</h5>
            <h5>Fecha</h5>
            <h5>Fecha de vencimiento</h5>
          </div>
          <div class="col-3">
            <h5>103</h5>
            <p>09/05/2019</p>
            <p>09/05/2019</p>
          </div>
        </div>
      
        <div class="row my-5">
          <table class="table table-borderless factura">
            <thead>
              <tr>
                <th>Cant.</th>
                <th>Descripcion</th>
                <th>Precio Unitario</th>
                <th>Importe</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Clases de Cha-Cha-Cha</td>
                <td>3,000.00</td>
                <td>3,000.00</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Clases de Salsa</td>
                <td>4,000.00</td>
                <td>12,000.00</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th>Total Factura</th>
                <th>RD$15,000.00</th>
              </tr>
            </tfoot>
          </table>
        </div>
      
        <div class="cond row">
          <div class="col-12 mt-3">
            <h4>Condiciones y formas de pago</h4>
            <p>El pago se debe realizar en un plazo de 15 dias.</p>
            <p>
              Banco Banreserva
              <br />
              IBAN: DO XX 0075 XXXX XX XX XXXX XXXX
              <br />
              Código SWIFT: BPDODOSXXXX
            </p>
          </div>
        </div>
    </div>

    </body>
</html>