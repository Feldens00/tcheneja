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
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="<?= base_url('assets/css/agency.min.css')?>" rel="stylesheet">

	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.js"></script>
	  <script type="text/javascript" src="<?= base_url('assets/js/jquery.maskedinput.js');?>"></script>
	  <script type="text/javascript" src="<?= base_url('assets/js/jquery.validate.js'); ?>"></script>
	  <script type="text/javascript" src="<?= base_url('assets/js/all.js'); ?>"></script>


	<script type="text/javascript">

		function getIdEvent(id){
      alert(id);
      $.ajax({
        url: "<?php echo site_url('/HomeController/getOne'); ?>",
        type: "POST",
        data: {id_event: id},
          success: function(data){
        var obj = JSON.parse(data);


        
          if(!obj.length>0){
            alert("Nenhum evento encontrado");
          }else{ 
              try{
                $('#portfolioModalEvent > div > div > div > div > div > div > div  ').html("");
                var items=[];   
                $.each(obj, function(i,val){  

                items.push($( "<h2>"+val.name_event + "</h2><p class='item-intro text-muted'>"+val.day +"</p><p>" + val.schedule +"</p>"));
                
                }); 
                $('#portfolioModalEvent > div > div > div > div  > div > div  > div ').append.apply($('#portfolioModalEvent > div > div > div > div >  div >div '), items);


              }catch(e) {   
                alert('Ocorreu algum erro ao carregar o Evento!');
              } 
            }
            

          },
          error: function(){
          alert("Ocorreu algum erro");
          } 
        
        
      });
    }


    function getIdBand(id){
      alert(id);
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
      alert(id);
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
                        <a class="page-scroll" href="#portfolio">Musicas</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Artistas</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Apoio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Usuarios</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bem Vindo!</div>
                <div class="intro-heading">Visitante</div>
            </div>
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
                <div class="col-lg-12-text-center">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Eventos</h4>
                    <p class="text-muted">Veja os Shows.</p>
                </div>
            </div>
				
			<?php foreach($events as $ev) { ?>
            <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModalEvent" class="portfolio-link" k data-toggle="modal" onclick=" getIdEvent('<?php echo $ev->id_event; ?>')">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        
                    </a>
                    <div class="portfolio-caption">
                        <h4><?= $ev->name_event; ?></h4>
                        <p class="text-muted"><?= $ev->day; ?></p>
                    </div>
             </div>
             <?php } ?>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">

                <div class="row text-center">
             
                    <div class="col-lg-12-text-center">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-music fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Musicas</h4>
                        <p class="text-muted">Escute as Musicas de varios dos nossos músicos.</p>
                    </div>


                </div>
            
                
        
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                       
                    </a>
                    <div class="portfolio-caption">
                        <h4>Muito</h4>
                        <p class="text-muted">Odio</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        
                    </a>
                    <div class="portfolio-caption">
                        <h4>Porcaria</h4>
                        <p class="text-muted">de Ajax </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                       
                    </a>
                    <div class="portfolio-caption">
                        <h4>Socorro</h4>
                        <p class="text-muted">Preciso de uma Luz</p>
                    </div>
                </div>
           
            </div>
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
            <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModalBand" class="portfolio-link" k data-toggle="modal" onclick=" getIdBand('<?php echo $bd->id_band; ?>')">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        
                    </a>
                    <div class="portfolio-caption">
                        <h4><?= $bd->name_band ?></h4>
                        
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
                <div class="col-md-4 col-sm-6 portfolio-item"  id="divApoio">
                    <a href="#portfolioModalSponsor" class="portfolio-link" k data-toggle="modal" onclick=" getIdSponsor('<?php echo $sp->id_sponsor; ?>')">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i  class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                       
                    </a>
                    <div class="portfolio-caption">
                        <h4><?= $sp->name_sponsor ?></h4>
                       
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

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Maldito Ajax.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

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
									     <input type="text"  class="form-control phone"  name="sponsorFone"  value="" placeholder="Escreva o telefone do apoiador">
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

    <!-- Portfolio Modal  Event -->
    <div class="portfolio-modal modal fade" id="portfolioModalEvent" tabindex="-1" role="dialog" aria-hidden="true">
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

    <!-- Portfolio Modal 3 -->
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
									  <?= validation_errors();?>
									      <label >Nome:</label>
									      <input type="text" class="form-control"  name="bandName" placeholder="Escreva o nome da banda">
									    </div>

									     <div class="form-group">
									      <label>Componentes:</label>
									      <textarea  class="form-control" name="bandComp"  placeholder="Escreva o nome das pessoas que participam da banda"></textarea>
									    </div>

										<div class="form-group">
									      <label>Telefone:</label>
									     <input type="text" class="form-control phone"  name="bandFone" placeholder="Escreva o telefone da banda" value="">
									    </div>

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

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                               
                                <p>Start Bootstrap's Agency theme is based on Golden, a free PSD website template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Golden is a modern and clean one page web template that was made exclusively for Best PSD Freebies. This template has a great portfolio, timeline, and meet your team sections that can be easily modified to fit your needs.</p>
                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/golden-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                               
                                <p>Escape is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Escape is a one page web template that was designed with agencies in mind. This template is ideal for those looking for a simple one page solution to describe your business and offer your services.</p>
                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/escape-one-page-psd-web-template/">FreebiesXpress.com</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                
                                <p>Dreams is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Dreams is a modern one page web template designed for almost any purpose. It’s a beautiful template that’s designed with the Bootstrap framework in mind.</p>
                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/dreams-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
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
