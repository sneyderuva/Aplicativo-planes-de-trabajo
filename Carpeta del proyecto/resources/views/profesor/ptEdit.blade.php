@extends('layouts.mainprofesor')
@section('titulo')
<title>Plan de trabajo {{$id_p_trabajo}}</title>
@endsection
@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plan de trabajo N°. {{$id_p_trabajo}}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Descargar reporte</a>
    </div>

    <div class="card">
        <h5 class="card-header">Información personal</h5>
        <div class="card-body">
            
            <h5 class="card-title"></h5> 
            
            @foreach($p_trabajos as $p_trabajo)
                @if($p_trabajo->id==$id_p_trabajo)

                <p class="card-text">Nombres: {{$p_trabajo->nombres}}</p>
                <p class="card-text">Apellidos: {{$p_trabajo->apellidos}}</p>
                <p class="card-text">Facultad: {{$p_trabajo->nombre_facultad}}</p>
                <p class="card-text">Nombre del programa: {{$p_trabajo->nombre_programa}}</p>

                <p class="card-text">Correo institucional: {{$p_trabajo->email}}</p>
                <p class="card-text">Dirección: {{$p_trabajo->direccion}}</p>
                <p class="card-text">{{$p_trabajo->n_tipo_documento}}: {{$p_trabajo->n_documento}}</p>

                <p class="card-text">Teléfono: {{$p_trabajo->telefono}}</p>

                @endif
            @endforeach

            <a href="#" class="btn btn-primary">Guardar</a>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Información General</h5>
        <div class="card-body">
            
            <h5 class="card-title"></h5>
            </form>
            @foreach($p_trabajos as $p_trabajo)
                @if($p_trabajo->id==$id_p_trabajo)
                <p class="card-text">NPT {{$p_trabajo->id}}</p>
                <p class="card-text">Horas semana: {{$p_trabajo->horas_semana}}</p>
                <p class="card-text">Horas semestre: {{$p_trabajo->horas_semestre}}</p>
                <p class="card-text">Semestre: {{$p_trabajo->nombre_semestre}}</p>
                <p class="card-text">Fecha de elaboración: {{$p_trabajo->created_at}}</p>
                <p class="card-text">Escalafón: {{$p_trabajo->escalafon}}</p>
                <p class="card-text">Tipo de vinculación: {{$p_trabajo->nombre_tipo_vinculacion}}</p>
                <p class="card-text">Tipo de dedicación: {{$p_trabajo->nombre_tipo_dedicacion}}</p>


                @endif
            @endforeach
            <a href="#" class="btn btn-primary">Guardar</a>
        </div>
    </div>
    
    <div class="card">
        <h5 class="card-header">Actividades </h5>
        <div class="card-body">
        <?php $array = array(); $x=0;$n=0;?>
            @foreach($actividades as $actividad)
                @if($actividad->id_plan_trabajo==$id_p_trabajo) 
                     
                    <?php 
                           if($n==0){
                            $array[$n]=$actividad->id_plan_trabajo;
                            }else{	
                        for($j=0;$j<=$n;$j++){	
                            while(current($array)==$array[$j]){
                                var_dump($array);
                                }							
                            }
                            $array[$n]=$actividad->id_plan_trabajo;		
                        }                
                        
                    
                    $array[]=$actividad->id_tipo_actividad;
                    $n+=1;?>
                    <div class="row">
                        <div class="bs-component">
                            <div class="accordion" id="accordion{{$actividad->id}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$actividad->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$actividad->nombre_tipo_actividad}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$actividad->id}}" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by
                                            default, until the collapse plugin adds the appropriate classes that we use to
                                            style each element. These classes control the overall appearance, as well as the
                                            showing and hiding via CSS transitions. You can modify any of this with custom
                                            CSS or overriding our default variables. It's also worth noting that just about
                                            any HTML can go within the <code>.accordion-body</code>, though the transition
                                            does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
             @endforeach
             <?php var_dump(array_keys($array)); ?>
        </div>
        
    </div>
</div>

@endsection