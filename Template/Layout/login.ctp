<?php

$cakeDescription = 'Admin Panel';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('styles.css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- jQuery -->
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('jQuery-Plugin/form-validator/jquery.form-validator.min.js') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


   

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body class="login">
	
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>

        </div>
    </div>

    <?= $this->Html->script('bootstrap.min.js') ?>

<script type="text/javascript">
     $.validate({
        modules : 'date, security',
//        onModulesLoaded : function() {
//    var optionalConfig = {
//      fontSize: '12pt',
//      padding: '4px',
//      weak : 'Weak',
//      good : 'Good',
//      strong : 'Strong'
//    };
//    //$('input[name="password"]').displayPasswordStrength(optionalConfig);
//        }
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

</body>

</html>


