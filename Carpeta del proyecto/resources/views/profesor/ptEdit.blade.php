@extends('layouts.mainprofesor')
@section('titulo')
<title>Plan de trabajo {{$id_p_trabajo}}</title>

@endsection
@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plan de trabajo N°. 
        <?php switch($id_p_trabajo){
            
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

        } ?>
        
    </h1>
        <a href="{{Route('p',['id'=>$id_p_trabajo],'pdf')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
        </svg>  Descargar reporte</a>
                
    </div>

    <div class="card">
        <h5 class="card-header">Información personal</h5>
        <div class="card-body">
            
            <h5 class="card-title"></h5> 
                @foreach($p_trabajos as $p_trabajo)
                    @if($p_trabajo->id==$id_p_trabajo)

                    <table class="table table-bordered border-dark table-hover">
                        
                        <tbody>
                            <tr>
                                <td class="table-primary border-dark" >Facultad</td>
                                <td class="border-dark">{{$p_trabajo->nombre_facultad}}</td>
                                <td class="table-primary border-dark">Teléfono</td>
                            </tr>
                            <tr>
                                <td class="table-primary border-dark">Nombre del programa</td>
                                <td class="border-dark">{{$p_trabajo->nombre_programa}}</td>
                                <td class="border-dark">{{$p_trabajo->telefono}}</td>
                            </tr>
                            <tr>
                                <td class="table-primary border-dark" >Correo institucional</td>
                                <td class="border-dark">{{$p_trabajo->email}}</td>
                                <td class="table-primary border-dark">Dirección</td>
                            </tr>
                            <tr>
                                <td class="table-primary border-dark">Tipo de documento</td>
                                <td class="border-dark">{{$p_trabajo->n_tipo_documento}}</td>
                                <td class="border-dark">{{$p_trabajo->direccion}}</td>
                            </tr>
                            <tr>
                                <td class="table-primary border-dark">Número de documento</td>
                                <td class="border-dark">{{$p_trabajo->n_documento}}</td>
                                <td class="table-primary border-dark">Escalafón</td>
                            </tr>
                            <tr>
                                <td class="table-primary border-dark">Nombres</td>
                                <td class="border-dark">{{$p_trabajo->nombres}} {{$p_trabajo->apellidos}}</td>
                                <td class="border-dark">{{$p_trabajo->escalafon}}</td>
                                
                            </tr>
                        </tbody>
                        </table>
                        

                    @endif
                    
                @endforeach

        </div>
    </div>
    <br>
    </br>
    <div class="card">
        <h5 class="card-header">Información General</h5>
        <div class="card-body">
            
            <h5 class="card-title"></h5>
            </form>
            @foreach($p_trabajos as $p_trabajo)
                @if($p_trabajo->id==$id_p_trabajo)

                <table class="table table-bordered border-dark table-hover">
                    <tbody>
                        <tr>
                            <td class="table-primary border-dark" >Tipo de vinculación</td>
                            <td class="border-dark">{{$p_trabajo->nombre_tipo_vinculacion}}</td>
                            <td class="table-primary border-dark">NPT</td>
                        </tr>
                        <tr>
                            <td class="table-primary border-dark">Tipo de dedicación</td>
                            <td class="border-dark">{{$p_trabajo->nombre_tipo_dedicacion}}</td>
                            <td class="border-dark"><?php 
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
                        </tr>
                        <tr>
                            <td class="table-primary border-dark" >Horas por semana</td>
                            <td class="border-dark">{{$p_trabajo->horas_semana}}</td>
                            <td class="table-primary border-dark">Fecha de elaboración</td>
                        </tr>
                        <tr>
                            <td class="table-primary border-dark">Horas por semestre</td>
                            <td class="border-dark">{{$p_trabajo->horas_semestre}}</td>
                            <td class="border-dark">{{$p_trabajo->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="table-primary border-dark">Número de documento</td>
                            <td class="border-dark">{{$p_trabajo->n_documento}}</td>
                            <td class="table-primary border-dark">Periodo académico</td>
                        </tr>
                        <tr>
                            <td class="table-primary border-dark">Nombres</td>
                            <td class="border-dark">{{$p_trabajo->nombres}} {{$p_trabajo->apellidos}}</td>
                            <td class="border-dark">{{$p_trabajo->nombre_semestre}}</td>

                        </tr>
                    </tbody>
                </table>

                @endif
            @endforeach
            
        </div>
    </div>
    <br>
    </br>
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="mr-auto p-2 h3 mb-0 text-gray-800">Actividades</div>
                <div class="p-2">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#ModalAgregarActividad">
                    <i class="fas fa-plus fa-sm text-white-50 justify-content-center" style="height:20px;"></i> Crear actividad</a>
                </div>
            </div>
        
        </div>
        <div class="card-body">

        <?php $array_tareas_id = array(); $id_deactividad=0; $array_tareas = array();$array = array(); $x=0;$n=0;$nombres=array();
        $idesAct = array();?>
            @foreach($actividades as $actividad)
                @if($actividad->id_plan_trabajo==$id_p_trabajo) 
                    <?php $array[$n]=$actividad->id_tipo_actividad; $idesAct[$n]=$actividad->id; $nombres[$n]=$actividad->nombre_tipo_actividad;$n++;?>

                @endif
            @endforeach
            <?php $n=0; ?>
            @foreach($tareas as $tarea)
                @if($tarea->id_p_trabajo==$id_p_trabajo)
                    <?php
                        $array_tareas[$n]=$tarea->descripcion;
                        $array_tareas_id[$n]=$tarea->id_tipo_actividad;
                        $auxiliar = array();
                        $n++;
                    ?>
                @endif
            @endforeach
            <?php $array_count = count($array);
                $temp = array();
                $duplicate_array = array();
                
                for($i=0;$i<$array_count; $i++){
                    $duplicate_array[$array[$i]]=$array[$i];
                }
                ?>

            <p></p>
                <h1 class="h3 mb-0 text-gray-600">
                @if($count_actividades==1 and $count_tareas==0)
                    Tienes {{$count_actividades}} actividad y {{$count_tareas}} tareas </h1>
                @elseif($count_actividades==1 and $count_tareas==1)
                    Tienes {{$count_actividades}} actividad y {{$count_tareas}} tarea </h1>
                @elseif($count_actividades==1 and $count_tareas!=0)
                    Tienes {{$count_actividades}} actividad y {{$count_tareas}} tareas </h1>
                @else
                    Tienes {{$count_actividades}} actividades y {{$count_tareas}} tareas </h1>
                @endif
            <br>
            </br>
            
            @if(count($actividades)>0)
            @foreach($duplicate_array as $value)   
                    <div class="row">
                        <div class="bs-component">
                            <div class="accordion" id="accordion{{$duplicate_array[$value]}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$duplicate_array[$value]}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$nombres[$duplicate_array[$value]]}}
                                            <?php if(count($idesAct)>=$x){
                                                $id_deactividad=$idesAct[$x];}?>
                                        </button>
                                    </h2>
                                    <div id="collapse{{$duplicate_array[$value]}}" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                                @foreach($array_tareas_id as $array_tareas_i)
                                                    @if($array_tareas_i==$value)
                                                        <div class="d-flex ">
                                                            <div class="me-auto p-2">
                                                                <p class="">
                                                                    {{$array_tareas[$x]}}
                                                                    
                                                                </p>   
                                                            </div>
                                                            <form action="{{ Route('p',['id'=>$id_p_trabajo],'t')}}" method="post">
                                                                @csrf
                                                                <button class="btn">
                                                                    <i class="fa fa-edit"></i>
                                                                <input type="hidden" name="id_p_trabajo" value="{{ $id_p_trabajo}}">
                                                                <input type="hidden" name="nombre_tarea" value="{{ $array_tareas[$x]}}">
                                                                <input type="hidden" name="id_tarea" value="{{ $array_tareas[$x]}}">
                                                                <input type="hidden" name="nombre_actividad" value="{{$nombres[$duplicate_array[$value]]}}">
                                                                <input type="hidden" name="id_actividad" value="{{ $array_tareas[$x]}}">
                                                            </form>
                                                        </div>
                                                        <?php $x++; ?>
                                                    @endif
                                                @endforeach
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#ModalAgregarTarea">
                                                <i class="fas fa-plus fa-sm text-white-50 justify-content-center" style="height:20px;"></i> Añadir tarea</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            @else
            <p>aún no hay ninguna tarea</p>
            @endif
        </div>
        
    </div>
</div>
<br>
</br>

    <!-- Modal Agregar actividad-->
    <div class="modal fade" id="ModalAgregarActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">Crear una nueva actividad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/p/{{$id_p_trabajo}}" method="post">
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
                    <select name="actividad" id="actividad" class="form-select" aria-label="select-actividad">
                        <option  value="">Seleccione el tipo de actividad</option>
                        @foreach ($tipo_acts as $act)
                            <option value="{{ $act->id_tipo_actividad }}">{{ $act->nombre_tipo_actividad }}</option>
                        @endforeach
                    </select>


                </div>
                <div class="form-group">
                    <input class="form-control" name="semanales" type="text" id="semanales" placeholder="Horas semanales">
                </div>
                <div class="form-group">
                    <input class="form-control" name="semestrales" type="text" id="semestrales" placeholder="Horas semestrales">
                    <input class="form-control" name="idpt" type="hidden" id="idpt" value="{{$id_p_trabajo}}">

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
    <!-- Modal Agregar Tarea-->
    <div class="modal fade" id="ModalAgregarTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">Añadir una nueva tarea</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/p/{{$id_p_trabajo}}" method="post">
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
                    <input class="form-control" name="titulo" type="text" id="titulo" placeholder="Titulo de la tarea">
                </div>
                <div class="form-group">
                    <input class="form-control" name="semanales" type="text" id="semanales" placeholder="Horas semanales">
                </div>
                <div class="form-group">
                    <input class="form-control" name="semestrales" type="text" id="semestrales" placeholder="Horas semestrales">
                    <input class="form-control" name="idpt" type="hidden" id="idpt" value="{{$id_p_trabajo}}">
                    <input type="hidden" name="idact" value="{{$id_deactividad}}">
                </div>
                <div class="form-group">
                    <label for="descripcion2">Descripción</label>
                    <textarea name="descripcion" id="descripcion"msg cols="30" rows="5" class="form-control" style="background-color: white;"></textarea>
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

@endsection

@section('scripts')

<script>
        
        $(document).ready(function(){
            @if($message = Session::get('ErrorInsert'))
                $("#ModalAgregarActividad").modal('show');
            @elseif($message = Session::get('Error2'))
                $("#ModalAgregarTarea").modal('show');
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