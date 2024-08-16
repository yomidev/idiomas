<div class="modal fade" id="viewCurso{{$c->id}}" tabindex="-1" aria-labelledby="viewCurso{{$c->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewCurso{{$c->id}}Label">Detalles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    @if ($c->imagen != null)
                        <img src="{{asset('pictures/index/cursos/'.$c->imagen)}}" alt="" class="img-fluid">
                    @endif
                    <p><span class="font-weight-bold">Curso: </span>{{$c->nombre}}</p>
                    <p class="font-weight-bold">Descripción: </p>
                    @if ($c->descripcion != null)
                        <p>{!!$c->descripcion!!}</p>
                    @else
                        <p class="font-weight-bold">Este curso no tiene descripción</p>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
