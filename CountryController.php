<?php

// Source file: app/Http/Controllers/CountryController.php
namespace App\Http\Controllers;

// Use Models
use App\Models\Country; 

// Use Illuminates
use Illuminate\Http\Request;

// Main class
class CountryController extends Controller
{
    // Action Index
    public function index(Request $request)
    {   
        // Base query
        $query = Country::where('is_deleted', 0);

        // Filters
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', (int) $request->is_active);
        }

        // Orden
        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'asc');

        if (in_array($sort, ['id', 'name', 'is_active']) && in_array($direction, ['asc', 'desc'])) {
            $query->orderBy($sort, $direction);
        }

        // Pagination
        $countries = $query->paginate(10)->appends($request->all());
        
        // Return data to view
        return view('countries.index', compact('countries'));
    }

    // Action create
    public function create()
    {
        // Displays file create.blade.php
        return view('countries.create');
    }

    // Insert data from view create.blade.php
    public function store(Request $request)
    {   
        // Validate request data with rules on database
        $request->validate([
        'name' => 'required|max:255',
        ]);
        
        // Do Insert on database
        Country::create($request->all());

        // Redirect to view with success message
        return redirect()->route('countries.index')
                         ->with('success','Registro creado correctamente.');
        
    }

    // Action Show
    public function show(Country $country)
    {   
        // Displays file show.blade.php
        return view('countries.show', compact('country'));
    }

    // Action Edit  
    public function edit(Country $country)
    {
        // Displays file edit.blade.php
        return view('countries.edit', compact('country'));
    }

    // Update data from view edit.blade.php
    public function update(Request $request, Country $country)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        // Update the model with the validated data
        $data = $request->only('name','is_active');
        
        // Update all columns on request
        $country->update($data);

        // Redirect to view with success message
        return redirect()->route('countries.index')->with('success', 'Registro actualizado correctamente');
    }

    // Action Destroy
    public function destroy(Country $country)
    {
        $country->update([
            'is_active' => false,
            'is_deleted' => true,
            'deleted_description' => 'Eliminado por el administrador el ' . now()->format('d/m/Y H:i:s'),
        ]);

        return redirect()->route('countries.index')->with('success', 'Registro marcado como eliminado');
    }
}
