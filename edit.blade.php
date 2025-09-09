@extends('layouts.app')

@section('title', 'Pais - Editar')

@section('content')
<div class="row">
  <div class="col-lg-12"> {{-- centrado --}}
    <div class="card">
      <div class="card-header bg-light border-bottom font-weight-bold">
        <i class="fas fa-pen"></i> Editar Registro
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Minimizar">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
 
      <div class="card-body">
        <form id="form-save" action="{{ route('countries.update', $country) }}" method="POST">
          @csrf
          @method('PUT')   
          <div class="form-group">
            <label for="name">Titulo</label>
            <input type="text" name="name" id="name" 
                   value="{{ old('name', $country->name) }}" 
                   class="form-control" required>
          </div>
 
          <div class="form-group">
            <label for="is_active">Estado</label>
            <select name="is_active" id="is_active" class="form-control" required>
              <option value="1" {{ old('is_active', $country->is_active) == '1' ? 'selected' : '' }}>Activo</option>
              <option value="0" {{ old('is_active', $country->is_active) == '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
          </div>

        </form>  
      </div>

      <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('countries.index') }}" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i> Regresar
        </a>
        <button type="submit"  onclick="document.getElementById('form-save').submit();" class="btn btn-primary">
          <i class="fas fa-save"></i> Actualizar Datos
        </button>
      </div>
      
    </div>
  </div>
</div>
@endsection
