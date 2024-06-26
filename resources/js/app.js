import Dropzone from "dropzone";
 
Dropzone.autoDiscover = false;
if(document.getElementById("dropzone")) {
    
    const dropzone = new Dropzone(".dropzone", {
        dictDefaultMessage: "Sube aquí tu imagen",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar archivo",
        dictMaxFilesExceeded: "No puedes agregar más de un archivo",
        dictCancelUpload: "Cancelar",
        dictCancelUploadConfirmation: "¿Estas seguro de quieres cancelar la subida de esta imagen?",
        maxFiles: 1,
        uploadMultiple: false,

        init: function(){
            if(document.querySelector('[name="imagen"]').value.trim()){
                const imagenPublicada={}
                imagenPublicada.size = 1234;
                imagenPublicada.name= document.querySelector('[name="imagen"]').value;
            
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            
                imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
            }
        }
    });


    dropzone.on('success', function(file, response){
        console.log(response);
        document.querySelector('[name="imagen"]').value= response.imagen;
    });
    
    dropzone.on('removedfile', function() {
        document.querySelector('[name="imagen"]').value= "";
    });
}

document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.getElementById("menu-button");
    const menu = document.querySelector(".absolute[aria-labelledby='menu-button']");
  
    // Agrega un evento clic al botón del menú
    menuButton.addEventListener("click", function() {
      menu.classList.toggle("hidden"); // Alterna la visibilidad del menú
    });
  
    // Cierra el menú si se hace clic fuera de él
    document.addEventListener("click", function(event) {
      if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
        menu.classList.add("hidden");
      }
    });
  });
