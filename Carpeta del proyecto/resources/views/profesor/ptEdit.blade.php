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
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Descargar reporte</a>
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
                        <a href="#" class="btn btn-primary">Guardar</a>

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
                            <td class="border-dark">{{$id_p_trabajo}}</td>
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

                
                <a href="#" class="btn btn-primary">Guardar</a>
                @endif
            @endforeach
            
        </div>
    </div>
    <br>
    </br>
    <div class="card">
        <h5 class="card-header">Actividades </h5>
        <div class="card-body">

        <?php $array_tareas_id = array(); $array_tareas = array();$array = array(); $x=0;$n=0;$nombres=array();?>
            @foreach($actividades as $actividad)
                @if($actividad->id_plan_trabajo==$id_p_trabajo) 
                    <?php $array[$n]=$actividad->id_tipo_actividad; $nombres[$n]=$actividad->nombre_tipo_actividad;$n++;?>
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
            <h1 class="h3 mb-0 text-gray-800">Tienes {{$count_actividades}} actividades y {{$count_tareas}} tareas </h1>
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
                                                                        <?php $x++; ?>
                                                                    </p>   
                                                                </div>
                                                                <div class="p-2">
                                                                    <button class="btn " data-id=""  data-toggle="modal" data-target="#ModalEliminar">
                                                                        <i class="fa fa-paperclip"></i>
                                                                </div>
                                                                <div class="p-2">
                                                                    <button class="btn " data-id=""  data-toggle="modal" data-target="#ModalEliminar">
                                                                        <i class="fa fa-edit"></i>
                                                                </div>
                                                                <div class="p-2">
                                                                    <button class="btn " data-id=""  data-toggle="modal" data-target="#ModalEliminar">
                                                                        <i class="fa fa-trash"></i>
                                                                </div>
                                                                
                                                            </div>
                                                    @endif
                                                @endforeach
                                           
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

@endsection