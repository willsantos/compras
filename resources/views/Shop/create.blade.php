@extends('layout')

@section('header')
    Criar uma nova lista
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
    <form action="/shop" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="">Nome da Lista</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <button class="btn btn-primary">Criar</button>
    </form>
@endsection
