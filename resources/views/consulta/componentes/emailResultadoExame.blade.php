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
    <p>Olá {{$nome}}</p>
    <p> Seu exame {{$exame}} já está disponível para consulta. </p>
    <p> Acesse o sistema com seu usuário e senha. </p>
    <p>Atenciosamente,</p>
    <a href=""> Clínica Viver Mais </a>
    
</div>