<?php

namespace App\Http\Controllers;

use App\Models\Certificacion;
use Illuminate\Http\Request;
use App\Models\Idioma;
use App\Models\Curso;
use App\Models\Evento;
use App\Models\ServicioGeneral;

class FrontendController extends Controller
{
    public function index(){
        $idioma = Idioma::all();
        $cursos = Curso::join('idiomas','cursos.id_idioma', '=', 'idiomas.id')
        ->select('cursos.*', 'idiomas.nombre as idioma_nombre')
        ->where('cursos.active', 1)
        ->get();
        $idiomaWithOutSpanish = Idioma::where('id', '!=', 1)->get();
        $certifications = Certificacion::where('active',1)->get();
        $events = Evento::where('active',1)->get();
        return view('welcome')->with(['idioma' => $idioma, 'cursos' => $cursos, 'idiomaWithOutSpanish' => $idiomaWithOutSpanish,
            'certifications' => $certifications, 'events' => $events
        ]);
    }
    public function about(){

    }
    public function services(){
        $certifications = Certificacion::where('active',1)->get();
        $services = ServicioGeneral::where('active', 1)->get();
        return view('services')->with(['certifications' => $certifications,
            'services' => $services
        ]);
    }
    public function students(){

    }
}
