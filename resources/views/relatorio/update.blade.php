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

						{{-- Div Ti --}}
						<div>
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
												<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_{{$pergunta->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
												
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
												{{-- <button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_{{$pergunta->id}}"> <i class='glyphicon glyphicon-trash'></i></button> --}}
												@if($item->chamado_aberto == 1)
													<button type="button" 
															class="btn btn-success btn-xs action botao_acao btn_control btn_enviar{{$item->id}}"
															id="btn_enviar{{$item->id}}"
															>
															<i class='glyphicon glyphicon-ok'></i>
													</button>
												@endif
											</div>
										</div>
										@endif
									@endforeach
								</div>
							@endforeach
						</div>
					{{-- Div Ti Fim --}}
					
					{{-- Div Atenção básica (Médicos, enfermeiros e técnicos) --}}
					<div>
						<h2>Atenção básica (Médicos, enfermeiros e técnicos)</h2>
						{{-- <div class="form-group">
							<label for="exampleFormControlInput1" style="color: black"></label>
							<button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round ">
								<i class="material-icons">add</i>
							</button>
							<div id="infra_box_">
								<div class="infra-box- row" id="infra-box">
									<div class="form-group box_funcionario">
										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
											<input type="text" class="form-control" id="id_at_basi" name="id_at_basi[]" placeholder="N° Chamado" value="">
										</div>

										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
											<input type="text" class="form-control" id="pergunta_id_at_basi" name="pergunta_id_at_basi[]" value="">
										</div>

										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
											<div class="form-group ">
												<label for="inputState">Funcionario</label>
												<select id="inputState" class="form-control">
												  <option selected>Selecione um Funcionario</option>
												  <option>...</option>
												  <option>...</option>
												  <option>...</option>
												</select>
											</div>
										</div>
										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
											<input type="text" class="form-control" id="at_basi" name="at_basi[]" placeholder="Obs">
										</div>
										<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control"><i class='glyphicon glyphicon-trash'></i></button>
									</div>
								</div>
							</div>
						</div> --}}


					</div>
					{{-- Div Atenção básica (Médicos, enfermeiros e técnicos) Fim  --}}

					{{-- Div Infraestrutura Predial  --}}
					<div>
						<h2>Infraestrutura Predial</h2>
						@foreach ($perguntas_Infraestrutura as $pergunta_Infraestrutura)
							<div class="form-group-{{$pergunta_Infraestrutura->id}}">
								<label for="exampleFormControlInput1" style="color: black">{{$pergunta_Infraestrutura->titulo}}</label>
								<button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador_infra{{$pergunta_Infraestrutura->id}}">
									<i class="material-icons">add</i>
								</button>
								<div id="infra_box_{{$pergunta_Infraestrutura->id}}">
									<div class="infra-box-{{$pergunta_Infraestrutura->id}} row hide" id="infra-box">
										<div class="form-group box_funcionario ">
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
												<input type="text" class="form-control" id="id_infra" name="id_infra[]" placeholder="N° Chamado" value="">
											</div>
										
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
												<input type="text" class="form-control" id="pergunta_id_infra" name="pergunta_id_infra[]" value="{{$pergunta_Infraestrutura->id}}">
											</div>
										
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
												<input type="text" class="form-control" id="n_chamado_infra" name="n_chamado_infra[]" placeholder="N° Chamado">
											</div>
										
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
												<input type="text" class="form-control" id="obs_infra" name="obs_infra[]" placeholder="Obs">
											</div>
											<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_infra_{{$pergunta_Infraestrutura->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
											
											{{-- <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador{{$pergunta->id}}">
												<i class="material-icons">add</i>
											</button> --}}
										</div>
									</div>
								</div>
								@foreach ($modulo_infraestrutura_predial as $item1)
									@if ($item1->pergunta_id_infra == $pergunta_Infraestrutura->id)
										<div class="infra-box-e row" id="infra-box-e">
											<div class="form-group box_funcionario">
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
													<input type="text" class="form-control" id="id_infra" name="id_infra[]" placeholder="N° Chamado" value="{{$item1->id_infra}}">
												</div>
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
													<input type="text" class="form-control" id="pergunta_id_infra" name="pergunta_id_infra[]" value="{{$pergunta_Infraestrutura->id}}">
												</div>
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
													<input type="text" class="form-control" id="n_chamado_infra" name="n_chamado_infra[]" placeholder="N° Chamado" value="{{$item1->n_chamado_infra}}">
												</div>
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
													<input type="text" class="form-control" id="obs_infra" name="obs_infra[]" placeholder="Obs" value="{{$item1->obs_infra}}">
												</div>												
												@if($item1->chamado_aberto_infra == 1)
													<button type="button" 
															class="btn btn-success btn-xs action botao_acao btn_control btn_enviar{{$item1->id}}"
															id="btn_enviar{{$item1->id}}"
															>
															<i class='glyphicon glyphicon-ok'></i>
													</button>
												@endif

											</div>
										</div>
									@endif
								@endforeach
							</div>
						@endforeach
					</div>
					{{-- Div Infraestrutura Predial Fim  --}}


					{{-- Div Almoxarifado  --}}
					<div>
						<h2>Almoxarifado</h2>
						@foreach ($perguntas_almoxarifado as $pergunta_almoxarifado)
							<div class="form-group-{{$pergunta_almoxarifado->id}}">
								<label for="exampleFormControlInput1" style="color: black">{{$pergunta_almoxarifado->titulo}}</label>
								<button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador_almo{{$pergunta_almoxarifado->id}}">
									<i class="material-icons">add</i>
								</button>
								<div id="almo_box_{{$pergunta_almoxarifado->id}}">
									<div class="almo-box-{{$pergunta_almoxarifado->id}} row hide" id="almo-box">
										<div class="form-group box_funcionario">
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
												<input type="text" class="form-control" id="id_almo" name="id_almo[]" value="">
											</div>
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
												<input type="text" class="form-control" id="pergunta_id_almo" name="pergunta_id_almo[]" value="{{$pergunta_almoxarifado->id}}">
											</div>
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
													<input type="text" class="form-control" id="material_almo" name="material_almo[]" placeholder="Material" value="">
												</div>
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
													<input type="text" class="form-control" id="qtd_almo" name="qtd_almo[]" placeholder="Quantidade" value="">
												</div>
											<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_almo_{{$pergunta_almoxarifado->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
										</div>
									</div>
								</div>
								@foreach ($modulo_almoxarifado as $item2)
									@if ($item2->pergunta_id_almo == $pergunta_almoxarifado->id)
										<div class="almo-box-e row" id="almo-box-e">
											<div class="form-group box_funcionario">
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
													<input type="text" class="form-control" id="id_almo" name="id_almo[]" value="{{$item2->id_almo}}">
												</div>
												
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3 hide">
													<input type="text" class="form-control" id="pergunta_id_almo" name="pergunta_id_almo[]" value="{{$pergunta_almoxarifado->id}}">
												</div>

												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
													<input type="text" class="form-control" id="material_almo" name="material_almo[]" placeholder="Material" value="{{$item2->material_almo}}">
												</div>

												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
													<input type="text" class="form-control" id="qtd_almo" name="qtd_almo[]" placeholder="Quantidade" value="{{$item2->qtd_almo}}">
												</div>
											</div>
										</div>
									@endif
								@endforeach

							</div>
						@endforeach
					</div>
					{{-- Div Almoxarifado Fim  --}}

					{{-- Div Odontologia  --}}
					<div>
						<h2>Odontologia</h2>
						@foreach ($perguntas_odontologia as $pergunta_odontologia)
							<div class="form-group-{{$pergunta_odontologia->id}}">
								<label for="exampleFormControlInput1" style="color: black">{{$pergunta_odontologia->titulo}}</label>
								<button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador_odonto{{$pergunta_odontologia->id}}">
									<i class="material-icons">add</i>
								</button>
								<div id="odonto_box_{{$pergunta_odontologia->id}}">
									<div class="odonto-box-{{$pergunta_odontologia->id}} row hide" id="odonto-box">
										<div class="form-group box_funcionario">
											<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
												<input type="text">
											</div>
											<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_odonto_{{$pergunta_odontologia->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					{{-- Div Odontologia Fim  --}}


					{{-- Div Farmácia  --}}
					<div>
						<h2>Farmácia</h2>
						@foreach ($perguntas_farmacia as $pergunta_farmacia)
						<div class="form-group-{{$pergunta_farmacia->id}}">
							<label for="exampleFormControlInput1" style="color: black">{{$pergunta_farmacia->titulo}}</label>
							<button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador_farmacia{{$pergunta_farmacia->id}}">
								<i class="material-icons">add</i>
							</button>
							@if ($pergunta_farmacia->id == 2)
							<div id="farmacia_box_{{$pergunta_farmacia->id}}">
								<div class="farmacia-box-{{$pergunta_farmacia->id}} row hide" id="farmacia-box">
									<div class="form-group box_funcionario">
										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
											<div class="form-group ">
												<label for="inputState">Funcionario</label>
												<select id="inputState" class="form-control">
												  <option selected>Selecione um Funcionario</option>
												  @foreach ($funcionarios as $funcionario)
													  <option value="{{$funcionario->id}}">{{$funcionario->nome}} - {{$funcionario->funcao}}</option>
												  @endforeach
												</select>
											</div>
										</div>
										<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_farmacia_{{$pergunta_farmacia->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
									</div>
								</div>
							</div> 
							@elseif($pergunta_farmacia->id)
							<div id="farmacia_box_{{$pergunta_farmacia->id}}">
								<div class="farmacia-box-{{$pergunta_farmacia->id}} row hide" id="farmacia-box">
									<div class="form-group box_funcionario">
										<input type="text">
										<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_farmacia_{{$pergunta_farmacia->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
									</div>
								</div>
							</div>
							@endif
							{{-- <div id="farmacia_box_{{$pergunta_farmacia->id}}">
								<div class="farmacia-box-{{$pergunta_farmacia->id}} row hide" id="farmacia-box">
									<div class="form-group box_funcionario">
										<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
											<div class="form-group ">
												<label for="inputState">Funcionario</label>
												<select id="inputState" class="form-control">
												  <option selected>Selecione um Funcionario</option>
												  <option>...</option>
												  <option>...</option>
												  <option>...</option>
												</select>
											</div>
										</div>
										<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_farmacia_{{$pergunta_farmacia->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
									</div>
								</div>
							</div> --}}
						</div>
						@endforeach
					</div>
					{{-- Div Farmácia Fim  --}}


					{{-- Div Imunização  --}}
					<div>
						<h2>Imunização</h2>
						@foreach ($perguntas_imunizacao as $pergunta_imunizacao)
							<div class="form-group-{{$pergunta_imunizacao->id}}">
								<label for="exampleFormControlInput1" style="color: black">{{$pergunta_imunizacao->titulo}}</label>
								<button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round clonador_imuni{{$pergunta_imunizacao->id}}">
									<i class="material-icons">add</i>
								</button>
								<div id="imuni_box_{{$pergunta_imunizacao->id}}">
									<div class="{{$pergunta_imunizacao->id}} row hide" id="imuni-box">
										<div class="imuni-box-{{$pergunta_imunizacao->id}} row hide" id="imuni-box">
											<div class="form-group box_funcionario">
												<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-sm-3 col-lg-3">
													<input type="text">
												</div>
												<button type="button" class="btn btn-danger btn-xs action botao_acao btn_control btn_remove_imuni_{{$pergunta_imunizacao->id}}"> <i class='glyphicon glyphicon-trash'></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					{{-- Div Imunização Fim  --}}

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

{{-- Sweet Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

$(function(){

	@foreach($modulo_ti as $item)
		$("#btn_enviar{{$item->id}}").click(function(){
			swal({
				title: "Chamado Realizado?",
				text: "O chamado {{$item->n_chamado}} foi resolvido?",
				icon: "warning",
				buttons: {
					cancel: {
						text: "Cancelar",
						value: "cancelar",
						visible: true,
						closeModal: true,
					},
					ok: {
						text: "Sim, Enviar!",
						value: 'enviar',
						visible: true,
						closeModal: true,
					}
				}
			})
				.then(function (resultado) {
					if(resultado === 'enviar'){
							// console.log({{$item->id}})

						$.get('{{ url("moduloti/enviachamadoti") }}', {
							id: {{$item->id}},
						}, function(data){
							console.log(data);
						}).done(function(){
							location.reload();
						});
				};
			});
		});
	@endforeach

      		$('body').submit(function(event){
				if ($(this).hasClass('enviar-relatorio')) {
					event.preventDefault();
				}
				else {
					$(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
					$(this).addClass('enviar-relatorio');
				}
			});

			// --------------------------------------------------------------------------------
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
				// --------------------------------------------------------------------------------
				$('.clonador_infra1').click(function(){
					$clone = $('.infra-box-1.hide').clone(true);
					$clone.removeClass('hide');
					$('#infra_box_1').append($clone);
				});
				$('.btn_remove_infra_1').click(function(){
					$(this).parents('.infra-box-1').remove();
				});

				$('.clonador_infra2').click(function(){
					$clone = $('.infra-box-2.hide').clone(true);
					$clone.removeClass('hide');
					$('#infra_box_2').append($clone);
				});
				$('.btn_remove_infra_2').click(function(){
					$(this).parents('.infra-box-2').remove();
				});

				$('.clonador_infra3').click(function(){
					$clone = $('.infra-box-3.hide').clone(true);
					$clone.removeClass('hide');
					$('#infra_box_3').append($clone);
				});
				$('.btn_remove_infra_3').click(function(){
					$(this).parents('.infra-box-3').remove();
				});

				$('.clonador_infra4').click(function(){
					$clone = $('.infra-box-4.hide').clone(true);
					$clone.removeClass('hide');
					$('#infra_box_4').append($clone);
				});
				$('.btn_remove_infra_4').click(function(){
					$(this).parents('.infra-box-4').remove();
				});

				$('.clonador_infra5').click(function(){
					$clone = $('.infra-box-5.hide').clone(true);
					$clone.removeClass('hide');
					$('#infra_box_5').append($clone);
				});
				$('.btn_remove_infra_5').click(function(){
					$(this).parents('.infra-box-5').remove();
				});

				$('.clonador_infra6').click(function(){
					$clone = $('.infra-box-6.hide').clone(true);
					$clone.removeClass('hide');
					$('#infra_box_6').append($clone);
				});
				$('.btn_remove_infra_6').click(function(){
					$(this).parents('.infra-box-6').remove();
				});

				$('.clonador_infra7').click(function(){
					$clone = $('.infra-box-7.hide').clone(true);
					$clone.removeClass('hide');
					$('#infra_box_7').append($clone);
				});
				$('.btn_remove_infra_7').click(function(){
					$(this).parents('.infra-box-7').remove();
				});

				// --------------------------------------------------------------------------------

				$('.clonador_almo1').click(function(){
					$clone = $('.almo-box-1.hide').clone(true);
					$clone.removeClass('hide');
					$('#almo_box_1').append($clone);
				});
				$('.btn_remove_almo_1').click(function(){
					$(this).parents('.almo-box-1').remove();
				});

				$('.clonador_almo2').click(function(){
					$clone = $('.almo-box-2.hide').clone(true);
					$clone.removeClass('hide');
					$('#almo_box_2').append($clone);
				});
				$('.btn_remove_almo_2').click(function(){
					$(this).parents('.almo-box-2').remove();
				});

				$('.clonador_almo3').click(function(){
					$clone = $('.almo-box-3.hide').clone(true);
					$clone.removeClass('hide');
					$('#almo_box_3').append($clone);
				});
				$('.btn_remove_almo_3').click(function(){
					$(this).parents('.almo-box-3').remove();
				});



				// --------------------------------------------------------------------------------

				$('.clonador_odonto1').click(function(){
					$clone = $('.odonto-box-1.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_1').append($clone);
				});
				$('.btn_remove_odonto_1').click(function(){
					$(this).parents('.odonto-box-1').remove();
				});

				$('.clonador_odonto2').click(function(){
					$clone = $('.odonto-box-2.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_2').append($clone);
				});
				$('.btn_remove_odonto_2').click(function(){
					$(this).parents('.odonto-box-2').remove();
				});

				$('.clonador_odonto3').click(function(){
					$clone = $('.odonto-box-3.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_3').append($clone);
				});
				$('.btn_remove_odonto_3').click(function(){
					$(this).parents('.odonto-box-3').remove();
				});

				$('.clonador_odonto4').click(function(){
					$clone = $('.odonto-box-4.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_4').append($clone);
				});
				$('.btn_remove_odonto_4').click(function(){
					$(this).parents('.odonto-box-4').remove();
				});

				$('.clonador_odonto5').click(function(){
					$clone = $('.odonto-box-5.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_5').append($clone);
				});
				$('.btn_remove_odonto_5').click(function(){
					$(this).parents('.odonto-box-5').remove();
				});

				$('.clonador_odonto6').click(function(){
					$clone = $('.odonto-box-6.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_6').append($clone);
				});
				$('.btn_remove_odonto_6').click(function(){
					$(this).parents('.odonto-box-6').remove();
				});

				$('.clonador_odonto7').click(function(){
					$clone = $('.odonto-box-7.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_7').append($clone);
				});
				$('.btn_remove_odonto_7').click(function(){
					$(this).parents('.odonto-box-7').remove();
				});

				$('.clonador_odonto8').click(function(){
					$clone = $('.odonto-box-8.hide').clone(true);
					$clone.removeClass('hide');
					$('#odonto_box_8').append($clone);
				});
				$('.btn_remove_odonto_8').click(function(){
					$(this).parents('.odonto-box-8').remove();
				});


				// --------------------------------------------------------------------------------

				$('.clonador_farmacia1').click(function(){
					$clone = $('.farmacia-box-1.hide').clone(true);
					$clone.removeClass('hide');
					$('#farmacia_box_1').append($clone);
				});
				$('.btn_remove_farmacia_1').click(function(){
					$(this).parents('.farmacia-box-1').remove();
				});

				$('.clonador_farmacia2').click(function(){
					$clone = $('.farmacia-box-2.hide').clone(true);
					$clone.removeClass('hide');
					$('#farmacia_box_2').append($clone);
				});
				$('.btn_remove_farmacia_2').click(function(){
					$(this).parents('.farmacia-box-2').remove();
				});

				$('.clonador_farmacia3').click(function(){
					$clone = $('.farmacia-box-3.hide').clone(true);
					$clone.removeClass('hide');
					$('#farmacia_box_3').append($clone);
				});
				$('.btn_remove_farmacia_3').click(function(){
					$(this).parents('.farmacia-box-3').remove();
				});

				$('.clonador_farmacia4').click(function(){
					$clone = $('.farmacia-box-4.hide').clone(true);
					$clone.removeClass('hide');
					$('#farmacia_box_4').append($clone);
				});
				$('.btn_remove_farmacia_4').click(function(){
					$(this).parents('.farmacia-box-4').remove();
				});

				$('.clonador_farmacia5').click(function(){
					$clone = $('.farmacia-box-5.hide').clone(true);
					$clone.removeClass('hide');
					$('#farmacia_box_5').append($clone);
				});
				$('.btn_remove_farmacia_5').click(function(){
					$(this).parents('.farmacia-box-5').remove();
				});

				


				// --------------------------------------------------------------------------------

				$('.clonador_imuni1').click(function(){
					$clone = $('.imuni-box-1.hide').clone(true);
					$clone.removeClass('hide');
					$('#imuni_box_1').append($clone);
				});
				$('.btn_remove_imuni_1').click(function(){
					$(this).parents('.imuni-box-1').remove();
				});

				$('.clonador_imuni2').click(function(){
					$clone = $('.imuni-box-2.hide').clone(true);
					$clone.removeClass('hide');
					$('#imuni_box_2').append($clone);
				});
				$('.btn_remove_imuni_2').click(function(){
					$(this).parents('.imuni-box-2').remove();
				});


				// --------------------------------------------------------------------------------

			




			$("#btn_cancelar").click(function(){
		      event.preventDefault();
            window.location.href='/relatorio';
	      });
      	});
		 
</script>

@endpush