$(document).ready(function(){
	$('#HES').click(function(){
		var id= $('#HES').attr('value');
		$('#carrera').load('modificar/genera-carrera.php?id='+id)
	});
});

$(document).ready(function(){
	$('#carreras').click(function(){
		var id= $(this).find(':selected').val();
		$('#he').load('modificar/genera-he.php?id='+id);
		$('#carrera').empty();
	
		
	
	});
});