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
				<form action="{{ url("relatorio/$relatorio->id") }}" method="POST" id="form_relatorio">
					{!! method_field('PUT') !!}
						{{ csrf_field() }}

				<h2>T.I</h2>	
				@foreach ($perguntas as $pergunta)
					<div class="form-group-{{$pergunta->id}}">
						<label for="exampleFormControlInput1" style="color: black">{{$pergunta->titulo}}</label>
						<button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador{{$pergunta->id}}">
							<i class="material-icons">add</i>
						</button>
							<div id="ti_box_{{$pergunta->id}}">
								<div class="ti-box-{{$pergunta->id}} row hide" id="ti-box">
									<div class="form-group box_funcionario ">
										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
											<input type="text" class="form-control" id="id" name="id[]" placeholder="N° Chamado" value="">
										</div>

										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
											<input type="text" class="form-control" id="pergunta_id" name="pergunta_id[]" value="{{$pergunta->id}}">
										</div>

										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
											<input type="text" class="form-control" id="n_chamado" name="n_chamado[]" placeholder="N° Chamado">
										</div>

										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
											<input type="text" class="form-control" id="obs" name="obs[]" placeholder="Obs">
										</div>
										
										<button type="button" class="btn btn-primary btn_remove_{{$pergunta->id}}">Remover</button>
										{{-- <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador{{$pergunta->id}}">
											<i class="material-icons">add</i>
										</button> --}}

									</div>
								</div>
							</div>
							
							@foreach ($modulo_ti as $item)
							@if ($item->pergunta_id == $pergunta->id)
							<div class="ti-box-e row" id="ti-box-e">
								<div class="form-group box_funcionario ">
									<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
										<input type="text" class="form-control" id="id" name="id[]" placeholder="N° Chamado" value="{{$item->id}}">
									</div>
									<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
										<input type="text" class="form-control" id="pergunta_id" name="pergunta_id[]" value="{{$pergunta->id}}">
									</div>
									<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
										<input type="text" class="form-control" id="n_chamado" name="n_chamado[]" placeholder="N° Chamado" value="{{$item->n_chamado}}">
									</div>
									<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
										<input type="text" class="form-control" id="obs" name="obs[]" placeholder="Obs" value="{{$item->obs}}">
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
				@endforeach





				<!-- ============================BOTOES============================ -->
				<div class="row col-md-12 col-sm-12">
					<div>
						<div class="footer text-center">
							<button type="submit" id="enviar-relatorio" class="botoes-acao btn btn-round btn-success enviar-relatorio">
								<span class="icone-botoes-acao mdi mdi-send"></span>
								<span class="texto-botoes-acao"> ENVIAR </span>
								<div class="ripple-container"></div>
							</button>
		
							<button id="btn_cancelar" class="botoes-acao btn btn-round btn-primary" >
								<span class="icone-botoes-acao mdi mdi-backburger"></span>   
								<span class="texto-botoes-acao"> CANCELAR </span>
								<div class="ripple-container"></div>
							</button>
						</div>
					</div>
				</div>
				<!-- ============================FIM BOTOES============================ -->
				
			</form>
		   </div>
	   </div>
   </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

$(function(){
      $('body').submit(function(event){
				if ($(this).hasClass('enviar-relatorio')) {
					event.preventDefault();
				}
				else {
					$(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
					$(this).addClass('enviar-relatorio');
				}
			});
			

			$('.clonador1').click(function(){
					$clone = $('.ti-box-1.hide').clone(true);
					$clone.removeClass('hide');
					$('#ti_box_1').append($clone);
				});
				$('.btn_remove_1').click(function(){
					$(this).parents('.ti-box-1').remove();
				});

				$('.clonador2').click(function(){
					$clone = $('.ti-box-2.hide').clone(true);
					$clone.removeClass('hide');
					$('#ti_box_2').append($clone);
				});
				$('.btn_remove_2').click(function(){
					$(this).parents('.ti-box-2').remove();
				});

				$('.clonador3').click(function(){
					$clone = $('.ti-box-3.hide').clone(true);
					$clone.removeClass('hide');
					$('#ti_box_3').append($clone);
				});
				$('.btn_remove_3').click(function(){
					$(this).parents('.ti-box-3').remove();
				});

				$('.clonador4').click(function(){
					$clone = $('.ti-box-4.hide').clone(true);
					$clone.removeClass('hide');
					$('#ti_box_4').append($clone);
				});
				$('.btn_remove_4').click(function(){
					$(this).parents('.ti-box-4').remove();
				});

				$('.clonador5').click(function(){
					$clone = $('.ti-box-5.hide').clone(true);
					$clone.removeClass('hide');
					$('#ti_box_5').append($clone);
				});
				$('.btn_remove_5').click(function(){
					$(this).parents('.ti-box-5').remove();
				});

				$('.clonador6').click(function(){
					$clone = $('.ti-box-6.hide').clone(true);
					$clone.removeClass('hide');
					$('#ti_box_6').append($clone);
				});
				$('.btn_remove_6').click(function(){
					$(this).parents('.ti-box-6').remove();
				});


				// $('.clonador2').click(function(){
				// 	$clone = $('.ti-box-2.hide').clone(true);
				// 	$clone.removeClass('hide');
				// 	$('#ti_box_2').append($clone);
				// });
				// $('.btn_remove').click(function(){
				// 	$(this).parents('.ti-box').remove();
				// });

			


			$("#btn_cancelar").click(function(){
		      event.preventDefault();
            window.location.href='/relatorio';
	      });
      	});
		 
</script>

@endpush




