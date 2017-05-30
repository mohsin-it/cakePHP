<?php use Cake\Routing\Router; ?>
<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

</header>
<div class="row">
    <!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide slider" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">

                <img class="img-responsive" src="webroot/img/sanrakshak.png" alt="First slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs ">
                    <div class="col-md-6 pull-left">
                        <h2>
                            <span>Help to <strong>Indian Army</strong></span>
                        </h2>
                        <br>
                        <h3>
                            <span>They gave their tomorrow for our today</span>
                        </h3>
                        <br>

                    </div>
                </div><!-- /header-text -->
            </div>
            <div class="item">

                <img class="img-responsive" src="webroot/img/slide2.jpg"  alt="Second slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-6 pull-left">
                        <!--                        <h2>
                                                    <span>Help to <strong>Indian Army</strong></span>
                                                </h2>-->

                        <h3>
                            <span>For those they love,they sacrifice</span>
                        </h3>
                        <br>

                    </div>
                </div><!-- /header-text -->
            </div>
            <div class="item">
                <img class="img-responsive" src="webroot/img/slide3.jpeg"  alt="Third slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                        <!--                        <h2>
                                                    <span>Help to <strong>Indian Army</strong></span>
                                                </h2>-->
                        <br>
                        <h3>
                            <span>The smallest deed is better than the greatest intention.</span>
                        </h3>
                        <br>

                    </div>
                </div><!-- /header-text -->
            </div>
        </div>
        <!-- Controls -->
        <!--        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>-->
    </div><!-- /carousel -->
</div>
<!-- Marketing Icons Section -->

<div class="row">
    <div class="col-lg-12">
        <h1>Welcome</h1>
        <h3>This Website is a platform to pay tribute to the brave soldiers of Indian Army who sacrificed thier lives in the line of duty.</h3>
        
    </div>
    <div class="col-lg-8 panel  col-lg-offset-2">
        <p><strong><i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i>The Brave soldiers of Indian Army fights a daily battle to provide 
                india's external and internal security.<br><i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i>They are protecting us by risking their lives.
                Soldier loses his life every fourth day. <br><i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i>This is the small step to tribute our Marytred Bravehearts.</strong></p>
    </div>
    
</div>
<hr>
<div class="row">
<?php foreach ($martyrs as $martyr): ?>
            <div class="col-md-3">

                <ul class="thumbnails">
                    <li class="span3">
                        <div class="thumbnail" style="padding: 0">
                            <div style="padding:4px"> 

                                <center>  <?= $this->Html->image('martyr_dir/' . $martyr->martyr_img, array('class' => 'img-circle img-responsive')); ?></center>

                            </div>
                            <div class="caption">
                                <h3><?= h($martyr->salutation), ' ', h($martyr->first_name), ' ', h($martyr->last_name) ?></h3>
                                <p>Martyr At:<b><?= h($martyr->martyrat) ?></b></p>

                            </div>
                            
                            <div class="caption">
                                <center><?= $this->Html->link(' Donate ', ['controller' => 'martyrs', 'action' => 'profile', $martyr['martyr_id']], array('class' => 'fa fa-caret-square-o-right fa-lg btn btn-primary ', 'aria-hidden' => 'true')); ?></center>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
<?php endforeach; ?>
</div>

<!-- /.row -->