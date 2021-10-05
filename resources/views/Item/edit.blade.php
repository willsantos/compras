@extends('layout')

@section('header')
    Editando o Item: {{$data->name}}
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/item/{{$data->id}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name" class="">Nome do item</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
        </div>
        <button class="btn btn-primary">Alterar</button>
    </form>
@endsection
