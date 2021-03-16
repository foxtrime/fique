<div class="sidebar" data-active-color="" data-background-color="dourado" data-image="{{ asset('img/prefeitura.png') }}">
	<div class="logo">
		   <a href="#" class="simple-text logo-normal">
			  CIQ  <i style="font-size: 8px;">( Ver 0.0.1 )</i>
		   </a>
	</div>
 
	<div class="sidebar-wrapper">
			<div class="user"> 
			   <div class="photo">
				 {{-- <img src="{{ $logado->avatar }}" /> --}}
			 </div> 
			 <div style="font-size: 15px;padding-top: 10px;">
				 {{Auth::user()->name}}
			 </div>
			
			</div>
 
	   {{-------------- Menu Principal --------------}}
		 
	   	<ul class="nav">
	
			{{-- {{Auth::user()}} --}}
				
			@if(Auth::user()->nivel == 'admin')
			<li>
				<a href="{{ url("/home") }}">
					<i class="material-icons">dashboard</i>
					<p>admin</p>
				</a>
			</li>
			@elseif(Auth::user()->nivel == 'super-admin')
				<li>
					<a href="{{ url("/home") }}">
						<i class="material-icons">dashboard</i>
						<p>Inicio</p>
					</a>
				</li>
				<li>
					<a href="{{ url("/indicador") }}">
						<i class="material-icons">dashboard</i>
						<p>Indicadores</p>
					</a>
				</li>
				<li>
					<a href="{{ url("/funcionario") }}">
						<i class="material-icons">dashboard</i>
						<p>Funcionarios</p>
					</a>
				</li>
				<li>
					<a href="{{ url("/unidade") }}">
						<i class="material-icons">dashboard</i>
						<p>Unidades</p>
					</a>
				</li>
				<li>
					<a href="{{ url("/usuario") }}">
						<i class="material-icons">dashboard</i>
						<p>Usuarios</p>
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
				<li>
					<a href="">
						<i class="material-icons">dashboard</i>
						<p>Contate-nos</p>
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
		 </ul>
		   
		 <div id="footer">
			 <center>
				 {{-- <img src="{{asset("img/cidade-digital.png")}}" style="width: 160px;padding-top: 0%;">		 --}}
			 </center>
		 </div>
	</div>
 </div>