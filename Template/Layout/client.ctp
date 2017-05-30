<?php
$cakeDescription = 'संरक्षक:Stand for Martyrs';
$donor = $this->request->session()->read('Auth.Donor');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <?= $this->Html->charset() ?>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $cakeDescription ?>
        
    </title>
    <?= $this->Html->meta('icon') ?>
    <!-- Bootstrap Core CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <!-- Custom CSS -->
   <?= $this->Html->css('main.css') ?>
    
   <?= $this->Html->css('slider.css') ?>
    <?= $this->Html->css('jquery-ui.css') ?>

    <!-- Custom Fonts -->
   <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <!-- jQuery -->
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('jQuery-Plugin/form-validator/jquery.form-validator.min.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="col-md-12">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
			
				<!---<img class="img-responsive" style="height:50px" src="webroot/img/title.gif" alt="First slide">-->
               
				<?= $this->Html->link($this->Html->image('title.gif'), '/', array('escape' => false)) ?>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href=""><h4>संरक्षक </h4></a>-->
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <?= $this->Html->link(_('Home'),array('controller' => 'martyrs', 'action'=>'index')) ?>
                    </li>
<!--                    <li>
                        <?= $this->Html->link(_('Blog'),array('controller' => 'martyrs', 'action'=>'blog')) ?>
                    </li>-->
                    <li>
                         <?= $this->Html->link(_('About'),array('controller' => 'martyrs', 'action'=>'about')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link(_('Contact'),array('controller' => 'Contact', 'action'=>'index')) ?>
                    </li>
                    <?php if(!$donorloggedIn): ?>
                    <li>
                         <?= $this->Html->link(_('Login'),array('controller' => 'donors', 'action'=>'login')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link(_('Register'),array('controller' => 'donors', 'action'=>'register')) ?>
                    </li>
                    <?php else: ?>
                    <li>
                        <?= $this->Html->link(_($donor['email']),array('controller'=>'donors','action'=>'index'))?> 
                    </li>
                    <li>
                         <?= $this->Html->link(_('Logout'),array('controller' => 'donors', 'action'=>'logout')) ?>
                    </li>
                   <?php endif;?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <!-- Page Content -->
    <div class="container-fluid">
        
        <?= $this->Flash->render() ?>
        <!--<div class="row">-->
           
          <?= $this->fetch('content') ?>  
        <!--</div>-->
        
           
    </div>
    <!-- /.container -->
    <!-- Footer -->
    
    <footer>
        
            <div class="col-md-4">
                <ul class="list-inline ulcoustom">
                    <li><a href="https://www.facebook.com/sanrakshak" target="_blank"> <i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a></li>
                    <li><a href="https://twitter.com/#"  target="_blank"> <i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a></li>
                    <li><a href="#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a></li>
                </ul>   
            </div>
            <div class="col-md-4">
                 Copyright &copy; 20<?php echo date('y') ?> 
            </div>
                  
            <div class="col-md-4">
                <a href="https://www.braintreegateway.com/merchants/29jbqwj8j5r3g464/verified" target="_blank">
                    <img src="https://s3.amazonaws.com/braintree-badges/braintree-badge-wide-dark.png" width="280px" height ="44px" border="0"/>
                </a>
            </div>
        
        
                
            
        
    </footer>    

   
    <!-- Bootstrap Core JavaScript -->
    <?= $this->Html->script('bootstrap.min.js') ?>

    <!-- Script to Activate the Carousel -->
    <script>
      $.validate({
        modules : 'date, security',
       });
    
    </script>

</body>

</html>

