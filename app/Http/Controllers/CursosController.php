<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Idioma;

class CursosController extends Controller
{
    public function index(){
        $cursos = Curso::join('idiomas','cursos.id_idioma', '=', 'idiomas.id')
            ->select('cursos.*', 'idiomas.nombre as idioma_nombre')
            ->get();
        $idioma = Idioma::where('id', '!=', 1)->get();

        return view('admin.index.cursos.index')->with(['cursos' => $cursos, 'idioma' => $idioma]);
    }

    public function store(Request $request){
        $curso = new Curso;
        $curso->nombre = $request->name;
        $curso->descripcion = $request->description;
        $curso->categoria = $request->category;
        $curso->id_idioma = $request->idioma;
        $attached = $request->file("imageUpload");
        //Verificar si se ha proporcionado un archivo
        if($request->hasFile('imageUpload')){
            $file_attached = 'Curso'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/index/cursos';
            $attached->move($path, $file_attached);
            $curso->imagen = $file_attached;
        }
        $curso->save();
        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id){
        $curso = Curso::findOrFail($id);
        $curso->nombre = $request->name;
        $curso->descripcion = $request->description;
        $curso->categoria = $request->category;
        $curso->id_idioma = $request->idioma;
        $attached = $request->file("imageUpload");
        //Verificar si existe imagen
        if($request->hasFile('imageUpload')){
            if($curso->imagen){
                $previous_image_path = public_path('pictures/index/cursos/'.$curso->imagen);
                if(file_exists($previous_image_path)){
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Cursos'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/index/cursos';
            $attached->move($path, $file_attached);
            $curso->imagen = $file_attached;
        }
        $curso->save();
        return response()->json(['success' => true]);
    }
    public function delete($id){
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return response()->json(['success' =>'Registro eliminado exitosamente']);
    }
    public function status(Request $request){
        $courseId = $request->input('courseId');
        $isChecked = $request->input('isChecked');

        $curso = Curso::findOrFail($courseId);
        $curso->active = $isChecked;
        $curso->save();

        return response()->json(['success' => true]);
    }
}
