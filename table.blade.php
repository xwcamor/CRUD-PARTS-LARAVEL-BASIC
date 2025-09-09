<table class="table  table-hover">
  <thead class="bg-light">
    <tr>
      <th>
        <a class="text-dark text-decoration-none" href="{{ route('countries.index', array_merge(request()->all(), ['sort' => 'id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}">
          ID
        </a>
      </th>
      <th>
        <a class="text-dark text-decoration-none" href="{{ route('countries.index', array_merge(request()->all(), ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}">
          Nombre
        </a>
      </th>
      <th>
        <a class="text-dark text-decoration-none" href="{{ route('countries.index', array_merge(request()->all(), ['sort' => 'is_active', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}">
          Estado
        </a>
      </th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($countries as $country)
      <tr>
        <td>{{ $country->id }}</td>
        <td>{{ $country->name }}</td>
        <td>{!! $country->state_html !!}</td>
        <td>
          <div class="btn-group btn-group-sm" role="group">
            <a class="btn btn-light" href="{{ route('countries.show', $country) }}" title="Ver">
              <i class="fas fa-eye"></i>
            </a>
            <a class="btn btn-light" href="{{ route('countries.edit', $country) }}" title="Editar">
              <i class="fas fa-pen"></i>
            </a>
            <form action="{{ route('countries.destroy', $country) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-light" title="Eliminar">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-center mt-3">
  {{ $countries->links() }}
</div>
