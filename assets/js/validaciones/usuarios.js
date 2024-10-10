
let error = true;

function validate_username(event){
   console.log(event.target.value);
   $.ajax({
      url: "controladores/usuarios/usuarios.ajax.controlador.php",
      type: "post",
      data: {
         'nombre_usuario': event.target.value,
         'action': 'ajax'
      } ,
      success: function (response) {
         let data = JSON.parse(response);
         error = false;
         if (data.data == 'error') {
            error = true;
            alert('el usuarios ya existe');
            document.getElementById('id_nombre_usuario').value = '';
         }
      },
      error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
  });
}

function validate_email(event){
   console.log(event.target.value);
   $.ajax({
      url: "controladores/usuarios/usuarios.ajax.controlador.php",
      type: "post",
      data: {
         'email': event.target.value,
         'action': 'ajax_validacion_email'
      } ,
      success: function (response) {
         let data = JSON.parse(response);
         error = false;
         if (data.data == 'error') {
            error = true;
            alert('el email ya existe');
            document.getElementById('id_email').value = '';
         }
      },
      error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
  });
}


function submit_form () { 
   if (error){
      alert('existe errores en el formulario')
   }
 }

