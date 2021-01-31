@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-success card-header-icon">
				<div class="card-icon" style="background: linear-gradient(60deg, #BFA15F, #ad7909);box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(191, 161, 95, 0.4);">
					<i class="material-icons">chat bubble</i>
				</div>
				<h4 class="card-title">Relatorios</h4>
                {{-- <a href="{{ url("/relatorio/create")}}" class="btn btn-dourado btn-just-icon btn-round" style="float: right;top: -33px;right: -13px;"><i class="mdi mdi-plus" rel="tooltip" data-placement="left" title="Novo Relatorio"></i></a>					 --}}
			</div>
			<div class="card-body">
				<div class="toolbar"></div>
				<div class="material-datatables">
					<table id="unidades" class="table table-striped table-no-bordered table-hover" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>Nome da Unidade</th>
								<th>Data Do Relatorio</th>
								<th class="disabled-sorting text-right" style="width: 16%;">Ações</th>
								<th>Chamado Aberto</th>
							</tr>
						</thead>
                        <tbody>
                            @foreach ($relatorios as $relatorio)
                                <tr>
									<td>{{$relatorio->unidade->nome}}</td>
									<td>{{$relatorio->data}}</td>
									{{-- <td class="actions"></td> --}}
									<td><a class="btn_ativa btn btn-warning btn-xs action   botao_acao" 
										data-toggle="tooltip" 
										data-placement="bottom" 
										title="Editar"
										href="{{ url('relatorio/' . $relatorio->id . '/edit' )}}">  
										<i class="glyphicon glyphicon-pencil "></i>
									</a></td>
									<td>
										{{-- fazer um foreach no modulo ti pra iterar os chamados --}}
										@if ($relatorio->modulo_ti[0]->chamado_aberto == 1)
											{{-- Colocar icone de alerta --}}
										@endif
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
@push('scripts')
	
@endpush
