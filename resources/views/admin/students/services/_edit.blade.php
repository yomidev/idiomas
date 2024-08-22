<div class="modal fade" id="editService{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="editService" aria-hidden="true">
    <div class="modal-dialog modal-xl role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEvent">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_service" action="{{route('students_update', $s->id)}}" method="POST" enctype="multipart/form-data" id="createService">
            @method('PUT')
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre*:</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{$s->nombre}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                            {!!$s->descripcion!!}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cancelar</button>
                    <button type="submit" class="btn btn-success" id="formSubmit">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
