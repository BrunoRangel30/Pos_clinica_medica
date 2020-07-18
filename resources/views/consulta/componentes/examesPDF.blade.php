<style>
   .list-exames-pdf li{
      list-style-type: none;
      padding-bottom: 5px; 
      text-transform:lowercase;
   }
   .header img{
      width: 25%;
   }
   .examesTitulos{
      text-align: center;
   }
   .carimbo{
      text-align: center;
      margin-top: 170px;
   }
</style>
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
      <!--Exames-->
      <p class="examesTitulos">Exames Solicitados <p>
      @foreach ($exame as $item)
         <div class='list-exames-pdf'>
            <ul>
               <li>{{$item->exame}}</li>
            </ul>
         </div>
      @endforeach
      
      <p class="carimbo">Assinatura e Carimbo</p>