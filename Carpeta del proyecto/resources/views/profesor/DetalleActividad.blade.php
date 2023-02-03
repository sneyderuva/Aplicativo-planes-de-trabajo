@extends('profesor.detalles')
@section('titulo')
<title>Actividades</title>
@endsection
@section('subcontenido')
    <div class="d-flex ">
        <div class="me-auto p-2">
            <h1 class="display-5 text-warning"><?php $n_tar=$_POST['nombre_tarea']; echo $n_tar; ?></h1>
            <h5><small class="text-muted"><?php $n_act=$_POST['nombre_actividad']; echo $n_act; ?> ● última modificación: <?php foreach($tareas as $tarea){$t = strtotime($tarea->updated_at); echo date('d-m-Y h:i a',$t); }?>.</small></h5>
            <hr class="border border-primary opacity-75">
            <div class="d-flex">
                <div class="me-auto p-2">
                <h5><small class="text-dark font-weight-bold text-">0/100 puntos</small></h5>
                </div>
                <div class="p-2">
                <h5><small class="text-dark text-">horas semanales: <?php $horas=$_POST['horas']; echo $horas; ?></small></h5>
                </div>
            </div>
            <label class="label" >Descripción:</label>
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
                            <button type="button" class="btn btn-outline-info btn-sm btn-block" data-toggle="modal" data-target="#ModalSubirEvidencia">Añadir archivos</button> 
                            <button type="button" class="btn btn-outline-success btn-sm btn-block" data-toggle="modal" data-target="#ModalEvidencia">Entregar</button>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>     
    </div>
    <!--modal--->
    <div class="modal fade" id="ModalSubirEvidencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Evidencias de la actividad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
            <div class="modal-body">
            <h1 class="h4 text-center mb-3">Sube tu evidencia</h1>
            <form>

            <fieldset class="upload_dropZone text-center mb-3 p-4">

                <legend class="visually-hidden">Image uploader</legend>

                <svg class="upload_svg" width="60" height="60" aria-hidden="true">
                <use href="#icon-imageUpload"></use>
                </svg>

                <p class="small my-2">Arrastra y suelta tu archivo para cargar<br><i>o</i></p>

                <input id="upload_image_background" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />

                <label class="btn btn-upload mb-3" for="upload_image_background">Escoge el(los) archivo(s)</label>

                <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>

            </fieldset>
            </form>


            <svg style="display:none">
            <defs>
                <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                <path d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z"/>
                </symbol>
            </defs>
            </svg>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Subir</button>
            </div>
        
        </div>
    </div>
    </div>
    <script>
        /* Bootstrap 5 JS included */

console.clear();
('use strict');


// Drag and drop - single or multiple image files
// https://www.smashingmagazine.com/2018/01/drag-drop-file-uploader-vanilla-js/
// https://codepen.io/joezimjs/pen/yPWQbd?editors=1000
(function () {

  'use strict';
  
  // Four objects of interest: drop zones, input elements, gallery elements, and the files.
  // dataRefs = {files: [image files], input: element ref, gallery: element ref}

  const preventDefaults = event => {
    event.preventDefault();
    event.stopPropagation();
  };

  const highlight = event =>
    event.target.classList.add('highlight');
  
  const unhighlight = event =>
    event.target.classList.remove('highlight');

  const getInputAndGalleryRefs = element => {
    const zone = element.closest('.upload_dropZone') || false;
    const gallery = zone.querySelector('.upload_gallery') || false;
    const input = zone.querySelector('input[type="file"]') || false;
    return {input: input, gallery: gallery};
  }

  const handleDrop = event => {
    const dataRefs = getInputAndGalleryRefs(event.target);
    dataRefs.files = event.dataTransfer.files;
    handleFiles(dataRefs);
  }


  const eventHandlers = zone => {

    const dataRefs = getInputAndGalleryRefs(zone);
    if (!dataRefs.input) return;

    // Prevent default drag behaviors
    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, preventDefaults, false);
      document.body.addEventListener(event, preventDefaults, false);
    });

    // Highlighting drop area when item is dragged over it
    ;['dragenter', 'dragover'].forEach(event => {
      zone.addEventListener(event, highlight, false);
    });
    ;['dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, unhighlight, false);
    });

    // Handle dropped files
    zone.addEventListener('drop', handleDrop, false);

    // Handle browse selected files
    dataRefs.input.addEventListener('change', event => {
      dataRefs.files = event.target.files;
      handleFiles(dataRefs);
    }, false);

  }


  // Initialise ALL dropzones
  const dropZones = document.querySelectorAll('.upload_dropZone');
  for (const zone of dropZones) {
    eventHandlers(zone);
  }


  // No 'image/gif' or PDF or webp allowed here, but it's up to your use case.
  // Double checks the input "accept" attribute
  const isImageFile = file => 
    ['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type);


  function previewFiles(dataRefs) {
    if (!dataRefs.gallery) return;
    for (const file of dataRefs.files) {
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onloadend = function() {
        let img = document.createElement('img');
        img.className = 'upload_img mt-2';
        img.setAttribute('alt', file.name);
        img.src = reader.result;
        dataRefs.gallery.appendChild(img);
      }
    }
  }

  // Based on: https://flaviocopes.com/how-to-upload-files-fetch/
  const imageUpload = dataRefs => {

    // Multiple source routes, so double check validity
    if (!dataRefs.files || !dataRefs.input) return;

    const url = dataRefs.input.getAttribute('data-post-url');
    if (!url) return;

    const name = dataRefs.input.getAttribute('data-post-name');
    if (!name) return;

    const formData = new FormData();
    formData.append(name, dataRefs.files);

    fetch(url, {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log('posted: ', data);
      if (data.success === true) {
        previewFiles(dataRefs);
      } else {
        console.log('URL: ', url, '  name: ', name)
      }
    })
    .catch(error => {
      console.error('errored: ', error);
    });
  }


  // Handle both selected and dropped files
  const handleFiles = dataRefs => {

    let files = [...dataRefs.files];

    // Remove unaccepted file types
    files = files.filter(item => {
      if (!isImageFile(item)) {
        console.log('Not an image, ', item.type);
      }
      return isImageFile(item) ? item : null;
    });

    if (!files.length) return;
    dataRefs.files = files;

    previewFiles(dataRefs);
    imageUpload(dataRefs);
  }

})();

    </script>
@endsection