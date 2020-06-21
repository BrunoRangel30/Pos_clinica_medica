@extends('layouts.app')
@section('content')
    <div class="container">
        @component('consulta.componentes.dadosPaciente')@endcomponent
        @component('consulta.componentes.menuConsulta')@endcomponent
        <div class="row">
            <div class="col-lg-12">
                <table id="example" class="icone table table-striped table-bordered" style="width:100%">
                    @if(session('receita'))
                        <thead>
                            <tr>
                                <th>Receita(s) do Paciente</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (session('receita') as $item)
                                    <tr>
                                        <td>{{$item['nome_fabrica']}}
                                        <div class="collapse" id="collapseExample-{{$loop->index}}">
                                            <p><span>Quantidade:</span> {{$item['qtd']}}</p>
                                            <p><span>Via:</span> {{$item['via']}}</p>
                                            <p><span>Unidade:</span> {{$item['unidade']}}</p>
                                            <p><span>Procedimento:</span> {{$item['procedimento']}}</p>
                                        </div>
                                    </td>
                                        <td>
                                            <a href="{{route('editarReceita',[ 'key'=> $loop->index])}}"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('excluirReceita',[ 'key'=> $loop->index])}}"><i class="fas fa-trash-alt"></i></a>
                                        <a data-toggle="collapse" data-target="#collapseExample-{{$loop->index}}" ><i class="fas fa-plus-square"></i></a>
                                        </td>
                                     
                                    </tr>
                                @endforeach
                            </tbody>
                    @endif
                </table>  
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="example" class="icone table table-striped table-bordered" style="width:100%">
                    @if(session('exames'))
                    @inject('exame', 'App\Exame')
                        <thead>
                            <tr>
                                <th>Relação de exames</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (session('exames') as $item)
                                    @foreach ($item as $i)
                                        @foreach($exame->getExameId($i) as $key)
                                            <tr>
                                                <td>{{$key->nome}}</td>
                                                <td>
                                                    @method('DELETE')
                                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                                    <a><i class="fas fa-plus-square"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tbody>
                    @endif
                </table>  
            </div>
        </div>
    </div> 
@endsection
    
