@extends('layouts.mainevaluador')
@section('titulo')
<title>Usuarios</title>
@section('contenido')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 id="navs">Profesores</h1>
        
            
    </div>

    <!-- Navs Tabs ================================================== -->
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header"></div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg">
                <div class="bs-component">
                    <ul class="nav nav-tabs">
                        
                        
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#pt">Profesores transitorios</a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pc">Profesores de cátedra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#po">Profesores ocasionales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#semestres">Semestres</a>
                        </li>
                        
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade show active" id="pt">
                            <div class="row">
                            <table class="table col-12">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Tipo de usuario</th>
                                            <th>Fecha de registro</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                            @if($usuario->id_tipo_usuario== "1")
                                                    <td>{{$usuario->n_documento}}</td>
                                                    <td>{{$usuario->nombres}}</td>
                                                    <td>{{$usuario->apellidos}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>{{$usuario->nombre_tipo}}</td>
                                                    <td>{{$usuario->created_at}}</td>
                                                    <td>
                                                        <a class="btn btn-round btnEditar" href="{{ url('/e',['id'=>$usuario->id])}}"
                                                            data-id="{{$usuario->id}}"><i class="fa fa-edit text-info"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <div class="tab-pane fade" id="po">
                            <div class="row">
                                <table class="table col-12">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Tipo de usuario</th>
                                            <th>Fecha de registro</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                            @if($usuario->id_tipo_usuario=="3")
                                                <tr>
                                                    <td>{{$usuario->n_documento}}</td>
                                                    <td>{{$usuario->nombres}}</td>
                                                    <td>{{$usuario->apellidos}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>{{$usuario->nombre_tipo}}</td>
                                                    <td>{{$usuario->created_at}}</td>
                                                    <td>
                                                    <a class="btn btn-round btnEditar" href="{{ url('/e',['id'=>$usuario->id])}}"
                                                            data-id="{{$usuario->id}}"><i class="fa fa-edit text-info"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="pc">
                            <div class="row">
                                <table class="table col-12">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Tipo de usuario</th>
                                            <th>Fecha de registro</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                            @if($usuario->id_tipo_usuario== "2")
                                                <tr>
                                                    <td>{{ $usuario->n_documento}}</td>
                                                    <td>{{$usuario->nombres}}</td>
                                                    <td>{{$usuario->apellidos}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>{{$usuario->nombre_tipo}}</td>
                                                    <td>{{$usuario->created_at}}</td>
                                                    <td>
                                                        <a class="btn btn-round btnEditar" href="{{ url('/e',['id'=>$usuario->id])}}"
                                                            data-id="{{$usuario->id}}"><i class="fa fa-edit text-info"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="semestres">
                            <div class="row">
                                <table class="table col-12">
                                    <thead>
                                        <tr>
                                            
                                            <th>Semestre</th>
                                            <th>Fecha inicio</th>
                                            <th>Fecha finalización</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($semestres as $semestre)
                                            <tr>
                                                
                                                <td>{{$semestre->nombre_semestre}}</td>
                                                <td>{{$semestre->inicio}}</td>
                                                <td>{{$semestre->final}}</td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Navs Tabs ================================================== -->
    
    <!-- Modal Agregar Usuario -->
    <div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/usuarios" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            @if($message = Session::get('ErrorInsert'))
                                <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <select name="tipo_usuario" id="intipo_usuario" required="required" class="form-select" aria-label="Default select example">
                                <option  value="">Tipo de usuario</option>
                                @foreach ($tipousuarios as $tipousuario)
                                    <option value="{{$tipousuario->id}}">{{$tipousuario->nombre_tipo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tipo_documento" id="n_tipo_documento" required="required" class="form-select" aria-label="Default select example">
                                <option  value="">Tipo de documento</option>
                                @foreach ($tipo_documentos as $tipo_documento)
                                    <option value="{{$tipo_documento->id}}">{{$tipo_documento->n_tipo_documento}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" name="n_documento" placeholder="Número de documento">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" name="nombres" placeholder="Nombres">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" name="apellidos" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmar-contraseña" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Agregar Usuario -->

    <!-- Modal Agregar Semestre-->
    <div class="modal fade" id="ModalAgregarSemestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar semestre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <form action="/admin/usuarios" method="post">
            @csrf
            <div class="modal-body">
                <div class="row">
                    @if($message = Session::get('ErrorInsertSemestre'))
                        <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="nombre_semestre" placeholder="Semestre">
                </div>
                <div class="form-group">
                    <input type="date" value="{{old('inicio')}}" id="inicio" class="form-control" name="inicio" placeholder="Fecha de inicio">
                </div>
                <div class="form-group">
                    <input type="date" value="{{old('final')}}" id="final" class="form-control" name="final" placeholder="Fecha de finalización">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <!-- End Modal Agregar semestre-->

    <!-- Modal Eliminar-->
    <div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
            <div class="modal-body">
                <h5>¿Estás seguro de eliminar este usuario?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
            </div>
        
        </div>
    </div>
    </div>
    <!-- Modal Editar-->
    <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/usuarios/edit" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            @if($message = Session::get('ErrorInsert'))
                                <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="id" id="idEdit">
                        </div>
                        <div class="form-group">
                            <select name="ntipo_usuario" id="tipo_usuarioEdit" class="form-select" aria-label="Default select example">
                                <option selected>Tipo de usuario</option>

                                @foreach ($tipousuarios as $tipousuario)
                                    <option value="{{ $tipousuario->id }}">{{ $tipousuario->nombre_tipo }}</option>
                                @endforeach
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nnombres" placeholder="Nombres" id="nombresEdit">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="napellidos" placeholder="Apellidos" id="apellidosedit">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="nemail" placeholder="Email" id="emailEdit">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="nuevacontraseña" placeholder="Nueva contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmarnuevacontraseña" placeholder="Confirmar nueva contraseña">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Editar-->
    
@endsection
@section('scripts')
<script>
        var idEliminar=0;
        $(document).ready(function(){
            @if($message = Session::get('ErrorInsert'))
                $("#ModalAgregar").modal('show');
            
            @elseif($message = Session::get('Correcto'))
            Swal.fire({
            title: '¡Perfecto!',
            text: 'Agregado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
            });
            
            @elseif($message = Session::get('Borrado'))
            Swal.fire({
            title: '¡Perfecto!',
            text: 'Eliminado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
            });
            @elseif($message = Session::get('Editado'))
            Swal.fire({
            title: '¡Perfecto!',
            text: 'Editado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
            });
            @endif
            $(".btnEliminar").click(function(){
                idEliminar = $(this).data('id');
            });
            $(".btnModalEliminar").click(function(){
                $("#formEli_"+idEliminar).submit();
            });
            $(".btnEditar").click(function(){
                $("#idEdit").val($(this).data('id'));
                $("#tipo_usuarioEdit").val($(this).data('tipo'));
                $("#nombresEdit").val($(this).data('nombres'));
                $("#apellidosedit").val($(this).data('apellidos'));
                $("#emailEdit").val($(this).data('email'));
            });

            @if($message = Session::get('ErrorInsertSemestre'))
                $("#ModalAgregarSemestre").modal('show');
            
            @elseif($message = Session::get('Correcto'))
            Swal.fire({
            title: '¡Perfecto!',
            text: 'Agregado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
            });
            @endif
        });
    </script>

@endsection
