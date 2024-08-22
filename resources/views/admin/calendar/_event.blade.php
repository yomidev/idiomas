<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Agregar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="create_calendar" action="{{route('calendar_store')}}" method="POST" enctype="multipart/form-data" id="createService">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="title">Nombre del Evento</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="start">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="start" name="start" required>
                    </div>
                    <div class="form-group">
                        <label for="end">Fecha de Término</label>
                        <input type="date" class="form-control" id="end" name="end">
                    </div>
                    <div class="form-group">
                        <label for="color">Color del Evento</label>
                        <input type="color" class="form-control" id="color" name="color" value="#3788d8">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Evento</button>
                </form>
            </div>
        </div>
    </div>
</div>
