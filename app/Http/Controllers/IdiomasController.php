<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idioma;

class IdiomasController extends Controller
{
    public function index(){
        $idiomas = Idioma::all();
        return view('admin.index.idiomas.index')->with(['idiomas' => $idiomas]);
    }
    public function store(Request $request){
        $idioma = new Idioma;
        $idioma->nombre = $request->name;
        $idioma->descripcion = $request->description;
        //Guardar imagen de bandera
        $attached = $request->file("imageUpload");
        //Verificar si se ha proporcionado un archivo
        if($request->hasFile('imageUpload')){
            $file_attached = 'Idioma'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/index/idiomas';
            $attached->move($path, $file_attached);
            $idioma->imagen = $file_attached;
        }

        $idioma->save();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id){
        $idioma = Idioma::findOrFail($id);
        $idioma->nombre = $request->name;
        $idioma->descripcion = $request->description;
        $attached = $request->file("imageUpload");
        //Verificar si existe imagen
        if($request->hasFile('imageUpload')){
            if($idioma->imagen){
                $previous_image_path = public_path('pictures/index/idiomas/'.$idioma->imagen);
                if(file_exists($previous_image_path)){
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Idioma'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/index/idiomas';
            $attached->move($path, $file_attached);
            $idioma->imagen = $file_attached;
        }

        $idioma->save();
        return response()->json(['success' => true]);
    }
    public function delete($id){
        $idioma = Idioma::findOrFail($id);
        $idioma->delete();
        return response()->json(['success' =>'Registro eliminado exitosamente']);
    }
}
