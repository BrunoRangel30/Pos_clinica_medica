@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <label class="subTitulomaisInfo pt-2 pb-2">Usuários</label>
                        <!--<form method="POST" action="{{ route('login') }}">-->
                            @csrf
                            <div class="form-group row">
                                <table class="icone table shadow p-3 mb-5 table-bordered table-bordered">
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
                                                    <a  href="{{route('admin.users.edit',$item->id)}}"> <i class="fas fa-edit"></i> </a>
                                                    @method('DELETE')
                                                    <a  href="{{route('excluirUser',['idPac'=> $item])}}"> <i class="fas fa-user-times"></i> </a>
                                                   <!-- <form class='float-left'method="POST" action="{{ route('admin.users.destroy', $item) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-light"><i class="fas fa-user-times"></i></button>
                                                    </form>-->
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
@endsection

