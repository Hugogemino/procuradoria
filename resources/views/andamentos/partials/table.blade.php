@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning">
        {{ session()->get('warning') }}
    </div>
@endif

<table id="andamentosTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Processo</th>
        <th>Tipo de andamento</th>
        <th>Tipo de entrada</th>
        <th>Tipo de prazo</th>
        <th>Data prazo</th>
        <th>Data de entrega</th>
        <th>Observação</th>
    </tr>
    </thead>


    @forelse ($andamentos as $andamento)
        <tr>
            <td><a href="{{ route('andamentos.show',['id' => $andamento->id]) }}">{{ isset($andamento->processo) ? $andamento->processo->numero_judicial : '' }}</a></td>
            <td>{{ $andamento->tipoAndamento->nome }}</td>
            <td>{{ is_null($andamento->tipoEntrada)? '' : $andamento->tipoEntrada->nome }}</td>
            <td>{{ is_null($andamento->tipoPrazo) ? '' :$andamento->tipoPrazo->nome }}</td>
            <td>{{ $andamento->data_prazo_formatado }}</td>
            <td>{{ $andamento->data_entrega_formatado }}</td>
            <td>{{ $andamento->observacoes }}</td>
        </tr>
    @empty
        <p>Nenhum andamento encontrado</p>
    @endforelse
</table>
