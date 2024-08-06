<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'imagen',
        'id_idioma',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'descripcion' => 'string',
        'imagen' => 'string',
    ];

    /**
     * Get the idioma that owns the curso.
     */
    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'id_idioma');
    }
}
