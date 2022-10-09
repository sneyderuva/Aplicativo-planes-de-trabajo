@extends('layouts.mainadmin')
@section('titulo')
<title>Usuarios</title>
@section('contenido')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">estás en usuarios</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"data-toggle="modal" data-target="#ModalAgregar">
            <i class="fas fa-user fa-sm text-white-50"></i> Agregar Usuario</a>
    </div>
    
    <!-- Modal -->
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
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
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
@endsection
@section('scripts')
    <script>
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
            @endif
        });
    </script>

@endsection
