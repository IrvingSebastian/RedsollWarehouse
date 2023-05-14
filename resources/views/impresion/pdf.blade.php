<!DOCTYPE html>
<html>
    <head>
        <title>PDF</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            /* Estilos personalizados */        
            body{
                font-family: sans-serif;
            }
            table, table th, table td{
                border: 1px;
                border-collapse: collapse;
                text-align: center;
                font-size: smaller;
            }
            .table_ut, .table_ut th{
                width: 100%;
                background-color: transparent;
                text-align: center;
                font-size: medium;
            }
            .table_in, .table_in th{
                background-color: transparent;
                text-align: left;
                font-size: medium;
            }
            .line{
                width: 150px;
                border-bottom: 1px solid black;
            }
            .line2{
                width: 150px;
            }
            hr{
                width: 200px;
                margin-top: 10px;
                margin-right: auto;
                margin-left: auto;
                border-width: 1px;
                border-color: black;
            }
        </style>
    </head>
    
    <body>
        <table class="table_ut">
            <thead>
                <tr>
                    <th scope="col">
                        <img src="{{url('images/logo.png')}}" width="200px" height="75px" alt="logo">
                        <br>
                        {{ Auth::user()->rol }}:
                        <br>
                        {{ Auth::user()->name }}
                    </th>
                    <th scope="col">Salida de Material</th>
                    <th scope="col">FO-006<br>REV-00</th>
                </tr>
            </thead>
        </table>

        <br>
        <br>

        <table class="table_in">
            <thead>
                <tr>
                    <th>Jefe de Cuadrilla:</th>
                    <th class="line"></th>
                    <th class="line2"></th>
                    <th>Fecha:</th>
                    <th class="line"></th>
                </tr>
            </thead>
        </table>

        <br>
        
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID Productos</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Entradas</th>
                    <th scope="col">Salidas</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Cantidad Elegida</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($piezas as $key => $pieza)
                    <tr>
                        <td>{{ $pieza->id }}</td>
                        <td>{{ $pieza->codigo }}</td>
                        <td>{{ $pieza->descripcion }}</td>
                        <td>{{ $pieza->entradas }}</td>
                        <td>{{ $pieza->salidas }}</td>
                        <td>{{ $pieza->stock }}</td>
                        <td>{{ $cantidades[$key] }}</td>
                    </tr>
                @endforeach  
            </tbody>
        </table>

        <br>
        <br>

        <table class="table_ut">
            <thead>
                <tr>
                    <th><hr>Entrego</th>
                    <th><hr>Recibio</th>
                </tr>
            </thead>
        </table>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>