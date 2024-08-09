<div class="modal fade" id="viewIdioma{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="viewIdiomaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewdiomaLabel">Imagen Actual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <img src="{{asset('pictures/index/idiomas/'.$i->imagen)}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cerrar</button>
            </div>
        </div>
    </div>
</div>
