@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h2>
            Listado de Produuctos
            <a href="{{ route('product.create') }}" class="btn btn-primary pull-right">Nuevo</a>
        </h2>
        @include('products.fragment.info')
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th width="20px">ID</th>
                    <th>Nombre </th>
                    <th>Correo </th>
                    <th>Telefono </th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td> <strong>{{$product->nombre}}</strong> </td>
                        <td> <strong>{{$product->correo}}</strong></td>
                        <td> <strong>{{$product->telefono}}</strong></td>
                        <td>
                            <a href="{{ route('product.edit', $product->id )}}" class="btn btn-link">editar</a>
                        </td>

                        <td>
                            <form action="{{route('product.destroy', $product->id)}}" method="POST">
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-link">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $products->render() !!}
    </div>

    <div class="col-sm-4">
        @include('products.fragment.aside')
    </div>


@endsection