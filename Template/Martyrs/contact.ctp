<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="well well-sm">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            
<!--                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                      placeholder="Message"></textarea>-->
                            <?= $this->Form->input('message',array('type'=>'textarea','class'=>'form-control','plceholder'=>'Your Email'))?>
                        </div>
                    </div>
                    <div class="col-md-12">
<!--                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>-->
                            <?= $this->Form->submit('Send')?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
        </form>
    </div>
</div>

