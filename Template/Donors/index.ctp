 <?php use Cake\I18n\Time;$donor=$this->request->session()->read('Auth.Donor'); ?>
<div class="row">
   
    <div class="col-sm-10"><h1><?= $donor['first_name'].' '.$donor['last_name'] ?></h1></div>
    <!--<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src=""></a></div>-->
</div>
<div class="row">
    <div class="col-sm-3"><!--left col-->

        <ul class="list-group">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span><?= date('l d F Y',strtotime($donor['registeredat']))?> </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span><?= $donor['email'] ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong><i class='fa fa-birthday-cake'></i></strong></span> <?= $donor['date_of_birth'] ?></li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item text-muted">Updates</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Today </strong></span><?php echo date('l d F y'); ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Total Donation </strong></span>0.0 </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>My Contribution</strong></span>0.0 </li>
            
            
        </ul> 
    </div><!--/col-3--> 
      
    <div class="col-sm-9">

        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Activity</a></li>
            <!--<li><a href="#messages" data-toggle="tab">Messages</a></li>-->
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <div class="table-responsive">
                    <h1>No Donation has been made yet.</h1> 
                    
                </div><!--/table-resp-->
            </div><!--/tab-pane-->
            <div class="tab-pane" id="messages">
                <h2></h2>
            </div><!--/tab-pane-->
            <div class="tab-pane" id="settings">
                <?= $this->element('donors/update')?>
            </div>

        </div><!--/tab-pane-->
    </div><!--/tab-content-->

</div><!--/col-9-->

