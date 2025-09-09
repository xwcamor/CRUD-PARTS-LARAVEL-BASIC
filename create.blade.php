@extends('layouts.app')

@section('title', 'Pais - Nuevo')

@section('content')
<div class="row">
  <div class="col-lg-12"> {{-- centrado --}}
    <div class="card card-primary">
      <div class="card-header bg-light border-bottom font-weight-bold">
        <i class="fas fa-plus"></i> Crear Registro
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Minimizar">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <form id="form-save" action="{{ route('countries.store') }}" method="POST">
          @csrf          
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>

        </form>
      </div>
      
      <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('countries.index') }}" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i> Regresar
        </a>
        <button type="button" onclick="document.getElementById('form-save').submit();" class="btn btn-primary">
          <i class="fas fa-save"></i> Guardar Datos
        </button>
      </div>
      
    </div>
  </div>
</div>
@endsection
