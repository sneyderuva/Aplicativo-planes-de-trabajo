<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Custom fonts for this template-->
        <link href="{{asset('/dash/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('/dash/navtab/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('/dash/css/sb-admin-2.css')}}" rel="stylesheet">
        <link href="{{asset('/dash/css/labels.css')}}" rel="stylesheet">
        
        <script src="{{asset('/dash/navtab/bootstrap.bundle.min.js')}}" defer></script>

    </head>
    <body>
        <div class="container-fluid">
            <!-- Page Heading 
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Plan de trabajo N°. 
                <php switch($id_p_trabajo){
                    
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
                
                        
            </div>
-->
            <div class="card">
                <h5 class="card-header">Información personal</h5>
                <div class="card-body">
                    
                    <h5 class="card-title"></h5> 
                        @foreach($p_trabajos as $p_trabajo)
                            

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
                                    <td class="border-dark"><!--<php 
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
                                                    } ?>--></td>
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
                    @endforeach
                    
                </div>
            </div>
        </div>
    </body>
</html>