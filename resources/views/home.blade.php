@extends('layouts.app')

@section('content')

{{-- {{$perfil->nivel}} --}}
@if ($perfil->nivel == 'admin' || $perfil->nivel == 'super-admin')
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon" style="padding-bottom: 20px;">
                                  <div class="card-icon">
                                    <i class="material-icons">warning</i>
                                  </div>
                                  <p class="card-category">Chamados em Aberto</p>
                                  <h3 class="card-title">{{$quantidade_chamado_aberto_ti}}</h3>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                  <div class="card-header card-header-success card-header-icon" style="padding-bottom: 20px;">
                                    <div class="card-icon">
                                      <i class="material-icons">done</i>
                                    </div>
                                    <p class="card-category">Quantidade Total de Chamados Resolvidos</p>
                                    <h3 class="card-title">{{$quantidade_chamado_resolvido_ti}}</h3>
                                  </div>
                                </div>
                              </div>
                          </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <canvas id="moduloTiGeral" width="600" height="250"></canvas>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <canvas id="myChart2" width="600" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endif
    
@endsection

@push('scripts')

<script>
    console.log({{$qtd_a}})
    console.log({{$qtd_b}})
    console.log({{$qtd_c}})
    console.log({{$qtd_d}})
    console.log({{$qtd_e}})
     console.log({{$qtd_f}})

 

    new Chart(document.getElementById("moduloTiGeral"), {
        type: 'horizontalBar',
        data: {
          labels: ["Problemas Com o Sistema", "capacitação para operar o sistema?", "Problemas Voip", "Problemas Bioslab", "Problemas com Equipamentos", "Problemas com internet"],
          datasets: [
            {
              label: "Detalhes",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#f85450"],
              data: [{{$qtd_a}}, {{$qtd_b}}, {{$qtd_c}},{{$qtd_d}},{{$qtd_e}}, {{$qtd_f}}]
            }
          ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Problemas Ti Geral'
          }
        }
    });
    </script>

@endpush