<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tchêneja</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="<?= base_url('assets/css/agency.min.css')?>" rel="stylesheet">

      <script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
      <script type="text/javascript" src="<?= base_url('assets/js/jquery.maskedinput.js');?>"></script>
      <script type="text/javascript" src="<?= base_url('assets/js/jquery.validate.js'); ?>"></script>
      <script type="text/javascript" src="<?= base_url('assets/js/all.js'); ?>"></script>
     
    <!--[if IE]><script src"http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <script type="text/javascript">

  $(document).ready( function() {

         var idEvent;
           $('.delEvent').click(function(){
            idEvent = $(this).data('id');
            });

            $("#delete_event").on("click", function(){
             
              $.ajax({
                url: "<?php echo site_url('EventController/delete'); ?>",
                type: "POST",
                data: {id_event: idEvent},
                success: function(data){
                  window.location.reload();
                  if(!data){
                   console.log(data);

                   
                  }else{
                    console.log(data);

                  }
                },
                error: function(data){
                  console.log(data);
                 
                }
              });
            }); 

            var idBand;
           $('.delBand').click(function(){
            idBand = $(this).data('id');
            });

            $("#delete_band").on("click", function(){
              $.ajax({
                url: "<?php echo site_url('BandController/delete'); ?>",
                type: "POST",
                data: {id_band: idBand},
                success: function(data){
                  window.location.reload();
                  if(!data){
                   console.log(data);

                   
                  }else{
                    console.log(data);

                  }
                },
                error: function(data){
                  console.log(data);
                 
                }
              });
            });

              var idSponsor;
           $('.delSponsor').click(function(){
            idSponsor = $(this).data('id');
            });

            $("#delete_sponsor").on("click", function(){  
              $.ajax({
                url: "<?php echo site_url('SponsorController/delete'); ?>",
                type: "POST",
                data: {id_sponsor: idSponsor},
                success: function(data){
                  window.location.reload();
                  if(!data){
                   console.log(data);

                   
                  }else{
                    console.log(data);

                  }
                },
                error: function(data){
                  console.log(data);
                 
                }
              });
            });

                var idMusic;
           $('.delMusic').click(function(){
            idMusic = $(this).data('id');
            });

            $("#delete_music").on("click", function(){  
              $.ajax({
                url: "<?php echo site_url('MusicController/delete'); ?>",
                type: "POST",
                data: {id_music: idMusic},
                success: function(data){
                  window.location.reload();
                  if(!data){
                   console.log(data);

                   
                  }else{
                    console.log(data);

                  }
                },
                error: function(data){
                  console.log(data);
                 
                }
              });
            });
        });

    
    function getIdBand(id){
     
      $.ajax({
        url: "<?php echo site_url('/BandController/getOne'); ?>",
        type: "POST",
        data: {id_band: id},
          success: function(data){
        var obj = JSON.parse(data);


        
          if(!obj.length>0){
            alert("Nenhuma Banda encontrada");
          }else{ 
              try{
                $('#portfolioModalBand > div > div > div > div > div > div > div  ').html("");
                var items=[];   
                $.each(obj, function(i,val){  

                items.push($(

                "<div class='row'><div class='col-md-9'><img src='"+val.url+" ' width='500px' height='100px' class='img-responsive'></div>"+"<div class='col-md-3 '>"+"<h2>"+val.name_band+"</h2>"+ "<h6>Integrantes: </h6><p  class='item-intro text-muted'>"+val.components +"</p><h6>Telefone: "+val.fone_band+"</h6></div></div>"));
                
                }); 
                $('#portfolioModalBand > div > div > div > div  > div > div  > div ').append.apply($('#portfolioModalBand > div > div > div > div >  div >div '), items);


              }catch(e) {   
                alert('Ocorreu algum erro ao carregar a Banda!');
              } 
            }
            

          },
          error: function(){
          alert("Ocorreu algum erro");
          } 
        
        
      });
    }


    function getIdSponsor(id){
      
      $.ajax({
        url: "<?php echo site_url('/SponsorController/getOne'); ?>",
        type: "POST",
        data: {id_sponsor: id},
          success: function(data){
        var obj = JSON.parse(data);


        
          if(!obj.length>0){
            alert("Nenhuma Apoiador encontrado");
          }else{ 
              try{
                $('#portfolioModalSponsor > div > div > div > div > div > div > div  ').html("");
                var items=[];   
                $.each(obj, function(i,val){  

                
                items.push($(

                "<div class='row'><div class='col-md-9'><img src='"+val.url+" ' width='500px' height='100px' class='img-responsive'></div>"+"<div class='col-md-3 '>"+"<h2>"+val.name_sponsor+"</h2>"+ "<p  class='item-intro text-muted'>Telefone:"+val.fone_sponsor +"</p></div></div>"));
                
                
                }); 
                $('#portfolioModalSponsor > div > div > div > div  > div > div  > div ').append.apply($('#portfolioModalSponsor > div > div > div > div >  div >div '), items);


              }catch(e) {   
                alert('Ocorreu algum erro ao carregar o Apoiador!');
              } 
            }
            

          },
          error: function(){
          alert("Ocorreu algum erro");
          } 
        
        
      });
    }

        function reloadPage(){
            
        window.location.reload();
        }
        
    //necessario para o combo cidade/estado    
    var path = '<?php echo site_url(); ?>'
   

    </script>
   
      <style>
        { font-family: Verdana; font-size: 96%; }
        label { display: block; margin-top: 10px; }
        label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 14px }
        p { clear: both; }
        .submit { margin-top: 1em; }
        em { font-weight: bold; padding-right: 1em; vertical-align: top; }
    </style>
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Tchêneja</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Eventos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#music">Musicas</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Artistas</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Apoio</a>
                    </li>
                    <li>
                   		 <a href="<?= base_url('logout')?>" class="page-scroll"><span class="glyphicon glyphicon-log-in"></span>Sair</a>	
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

   <!-- Header -->
    <header>
            <div class="intro-text col-md-offset-4" align=" center">
                    <img align="center " src="<?= base_url('assets/img/logo.png');?>"  width="350" height="200" alt="Chania" class="img-responsive">
                <!--<div class="intro-lead-in">Bem Vindo!</div>
                <div class="intro-heading">Visitante</div>-->
            </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Tchêneja</h2>
                    <h3 class="section-subheading text-muted">Só as top</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-4 portfolio-item">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Eventos</h4>
                    <p class="text-muted">Veja os Shows.</p>
                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">
                            <a href="#addModalEvent" class="portfolio-link" k data-toggle="modal" >
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                
                            </a>
                     </div>
            </div>
                
            <?php foreach($events as $ev) { ?>

            <div class="col-md-4 col-sm-6  portfolio-item bg-light-gray">

                    <a href="<?= base_url('info-event/'.$ev->id_event)?>" class="portfolio-link">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        
                    </a>

                    <div class="portfolio-caption">
                        <div align="left">
                                <h4><?= $ev->name_event; ?></h4>
                                <p class="text-muted"><?= $ev->day; ?></p>
                        </div>
                        <div align="right">
                                 <a href="<?= base_url('update-event-form/'.$ev->id_event)?>">
                                       <span class="glyphicon glyphicon-pencil">     
                                 </a>

                                 <a href="#deleteModalEvent" class="portfolio-link delEvent" k data-toggle="modal"  data-id="<?= $ev->id_event; ?> ">
                                            <span class="glyphicon glyphicon-trash">
                                </a>
                        </div>
                    </div>

             </div>
             <?php } ?>
        </div>
    </section>


         <!-- Portfolio Grid Section -->
    <section id="music"  class="bg-light-gray">
        <div class="container">

                <div class="row text-center">
                    <div class="col-md-4 col-md-offset-4 portfolio-item">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-music fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Musicas</h4>
                        <p class="text-muted">Escute as Musicas de varios dos nossos músicos.</p>
                    </div>

                    <div class="col-md-4 col-sm-6 portfolio-item">
                            <a href="#addModalMusic" class="portfolio-link" k data-toggle="modal" >
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                
                            </a>
                     </div>
                </div>
        
            <div class="example">

            <?php foreach( $musics as $mc) { ?>
            <div class="col-md-4 col-sm-6 portfolio-item bg-light-gray  ">
                    <div class="portfolio-caption">
                        <div align="left">
                                <h4><?= $mc->name_music; ?></h4>
                               
                        </div>
                        <div>
                            <audio id="musica" controls="controls">
                                <source src="<?= $mc->url; ?>" type="audio/mpeg">
                            </audio>
                        </div>
                        <div align="left" class="col-md-8">
                              <p class="text-muted">N° Downloads: <?=$mc->qtd;?></p>
                        </div>
                        <div align="right" class="col-md-3">
                                 <a href="<?= base_url('update-music-form/'.$mc->id_music)?>">
                                       <span class="glyphicon glyphicon-pencil">     
                                 </a>

                                 <a href="#deleteModalMusic" class="portfolio-link delMusic" k data-toggle="modal"  data-id="<?= $mc->id_music; ?> ">
                                            <span class="glyphicon glyphicon-trash">
                                </a>
                        </div>
                    </div>
             </div>
             <?php } ?>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">

                <div class="row text-center">
             
                    <div class="col-md-4 col-md-offset-4 portfolio-item">
                            <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Artistas</h4>
                        <p class="text-muted">Conheça nossos Artistas</p>
                    </div>

                    <div class="col-md-4 col-sm-6 portfolio-item">
                            <a href="#addModalBand" class="portfolio-link" k data-toggle="modal" >
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                
                            </a>
                     </div>
                </div>
            
                
           
            <?php foreach( $bands as $bd) { ?>
            <div class="col-md-4 col-sm-6 portfolio-item bg-light-gray  ">
                    <a href="#portfolioModalBand" class="portfolio-link" k data-toggle="modal" onclick=" getIdBand('<?php echo $bd->id_band; ?>')">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        
                    </a>
                    <div class="portfolio-caption">
                        <div align="left">
                                <h4><?= $bd->name_band; ?></h4>
                                <a href="<?= base_url('band-music/'.$bd->id_band)?>">
                                      Ver musicas  
                                </a>
                        </div>
                        <div align="right">
                                 <a href="<?= base_url('update-band-form/'.$bd->id_band)?>">
                                       <span class="glyphicon glyphicon-pencil">     
                                 </a>

                                 <a href="#deleteModalBand" class="portfolio-link delBand" k data-toggle="modal"  data-id="<?= $bd->id_band; ?> ">
                                            <span class="glyphicon glyphicon-trash">
                                </a>
                        </div>
                    </div>
             </div>
             <?php } ?>
        </div>
    </section>




    <section id="team" class="bg-light-gray">
        <div class="container">

                <div class="row text-center">
                        <div class="col-md-4 col-md-offset-4 portfolio-item">
                                      <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                </span>
                                <h4 class="service-heading">Apoio</h4>
                                <p class="text-muted">Conheça nossos Apoiadores</p>
                        </div>
                         <div class="col-md-4 col-sm-6 portfolio-item">
                                <a href="#addModalSponsor" class="portfolio-link" k data-toggle="modal" >
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">
                                            <i class="fa fa-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    
                                </a>
                         </div>
                </div>
            
                
        
            <div class="row">
            <?php foreach( $sponsors as $sp) { ?>
                <div class="col-md-4 col-sm-6 portfolio-item" style="background:white"    id="divApoio">
                    <a href="#portfolioModalSponsor" class="portfolio-link" k data-toggle="modal" onclick=" getIdSponsor('<?php echo $sp->id_sponsor; ?>')">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i  class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                       
                    </a>
                    <div class="portfolio-caption">
                        <div align="left">
                                <h4><?= $sp->name_sponsor; ?></h4>
                               
                        </div>
                        <div align="right">
                                 <a href="<?= base_url('update-sponsor-form/'.$sp->id_sponsor)?>">
                                       <span class="glyphicon glyphicon-pencil">     
                                 </a>

                                 <a href="#deleteModalSponsor" class="portfolio-link delSponsor" k data-toggle="modal"  data-id="<?= $sp->id_sponsor; ?> ">
                                            <span class="glyphicon glyphicon-trash">
                                </a>
                        </div>
                    </div>
                </div>
             <?php } ?>
              
                
            </div>
        </div>
    </section>

    

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                       
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        
                    </a>
                </div>
            </div>
        </div>
    </aside>

   

   <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Feldens Company - 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://www.facebook.com/semjuizo.fcjjsv?fref=ts"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="https://br.linkedin.com/in/artur-feldens-3b203585">Desenvolvedor Feldens</a>
                        </li>
                        <li><a href="https://github.com/Feldens00">Outros Trabalhos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->


    <!-- Portfolio Modal  Event -->
   

    <!-- Add Modal Event -->
    <div class="portfolio-modal modal fade" id="addModalEvent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                               <h2>Adicionar</h2>
                                    <form action="<?= site_url() ?>/EventController/create" id="formEvent" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                          <label >Nome:</label>
                                          <input type="text" class="form-control"  name="eventName" placeholder="Escreva o nome do evento">
                                        </div>
                                        
                                         <div class="form-group">
                                          <label>Data:</label>
                                           <input type="date" class="form-control"  name="eventDate">
                                        </div>

                                         <div class="form-group">
                                          <label>Horario:</label>
                                           <input type="time" class="form-control"  name="eventTime">
                                        </div>

                                         <div class="form-group">
                                          <label>Endereço:</label>
                                           <input type="text" class="form-control"  name="eventAdress" placeholder="Escreva o endereço do evento">
                                        </div>

                                         <div class="form-group">
                                          <label>Telefone:</label>
                                             <input type="text"  class="form-control phone" id="fone" name="eventFone"  value="" placeholder="Escreva o telefone do artista">
                                        </div>

                                         <label>Estado</label>
                                             <select name="estado" class="form-control" >
                                                <option value="">Escolha um estado</option>
                                                 <?php
                                                     foreach($estados as $estado)
                                                   
                                                    echo "<option value='{$estado->id_state}'>{$estado->name_state}</option>";
                                                 ?>
                                             </select>

                                         <label>Cidade</label>
                                            <select name="cidade" id="cidade" class="form-control">
                                                 <option value="">Escolha um estado</option>
                                            </select>


                                         <label>Apoiadores</label>
                                             <select multiple name="sponsors[]"  class="form-control" >
                                                 <?php
                                                     foreach($sponsors as $sps)
                                                   
                                                    echo "<option value='{$sps->id_sponsor}'>{$sps->name_sponsor}</option>";
                                                 ?>
                                             </select>

                                         <label>Artistas</label>
                                             <select multiple name="bands[]"  class="form-control" >
                                                 <?php
                                                     foreach($bands as $bnd)
                                                   
                                                    echo "<option value='{$bnd->id_band}'>{$bnd->name_band}</option>";
                                                 ?>
                                             </select>

                                        <div class="form-group">
                                          <label >Foto</label>
                                          <input type="file" class="form-control"  name="eventFoto">
                                        </div>
                                        <button type="submit" class="btn btn-primary" data-dimiss="modal"><i class="fa fa-times"></i>Salvar</button>
                                     </form>
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <!--Delete Modal Event -->
    <div class="portfolio-modal modal fade" id="deleteModalEvent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                               <h2>Deletar</h2>
                                    
                                        <div class="form-group">
                                      
                                          <label >Deseja realmente deletar este cadastro?</label>
                                        </div>
                                        
                                         <button type="button" id='delete_event'  data-dismiss="modal" class="btn btn-primary">Sim</button>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Não</button>
                                
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





     <!-- Portfolio Modal Band  -->
    <div class="portfolio-modal modal fade" id="portfolioModalBand" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onclick="reloadPage()" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 ">
                            <div id="divBody" class="modal-body">
                           
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add  Modal Band-->
    <div class="portfolio-modal modal fade" id="addModalBand" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                               <h2>Adicionar</h2>
                                 
                                    <form action="<?= site_url() ?>/BandController/create" id='formBand' method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                      
                                          <label >Nome:</label>
                                          <input type="text" class="form-control"  name="bandName" placeholder="Escreva o nome da banda">
                                        </div>

                                         <div class="form-group">
                                          <label>Componentes:</label>
                                          <textarea  class="form-control" name="bandComp"  placeholder="Escreva o nome das pessoas que participam da banda"></textarea>
                                        </div>

                                       <div class="form-group">
                                          <label>Telefone:</label>
                                         <input type="text"  class="form-control phone" id="fone" name="bandFone"  value="" placeholder="Escreva o telefone do artista">
                                        </div>

                                          <label>Musicas</label>
                                             <select multiple name="musics[]"  class="form-control" >
                                                 <?php
                                                     foreach($musics as $mc)
                                                   
                                                    echo "<option value='{$mc->id_music}'>{$mc->name_music}</option>";
                                                 ?>
                                             </select>

                                        <div class="form-group">
                                          <label >Foto</label>
                                          <input type="file" class="form-control"  name="bandFoto">
                                        </div>
                                        <button type="submit" class="btn btn-primary" data-dimiss="modal"><i class="fa fa-times"></i>Salvar</button>
                                     </form>
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     <!-- Delete Modal Band  -->
     <div class="portfolio-modal modal fade" id="deleteModalBand" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                               <h2>Deletar</h2>
                                    
                                        <div class="form-group">
                                      
                                          <label >Deseja realmente deletar este cadastro?</label>
                                        </div>
                                        
                                         <button type="button" id='delete_band'  data-dismiss="modal" class="btn btn-primary">Sim</button>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Não</button>
                                
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Portfolio Modal Sponsor  -->
    <div class="portfolio-modal modal fade" id="portfolioModalSponsor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" onclick="reloadPage()" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 ">
                            <div id="divBody" class="modal-body">
                            
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Add Modal Sponsor -->
    <div class="portfolio-modal modal fade" id="addModalSponsor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Adicionar</h2>
                                <form action="<?= site_url() ?>/SponsorController/create" id='formSponsor' method="post" enctype="multipart/form-data">
                                      
                                            

                                        <div class="form-group">
                                          <label >Nome:</label>
                                          <input type="text" class="form-control"  name="sponsorName"  placeholder="Escreva o nome do apoiador">
                                        </div>

                                        <div class="form-group">
                                          <label>Telefone:</label>
                                         <input type="text"  class="form-control" id="fone" name="sponsorFone"  placeholder="Escreva o telefone do apoiador" value="">
                                        </div>

                                        <div class="form-group">
                                          <label >Foto</label>
                                          <input type="file" class="form-control"  name="sponsorFoto">
                                        </div>

                                        <button type="submit" class="btn btn-primary" data-dimiss="modal"><i class="fa fa-times"></i>Salvar</button>
                                     </form>
           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

         <!--Delete Modal Event -->
    <div class="portfolio-modal modal fade" id="deleteModalSponsor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                               <h2>Deletar</h2>
                                    
                                        <div class="form-group">
                                      
                                          <label >Deseja realmente deletar este cadastro?</label>
                                        </div>
                                        
                                         <button type="button" id='delete_sponsor'  data-dismiss="modal" class="btn btn-primary">Sim</button>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Não</button>
                                
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!--Add Modal Music -->
    <div class="portfolio-modal modal fade" id="addModalMusic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                   <h2>Adicionar</h2>
                                     
                                        <form action="<?= site_url() ?>MusicController/create" id='formMusic' method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                          
                                              <label >Nome:</label>
                                              <input type="text" class="form-control"  name="musicName" placeholder="Escreva o nome da musica">
                                            </div>

                                            

                                            <div class="form-group">
                                              <label >Musica</label>
                                              <input type="file" class="form-control" name="music" size="30">
                                            </div>
                                            <button type="submit" class="btn btn-primary" data-dimiss="modal"><i class="fa fa-times"></i>Salvar</button>
                                         </form>
      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Delete Modal Music --> 
        <div class="portfolio-modal modal fade" id="deleteModalMusic" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                               <h2>Deletar</h2>
                                    
                                        <div class="form-group">
                                      
                                          <label >Deseja realmente deletar este cadastro?</label>
                                        </div>
                                        
                                         <button type="button" id='delete_music'  data-dismiss="modal" class="btn btn-primary">Sim</button>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Não</button>
                                
  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>

    <!-- Plugin JavaScript -->
  

    <!-- Contact Form JavaScript -->
    <script src="<?= base_url('assets/js/jqBootstrapValidation.js');?>"></script>
    <script src="<?= base_url('assets/js/contact_me.js');?>"></script>

    <!-- Theme JavaScript -->
    <script src="<?= base_url('assets/js/agency.min.js');?>"></script>

</body>

</html>
