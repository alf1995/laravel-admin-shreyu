
/* ACTION */

function deleteData($url){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	Swal.fire({
	  	title: '¿Estas seguro que deseas continuar?',
	  	text: 'Advertencia!',
	  	icon: 'warning',
	  	showCancelButton: true,
	  	confirmButtonText: 'Eliminar registro!',
	  	cancelButtonText: 'Cancelar!',
	  	confirmButtonColor: '#3085d6',
  		cancelButtonColor: '#d33',
	  	reverseButtons: false
	}).then((result) => {
	  if (result.value) {
	  	$.ajax({
	        url: $url,
			type: "POST",
			data : {'_method' : 'DELETE','_token' : csrf_token},
	        cache: false,
		    success: function(response) {
	            Swal.fire(
				  response.title,
				  response.message,
				  response.status
			    )
			    if(response.time != ''){
			    	setTimeout( function(){ location.reload();}, response.time );
			    }
	        },
	     })
	    
	  } else if (
	    result.dismiss === Swal.DismissReason.cancel
	  ) {
	    Swal.fire(
	      'Proceso Cancelado',
	      'No se realizó la eliminación del registro',
	      'error'
	    )
	  }
	})
}
