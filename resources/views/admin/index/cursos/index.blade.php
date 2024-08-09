@extends('adminlte::page')

@section('title', 'Cursos')
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)
@section('plugins.Summernote', true)
@section('plugins.Select2', true)

@section('content_header')
    <h1 class="m-0 text-dark fw-bolder">Cursos Ofertados</h1>
@stop
@section('css')
    <style>
        .statusCourse {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #d2d6de;
            width: 40px;
            height: 20px;
            border-radius: 20px; 
            position: relative;
            cursor: pointer;
            outline: none;
            transition: background-color 0.3s ease; 
        }

        .statusCourse::before {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 2px;
            width: 16px;
            height: 16px;
            background-color: #fff;
            border-radius: 50%;
            transition: left 0.3s ease;
        }

        .statusCourse:checked {
            background-color: #28a745;
        }

        .statusCourse:checked::before {
            left: 22px;
        }
    </style>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addCurso">
            <i class="fas fa-plus"></i> Nuevo Registro
        </button>
    </div>
    <div class="card-body">
        <div class="container-fluid table-responsive">
            <table class="table table-striped" id="cursos">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Idioma</th>
                        <th>Visible</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $c)
                    <tr class="text-center">
                        <td>{{$c->id}}</td>
                        <td>{{$c->nombre}}</td>
                        @if ($c->categoria == 1)
                            <td>General</td>
                        @else
                            <td>Fines Específicos</td>
                        @endif
                        <td>{{$c->idioma_nombre}}</td>
                        <td>
                            <input data-id="{{$c->id}}" class="statusCourse" type="checkbox" {{ $c->active ? 'checked' : '' }}>
                        </td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#viewCurso{{$c->id}}">Detalles</button>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editCurso{{$c->id}}">Editar</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCurso{{$c->id}}">Eliminar</button>
                        </td>
                    </tr>
                    @include('admin.index.cursos._edit')
                    @include('admin.index.cursos._details')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.index.cursos._create')

@stop
@section('js')
<script>
    $(document).ready(function(){
        $('#cursos').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json',
            },
            responsive: true,
        });
    });
    $(document).ready(function() {
        $('textarea').summernote();
        $('.select2').select2({
            width: '100%'
        });
    });
</script>
<script>
    //Store
    $(document).ready(function(){
        $('.create_course').on('submit', function(e){
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
                            title: '¡Registro creado!',
                            text: 'El registro ha sido creado correctamente',
                        }).then(function(){
                            window.location.href = "{{ route('cursos_index') }}";
                        });
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: '¡Error!',
                            text: 'Hubo un problema al crear el registro',
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
        $('.update_course').on('submit', function(e){
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
                            window.location.href = "{{ route('cursos_index') }}";
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
    $(document).ready(function () {
        $('.statusCourse').change(function () {
            var courseId = $(this).data('id');
            var isChecked = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                type: 'post',
                url: '/admin/cursos/change/status',
                data: {
                    courseId: courseId,
                    isChecked: isChecked,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Mostrar SweetAlert
                    console.log('Solicitud AJAX exitosa:', response);
                    Swal.fire({
                        type: 'success',
                        title: '¡Estado actualizado!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function (error) {
                    console.error('Error al actualizar el estado:', error);

                    // Mostrar SweetAlert con mensaje de error
                    Swal.fire({
                        type: 'error',
                        title: 'Error al actualizar el estado',
                        text: 'Ha ocurrido un error. Por favor, inténtalo de nuevo.',
                    });

                    // Desmarcar el checkbox en caso de error
                    $(this).prop('checked', !isChecked);
                }
            });
        });
    });
</script>
@endsection
