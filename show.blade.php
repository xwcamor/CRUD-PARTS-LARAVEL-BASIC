@extends('layouts.app')

@section('title', 'Pais - Información')

@section('content')
<div class="row">
  <div class="col-lg-12"> {{-- centrado y no tan ancho --}}
    <div class="card">
      <div class="card-header bg-light border-bottom font-weight-bold">
        <i class="fas fa-database"></i> Datos del Registro
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Minimizar">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <p><strong>Nombre:</strong> {{ $country->name }}</p>
        <p><strong>Estado:</strong> {!! $country->state_html !!}</p>
      </div>
      <div class="card-footer">
        <a href="{{ route('countries.index') }}" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i> Regresar
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
