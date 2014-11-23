
$(document).ready(function(){
    $('#horarioes').hide();
    $('#hes').hide();
    $('#horarioex').hide();
    $('#hexa').hide();
    $('#horariointer').hide();
    $('#hinter').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#hint').hide();
    $('#cen').hide();

});
//si da Click en ----HES que aparesca
$(document).ready(function(){
    $('#HES').click(function(){

    $('#hes').show();
    $('#horarioex').hide();
    $('#hexa').hide();
    $('#horariointer').hide();
    $('#hinter').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#hint').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
    $('#horariointer1').hide();
        $('#horarioes').fadeIn();
    });
});
////////////////2
$(document).ready(function(){
    $('#HES2').click(function(){

    $('#hes').show();
    $('#horarioex').hide();
    $('#hexa').hide();
    $('#horariointer').hide();
    $('#hinter').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#hint').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
    $('#horariointer1').hide();
        $('#horarioes').fadeIn();
        $('#cen').show('slow');
        $('#botoness').hide();
    });
});
//////////////////////////////////  Si preciono su carrera  ///////////////77

$(document).ready(function(){
    $('.cuadroes').click(function(){
        var id= $(this).attr("value");
        $('#horarioes1').show();
        $('#horarioes1').load('../Editar/genera-he.php?id='+id);
        $('#horarioes').hide();
    });
});
/////////////////////////////////// si da click en HEX que aparesca//////////////////7777
$(document).ready(function(){
    $('#HI').click(function(){
    $('#horarioes').hide();
    $('#hes').hide();
    $('#horarioex').hide();
    $('#hexa').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
   $('#horariointer1').hide();
        $('#horariointer').fadeIn();

    });
});
//////////////2
$(document).ready(function(){
    $('#HI2').click(function(){
    $('#horarioes').hide();
    $('#hes').hide();
    $('#horarioex').hide();
    $('#hexa').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
   $('#horariointer1').hide();
        $('#horariointer').fadeIn();
        $('#cen').show('slow');
        $('#botoness').hide();

    });
});
////////////////////////////7 si preciono la carrera ////////////////

$(document).ready(function(){
    $('.cuadrointer').click(function(){
        var id= $(this).attr("value");
        $('#horariointer1').show();
        $('#horariointer1').load('modificar/genera-hinter.php?id='+id);
        $('#horariointer').hide();
    });
});
//si da click en HEX que aparesca
$(document).ready(function(){
    $('#HEX').click(function(){
        $('#horarioes').hide();
    $('#hes').hide();
    $('#hint').hide();
    $('#hexa').show();
    $('#horariointer').hide();
    $('#hinter').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
    $('#horariointer1').hide();
        $('#horarioex').fadeIn();
    });
});
//////////////////2
$(document).ready(function(){
    $('#HEX2').click(function(){
        $('#horarioes').hide();
    $('#hes').hide();
    $('#hint').hide();
    $('#hexa').show();
    $('#horariointer').hide();
    $('#hinter').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
    $('#horariointer1').hide();
        $('#horarioex').fadeIn();
        $('#cen').show('slow');
        $('#botoness').hide();
    });
});
/////////////////////////////////7
$(document).ready(function(){
    $('.cuadroex').click(function(){
        var id= $(this).attr("value");
        $('#horarioex1').show();
        
        $('#horarioex1').load('modificar/genera-hex.php?id='+id);
        $('#horarioex').hide();
    });
});

//si da click en HT que aparesca
$(document).ready(function(){
    $('#HT').click(function(){
    $('#hes').hide();
    $('#horarioes').hide();
    $('#horarioex').hide();
    $('#hexa').hide();
    $('#horariointer').hide();
    $('#hinter').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#hint').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
    $('#horariointer1').hide();
    

         $('#horariotu1').fadeIn();
        
        $('#horariotu1').load('modificar/genera-htu.php');
       
    });
});
///////////////////2
$(document).ready(function(){
    $('#HT2').click(function(){
    $('#hes').hide();
    $('#horarioes').hide();
    $('#horarioex').hide();
    $('#hexa').hide();
    $('#horariointer').hide();
    $('#hinter').hide();
    $('#horariotu').hide();
    $('#htu').hide();
    $('#hint').hide();
    $('#horarioes1').hide();
    $('#horariotu1').hide();
    $('#horarioex1').hide();
    $('#horariointer1').hide();
    $('#botoness').hide();

         $('#horariotu1').fadeIn();
         $('#cen').show('slow');
        
        $('#horariotu1').load('modificar/genera-htu.php');
       
    });
});
////////////////////////////
