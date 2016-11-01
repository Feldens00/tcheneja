
   
$(document).ready( function() {

    $("#formSponsor").validate({
    // Define as regras
    rules:{
      sponsorName:{
       
        required: true, minlength: 2
      },
       sponsorFone:{

        required: true
      },
       sponsorFoto:{

        required: true
      }, updateSponsorName:{
       
        required: true, minlength: 2
      },
       updateSponsorFone:{

        required: true
      }
       
    
    },
    // Define as mensagens de erro para cada regra
    messages:{
      sponsorName:{
        required: "Digite o nome",
        minLength: "O nome deve conter, no mínimo, 2 caracteres"
      },

       sponsorFone:{
        required: "Digite o telefone"
      
      },
       sponsorFoto:{

         required: "Selecione a foto"
      }, 
       updateSponsorName:{
        required: "Digite o nome",
        minLength: "O nome deve conter, no mínimo, 2 caracteres"
      },

       updateSponsorFone:{
        required: "Digite o telefone"
      
      }
    }
  });

    $("#formMusic").validate({
    // Define as regras
    rules:{
      musicName:{
       
        required: true, minlength: 4
      },
       music:{

        required: true
      },
        updateMusicName:{
       
        required: true, minlength: 4
      }
       
    
    },
    // Define as mensagens de erro para cada regra
    messages:{
      musicName:{
        required: "Digite o nome",
        minLength: "O nome deve conter, no mínimo, 4 caracteres"
      },
       music:{

         required: "Selecione a música"
      },
       updateMusicName:{
        required: "Digite o nome",
        minLength: "O nome deve conter, no mínimo, 4 caracteres"
      }
      
    }
  });


  $("#formEvent").validate({
    // Define as regras
    rules:{
      eventName:{
       
        required: true, minlength: 5
      },
       eventDate:{

        required: true
      },
       eventFoto:{

        required: true
      },
         eventTime:{

        required: true
      },
       eventAdress:{

        required: true
      },
       estado:{

        required: true
      },
       cidade:{

        required: true
      }


       
    
    },
    // Define as mensagens de erro para cada regra
    messages:{
      eventName:{
        required: "Digite o nome",
        minLength: "O nome deve conter, no mínimo, 5 caracteres"
      },

       eventDate:{
        required: "Selecione a data"
      
      },
       eventFoto:{

         required: "Selecione a foto"
      },
      eventTime:{

         required: "Selecione o horário"
      },
      eventAdress:{

         required: "Digite o endereço"
      },
      estado:{

         required: "Selecione o estado"
      },
      cidade:{

         required: "Selecione a cidade"
      }
    }
  });
  
    $("#formBand").validate({
    // Define as regras
    rules:{
      bandName:{
       
        required: true, minlength: 2
      },
       bandFone:{

        required: true
      },
       bandComp:{

        required: true
      },
       bandFoto:{

        required: true
      }, updateBandName:{
       
        required: true, minlength: 2
      },
       updateBandFone:{

        required: true
      },
       updateBandComp:{

        required: true
      }
       
    
    },
    // Define as mensagens de erro para cada regra
    messages:{
      bandName:{
        required: "Digite o nome",
        minLength: "O nome deve conter, no mínimo, 2 caracteres"
      },

       bandFone:{
        required: "Digite o telefone"
      
      },
       bandComp:{
        required: "Digite os componentes"
      },
       bandFoto:{
        required: "Selecione a foto"
      
      }, updateBandName:{
        required: "Digite o nome",
        minLength: "O nome deve conter, no mínimo, 2 caracteres"
      },

       updateBandFone:{
        required: "Digite o telefone"
      
      },
       updateBandComp:{
        required: "Digite os componentes"
      }
    }
});

 
    
 jQuery(function($){
      $("#fone").mask("(99) 9999-9999");
       $("#cep").mask("99999-999");
    });



});



// funcao para retornar as cidades conforme o combo dos estados

$(function(){

  
  $("select[name=estado]").change(function(){

    estado = $(this).val();
    
    if ( estado === '')
      return false;
    
    resetaCombo('cidade');
      
    $.getJSON( path + '/EventController/getCidades/' + estado, function (data){
  
      //  console.log(data);
      var option = new Array();
    
      $.each(data, function(i, obj){

          option[i] = document.createElement('option');
          $( option[i] ).attr( {value : obj.id} );
        $( option[i] ).append( obj.nome );

          $("select[name='cidade']").append( option[i] );
    
      });
  
    });
  
  });

});

function resetaCombo( el ) {
   $("select[name='"+el+"']").empty();
   var option = document.createElement('option');                                  
   $( option ).attr( {value : ''} );
   $( option ).append( 'Escolha' );
   $("select[name='"+el+"']").append( option );
}


