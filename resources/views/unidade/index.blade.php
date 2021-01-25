@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-success card-header-icon">
				<div class="card-icon" style="background: linear-gradient(60deg, #BFA15F, #ad7909);box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(191, 161, 95, 0.4);">
					<i class="material-icons">chat bubble</i>
				</div>
				<h4 class="card-title">Unidades</h4>
                <a href="{{ url("/unidade/create")}}" class="btn btn-dourado btn-just-icon btn-round" style="float: right;top: -33px;right: -13px;"><i class="mdi mdi-plus" rel="tooltip" data-placement="left" title="Novo Relatorio"></i></a>					
                    {{-- @if($guardagcmm)
						<a href="{{ url("/semsop/create")}}" class="btn btn-dourado btn-just-icon btn-round" style="float: right;top: -33px;right: -13px;"><i class="mdi mdi-plus" rel="tooltip" data-placement="left" title="Novo Relatorio"></i></a>					
					@endif --}}
			</div>
			<div class="card-body">
				<div class="toolbar"></div>
				<div class="material-datatables">
					<table id="unidades" class="table table-striped table-no-bordered table-hover" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>Nome</th>
								<th class="disabled-sorting text-right" style="width: 16%;">Ações</th>
							</tr>
						</thead>
                        <tbody>
                            @foreach ($unidades as $unidade)
                                <tr>
                                    <td>{{$unidade->nome}}</td>
                                    <td class="actions"></td>
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

{{-- <form method="POST" id="form_deletar_relatorio">
	<input type="hidden" name="_method" value="DELETE" />
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form> --}}

@endpush
