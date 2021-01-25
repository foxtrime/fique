<div class="sidebar" data-active-color="" data-background-color="dourado" data-image="{{ asset('img/prefeitura.png') }}">
	<div class="logo">
		   <a href="#" class="simple-text logo-normal">
			  FIQ  <i style="font-size: 8px;">( Ver 0.0.1 )</i>
		   </a>
	</div>
 
	<div class="sidebar-wrapper">
			<div class="user"> 
			   <div class="photo">
				 {{-- <img src="{{ $logado->avatar }}" /> --}}
			 </div> 
			 <div style="font-size: 15px;padding-top: 10px;">
				 {{-- {{$logado->nome}} --}}
			 </div>
			  {{--<div class="info">
				  <a data-toggle="collapse" href="#collapseExample" class="collapsed">
					<span>
							{{ $funcionario_logado }} 
						   <b class="caret"></b>
					</span> 
					 <p style="font-size: 10px;">({{ $funcionario_logado->role->acesso }} - {{ $funcionario_logado->role->peso }})</p> 
				 </a>
 
				 <div class="clearfix"></div>
				 <div class="collapse" id="collapseExample">
					<ul class="nav">
						<li>
							<a href="#">
							   <a href="{{ url("/alteraavatar") }}">
									 <i class="material-icons">person</i> Alterar Avatar
							   </a>
							</a>
						</li>
						<li>
							<a href="{{ url('/alterasenha') }}" >
							   <i class="material-icons">lock_outline</i> Alterar Senha
							</a>
						</li>
						 <li>
							<a href="#">
								<span class="sidebar-mini"> S </span>
								<span class="sidebar-normal"> Settings </span>
							</a>
						</li> 
					</ul>
				 </div> 
			  </div> --}}
			</div>
 
	   {{-------------- Menu Principal --------------}}
		 
	   	<ul class="nav">
	
			{{-- {{Auth::user()}} --}}
				
			@if(Auth::user()->nivel == 'super-admin')
			<li>
				<a href="{{ url("/home") }}">
					<i class="material-icons">dashboard</i>
					<p>super-admin</p>
				</a>
			</li>
			@elseif(Auth::user()->nivel == 'admin')
				<li>
					<a href="{{ url("/home") }}">
						<i class="material-icons">dashboard</i>
						<p>Inicio</p>
					</a>
				</li>
				<li>
					<a href="{{ url("/unidade") }}">
						<i class="material-icons">dashboard</i>
						<p>Unidade</p>
					</a>
				</li>
			@elseif(Auth::user()->nivel == 'user')
				<li>
					<a href="{{ url("/home") }}">
						<i class="material-icons">dashboard</i>
						<p>Inicio</p>
					</a>
				</li>
				<li>
					<a href="{{ url("/relatorio") }}">
						<i class="material-icons">dashboard</i>
						<p>Relatorio</p>
					</a>
				</li>
			@elseif(Auth::user()->nivel == 'user_ti')
				<li>
					<a href="{{ url("/home") }}">
						<i class="material-icons">dashboard</i>
						<p>user_ti</p>
					</a>
				</li>
			@elseif(Auth::user()->nivel == 'user_infra')
				<li>
					<a href="{{ url("/home") }}">
						<i class="material-icons">dashboard</i>
						<p>user_infra</p>
					</a>
				</li>
			@endif
			
			{{-- @if ($guardagcmm || $guardagerente )
				<li>
					<a href="{{ url("/semsop") }}">
						<i class="material-icons">assignment</i>
						<p>SEMSOP Relatórios</p>
					</a>
				</li>
			@elseif ($setrans || $setransgerente )
				<li>
					<a href="{{ url("/setrans")}}">
						<i class="material-icons">assignment</i>
						<p>SETRANS Relatórios</p>
					</a>
				</li>
			@endif --}}
		 </ul>
		   
		 <div id="footer">
			 <center>
				 {{-- <img src="{{asset("img/cidade-digital.png")}}" style="width: 160px;padding-top: 0%;">		 --}}
			 </center>
		 </div>
	</div>
 </div>