<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificacion;

class CertificacionesController extends Controller
{
    public function index(){
        $cert = Certificacion::all();
        return view('admin.services.certificaciones.index')->with(['cert' => $cert]);

    }
    public function store(Request $request){
        $cert = new Certificacion;
        $cert->nombre = $request->name;
        $cert->descripcion = $request->description;
        $attached = $request->file("imageUpload");
        //Verificar si se ha proporcionado un archivo
        if($request->hasFile('imageUpload')){
            $file_attached = 'Certificacion'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/services/certificacion';
            $attached->move($path, $file_attached);
            $cert->logo = $file_attached;
        }
        $cert->save();
        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id){
        $cert = Certificacion::findOrFail($id);
        $cert->nombre = $request->name;
        $cert->descripcion = $request->description;
        $attached = $request->file("imageUpload");
        //Verificar si existe imagen
        if($request->hasFile('imageUpload')){
            if($cert->logo){
                $previous_image_path = public_path('pictures/index/cursos/'.$cert->logo);
                if(file_exists($previous_image_path)){
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Certificacion'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/services/certificacion';
            $attached->move($path, $file_attached);
            $cert->logo = $file_attached;
        }
        $cert->save();
        return response()->json(['success' => true]);
    }
    public function delete($id){

    }
    public function status(Request $request){
        $courseId = $request->input('courseId');
        $isChecked = $request->input('isChecked');

        $cert = Certificacion::findOrFail($courseId);
        $cert->active = $isChecked;
        $cert->save();

        return response()->json(['success' => true]);
    }
}
