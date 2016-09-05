
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
      }
    }
  });




  
});

$(document).ready( function() {

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
      
      }
    }


  });


});