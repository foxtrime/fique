@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon" style="background: linear-gradient(60deg, #BFA15F, #ad7909);box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(191, 161, 95, 0.4);">
                            <i class="material-icons">chat bubble</i>
                        </div>
                        <h4 class="card-title">Usuarios do Sistema</h4>
                        {{-- <a href="{{ url("/funcionario/create")}}" class="btn btn-dourado btn-just-icon btn-round" style="float: right;top: -33px;right: -13px;"><i class="mdi mdi-plus" rel="tooltip" data-placement="left" title="Novo Relatorio"></i></a>					 --}}
                        <button type="button" class="btn btn-dourado btn-just-icon btn-round" data-toggle="modal" data-target="#exampleModal" style="float: right;top: -33px;right: -13px;"><i class="mdi mdi-plus" rel="tooltip" data-placement="left" title="Novo Relatorio"></i></button>
                        {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i></a>
                        </button> --}}
                    </div>
                    <div class="card-body">
                        <div class="toolbar"></div>
                            <div class="material-datatables">
                                <table id="usuarios" class="table table-striped table-no-bordered table-hover" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nome do Usuario</th>
                                            <th>Email</th>
                                            <th>Unidade</th>
                                            <th>Nivel de Permissão</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                @if ($user->unidade == null)
                                                    <td></td>
                                                @else
                                                    <td>{{$user->unidade->nome}}</td>
                                                @endif
                                                <td>{{$user->nivel}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-xs action botao_acao btn_control btn_remove"> <i class='glyphicon glyphicon-pencil'></i></button>
                                                    <button type="button" class="btn btn-info btn-xs action botao_acao btn_control btn_remove"> <i class='glyphicon glyphicon-eye-open'></i></button>
                                                
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Criar Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/register">
                                                {{ csrf_field() }}

                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="text" class="form-control" id="email" name="email" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputState">Nivel</label>
													<select id="nivel" name="nivel" class="form-control">
													    <option selected>Selecione uma Unidade</option>
                                                        <option value="super-admin"> Super Admin</option>
                                                        <option value="admin"> Admin</option>
                                                        <option value="user"> User</option>
                                                        <option value="user_ti"> User TI</option>
                                                        <option value="user_at_basi"> User Atenção Basica</option>
                                                        <option value="user_infra"> User Infraestrutura Predial</option>
                                                        <option value="user_almo"> User Almoxarifado</option>
                                                        <option value="user_odonto"> User Odontologia</option>
                                                        <option value="user_farma"> User Farmacia</option>
                                                        <option value="user_imuni"> User Imunização</option>
													</select>
                                                    <br>
                                                    <br>
                                                </div>  

                                                <div class="form-group ">
													<label for="inputState">Unidades</label>
													<select id="unidade_id" name="unidade_id" class="form-control">
													<option selected>Selecione uma Unidade</option>
													@foreach ($unidades as $unidade)
															<option value="{{$unidade->id}}">{{$unidade->nome}}</option>
													@endforeach
													</select>
                                                    <br>
                                                    <br>
												</div>
                                            
                                                <div class="form-group">
                                                    <label for="password">Senha:</label>
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirmação de Senha:</label>
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                                </div>
                                            
                                                <div class="form-group">
                                                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                            </form>
                                        </div>
                                  </div>
                            </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
