<!DOCTYPE html>
<html>
    <head>
        <title>PDF</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <style>
            /* Estilos personalizados */
            body{
                font-family: sans-serif;
            }

            .card-header {
                background-color: #f0f0f0;
            }
            .card-body {
                padding: 20px;
            }
            .table-responsive {
                max-height: 400px;
                max-width: 50px;
                overflow: auto;
            }

            table, th, td{
                border: 1px;
                border-collapse: collapse;
            }
            th, td{
                padding: 5px;
            }


        </style>
    </head>
    
    <body>
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    <img src="{{url('images/logo2.png')}}" alt="#" />
                    {{ __('Salida de Material Adaptaciones Hidraulicas') }}
                </span>
            </div>
        </div>



        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    {{ __('Jefe de Cuadrilla: ________________________________    Fecha: _______________') }}
                </span>
            </div>
        </div>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID Productos</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Entradas</th>
                    <th scope="col">Salidas</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($piezas as $pieza)
                    <tr>
                        <td>{{ $pieza->id }}</td>
                        <td>{{ $pieza->codigo }}</td>
                        <td>{{ $pieza->descripcion }}</td>
                        <td>{{ $pieza->entradas }}</td>
                        <td>{{ $pieza->salidas }}</td>
                        <td>{{ $pieza->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    {{ __('Entrego: _______________________') }}
                    {{ __('Recibo: _______________________') }}
                </span>
            </div>
        </div>

        
    </body>
</html>