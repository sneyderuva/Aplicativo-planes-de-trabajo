@extends('layouts.mainprofesor')
@section('titulo')
<title>Profesor</title>
@endsection
@section('contenido')



                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/dash/img/LogoUnitropicoColor.png')}}" width="40%" height="40%" >
                </div>
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                    <h3 class="h3 mb-0 text-gray" >Agrega un plan de trabajo para empezar</h3>
                </div>

                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalAgregarpt">
                        <i class="fas fa-plus fa-sm text-white-50 justify-content-center
                        " style="height:20px;"></i> Crear plan de trabajo</a>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="ModalAgregarpt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document"> 
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear nuevo plan de trabajo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/p" method="post">
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
                                    <select name="semestre" id="semestre" class="form-control" aria-label="select-semestre">
                                        <option  value="">Seleccione el semestre</option>
                                        @foreach ($semestres as $semestre)
                                            <option value="{{ $semestre->nombre_semestre }}">{{ $semestre->nombre_semestre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <select name="semestre" id="semestre" class="form-control" aria-label="select-semestre">
                                        <option  value="">Seleccione el tipo de vinculación</option>
                                        @foreach ($vinculaciones as $vinculacion)
                                            <option value="{{ $vinculacion->nombre }}">{{ $vinculacion->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="semestre" id="semestre" class="form-control" aria-label="select-semestre">
                                        <option  value="">Seleccione la dedicación</option>
                                        @foreach ($dedicaciones as $dedicacion)
                                            <option value="{{ $dedicacion->nombre }}">{{ $dedicacion->nombre }}</option>
                                        @endforeach
                                    </select>
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
                    <!-- modal -->
                    <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregado correctamente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Agregar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Content Row -->
    
                    
@endsection
@section('scripts')
        <script>
        $(document).ready(function(){
            @if($message = Session::get('ErrorInsert'))
                $("#ModalAgregarpt").modal('show');
            
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