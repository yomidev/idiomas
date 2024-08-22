<?php

namespace App\Http\Controllers;

use App\Models\ServicioEstudiante;
use Illuminate\Http\Request;

class ServiciosEstudianteController extends Controller
{
    public function index() {
        $service = ServicioEstudiante::all();
        return view('admin.students.services.index')->with(['service' => $service]);
    }
    public function store(Request $request){
        $service = new ServicioEstudiante();
        $service->nombre = $request->name;
        $service->descripcion = $request->description;
        $service->save();
        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id){
        $service = ServicioEstudiante::findOrFail($id);
        $service->nombre = $request->name;
        $service->descripcion = $request->description;
        $service->save();

        return response()->json(['success' => true]);
    }
    public function delete($id){
        $service = ServicioEstudiante::findOrFail($id);
        $service->delete();
        return response()->json(['success' =>'Registro eliminado exitosamente']);
    }
    public function status(Request $request){
        $courseId = $request->input('courseId');
        $isChecked = $request->input('isChecked');

        $service = ServicioEstudiante::findOrFail($courseId);
        $service->active = $isChecked;
        $service->save();

        return response()->json(['success' => true]);
    }
}
