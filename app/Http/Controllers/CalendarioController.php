<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index(){
        $evento = Calendario::all();
        return view('admin.calendar.index')->with(['evento' => $evento]);
    }
    public function getEvents(){
        $events = Calendario::all();
        return response()->json($events);
    }
    public function store(Request $request){

        $event = new Calendario;
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->color = $request->color;
        $event->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function update(Request $request, $id){
        $event = Calendario::findOrFail($id);
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->color = $request->color;
        $event->save();

        return response()->json(['success' => true]);

    }

    public function delete($id){
        $event = Calendario::findOrFail($id);
        $event->delete();
        return response()->json(['success' =>'Registro eliminado exitosamente']);
    }
}
