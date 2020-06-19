<style>
    .tamanho-papel {margin: 30px 30px 30px 30px}
</style>
<div class='tamanho-papel'>
    <h4>Receitas</h4>
    <ul>
        @foreach ($receita as $item)
            <li>Nome Medicamento: {{$item->nome_fabrica}}</li>
            <li>Quantidade: {{$item->qtd}}</li>
            <li>Unidade: {{$item->unidade}}</li>
            <li>Via: {{$item->via}}</li>
            <li>Procedimento: {{$item->procedimento}}</li>
            <hr/>
        @endforeach
    </ul>
</div>