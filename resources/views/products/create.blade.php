@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h2>
           Crear producto
           <a href="{{ route('product.index')}}" class="btn btn-default pull-right">Listado</a>
        </h2>

        @include('products.fragment.error')

        {!! Form::open(['route' => 'product.store']) !!}

            @include('products.fragment.form')

        {!! Form::close() !!}
    </div>

    <div class="col-sm-4">
        @include('products.fragment.aside')
    </div>


@endsection 