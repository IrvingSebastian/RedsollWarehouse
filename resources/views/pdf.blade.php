<!DOCTYPE html>
<html>
    <head>
        <title>Título de la página</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <style>
            /* Estilos personalizados */
            .card-header {
                background-color: #f0f0f0;
            }
            .card-body {
                padding: 20px;
            }
            .table-responsive {
                max-height: 400px;
                overflow: auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    {{ __('Pieza') }}
                                </span>
                            </div>
                        </div>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>ID Productos</th>
                                            <th>Codigo</th>
                                            <th>Descripcion</th>
                                            <th>Entradas</th>
                                            <th>Salidas</th>
                                            <th>Stock</th>
                                            <th></th>
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
</div>
</div>
</div>
</div>
</div>
</div>
</body>

</html>