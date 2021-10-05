@extends('layout')

@section('header')
    Editando a lista: {{$data->name}}
@endsection

@section('content')
    <form action="/shop/{{$data->id}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name" class="">Nome da Lista</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
        </div>
        <button class="btn btn-primary">Alterar</button>
    </form>
@endsection
