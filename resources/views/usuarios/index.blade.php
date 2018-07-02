@extends('layout')

@section('content')
<div class="col-sm-8">
        <h2>
            Listado de Usuarios
            <a  class="btn btn-primary pull-right">Nuevo</a>
        </h2>
        @include('products.fragment.info')

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th width="20px">ID</th>
                    <th>Nombre del producto</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                </tr>
            </thead>

            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td> <strong>{{$usuario->nombre}}</strong> </td>
                        <td> <strong>{{$usuario->correo}}</strong> </td>
                        <td> <strong>{{$usuario->telefono}}</strong> </td>

                        <td> 
                            <a  class="btn btn-link">ver</a> 
                        </td>
                        <td>
                            <a  class="btn btn-link">editar</a>
                        </td>

                        <td>
                            <form  method="POST">
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-link">Borrar</button>
                            </form>
                        </td>
                                                
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

@endsection