@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-success card-header-icon">
				<div class="card-icon" style="background: linear-gradient(60deg, #BFA15F, #ad7909);box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(191, 161, 95, 0.4);">
					<i class="material-icons">chat bubble</i>
				</div>
				<h4 class="card-title">Criar Relatorio</h4>
			</div>
			<div class="card-body">
                <form action="{{ url('/relatorio') }}" method="POST" id="form_relatorio">  
                    {{ csrf_field() }}
                    <!-- ============================NOME============================ -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="input-group-prepend">
								<span class="input-group-text">
									<i class="material-icons">local_hospital</i>
								</span>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group label-floating has-roxo is-empty">
										<label class="control-label" style="font-size: 11.7px;">Teste</label>
										<input id="name" name="name" type="text" class="form-control error" value="">
									</div>		
								</div>					
							</div>
                        </div>
                    </div>
                    <!-- =========================FIM NOME============================ -->

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
      	});
	</script>

@endpush