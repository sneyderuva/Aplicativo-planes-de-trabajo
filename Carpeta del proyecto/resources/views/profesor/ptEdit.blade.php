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
                            <a class="nav-link active" data-toggle="tab" href="#act">Actividades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#inf">Información</a>
                        </li>
                       
                        
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade" id="inf">
                            <div class="row">
                                
                                <!-- Content Row -->
                                <div class="row">
                                    <br><p></p></br>
                                    <div class="card">
                                        <h5 class="card-header">Información general</h5>
                                        <div class="card-body">
                                            <h5 class="card-title"></h5> 
                                            @foreach($p_trabajos as $p_trabajo)
                                                @if($p_trabajo->id==$id_p_trabajo)

                                                <table class="table table-bordered border-white-500 table-hover">
                                                    
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-primary border-primary-100" >Facultad</td>
                                                            <td class="border-white-500">{{$p_trabajo->nombre_facultad}}</td>
                                                            <td class="table-primary border-primary-100">Teléfono</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100">Nombre del programa</td>
                                                            <td class="border-white-500">{{$p_trabajo->nombre_programa}}</td>
                                                            <td class="border-white-500">{{$p_trabajo->telefono}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100" >Correo institucional</td>
                                                            <td class="border-white-500">{{$p_trabajo->email}}</td>
                                                            <td class="table-primary border-primary-100">Dirección</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100">Tipo de documento</td>
                                                            <td class="border-white-500">{{$p_trabajo->n_tipo_documento}}</td>
                                                            <td class="border-white-500">{{$p_trabajo->direccion}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100">Número de documento</td>
                                                            <td class="border-white-500">{{$p_trabajo->n_documento}}</td>
                                                            <td class="table-primary border-primary-100">Escalafón</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100">Nombres</td>
                                                            <td class="border-white-500">{{$p_trabajo->nombres}} {{$p_trabajo->apellidos}}</td>
                                                            <td class="border-white-500">{{$p_trabajo->escalafon}}</td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100">Tipo de vinculación</td>
                                                            <td class="border-white-500">{{$p_trabajo->nombre_tipo_vinculacion}}</td>
                                                            <td class="table-primary border-primary-100">NPT</td>
                                                        </tr>
                                                        <td class="table-primary border-primary-100">Tipo de dedicación</td>
                                                            <td class="border-white-500">{{$p_trabajo->nombre_tipo_dedicacion}}</td>
                                                            <td class="border-white-500"><?php 
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
                                                            <td class="table-primary border-primary-100" >Horas por semana</td>
                                                            <td class="border-white-500">{{$p_trabajo->horas_semana}}</td>
                                                            <td class="table-primary border-primary-100">Fecha de elaboración</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100">Horas por semestre</td>
                                                            <td class="border-white-500">{{$p_trabajo->horas_semestre}}</td>
                                                            <td class="border-white-500">{{$p_trabajo->created_at}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-primary border-primary-100">Periodo académico</td>
                                                            <td class="border-white-500">{{$p_trabajo->nombre_semestre}}</td>    
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>
                                    </br>
                                                                            
                                    </div>
                                </div>
                            </div>
                       
                    <div class="tab-pane fade show active" id="act">
                        <br>
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div class="mr-auto p-2 h3 mb-0 text-gray-800">Actividades</div>
                                            <div class="p-2">
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#ModalAgregarActividad">
                                                <i class="fas fa-plus fa-sm text-white-50 justify-content-center" style="height:20px;"></i> Crear sección</a>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="card-body">
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
                                        
                                        @foreach($actividades as $actividad)
                                            <?php $id_actividad = $actividad->id; $tipo_actividad = $actividad->id_tipo_actividad?>
                                            <div class="row">
                                                <div class="bs-component">
                                                    <div class="accordion" id="accordion{{$id_actividad}}">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse{{$id_actividad}}" aria-expanded="false" aria-controls="collapseTwo">
                                                                    
                                                                    @foreach($tipo_acts as $tipo_act)
                                                                        @if($tipo_actividad==$tipo_act->id_tipo_actividad)
                                                                            {{$tipo_act->nombre_tipo_actividad}}
                                                                            <?php $tipoAct = $tipo_act->nombre_tipo_actividad; ?>
                                                                        @endif
                                                                    @endforeach
                                                                    
                                                                    
                                                                </button>
                                                            </h2>
                                                            <div id="collapse{{$id_actividad}}" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    
                                                                    @foreach($tareas as $tarea)
                                                                        @if($tarea->id_actividad==$id_actividad)
                                                                        
                                                                            <div class="d-flex ">
                                                                                <div class="me-auto p-2">
                                                                                    <p class="">
                                                                                        {{$tarea->descripcion}}
                                                                                    </p>  
                                                                                    
                                                                                </div>
                                                                                <div class="p-2">
                                                                                    <button class="btn btn-round btnEditar" data-toggle="modal" data-target="#ModalEditarTarea"
                                                                                        data-id="{{ $tarea->id }}"
                                                                                        data-idpt="{{$id_p_trabajo}}"
                                                                                        data-idact="{{$tarea->id_actividad}}"
                                                                                        data-descripcion="{{ $tarea->descripcion }}"
                                                                                        data-descripcion2="{{ $tarea->descripcion2 }}"
                                                                                        data-horas="{{ $tarea->horas }}"
                                                                                        data-horassemestre="{{ $tarea->horas_semestre }}"
                                                                                        data-semanas="{{ $tarea->semanas }}"
                                                                                        ><i class="fa fa-edit"></i>
                                                                                    </button>
                                                                                    <button class="btn btn-round btnEliminarTarea" data-id="{{ $tarea->id }}" title="Eliminar esta actividad" data-toggle="modal" data-target="#ModalEliminarTarea">
                                                                                        <i class="fa fa-trash "></i>
                                                                                    </button>
                                                                                    <form action="{{ url('/t',['id'=>$tarea->id]) }}" method="post" id="formEli_{{ $tarea->id }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{ $tarea->id }}">
                                                                                        <input type="hidden" name="_method" value="delete">
                                                                                    </form>
                                                                                    
                                                                                
                                                                                    
                                                                                
                                                                                </div>
                                                                                <div class="p-2">
                                                                                    
                                                                                <form action="{{ Route('p',['id'=>$id_p_trabajo],'t')}}" method="post">
                                                                                        @csrf
                                                                                        
                                                                                        <button class="btn" title="Revisar actividad">
                                                                                            <i class="fa fa-clipboard"></i>
                                                                                        </button>
                                                                                        <input type="hidden" name="id_p_trabajo" value="{{$id_p_trabajo}}">
                                                                                        <input type="hidden" name="nombre_tarea" value="{{$tarea->descripcion}}">
                                                                                        <input type="hidden" name="id_tarea" value="{{$tarea->id}}">
                                                                                        <input type="hidden" name="nombre_actividad" value="{{$tipoAct}}">
                                                                                        <input type="hidden" name="id_actividad" value="{{$id_actividad}}">
                                                                                        <input type="hidden" name="descripcion" value="{{$tarea->descripcion2}}">
                                                                                        <input type="hidden" name="horas" value="{{$tarea->horas}}">
                                                                                    </form>
                                                                                    
                                                                                </div>
                                                                                
                                                                                
                                                                            </div>
                                                                            <hr class="border border-primary opacity-80 shadow shadow-lg ">
                                                                        @endif
                                                                    @endforeach
                                                                    
                                                                            <!-- Modal Agregar Tarea-->
                                                                            <div class="modal fade" id="ModalAgregarTarea{{$id_actividad}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document"> 
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title text-primary" id="exampleModalLabel">Añadir una nueva actividad</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="/p/{{$id_p_trabajo}}/st" method="post">
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
                                                                                            <input class="form-control" name="semanales" type="number" id="v1" oninput="calcular()" placeholder="Horas semanales" title="Ingresar la cantidad de horas a la semana que se realizará la actividad">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <input class="form-control" name="semanas" type="number" id="v2" oninput="calcular()" placeholder="cantidad de semanas" title="Ingresar la cantidad de semanas en que se realizará la actividad">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label >Horas semestrales: </label>
                                                                                            <label class="text-success" oninput="calcular()" id="horas_semestre"><script> document.write(calcular());</script></label>
                                                                                            <input name="horas_semestre" type="hidden" id="v3">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            
                                                                                            <input class="form-control" name="idpt" type="hidden" id="idpt" value="{{$id_p_trabajo}}">
                                                                                            <input class="form-control" name="idact" type="hidden" id="idact" value="{{$id_actividad}}">
                                                                                            
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
                                                                            <div class="d-flex ">
                                                                                <div class="mr-auto p-2">

                                                                                </div>
                                                                                <div class="p-2">
                                                                                    
                                                                                    <form action="{{Route('p',['id'=>$id_p_trabajo])}}" method="post">
                                                                                        @csrf
                                                                                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" id="idact" data-idact="{{$id_actividad}}" data-toggle="modal" data-target="#ModalAgregarTarea{{$id_actividad}}">
                                                                                        <i class="fas fa-plus fa-sm text-white-50 " style="height:20px;"></i> Añadir Actividad</a>
                                                                                        <input class="form-control" name="idacti" type="hidden" id="idacti" value="{{$id_actividad}}">
                                                                                    </form>
                                                                                         
                                                                                </div>
                                                                                <div class="p-2">
                                                                                    <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm btnEliminarActividad" data-id="{{ $actividad->id }}"  data-toggle="modal" data-target="#ModalEliminarActividad">
                                                                                        <i class="fa fa-trash " style="height:20px;"></i></a> 

                                                                                    <form action="{{url('/a',['id'=>$id_actividad])}}" method="post" id="formEli_{{ $actividad->id }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{ $actividad->id }}">
                                                                                        <input type="hidden" name="_method" value="delete">
                                                                                    </form>
                                                                                </div>
                                                                            </div>       
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="pc">
                            
                        </div>
                        
                        <div class="tab-pane fade" id="semestres">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Navs Tabs ================================================== -->


    
    <br>
    </br>
    
<br>
</br>

    <!-- Modal Agregar actividad-->
    <div class="modal fade" id="ModalAgregarActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">Crear una nueva sección</h5>
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
                                @endforeach}
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <select name="actividad" id="actividad" class="form-select" aria-label="select-actividad">
                        <option  value="">Seleccione el tipo de actividades</option>
                        @foreach ($tipo_acts as $act)
                            <option value="{{ $act->id_tipo_actividad }}">{{ $act->nombre_tipo_actividad }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
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


<!-- Modal Editar Tarea-->
<div class="modal fade" id="ModalEditarTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">Editar actividad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/p/{{$id_p_trabajo}}/et" method="post">
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
                    <input class="form-control" name="ndescripcion" type="text" id="descripcionedit" title="Título de la tarea" placeholder="Titulo de la tarea">
                </div>
                <div class="form-group">
                    <input class="form-control" name="nhoras" type="number" id="e1"  onblur="calcular2()" oninput="calcular2()" placeholder="Horas semanales" title="Ingresar la cantidad de horas a la semana que se realizará la actividad">
                </div>
                <div class="form-group">
                    <input class="form-control" name="nsemanas" type="number" id="e2" onblur="calcular2()" oninput="calcular2()" placeholder="cantidad de semanas" title="Ingresar la cantidad de semanas en que se realizará la actividad">
                </div>
                <div class="form-group">
                    <label >Horas semestrales: </label>
                    <label class="text-success" id="horas_semestreedit"><script> document.write(calcular2());</script></label>
                    <input name="nhoras_semestre" type="hidden" id="e3">
                </div>
                <div class="form-group">
                    <input class="form-control" name="idt" type="hidden" id="idEdit">
                    <input class="form-control" name="nidpt" type="hidden" id="idptEdit" >
                    <input class="form-control" name="idact" type="hidden" id="idact" value="idactEdit">
                    
                </div>

                <div class="form-group">
                    <label for="descripcionedit">Descripción</label>
                    <textarea name="ndescripcion2" id="descripcion2edit" msg cols="30" rows="5" class="form-control" style="background-color: white;"></textarea>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary btnActualizar">Actualizar</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    
    <!-- modal -->
    
    <!-- Modal Eliminar Tarea-->
    <div class="modal fade" id="ModalEliminarTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar actividad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
            <div class="modal-body">
                <h5>¿Deseas eliminar esta actividad?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnModalEliminarTarea">Eliminar</button>
            </div>
        
        </div>
    </div>
    </div>

    <!-- Modal Eliminar Actividad-->
    <div class="modal fade" id="ModalEliminarActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar sección</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
            <div class="modal-body">
                <h5>¿Deseas eliminar esta sección?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnModalEliminarActividad">Eliminar</button>
            </div>
        
        </div>
    </div>
    </div>

@endsection

@section('scripts')

<script>        
        $(document).ready(function(){
            @if($message = Session::get('ErrorInsert'))
                $("#ModalAgregarActividad").modal('show');
            @elseif($message = Session::get('Error2'))
                $("#ModalAgregarTarea").modal('show');
            @elseif($message = Session::get('editarTarea'))
                $("#ModalEditarTarea").modal('show');
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
                text: 'Información actualizada correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
                });
            @endif
            
            $(".btnEliminarTarea").click(function(){
                idEliminar = $(this).data('id');
            });
            $(".btnModalEliminarTarea").click(function(){
                $("#formEli_"+idEliminar).submit();
            });
            $(".btnEliminarActividad").click(function(){
                idEliminar = $(this).data('id');
            });
            $(".btnModalEliminarActividad").click(function(){
                $("#formEli_"+idEliminar).submit();
            });
            
            $(".btnEditar").click(function(){
                $("#idEdit").val($(this).data('id'));
                $("#idptEdit").val($(this).data('idpt'));
                $("#descripcionedit").val($(this).data('descripcion'));
                $("#descripcion2edit").val($(this).data('descripcion2'));
                $("#e1").val($(this).data('horas'));
                $("#e2").val($(this).data('semanas'));
                $("#horas_semestreedit").val($(this).data('horassemestre'));
            });
        });
</script>

@endsection

@section('navbar')
  
        <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
            </svg>
            <span>  Progreso</span></a>
        </li>
        <!-- Heading -->
        <li class="nav-item active">
            <a class="nav-link " href="{{url('/p')}}">
                <i class="fas fa-fw fa-archive"></i>
                <span>Planes de trabajo</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/p/a')}}">
                <i class="fas fa-fw fa-edit"></i>
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
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Resultados</span></a>
        </li>
    @endsection