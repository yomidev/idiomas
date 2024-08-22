<div class="modal fade" id="viewPlataforma{{$p->id}}" tabindex="-1" aria-labelledby="viewPlataforma{{$p->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPlataforma{{$p->id}}Label">Detalles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    @if ($p->imagen != null)
                        <img src="{{asset('pictures/students/platforms/'.$p->imagen)}}" alt="" class="img-fluid">
                    @endif
                    <p><span class="font-weight-bold">Curso: </span>{{$p->nombre}}</p>
                    <p class="font-weight-bold">Descripción: </p>
                    @if ($p->descripcion != null)
                        <p>{!!$p->descripcion!!}</p>
                    @else
                        <p class="font-weight-bold">Este curso no tiene descripción</p>
                    @endif
                    <p><span class="font-weight-bold">Link: </span> {{$p->link}}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
