<div class="modal fade" id="editPlataforma{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="editPlataforma" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPlataforma">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_platform" action="{{route('platforms_update', $p->id)}}" method="POST" enctype="multipart/form-data" id="createService">
            @method('PUT')
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre*:</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{$p->nombre}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                            {!!$p->descripcion!!}
                        </textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="category">Link de la plataforma: </label>
                            <input type="text" name="link" id="link" class="form-control" value="{{$p->link}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Imagen relacionada (512px):</label>
                        <input type="file" id="imageUpload" name="imageUpload" accept="image/*" class="form-control">
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
