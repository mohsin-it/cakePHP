<?php 
$donor = $this->request->session()->read('Auth.Donor');
$per = ($donationamt *100)/1000000;
$rem = 1000000-$donationamt;

?>
<div class="row">
    <div class="col-md-offset-2 col-md-6 col-lg-offset-2 col-lg-8">
        <div class="well profile">
            <div class="col-sm-12">
                <h1>Make Contribution</h1>
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                       <?= $this->Html->image('martyr_dir/'.$martyr->martyr_img,array('class'=>'img-circle img-responsive')) ;?>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <h2><?= h($martyr->salutation).' '.h($martyr->first_name).' '.h($martyr->last_name)?></h2>
                    <p><strong>Martyred At: </strong> <?= date("d-m-Y",strtotime($martyr->martyrat))?></p>
                    <p><strong>Dependants: </strong> <?= h($martyr->martyr_family->no_of_members)?></p>
                    <p><strong>Family Income: </strong> <?= h($martyr->martyr_family->income)?></p>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-offset-4">
                    <h4><strong>Detail</strong></h4>
                   <p><?= h($martyr->detail)?> </p>  
                </div>
               
                
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-6 emphasis">
                    <h2><strong> 10 Lacs </strong></h2>                    
                    <p><small>Pledged</small></p>
                </div>
                <div class="col-xs-12 col-sm-6 emphasis">
                    <h2><strong><?php if($donationamt==0){echo 0.0;} else echo $donationamt; ?></strong></h2>                    
                    <p><small>Donated</small></p>
                </div>
                <?php
                if($per<=40){
                    echo "<div class='col-xs-12'>";
                    echo  $this->element('martyrs\redbar');
                    echo "</div>"; 
                }
                elseif($per<=70 && $per>40){
                    echo "<div class='col-xs-12'>";
                    echo $this->element('martyrs\yellowbar');
                    echo "</div>";
                }
                elseif($per>70){
                    echo "<div class='col-xs-12'>";
                    echo $this->element('martyrs\greenbar');
                    echo "</div>";
                }
                ?>             
            <!--<button type="button" class="btn btn-primary btn-lg btn-success" data-toggle="modal" data-target="#myModal">Donate</button>-->
<!--             <center><?= $this->Html->link(' Donate ', ['controller' => 'martyrs', 'action' => 'pay', $martyr['martyr_id']], array('class' => 'fa fa-caret-square-o-right fa-lg btn btn-primary ', 'aria-hidden' => 'true')); ?></center>   -->
            
            <?php
            if($donationamt>=500000){
                echo "<a class='fa fa-caret-square-o-right fa-lg btn btn-primary '  title='Max donation amount is reached' href=#"."> You can not Donate</a>" ;  
            }
            else{
            if(!$donor){
              echo "<a class='fa fa-caret-square-o-right fa-lg btn btn-primary' href=\sanrakshak/donors/login> Login To donate</a>" ; 
            }
            else{
                echo "<a class='fa fa-caret-square-o-right fa-lg btn btn-primary' href=\sanrakshak/payment/public_html/index.php?id=".$donor['donor_id']."&mid=".$m_id."> Donate</a>" ;  
            }
            }
            ?> 
           
            
            </div>
           
        </div>                 
    </div>
</div>
<script>
    
$( function() {
    $( document ).tooltip();
    
  } );
</script>
