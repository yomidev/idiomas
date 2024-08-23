@extends('adminlte::page')

@section('title', 'Cronograma')
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)
@section('plugins.Summernote', true)
@section('plugins.Select2', true)
@section('plugins.FullCalendar', true)

@section('content_header')
    <h1 class="m-0 text-dark fw-bolder">Cronograma</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addEvent">
            <i class="fas fa-plus"></i> Nuevo Registro
        </button>
    </div>
    <div class="card-body">
        <div id="calendar"></div>
        <div class="container-fluid table-responsive mt-3">
            <table class="table table-striped" id="calendario">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Evento</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Termino</th>
                        <th>Color</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evento as $e)
                        <tr>
                            <td>{{$e->id}}</td>
                            <td>{{$e->title}}</td>
                            <td>{{$e->start}}</td>
                            <td>{{$e->end}}</td>
                            <td>{{$e->color}}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editEvent{{$e->id}}">Editar</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $e->id }}">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.calendar._edit')
                        @include('admin.calendar._delete')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.calendar._event')
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fullcalendar/main.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/fullcalendar/main.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#calendario').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json',
                },
                responsive: true,
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/api/events',
                selectable: true,
                editable: true,
                dateClick: function(info) {
                    $('#start').val(info.dateStr);
                    $('#end').val('');
                    $('#title').val('');
                    $('#color').val('');
                    $('#addEvent').modal('show');
                }
            });

            calendar.render();
        });
    </script>
<script>
    // Store
    $(document).ready(function(){
        $('.create_calendar').on('submit', function(e){
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.success){
                        Swal.fire({
                            type: 'success',
                            title: '¡Evento guardado!',
                            text: 'El evento ha sido guardado correctamente',
                        }).then(function(){
                            window.location.href = "{{ route('calendar_index') }}";
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '¡Error!',
                            text: 'Hubo un problema al guardar el evento',
                        });
                    }
                },
                error: function(){
                    Swal.fire({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Hubo un problema al enviar la solicitud al servidor'
                    });
                }
            });
        });
    });
</script>

    <script>
        //Update
        $(document).ready(function(){
            $('.update_calendar').on('submit', function(e){
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        if(response.success){
                            Swal.fire({
                                type: 'success',
                                title: '¡Registro Actualizado!',
                                text: 'El registro ha sido actualizado correctamente',
                            }).then(function(){
                                window.location.href = "{{ route('calendar_index') }}";
                            });
                        }else{
                            Swal.fire({
                                type: 'error',
                                title: '¡Error!',
                                text: 'Hubo un problema al actualizar el registro',
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            type: 'error',
                            title: '¡Error!',
                            text: 'Hubo un problema al enviar la solicitud al servidor'
                        });
                    }
                });
            });
        });
    </script>
    <script>
        let deleteId;
        $('#deleteModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            deleteId = button.data('id');
        });
        $('#confirmDelete').on('click', function () {
            $.ajax({
                url: '/admin/calendar/' + deleteId + '/delete',
                type: 'DELETE',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        title: '¡Registro Eliminado!',
                        text: response.success
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    $('#deleteModal').modal('hide');
                    Swal.fire({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Hubo un problema al enviar la solicitud al servidor.'
                    });
                }
            });
        });
    </script>

@stop
