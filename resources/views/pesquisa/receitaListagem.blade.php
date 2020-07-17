@extends('layouts.app')
<style>
    .itens-receita span{
      color:  #183153;
      font-weight: 700;
      text-transform:lowercase;
      text-align: left !important;
    }
    .itens-receita p{
       text-align: left !important;
    }

    .itens-exames {
       text-transform:lowercase;
    }

</style>
@section('content')
    <div class="container">
        @component('consulta.componentes.dadosPaciente')@endcomponent
        @component('consulta.componentes.menuConsulta')@endcomponent
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="example" class="icone table  table-bordered shadow p-3 mb-5 bg-white rounded mt-3" style="width:100%">
                    @if(session('receita'))
                        <thead>
                            <tr>
                                <th>Receita(s) do Paciente</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody class='itens-receita'>
                                @foreach (session('receita') as $item)
                                    <tr>
                                        <td>
                                        <p><span>Medicamento:</span> {{$item['nome_fabrica']}}</p>
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
        <!--Exames-->
        <div class="row">
            <div class="col-lg-12">
                <table id="example" class="icone table  table-bordered shadow p-3 mb-5 bg-white rounded mt-3" style="width:100%">
                    @if(session('exames'))
                        @inject('exame', 'App\Exame')
                            <thead>
                                <tr>
                                    <th>Relação de exames Selecionados
                                        <!--<a href="{{route('editarExame',[ 'key'=> 1])}}"><i class="fas fa-edit"></i></a>-->
                                    </th>
                                </tr>
                            </thead>
                            <tbody class='itens-exames'>
                                @foreach (session('exames') as $item)
                                    @foreach ($item as $i)
                                        @foreach($exame->getExameId($i) as $key)
                                            <tr>
                                                <td>{{$key->nome}}</td>
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
    
