
<div class="modal fade" id="viewEvent{{$e->id}}" tabindex="-1" aria-labelledby="viewEvent{{$e->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewEvent{{$e->id}}Label">Detalles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p><span class="font-weight-bold">Nombre del Evento: </span>{{$e->nombre}}</p>
                    <p class="font-weight-bold">Descripción: </p>
                    @if ($e->descripcion != null)
                        <p>{!!$e->descripcion!!}</p>
                    @else
                        <p class="font-weight-bold">Este evento no tiene descripción</p>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
