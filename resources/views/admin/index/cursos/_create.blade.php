<div class="modal fade" id="addCurso" tabindex="-1" role="dialog" aria-labelledby="addIdioma" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIdioma">Agregar Nuevo Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="create_course" action="{{route('cursos_store')}}" method="POST" enctype="multipart/form-data" id="createService">
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre*:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="category">Selecciona la categoría correspondiente:*</label>
                            <select name="category" id="category" class="form-control select2" required>
                                <option value="1">General</option>
                                <option value="2">Fines Específicos</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="idioma">Selecciona el idioma correspondiente:*</label>
                            <select name="idioma" id="idioma" class="form-control select2" required>
                                @foreach ($idioma as $i)
                                    <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                                @endforeach
                            </select>
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
