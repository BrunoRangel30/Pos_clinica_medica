@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">Usuários</div>
                    <div class="card-body">
                        <!--<form method="POST" action="{{ route('login') }}">-->
                            @csrf
                            <div class="form-group row">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Perfil(s)</th>
                                        <th scope="col">Ações</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{ implode(',', $item->roles()->get()->pluck('nome')->toArray())}}</td>
                                                <td>
                                                    <a  href="{{route('admin.users.edit',$item->id)}}"><button type="button" class="btn btn-light float-left mr-2">Editar</button></a>
                                                    <form class='float-left'method="POST" action="{{ route('admin.users.destroy', $item) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-light">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

