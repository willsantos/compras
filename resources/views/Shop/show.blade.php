@extends('layout')

@section('header')
    Lista de compras: {{$data->name}}
@endsection

@section('content')
    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif
    <ul class="list-group">
        <a href="{{route('form_shop_edit',$data->id)}}" class="btn btn-dark mb-2">Alterar nome da Lista</a>
        <li class="list-group-item">Aqui vai a lista de items</li>
        @foreach($items as $item)
            <li class="list-group-item">{{$item->name}}</li>
        @endforeach
    </ul>
@endsection
