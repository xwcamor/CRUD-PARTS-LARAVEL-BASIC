<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'is_deleted',
        'deleted_description',          
    ];

    protected static function booted()
    {
        static::creating(function ($country) {
            do {
                $slug = Str::random(22);
            } while (Country::where('slug', $slug)->exists());

            $country->slug = $slug;
        });
    }    

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getStateHtmlAttribute()
    {
        if ($this->is_active === 1 || $this->is_active === true) {
            return '<span class="text-success">Activo</span>';
        } elseif ($this->is_active === 0 || $this->is_active === false) {
            return '<span class="text-danger">Inactivo</span>';
        }

        return '<span class="text-danger">Eliminado</span>';
    }       
}
