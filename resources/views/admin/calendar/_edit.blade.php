<div class="modal fade" id="editEvent{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Editar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="update_calendar" action="{{route('calendar_update', $e->id)}}" method="POST" enctype="multipart/form-data" id="createService">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Nombre del Evento</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$e->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="start">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="start" name="start" value="{{ \Carbon\Carbon::parse($e->start)->format('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end">Fecha de Término</label>
                        <input type="date" class="form-control" id="end" name="end" value="{{ \Carbon\Carbon::parse($e->end)->format('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="color">Color del Evento</label>
                        <input type="color" class="form-control" id="color" name="color" value="{{ old('color', $e->color) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Evento</button>
                </form>
            </div>
        </div>
    </div>
</div>
