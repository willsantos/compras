@extends('layout')

@section('header')
    Listas de compras
@endsection

@section('content')
    @if(count($lists) === 0)
        Não existem listas<br/>
    @endif
    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif

    <ul class="list-group">
        <a href="{{route('form_shop_create')}}" class="btn btn-primary mtb-4">Criar lista</a>
        @foreach($lists as $list)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$list->name}}
                <span class="d-flex align-items-center">
                    <a href="{{route('show_list',$list->id)}}"><i class="fas fa-eye fa-2x" aria-hidden="true"></i></a>
                    <form method="post" action="{{route('remove_list',$list->id)}}"
                          onsubmit="return confirm('Deseja remover a lista {{addslashes($list->name)}}')">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger ms-2"><i class="far fa-trash-alt"> Excluir </i></button>
                    </form>
                </span>
            </li>
        @endforeach

    </ul>
@endsection
