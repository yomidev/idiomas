<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    public function index() {

        $plataforma = Plataforma::all();
        return view('admin.students.platforms.index')->with(['plataforma'=> $plataforma]);

    }
    public function store(Request $request){
        $plataforma = new Plataforma;
        $plataforma->nombre = $request->name;
        $plataforma->descripcion = $request->description;
        $plataforma->link = $request->link;
        $attached = $request->file("imageUpload");
        //Verificar si se ha proporcionado un archivo
        if($request->hasFile('imageUpload')){
            $file_attached = 'Plataforma'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/students/platforms';
            $attached->move($path, $file_attached);
            $plataforma->imagen = $file_attached;
        }
        $plataforma->save();
        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id){
        $plataforma = Plataforma::findOrFail($id);
        $plataforma->nombre = $request->name;
        $plataforma->descripcion = $request->description;
        $plataforma->link = $request->link;
        $attached = $request->file("imageUpload");
        //Verificar si existe imagen
        if($request->hasFile('imageUpload')){
            if($plataforma->imagen){
                $previous_image_path = public_path('pictures/students/platforms/'.$plataforma->imagen);
                if(file_exists($previous_image_path)){
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Plataforma'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/students/platforms';
            $attached->move($path, $file_attached);
            $plataforma->imagen = $file_attached;
        }
        $plataforma->save();
        return response()->json(['success' => true]);
    }
    public function delete($id){
        $plataforma = Plataforma::findOrFail($id);
        if($plataforma->imagen){
            $previous_image_path = public_path('pictures/students/platforms/'.$plataforma->imagen);
            if(file_exists($previous_image_path)){
                unlink($previous_image_path);
            }
        }
        $plataforma->delete();
        return response()->json(['success' =>'Registro eliminado exitosamente']);
    }
    public function status(Request $request){
        $courseId = $request->input('courseId');
        $isChecked = $request->input('isChecked');

        $plataforma = Plataforma::findOrFail($courseId);
        $plataforma->active = $isChecked;
        $plataforma->save();

        return response()->json(['success' => true]);
    }
}
