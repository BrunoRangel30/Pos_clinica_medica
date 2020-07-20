<style>
  
    .list-receitas-pdf li{
      list-style-type: none;
      padding: 5px; 
     
   }
   .header img{
      width: 25%;
   }
   .receitasTitulos{
      text-align: center;
      text-transform: uppercase;
      font-weight: 500;

   }
   .carimbo{
      text-align: center;
      margin-top: 170px;
   }
</style>
<div class='tamanho-papel list-receitas-pdf'>
    <table>
        <tr class='header'>
          <td> <img src="{{asset('assets/img/logo_size.jpg')}}"></td>
          <td>
             <p>Clinica Viver Mais</p>
             <p>Endereço: 3º Andar, SHCS Setor Hospitalar Sul, Torre I Salas 320-324, Brasília - DF 70390-700</p>
           </td> 
        </tr>
    </table>
    <!--Dados do Paciente-->
    <p>Nome do Paciente: {{$paciente->nome}} 
        <p>CPF : {{$paciente->cpf}}</p>
        @php
          $date = date_create(date($paciente->data_nasc));
          $date = date_format($date, 'd/m/Y');
        @endphp
        <p>Data de Nascimento: {{$date}}</p>
    <p class='receitasTitulos'>Receituário</p>
    <ul>
        @foreach ($receita as $item)
            <li>{{$item->qtd}} - {{$item->nome_fabrica}} </li>
            <!--<li>Quantidade: {{$item->qtd}}</li>-->
            <li>Unidade: {{$item->unidade}}</li>
            <li>Via: {{$item->via}}</li>
            <li>{{$item->procedimento}}</li>
        @endforeach
    </ul>
    @php
        date_default_timezone_set('America/Sao_Paulo');
        $date = date_create(date('Y/m/d',time()));
        $dataAtual = date_format($date, 'd/m/Y');
    @endphp
    <p>Data: {{$dataAtual}}</p>
    <p class="carimbo">Assinatura e Carimbo</p>
</div>