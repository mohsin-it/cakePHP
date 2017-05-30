<script>jAlert('This is a custom alert box', 'Alert Dialog');</script>
<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
									
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
                                                    <li class="fa fa-inr fa-3x"></li>
						
                                                </div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?=  $donationamt ?></div>
							<div class="text-muted">Donation</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
                                                    <li class="fa fa-user fa-3x"></li>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= $donorcount ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
                    
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<li class="fa fa-user fa-3x"></li>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= $martyrcount ?></div>
							<div class="text-muted">Martyrs</div>
						</div>
                                            
					</div>
				</div>
			</div>
                        <div class="col-xs-12 col-md-6 col-lg-3">
                            <div class="panel panel-orange panel-widget">
                                <div class="row no-padding">
                                    <div class="col-sm-3 col-lg-5 widget-left">
                                        <li class="fa fa-user-circle-o fa-3x"></li>
                                    </div>
                                    <div class="col-sm-9 col-lg-7 widget-right">
                                        <div class="large"><?= $admincount ?></div>
                                        <div class="text-muted">Admin</div>
                                    </div>
                                </div>
                            </div>
                        </div>
		</div><!--/.row-->
                
                     <div class="row">
<!--                         <div class="col-md-8 pull-left">
                             <div  style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                         </div>-->
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
                                    <div class="panel-heading"><li class="fa fa-paperclip"></li> Recent Activities</div>
					<div class="panel-body">
                                            <div class="activity-feed">
                                                 <?php foreach($donors as $data):?>
                                                
                                                <div class="feed-item">
                                                  
                                                    <div class="date">
                                                        <?= date("d-M-Y H:i", strtotime($data->registeredat))?>
                                                    </div>
                                                    
                                                    <div class="text"> New Donor<a href="users/displaydonors"> <?= h($data->first_name)?> </a>Registered</div>
                                                   
                                                     <div class="date">
                                                        <?= Null?>
                                                    </div>
                                                   
                                                </div>
                                               
                                                
                                                <?php endforeach; ?>
                                                
                                            </div>
					</div>
				</div>
                            
						
			</div><!--/.col-->
			
			
		</div><!--/.row-->
                <script>
                    $(document).ready(function () {
    Highcharts.setOptions({
        global: {
            useUTC: false
        }
    });

    Highcharts.chart('container', {
        chart: {
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function () {

                    // set up the updating of the chart each second
                    var series = this.series[0];
                    setInterval(function () {
                        var x = (new Date()).getTime(), // current time
                            y = Math.random();
                        series.addPoint([x, y], true, true);
                    }, 1000);
                }
            }
        },
        title: {
            text: 'Live random data'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150
        },
        yAxis: {
            title: {
                text: 'Value'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                    Highcharts.numberFormat(this.y, 2);
            }
        },
        legend: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            name: 'Random data',
            data: (function () {
                // generate an array of random data
                var data = [],
                    time = (new Date()).getTime(),
                    i;

                for (i = -19; i <= 0; i += 1) {
                    data.push({
                        x: time + i * 1000,
                        y: Math.random()
                    });
                }
                return data;
            }())
        }]
    });
});
                </script>