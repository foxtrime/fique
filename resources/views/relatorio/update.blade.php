@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-success card-header-icon">
				<div class="card-icon" style="background: linear-gradient(60deg, #BFA15F, #ad7909);box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(191, 161, 95, 0.4);">
					<i class="material-icons">chat bubble</i>
				</div>
				<h4 class="card-title">Editar</h4>                
			</div>
			<div class="card-body">
			<form action="">
				{{-- {{$relatorio->id}} --}}
				@foreach ($perguntas as $pergunta)
						<div class="form-group">
							<label for="exampleFormControlInput1" style="color: black">{{$pergunta->titulo}}</label>
						</div>
						@foreach ($modulo_ti as $item)
							@if ($item->pergunta_id == $pergunta->id)

							 
							
							{{-- <div class="row" id="gallery-box">
								<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
									<input type="text" class="form-control" id="id" name="id[]" placeholder="N° Chamado" value="{{$item->id}}">
								  </div>
								<div class="form-group box_funcionario ">
									<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
									  <input type="text" class="form-control" id="n_chamado" name="n_chamado[]" placeholder="N° Chamado" value="{{$item->n_chamado}}">
									</div>
									<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
									  <input type="text" class="form-control" id="obs" name="obs[]" placeholder="Obs" value="{{$item->obs}}">
									</div>
									<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-sm-6 col-lg-6">
										<a class="clonarei btn btn-primary btn-fab btn-fab-mini btn-round">
											<i class="material-icons">favorite</i>
										</a>
									</div>
								  </div>
							</div> --}}
							@endif
						@endforeach
						
				@endforeach

			</form>
		   </div>
	   </div>
   </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	
</script>

@endpush
