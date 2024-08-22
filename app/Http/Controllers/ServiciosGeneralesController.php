<?php

namespace App\Http\Controllers;

use App\Models\ServicioGeneral;
use Illuminate\Http\Request;

class ServiciosGeneralesController extends Controller
{
    public function index(){
        $services = ServicioGeneral::all();
        return view('admin.services.generales.index')->with(['services' => $services]);
    }
    public function store(Request $request){
        $service = new ServicioGeneral;
        $service->nombre = $request->name;
        $service->descripcion = $request->description;
        $service->save();

        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id){
        $service = ServicioGeneral::findOrFail($id);
        $service->nombre = $request->name;
        $service->descripcion = $request->description;
        $service->save();

        return response()->json(['success' => true]);

    }
    public function delete($id){
        $service = ServicioGeneral::findOrFail($id);
        $service->delete();
        return response()->json(['success' =>'Registro eliminado exitosamente']);
    }
    public function status(Request $request){
        $courseId = $request->input('courseId');
        $isChecked = $request->input('isChecked');

        $service = ServicioGeneral::findOrFail($courseId);
        $service->active = $isChecked;
        $service->save();

        return response()->json(['success' => true]);
    }
}
