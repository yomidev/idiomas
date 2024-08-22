<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if the table name is the plural form of the model name)
    protected $table = 'plataformas';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'nombre',
        'imagen',
        'active',
        'link',
        'descripcion',
    ];

    // Cast the `active` field to a boolean type
    protected $casts = [
        'active' => 'boolean',
    ];

}
