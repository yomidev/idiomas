@extends('adminlte::page')

@section('title', 'Idiomas')
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)
@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark fw-bolder">Idiomas Ofertados</h1>
@stop

@section('content')
@php
    function truncateHtml($text, $length, $ending = '...') {
        if (strlen(strip_tags($text)) <= $length) {
            return $text;
        }

        $totalLength = strlen($ending);
        $openTags = [];
        $truncate = '';

        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
        foreach ($lines as $line) {
            if (!empty($line[1])) {
                if (preg_match('/^<\s*\/([^\s>]+?)\s*>$/s', $line[1], $tag)) {
                    $pos = array_search($tag[1], $openTags);
                    if ($pos !== false) {
                        unset($openTags[$pos]);
                    }
                } elseif (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line[1], $tag)) {
                    array_unshift($openTags, strtolower($tag[1]));
                }
                $truncate .= $line[1];
            }
            $contentLength = strlen(strip_tags($line[2]));
            if ($totalLength + $contentLength > $length) {
                $left = $length - $totalLength;
                $entitiesLength = 0;
                if (preg_match_all('/&[a-zA-Z0-9#]{2,8};|&#[0-9]{1,7};|&[a-zA-Z0-9]{2,8};/', $line[2], $entities, PREG_OFFSET_CAPTURE)) {
                    foreach ($entities[0] as $entity) {
                        if ($entity[1] + 1 - $entitiesLength <= $left) {
                            $left--;
                            $entitiesLength += strlen($entity[0]);
                        } else {
                            break;
                        }
                    }
                }
                $truncate .= substr($line[2], 0, $left + $entitiesLength) . $ending;
                break;
            } else {
                $truncate .= $line[2];
                $totalLength += $contentLength;
            }
            if ($totalLength >= $length) {
                break;
            }
        }
         foreach ($openTags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
        return $truncate;
    }
@endphp

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addIdioma">
            <i class="fas fa-plus"></i> Nuevo Registro
        </button>
    </div>
    <div class="card-body">
        <div class="container-fluid table-responsive">
            <table class="table table-striped" id="idiomas">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Idioma</th>
                        <th>Texto</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($idiomas as $i)
                        <tr>
                            <td class="text-center">{{$i->id}}</td>
                            <td class="text-center">{{$i->nombre}}</td>
                            <td style="font-size:10pt">{!! truncateHtml($i->descripcion, 200) !!}</td>
                            <td class="text-center">
                                @if($i->imagen != null)
                                    <button class="btn btn-success" data-toggle="modal" data-target="#viewIdioma{{$i->id}}">Ver</button>
                                @endif
                            </td>
                            <td class="text-center d-flex justify-content-between">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editIdioma{{$i->id}}">Editar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        @include('admin.index.idiomas._edit')
                        @include('admin.index.idiomas._image')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.index.idiomas._create')
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $('#idiomas').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json',
                },
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('textarea').summernote();
        });
    </script>
    <script>
        //Store
        $(document).ready(function(){
            $('.create_idioma').on('submit', function(e){
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
                                window.location.href = "{{ route('idiomas_index') }}";
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
            $('.update_idioma').on('submit', function(e){
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
                                window.location.href = "{{ route('idiomas_index') }}";
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
@endsection

