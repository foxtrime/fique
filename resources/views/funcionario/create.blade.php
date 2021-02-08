@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-success card-header-icon">
				<div class="card-icon" style="background: linear-gradient(60deg, #BFA15F, #ad7909);box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(191, 161, 95, 0.4);">
					<i class="material-icons">chat bubble</i>
				</div>
				<h4 class="card-title">Cadastrar Funcionario</h4>
			</div>
			<div class="card-body">
                <form action="{{ url('/funcionario') }}" method="POST" id="form_relatorio">  
                    {{ csrf_field() }}
                    <div class="row">
						 <!-- ============================NOME============================ -->
						 <div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">local_hospital</i>
									</span>
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group label-floating has-roxo is-empty">
											<label class="control-label" style="font-size: 11.7px;">Nome</label>
											<input id="nome" name="nome" type="text" class="form-control error" value="">
										</div>		
									</div>					
								</div>
							</div>
						</div>
						<!-- =========================FIM NOME============================ -->

						<!-- ==========================FUNCÕES============================ -->
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">swap_horiz</i>
									</span>
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group label-floating has-roxo is-empty">
											<label class="control-label" style="font-size: 11.7px;">Selecione a Função</label>
											<select name="funcao" id="funcao" class="form-control form-control error" style="position: inherit;" required>
												<option value="" selected> </option>
												<option value="Médicos 20H">Médicos 20H</option>
												<option value="Médicos 40H">Médicos 40H</option>
												<option value="Enfermeiro">Enfermeiro</option>
												<option value="Tecnico de Enfermagem">Tecnico de Enfermagem</option>
												<option value="administrativo">administrativo</option>
												<option value="ASG">ASG</option>
												<option value="Dentista">Dentista</option>
												<option value="ASB">ASB</option>
												<option value="Zeladores">Zeladores</option>
												<option value="Técnicos de raio x">Técnicos de raio x</option>
												<option value="coord. enfermagem">coord. enfermagem</option>
												<option value="Assistente administrativo">Assistente administrativo</option>
												<option value="Farmacêutico">Farmacêutico</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- =========================FIM FUNCÕES========================= -->
						<!-- ==========================UNIDADES============================ -->
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">swap_horiz</i>
									</span>
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group label-floating has-roxo is-empty">
											<label class="control-label" style="font-size: 11.7px;">Selecione a Unidade</label>
											<select name="unidade" id="unidade" class="form-control form-control error" style="position: inherit;" required>
												<option value="" selected> </option>
												@foreach ($unidades as $unidade)
													<option value="{{$unidade->id}}">{{$unidade->nome}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- =========================FIM UNIDADES========================= -->
						
					                        
                    </div>
                    <!-- ============================BOTOES============================ -->
					<div class="row">
						<center>
							<button type="submit" id="enviar-relatorio" class="botoes-acao btn btn-round btn-success enviar-relatorio">
								<span class="icone-botoes-acao mdi mdi-send"></span>
								<span class="texto-botoes-acao"> ENVIAR </span>
								<div class="ripple-container"></div>
							</button>
						
							<button id="btn_cancelar" class="botoes-acao btn btn-round btn-primary">
								<span class="icone-botoes-acao mdi mdi-backburger"></span>   
								<span class="texto-botoes-acao"> CANCELAR </span>
								<div class="ripple-container"></div>
							</button>
						</center>
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
			$("#btn_cancelar").click(function(){
		      event.preventDefault();
            window.location.href='/funcionario';
	      });
      	});
	</script>

@endpush