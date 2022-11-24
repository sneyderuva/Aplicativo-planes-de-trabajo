@extends('layouts.mainprofesor')
@section('titulo')
<title>Profesor</title>
@endsection
@section('contenido')


        @if($count_p_trabajos==0)
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/dash/img/LogoUnitropicoColor.png')}}" width="40%" height="40%" >
                </div>
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                    <h3 class="h3 mb-0 text-gray" >Agrega un plan de trabajo para empezar</h3>
                </div>

                
        @else        
                <div class="d-sm-flex align-items-center justify-content-center mb-4">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalAgregarpt">
                        <i class="fas fa-plus fa-sm text-white-50 justify-content-center
                        " style="height:20px;"></i> Crear plan de trabajo</a>
                </div>
                    <table class="table col-12">
                        <thead>
                            <tr>
                                <th>NPT</th>
                                <th>periodo</th>
                                <th>vinculación</th>
                                <th>dedicación</th>                                            
                                <th>Horas Semana</th>
                                <th>Horas semestre</th>
                                <th>Fecha de Creación</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($p_trabajos as $p_trabajo)

                                    <tr>
                                        <td>
                                        <?php $id_p_trabajo=$p_trabajo->id;
                                            switch($id_p_trabajo){
                                                case $id_p_trabajo>0 and $id_p_trabajo <=9:
                                                    echo "000".$id_p_trabajo;
                                                break;
                                                case $id_p_trabajo>=9 and $id_p_trabajo<=99:
                                                    echo "00".$id_p_trabajo;
                                                break;
                                                case $id_p_trabajo>=99 and $id_p_trabajo<=999:
                                                    echo "0".$id_p_trabajo;
                                                break;
                                                case $id_p_trabajo>=999 and $id_p_trabajo<=9999:
                                                    echo $id_p_trabajo;
                                                break;

                                            } ?></td>
                                        <td>{{$p_trabajo->nombre_semestre}}</td>
                                        <td>{{$p_trabajo->nombre_tipo_vinculacion}}</td>
                                        <td>{{$p_trabajo->nombre_tipo_dedicacion}}</td>
                                        <td>{{$p_trabajo->horas_semana}} horas</td>
                                        <td>{{$p_trabajo->horas_semestre}} horas</td>
                                        <td>{{$p_trabajo->created_at}}</td>
                                        <td>
                                            <a class="btn btn-round btnEditar" href="{{ url('/p',['id'=>$p_trabajo->id ])}}"
                                                data-id="{{ $p_trabajo->id }}"
                                                ><i class="fa fa-edit text-warning"></i>
                                            </a>
                                            <button class="btn btn-round btnEliminar" data-id="{{ $p_trabajo->id }}"  data-toggle="modal" data-target="#ModalEliminar">
                                                <i class="fa fa-trash text-danger"></i>
                                            </button>
                                            <form action="{{ url('/',['id'=>$p_trabajo->id]) }}" method="post" id="formEli_{{ $p_trabajo->id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p_trabajo->id }}">
                                                <input type="hidden" name="_method" value="delete">
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif

            
                    <!-- Modal -->
                    <div class="modal fade" id="ModalAgregarpt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document"> 
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Crear un nuevo plan de trabajo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/" method="post">
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
                                    <select name="semestre" id="semestre" class="form-select" aria-label="select-semestre">
                                        <option  value="">Seleccione el semestre</option>
                                        @foreach ($semestres as $semestre)
                                            <option value="{{ $semestre->id }}">{{ $semestre->nombre_semestre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
                    <!-- Modal Eliminar-->
                    <div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document"> 
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar plan de trabajo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5>¿Estás seguro de eliminar este plan de trabajo?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    
@endsection
@section('scripts')
    <script>       
        var idEliminar=0;
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
                @elseif($message = Session::get('Borrado'))
                    Swal.fire({
                    title: '¡Perfecto!',
                    text: 'Eliminado correctamente',
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
            });
    </script>
@endsection

@section('navbar')
<li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Progreso</span></a>
        </li>
        <!-- Heading -->
        <li class="nav-item active">
            <a class="nav-link " href="{{url('/p')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Planes de trabajo</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/p/a')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Mis actividades</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Evaluación
        </div>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('/p/r')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Resultados</span></a>
        </li>
@endsection