<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventosController extends Controller
{
    public function index(){
        $events = Evento::all();
        return view('admin.index.eventos.index')->with(['events' => $events]);

    }
    public function store(Request $request){
        $event = new Evento;
        $event->nombre = $request->name;
        $event->descripcion = $request->description;
        $event->save();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id){
        $event = Evento::findOrFail($id);
        $event->nombre = $request->name;
        $event->descripcion = $request->description;
        $event->save();

        return response()->json(['success' => true]);
    }
    public function delete($id){
        $event = Evento::findOrFail($id);
        $event->delete();
        return response()->json(['success' =>'Registro eliminado exitosamente']);
    }
    public function status(Request $request){
        $courseId = $request->input('courseId');
        $isChecked = $request->input('isChecked');

        $curso = Evento::findOrFail($courseId);
        $curso->active = $isChecked;
        $curso->save();

        return response()->json(['success' => true]);
    }
}
