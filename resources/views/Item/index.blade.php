@extends('layout')

@section('header')
    Lista de Items
@endsection

@section('content')
    @if(count($items) === 0)
        Não existem Items<br/>
    @endif
    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif

    <ul class="list-group">
        <a href="{{route('form_item_create')}}" class="btn btn-primary mtb-4">Criar Item</a>
        @foreach($items as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$item->name}}
                <span class="d-flex align-items-center">
                    <a href="{{route('show_list',$item->id)}}"><i class="fas fa-eye fa-2x" aria-hidden="true"></i></a>
                    <form method="post" action="{{route('remove_list',$item->id)}}"
                          onsubmit="return confirm('Deseja remover a lista {{addslashes($item->name)}}')">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger ms-2"><i class="far fa-trash-alt"> Excluir </i></button>
                    </form>
                </span>
            </li>
        @endforeach

    </ul>
@endsection
