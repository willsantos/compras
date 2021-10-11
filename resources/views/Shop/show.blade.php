@extends('layout')

@section('header')
    Lista de compras: {{$data->name}}
@endsection

@section('content')
    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif
    <a href="{{route('form_shop_edit',$data->id)}}" class="btn btn-dark mb-2">Alterar nome da Lista</a>
    <form action="/test" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="">Nome do item</label>
            <input type="text" class="form-control" name="name" id="name">
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
    <ul class="list-group mt-2">

        @foreach($items as $item)
            @if($item->list_items->status===1)
                <li class="list-group-item">{{$item->name}}</li>
            @endif
        @endforeach
    </ul>
    <hr>
    <ul class="list-group">
        @foreach($items as $item)
            @if($item->list_items->status===0)
                <li class="list-group-item"><s>{{$item->name}}</s></li>
            @endif
        @endforeach
    </ul>
    <ul>

    </ul>
@endsection
