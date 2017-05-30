<?php

$cakeDescription = 'Admin Panel';
$user = $this->request->session()->read('Auth.User');
 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>
            
        </title>
        <?= $this->Html->meta('icon') ?>
        
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('bootstrap-theme.css') ?>
        <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
        <?= $this->Html->css('styles.css') ?>
        <?= $this->Html->css('bootstrap-table.css') ?>
        <?= $this->Html->css('activity.css') ?>
        <?= $this->Html->css('jquery-ui.css') ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <?= $this->Html->script('jquery.js') ?>
        <?= $this->Html->script('jQuery-Plugin/form-validator/jquery.form-validator.min.js') ?>
        <?= $this->Html->script('jquery-ui.min.js') ?>
        <?= $this->Html->script('ckeditor/ckeditor') ?>
   
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>


        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span  class="navbar-brand">Admin Panel</span>
                                
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?= $user['screen_name'] ?>   <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
                                                    <li><?= $this->Html->link(' Settings', ['controller' => 'users', 'action' => 'setting',$user['admin_id']],array('class'=>'fa fa-cog fa-lg ','aria-hidden'=>'true')); ?></li>
                                                        <li><?= $this->Html->link(' Logout', ['controller' => 'users', 'action' => 'logout'],array('class'=>'fa fa-sign-out fa-lg','aria-hidden'=>'true')); ?></li>
						</ul>
					</li>
				</ul>
			</div>
			
                                			
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
                        <li><?= $this->Html->link(__(' Dashboard'), ['controller'=>'users','action' => 'index'], array('class' => 'fa fa-tachometer  fa-lg', 'aria-hidden' => 'true')) ?></li>
                        <li><?= $this->Html->link(__(' Martyrs'), ['controller'=>'users','action' => 'displaymartyrs'], array('class' => 'fa fa-users  fa-lg', 'aria-hidden' => 'true')) ?></li>
			<li><?= $this->Html->link(__(' Admin'), ['controller'=>'users','action' => 'displayadmin'], array('class' => 'fa fa-users  fa-lg', 'aria-hidden' => 'true')) ?></li>
			<li><?= $this->Html->link(__(' Donors'), ['controller'=>'users','action' => 'displaydonors'], array('class' => 'fa fa-users  fa-lg', 'aria-hidden' => 'true')) ?></li>
		
<!--			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>-->
			<li role="presentation" class="divider"></li>
                       
		</ul>
		
	</div>
    <!--/.sidebar-->
		
	<div class="row col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
       
            <?= $this->Flash->render() ?>
          
            <?= $this->fetch('content') ?>
        
	</div>	
        
        <!--/.main-->

<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('bootstrap-table.js') ?>

<script>
		 $.validate({
        modules : 'date, security',
       });
  
                !function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
</script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</body>

</html>

