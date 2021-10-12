@extends('layout')

@section('header')
    Lista de compras: {{$data->name}}
@endsection

@section('content')
    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif
    @if(!empty($error_add))
        <div class="alert alert-danger">{{$error_add}}</div>
    @endif
    <a href="{{route('form_shop_edit',$data->id)}}" class="btn btn-dark mb-2">Alterar nome da Lista</a>

    <form action="/test" method="post" class="d-flex justify-content-between align-items-center border border-success">
        @csrf
        <div class="form-group w-100 m-2">

            <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Item">
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>
        <span class="p-2 d-flex align-middle">

                <select class="bootstrap-select align-text-bottom m-2" name="priority">
                    <option value="1" selected="selected">Preciso</option>
                    <option value="0">Urgente</option>
                    <option value="2">Seria bom</option>
                </select>

                <button class="btn btn-primary m-2">Adicionar</button>
            </span>
    </form>

    <ul class="list-group mt-2">
        @foreach($items as $item)
            @if($item->list_items->status===0)
                <li class="list-group-item">{{$item->name}}
                    @if($item->list_items->priority ===0)

                        <span class="badge bg-danger">{{$item->priorityFormatted}}</span></li>
            @elseif($item->list_items->priority ===1)
                <span class="badge bg-warning">{{$item->priorityFormatted}}</span></li>
            @else
                <span class="badge bg-secondary">{{$item->priorityFormatted}}</span></li>
            @endif
            @endif
        @endforeach
    </ul>
    <hr>
    <ul class="list-group">
        @foreach($items as $item)
            @if($item->list_items->status===1)
                <li class="list-group-item"><s>{{$item->name}}</s></li>
            @endif
        @endforeach
    </ul>
    <ul>

    </ul>
@endsection
