@extends('layout')

@section('header')
    Lista de compras: {{$data->name}}
@endsection

@section('content')
    <ul>
        <li>Aqui vai a lista de items</li>
    </ul>
@endsection
