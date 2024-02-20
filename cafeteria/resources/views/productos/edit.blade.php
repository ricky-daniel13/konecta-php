<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cafeteria Konecta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Editando Producto</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{route('productos.update', $producto->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mb-3">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $producto->nombre }}">
                        @error('nombre')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <strong>Referencia:</strong>
                        <input type="text" name="referencia" class="form-control" placeholder="Referencia" value="{{ $producto->referencia }}">
                        @error('referencia')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" name="precio" placeholder="Precio" value="{{ $producto->precio }}">
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Stock</span>
                        <input type="number" class="form-control" name="stock" placeholder="Stock" value="{{ $producto->stock }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Peso</span>
                        <input type="number" class="form-control" name="peso" placeholder="Peso" value="{{ $producto->peso }}">
                        <span class="input-group-text">g</span>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="idCategoria">
                            @foreach ($categorias as $categoria)
                                <option @if ($categoria->id == $producto->idCategoria) selected @endif value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Crear</button>
            </div>
        </form>
    </div>
</body>

</html>
