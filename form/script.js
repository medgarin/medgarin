function validar(){
	if($("#name").val() == ""){
		$("#error").html("El campo Nombre es obligatorio");
		return false;
	}
	else if($("#domicilio").val() == ""  ){
		$("#errorD").html("El campo Domicilio es obligatorio");
		return false;
	}
	else if( $("#email").val() == "" ){
		$("#errorE").html("El campo E-mail es obligatorio");
		return false;
	}
	return 1;
}
$("#afileame").click( function() {
	if (validar() == 1) {
	 $.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
	         function(info){ $("#resultado").html(info);
	   });
	 clearInput();
	 };
 	
});
 
$("#myForm").submit( function() {
  return false;
});
function clearInput() {
    $("#myForm :input").each( function() {
       $(this).val('');
       $("#error").fadeOut('slow');
       $("#errorD").fadeOut('slow');
       $("#errorE").fadeOut('slow');
    });
}