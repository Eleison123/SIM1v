
    $(document).ready(function(){
        $("#carrera").change(function(event){
            var id = $("#carrera").find(':selected').val();
            $("#materia").load('../Editar/genera-select-materia.php?id='+id);
        });
    });

    $(document).ready(function(){
        $('#dia1h').prop('disabled',true);
        $('#dfecha').prop('disabled',true);
        $("#tipo").change(function(event){
            var id = $("#tipo").find(':selected').val();
           
            if(id == '5'){
                $('#nrc').prop('disabled',true);
                $('#nrcant').prop('disabled',true);
                $('#blo').prop('disabled',true);
                $('#sec').prop('disabled',true);
                $('#nrc1').prop('disabled',true);
                $('#nrcant1').prop('disabled',true);
                $('#blo1').prop('disabled',true);
                $('#sec1').prop('disabled',true);
                $('#carrera').prop('disabled',true);
                $('#materia').prop('disabled',true);
                $('#secre').prop('disabled',true);
            }
            else{
                 $('#nrc').prop('disabled',false);
                $('#nrcant').prop('disabled',false);
                $('#blo').prop('disabled',false);
                $('#sec').prop('disabled',false);
                 $('#nrc1').prop('disabled',false);
                $('#nrcant1').prop('disabled',false);
                $('#blo1').prop('disabled',false);
                $('#sec1').prop('disabled',false);
                 $('#carrera').prop('disabled',false);
                  $('#materia').prop('disabled',false);
                    $('#secre').prop('disabled',false);
            }
            if (id == '1'){
                $('#dia1h').prop('disabled',false);
                $('#datepicker').prop('disabled',true);
                $('#secre').prop('disabled',true);
                $('#datepicker5').prop('disabled',true);
            }else{
                $('#dia1h').prop('disabled',true);
                $('#datepicker').prop('disabled',false);
                $('#datepicker5').prop('disabled',false);
            }
        });
    });

