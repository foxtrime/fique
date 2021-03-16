@extends('layouts.app')

@section('content')
<div class="row">


    @foreach ($unidades as $unidade)
        
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category">{{$unidade->nome}}</p>
                
                <h3 class="card-title"> R$ {{$unidade->nome}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> Ultimo Mês
                </div>
            </div>
        </div>
    </div>
    @endforeach


  </div>
@endsection

@push('scripts')
    
@endpush