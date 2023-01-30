@extends('profesor.detalles')
@section('titulo')
<title>Actividades</title>
@endsection
@section('subcontenido')
    <div class="d-flex ">
        <div class="me-auto p-2">
            <h1 class="display-5 text-warning"><?php $n_tar=$_POST['nombre_tarea']; echo $n_tar; ?></h1>
            <h5><small class="text-muted"><?php $n_act=$_POST['nombre_actividad']; echo $n_act; ?> ● última modificación: <?php foreach($tareas as $tarea){$t = strtotime($tarea->updated_at); echo date('d-m-Y h:i',$t); }?></small></h5>
            <hr class="border border-primary opacity-75">
            <div class="d-flex">
                <div class="me-auto p-2">
                <h5><small class="text-dark font-weight-bold text-">0/100 puntos</small></h5>
                </div>
                <div class="p-2">
                <h5><small class="text-dark text-">horas semanales: <?php $horas=$_POST['horas']; echo $horas; ?></small></h5>
                </div>
            </div>
            
            <h5 class="text-black"><small ><?php $n_act=$_POST['descripcion']; echo $n_act; ?></small></h5>
            <hr>
        </div>   
        <div class="me p-2">
             <!-- Pie Chart -->
            <div class="col-4 col-lg">
                <div class="card shadow mb-1">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="me-auto p-2">
                                <h6 class="m-0 font-weight-bold text-primary">Tu evidencia</h6>
                            </div>
                            <div class="me p-2">
                                <h6 class="m-0 text-dark">{Estado}</h6>
                            </div>
                            
                        </div>
                        <form action="{{Route('p',['id'=>$id_p_trabajo])}}" method="post">
                            @csrf
                            <button type="button" class="btn btn-outline-info btn-sm btn-block" data-toggle="modal" data-target="#ModalEvidencia">Añadir archivos</button> 
                            <button type="button" class="btn btn-outline-success btn-sm btn-block" data-toggle="modal" data-target="#ModalEvidencia">Entregar</button>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>     
    </div>
@endsection