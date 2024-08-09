<div class="modal fade" id="editCurso{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="editCurso" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCurso">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_course" action="{{route('cursos_update', $c->id)}}" method="POST" enctype="multipart/form-data" id="createService">
            @method('PUT')
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre*:</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{$c->nombre}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                            {!!$c->descripcion!!}
                        </textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="category">Selecciona la categoría correspondiente:*</label>
                            <select name="category" id="category" class="form-control select2" required>
                                <option value="1" @if($c->categoria == 1) selected @endif>General</option>
                                <option value="2" @if($c->categoria == 2) selected @endif>Fines Específicos</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="idioma">Selecciona el idioma correspondiente:*</label>
                            <select name="idioma" id="idioma" class="form-control select2" required>
                                @foreach ($idioma as $i)
                                    <option value="{{ $i->id }}" @if($i->id == $c->id_idioma) selected @endif>{{ $i->nombre }}</option>
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
