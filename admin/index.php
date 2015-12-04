<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/checkadmin.php';

?>

<!doctype html>
<html lang="en">
<head>
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="Neon Admin Panel" name="description">
	<meta content="Laborator.co" name="author">
	<link href="assets/images/favicon.ico" rel="icon">
	<title><?php echo $_CONFIG["website"]["title"]; ?></title>
	<link href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"
	id="style-resource-1" rel="stylesheet">
	<link href="assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2"
	rel="stylesheet">
	<link href=
	"../fonts.googleapis.com/cssdcaf.css?family=Noto+Sans:400,700,400italic" id=
	"style-resource-3" rel="stylesheet">
	<link href="assets/css/bootstrap.css" id="style-resource-4" rel="stylesheet">
	<link href="assets/css/neon-core.css" id="style-resource-5" rel="stylesheet">
	<link href="assets/css/neon-theme.css" id="style-resource-6" rel="stylesheet">
	<link href="assets/css/neon-forms.css" id="style-resource-7" rel="stylesheet">
	<script src="assets/js/jquery-1.11.3.min.js">
	</script>
	<!--[if lt IE 9]>
	<script src="../scripts/ie8-responsive-file-warning.js"></script>
	<![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body page-fade" data-url="localhost">
	<div class="page-container">
		<?php
			include("parts/menu.php");
		?>



		<div class="main-content">

			<script type="text/javascript">
			jQuery(document).ready(function($)
			{
			// Sample Toastr Notification
			setTimeout(function()
			{
			var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
			"toastClass": "black",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			};
			toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
			}, 3000);

			// Sparkline Charts
			$('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
			$('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
			$('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
			$('.bar').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
			$('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
			$('.linechart').sparkline();
			$('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
			$('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );

			$(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
			type: 'bar',
			barColor: '#485671',
			height: '80px',
			barWidth: 10,
			barSpacing: 2
			});

			// JVector Maps
			var map = $("#map");
			map.vectorMap({
			map: 'europe_merc_en',
			zoomMin: '3',
			backgroundColor: '#383f47',
			focusOn: { x: 0.5, y: 0.8, scale: 3 }
			});

			// Line Charts
			var line_chart_demo = $("#line-chart-demo");
			var line_chart = Morris.Line({
			element: 'line-chart-demo',
			data: [
			{ y: '2006', a: 100, b: 90 },
			{ y: '2007', a: 75, b: 65 },
			{ y: '2008', a: 50, b: 40 },
			{ y: '2009', a: 75, b: 65 },
			{ y: '2010', a: 50, b: 40 },
			{ y: '2011', a: 75, b: 65 },
			{ y: '2012', a: 100, b: 90 }
			],
			xkey: 'y',
			ykeys: ['a', 'b'],
			labels: ['October 2013', 'November 2013'],
			redraw: true
			});
			line_chart_demo.parent().attr('style', '');

			// Donut Chart
			var donut_chart_demo = $("#donut-chart-demo");
			donut_chart_demo.parent().show();
			var donut_chart = Morris.Donut({
			element: 'donut-chart-demo',
			data: [
			{label: "Download Sales", value: getRandomInt(10,50)},
			{label: "In-Store Sales", value: getRandomInt(10,50)},
			{label: "Mail-Order Sales", value: getRandomInt(10,50)}
			],
			colors: ['#707f9b', '#455064', '#242d3c']
			});
			donut_chart_demo.parent().attr('style', '');

			// Area Chart
			var area_chart_demo = $("#area-chart-demo");
			area_chart_demo.parent().show();
			var area_chart = Morris.Area({
			element: 'area-chart-demo',
			data: [
			{ y: '2006', a: 100, b: 90 },
			{ y: '2007', a: 75, b: 65 },
			{ y: '2008', a: 50, b: 40 },
			{ y: '2009', a: 75, b: 65 },
			{ y: '2010', a: 50, b: 40 },
			{ y: '2011', a: 75, b: 65 },
			{ y: '2012', a: 100, b: 90 }
			],
			xkey: 'y',
			ykeys: ['a', 'b'],
			labels: ['Series A', 'Series B'],
			lineColors: ['#303641', '#576277']
			});
			area_chart_demo.parent().attr('style', '');


			// Rickshaw
			var seriesData = [ [], [] ];
			var random = new Rickshaw.Fixtures.RandomData(50);
			for (var i = 0; i < 50; i++)
			{
			random.addData(seriesData);
			}
			var graph = new Rickshaw.Graph( {
			element: document.getElementById("rickshaw-chart-demo"),
			height: 193,
			renderer: 'area',
			stroke: false,
			preserve: true,
			series: [{
			color: '#73c8ff',
			data: seriesData[0],
			name: 'Upload'
			}, {
			color: '#e0f2ff',
			data: seriesData[1],
			name: 'Download'
			}
			]
			} );
			graph.render();
			var hoverDetail = new Rickshaw.Graph.HoverDetail( {
			graph: graph,
			xFormatter: function(x) {
			return new Date(x * 1000).toString();
			}
			} );
			var legend = new Rickshaw.Graph.Legend( {
			graph: graph,
			element: document.getElementById('rickshaw-legend')
			} );
			var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
			graph: graph,
			legend: legend
			} );
			setInterval( function() {
			random.removeData(seriesData);
			random.addData(seriesData);
			graph.update();
			}, 500 );
			});

			function getRandomInt(min, max)
			{
			return Math.floor(Math.random() * (max - min + 1)) + min;
			}
			</script>
			<div class="row">
				<div class="col-sm-3 col-xs-6">
					<div class="tile-stats tile-red">
						<div class="icon">
							<i class="entypo-users"></i>
						</div>
						<div class="num" data-delay="0" data-duration="1500" data-end="83"
						data-postfix="" data-start="0">
							0
						</div>
						<h3>Registered users</h3>
						<p>so far in our blog, and our website.</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6">
					<div class="tile-stats tile-green">
						<div class="icon">
							<i class="entypo-chart-bar"></i>
						</div>
						<div class="num" data-delay="600" data-duration="1500" data-end="135"
						data-postfix="" data-start="0">
							0
						</div>
						<h3>Daily Visitors</h3>
						<p>this is the average value.</p>
					</div>
				</div>
				<div class="clear visible-xs"></div>
				<div class="col-sm-3 col-xs-6">
					<div class="tile-stats tile-aqua">
						<div class="icon">
							<i class="entypo-mail"></i>
						</div>
						<div class="num" data-delay="1200" data-duration="1500" data-end="23"
						data-postfix="" data-start="0">
							0
						</div>
						<h3>New Messages</h3>
						<p>messages per day.</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6">
					<div class="tile-stats tile-blue">
						<div class="icon">
							<i class="entypo-rss"></i>
						</div>
						<div class="num" data-delay="1800" data-duration="1500" data-end="52"
						data-postfix="" data-start="0">
							0
						</div>
						<h3>Subscribers</h3>
						<p>on our site right now.</p>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-8">
					<div class="panel panel-primary" id="charts_env">
						<div class="panel-heading">
							<div class="panel-title">
								Site Stats
							</div>
							<div class="panel-options">
								<ul class="nav nav-tabs">
									<li class="">
										<a data-toggle="tab" href="#area-chart">Area Chart</a>
									</li>
									<li class="active">
										<a data-toggle="tab" href="#line-chart">Line Charts</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#pie-chart">Pie Chart</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane" id="area-chart">
									<div class="morrischart" id="area-chart-demo" style="height: 300px">
									</div>
								</div>
								<div class="tab-pane active" id="line-chart">
									<div class="morrischart" id="line-chart-demo" style="height: 300px">
									</div>
								</div>
								<div class="tab-pane" id="pie-chart">
									<div class="morrischart" id="donut-chart-demo" style="height: 300px;">
									</div>
								</div>
							</div>
						</div>
						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th class="col-padding-1" width="50%">
										<div class="pull-left">
											<div class="h4 no-margin">
												Pageviews
											</div><small>54,127</small>
										</div><span class="pull-right pageviews">4,3,5,4,5,6,5</span>
									</th>
									<th class="col-padding-1" width="50%">
										<div class="pull-left">
											<div class="h4 no-margin">
												Unique Visitors
											</div><small>25,127</small>
										</div><span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
									</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h4>Real Time Stats<br>
								<small>current server uptime</small></h4>
							</div>
							<div class="panel-options">
								<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal"
								href="#sample-modal"><i class="entypo-cog"></i></a> <a data-rel=
								"collapse" href="#"><i class="entypo-down-open"></i></a> <a data-rel=
								"reload" href="#"><i class="entypo-arrows-ccw"></i></a> <a data-rel=
								"close" href="#"><i class="entypo-cancel"></i></a>
							</div>
						</div>
						<div class="panel-body no-padding">
							<div id="rickshaw-chart-demo">
								<div id="rickshaw-legend"></div>
							</div>
						</div>
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-4">
					<div class="panel panel-primary">
						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th class="padding-bottom-none text-center"><br>
									<br>
									<span class="monthly-sales"></span></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="panel-heading">
										<h4>Monthly Sales</h4>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								Latest Updated Profiles
							</div>
							<div class="panel-options">
								<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal"
								href="#sample-modal"><i class="entypo-cog"></i></a> <a data-rel=
								"collapse" href="#"><i class="entypo-down-open"></i></a> <a data-rel=
								"reload" href="#"><i class="entypo-arrows-ccw"></i></a> <a data-rel=
								"close" href="#"><i class="entypo-cancel"></i></a>
							</div>
						</div>
						<table class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Position</th>
									<th>Activity</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Art Ramadani</td>
									<td>CEO</td>
									<td class="text-center"><span class=
									"inlinebar">4,3,5,4,5,6</span></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Ylli Pylla</td>
									<td>Font-end Developer</td>
									<td class="text-center"><span class=
									"inlinebar-2">1,3,4,5,3,5</span></td>
								</tr>
								<tr>
									<td>3</td>
									<td>Arlind Nushi</td>
									<td>Co-founder</td>
									<td class="text-center"><span class=
									"inlinebar-3">5,3,2,5,4,5</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><br>
			<script type="text/javascript">
			// Code used to add Todo Tasks
			jQuery(document).ready(function($)
			{
			var $todo_tasks = $("#todo_tasks");
			$todo_tasks.find('input[type="text"]').on('keydown', function(ev)
			{
			if(ev.keyCode == 13)
			{
			ev.preventDefault();
			if($.trim($(this).val()).length)
			{
			var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'<\/label><\/div><\/li>');
			$(this).val('');
			$todo_entry.appendTo($todo_tasks.find('.todo-list'));
			$todo_entry.hide().slideDown('fast');
			replaceCheckboxes();
			}
			}
			});
			});
			</script>
			<div class="row">
				<div class="col-sm-3">
					<div class="tile-block" id="todo_tasks">
						<div class="tile-header">
							<i class="entypo-list"></i> <a href="#">Tasks <span>To do list, tick
							one.</span></a>
						</div>
						<div class="tile-content">
							<input class="form-control" placeholder="Add Task" type="text">
							<ul class="todo-list">
								<li>
									<div class="checkbox checkbox-replace color-white">
										<input type="checkbox"> <label>Website Design</label>
									</div>
								</li>
								<li>
									<div class="checkbox checkbox-replace color-white">
										<input checked id="task-2" type="checkbox"> <label>Slicing</label>
									</div>
								</li>
								<li>
									<div class="checkbox checkbox-replace color-white">
										<input id="task-3" type="checkbox"> <label>WordPress
										Integration</label>
									</div>
								</li>
								<li>
									<div class="checkbox checkbox-replace color-white">
										<input id="task-4" type="checkbox"> <label>SEO Optimize</label>
									</div>
								</li>
								<li>
									<div class="checkbox checkbox-replace color-white">
										<input checked id="task-5" type="checkbox"> <label>Minify &amp;
										Compress</label>
									</div>
								</li>
							</ul>
						</div>
						<div class="tile-footer">
							<a href="#">View all tasks</a>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<script type="text/javascript">
					jQuery(document).ready(function($)
					{
					var map = $("#map-2");
					map.vectorMap({
					map: 'europe_merc_en',
					zoomMin: '3',
					backgroundColor: '#383f47',
					focusOn: { x: 0.5, y: 0.8, scale: 3 }
					});
					});
					</script>
					<div class="tile-group">
						<div class="tile-left">
							<div class="tile-entry">
								<h3>Map</h3><span>top visitors location</span>
							</div>
							<div class="tile-entry">
								<img alt="" class="pull-right op" src="assets/images/sample-al.png">
								<h4>Albania</h4><span>25%</span>
							</div>
							<div class="tile-entry">
								<img alt="" class="pull-right op" src="assets/images/sample-it.png">
								<h4>Italy</h4><span>18%</span>
							</div>
							<div class="tile-entry">
								<img alt="" class="pull-right op" src="assets/images/sample-au.png">
								<h4>Austria</h4><span>15%</span>
							</div>
						</div>
						<div class="tile-right">
							<div class="map" id="map-2"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- TS14489286582226: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --><!-- Footer -->
			<footer class="main">
				<div class="pull-right">
					<a href="../marketplace.envato.com/index2623.html?ref=Laborator" target=
					"_blank"><strong>Purchase this theme for $24</strong></a>
				</div>&copy; 2015 <strong>Neon</strong> Admin Theme by <a href=
				"../laborator.co/index.html" target="_blank">Laborator</a>
			</footer>
		</div>
		<!-- TS144892865816790: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates -->
		<div class="fixed" data-current-user="Art Ramadani" data-max-chat-history=
		"25" data-order-by-status="1" id="chat">
			<div class="chat-inner">
				<h2 class="chat-header"><a class="chat-close" href="#"><i class=
				"entypo-cancel"></i></a> <i class="entypo-users"></i> Chat <span class=
				"badge badge-success is-hidden">0</span></h2>
				<div class="chat-group" id="group-1">
					<strong>Favorites</strong> <a data-conversation-history="#sample_history"
					href="#" id="sample-user-123"><span class="user-status is-online"></span>
					<em>Catherine J. Watkins</em></a> <a href="#"><span class=
					"user-status is-online"></span> <em>Nicholas R. Walker</em></a> <a href=
					"#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Brandon S.
					Young</em></a> <a href="#"><span class="user-status is-idle"></span>
					<em>Fernando G. Olson</em></a>
				</div>
				<div class="chat-group" id="group-2">
					<strong>Work</strong> <a href="#"><span class=
					"user-status is-offline"></span> <em>Robert J. Garcia</em></a>
					<a data-conversation-history="#sample_history_2" href="#"><span class=
					"user-status is-offline"></span> <em>Daniel A. Pena</em></a> <a href=
					"#"><span class="user-status is-busy"></span> <em>Rodrigo E.
					Lozano</em></a>
				</div>
				<div class="chat-group" id="group-3">
					<strong>Social</strong> <a href="#"><span class=
					"user-status is-busy"></span> <em>Velma G. Pearson</em></a> <a href=
					"#"><span class="user-status is-offline"></span> <em>Margaret R.
					Dedmon</em></a> <a href="#"><span class="user-status is-online"></span>
					<em>Kathleen M. Canales</em></a> <a href="#"><span class=
					"user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
				</div>
			</div><!-- conversation template -->
			<div class="chat-conversation">
				<div class="conversation-header">
					<a class="conversation-close" href="#"><i class="entypo-cancel"></i></a>
					<span class="user-status"></span> <span class="display-name"></span>
					<small></small>
				</div>
				<ul class="conversation-body"></ul>
				<div class="chat-textarea">
					<textarea class="form-control autogrow" placeholder="Type your message">
</textarea>
				</div>
			</div>
		</div><!-- Chat Histories -->
		<ul class="chat-history" id="sample_history">
			<li>
				<span class="user">Art Ramadani</span>
				<p>Are you here?</p><span class="time">09:00</span>
			</li>
			<li class="opponent">
				<span class="user">Catherine J. Watkins</span>
				<p>This message is pre-queued.</p><span class="time">09:25</span>
			</li>
			<li class="opponent">
				<span class="user">Catherine J. Watkins</span>
				<p>Whohoo!</p><span class="time">09:26</span>
			</li>
			<li class="opponent unread">
				<span class="user">Catherine J. Watkins</span>
				<p>Do you like it?</p><span class="time">09:27</span>
			</li>
		</ul><!-- Chat Histories -->
		<ul class="chat-history" id="sample_history_2">
			<li class="opponent unread">
				<span class="user">Daniel A. Pena</span>
				<p>I am going out.</p><span class="time">08:21</span>
			</li>
			<li class="opponent unread">
				<span class="user">Daniel A. Pena</span>
				<p>Call me when you see this message.</p><span class="time">08:27</span>
			</li>
		</ul>
	</div>
	<!-- TS144892865815264: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --><!-- Sample Modal (Default skin) -->
	<div class="modal fade" id="sample-modal-dialog-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" class="close" data-dismiss="modal" type=
					"button">&times;</button>
					<h4 class="modal-title">Widget Options - Default Modal</h4>
				</div>
				<div class="modal-body">
					<p>Now residence dashwoods she excellent you. Shade being under his bed
					her. Much read on as draw. Blessing for ignorant exercise any yourself
					unpacked. Pleasant horrible but confined day end marriage. Eagerness
					furniture set preserved far recommend. Did even but nor are most gave
					hope. Secure active living depend son repair day ladies now.</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type=
					"button">Close</button> <button class="btn btn-primary" type="button">Save
					changes</button>
				</div>
			</div>
		</div>
	</div><!-- Sample Modal (Skin inverted) -->
	<div class="modal invert fade" id="sample-modal-dialog-2">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" class="close" data-dismiss="modal" type=
					"button">&times;</button>
					<h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
				</div>
				<div class="modal-body">
					<p>Now residence dashwoods she excellent you. Shade being under his bed
					her. Much read on as draw. Blessing for ignorant exercise any yourself
					unpacked. Pleasant horrible but confined day end marriage. Eagerness
					furniture set preserved far recommend. Did even but nor are most gave
					hope. Secure active living depend son repair day ladies now.</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type=
					"button">Close</button> <button class="btn btn-primary" type="button">Save
					changes</button>
				</div>
			</div>
		</div>
	</div><!-- Sample Modal (Skin gray) -->
	<div class="modal gray fade" id="sample-modal-dialog-3">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" class="close" data-dismiss="modal" type=
					"button">&times;</button>
					<h4 class="modal-title">Widget Options - Gray Skin Modal</h4>
				</div>
				<div class="modal-body">
					<p>Now residence dashwoods she excellent you. Shade being under his bed
					her. Much read on as draw. Blessing for ignorant exercise any yourself
					unpacked. Pleasant horrible but confined day end marriage. Eagerness
					furniture set preserved far recommend. Did even but nor are most gave
					hope. Secure active living depend son repair day ladies now.</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type=
					"button">Close</button> <button class="btn btn-primary" type="button">Save
					changes</button>
				</div>
			</div>
		</div>
	</div><!-- Imported styles on this page -->
	<link href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css" id=
	"style-resource-1" rel="stylesheet">
	<link href="assets/js/rickshaw/rickshaw.min.css" id="style-resource-2" rel=
	"stylesheet">
	<script id="script-resource-1" src="assets/js/gsap/TweenMax.min.js">
	</script>
	<script id="script-resource-2" src=
	"assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js">
	</script>
	<script id="script-resource-3" src="assets/js/bootstrap.js">
	</script>
	<script id="script-resource-4" src="assets/js/joinable.js">
	</script>
	<script id="script-resource-5" src="assets/js/resizeable.js">
	</script>
	<script id="script-resource-6" src="assets/js/neon-api.js">
	</script>
	<script id="script-resource-7" src="assets/js/cookies.min.js">
	</script>
	<script id="script-resource-8" src=
	"assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js">
	</script>
	<script id="script-resource-9" src=
	"assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js">
	</script>
	<script id="script-resource-10" src="assets/js/jquery.sparkline.min.js">
	</script>
	<script id="script-resource-11" src="assets/js/rickshaw/vendor/d3.v3.js">
	</script>
	<script id="script-resource-12" src="assets/js/rickshaw/rickshaw.min.js">
	</script>
	<script id="script-resource-13" src="assets/js/raphael-min.js">
	</script>
	<script id="script-resource-14" src="assets/js/morris.min.js">
	</script>
	<script id="script-resource-15" src="assets/js/toastr.js">
	</script>
	<script id="script-resource-16" src="assets/js/neon-chat.js">
	</script> <!-- JavaScripts initializations and stuff -->
	<script id="script-resource-17" src="assets/js/neon-custom.js">
	</script> <!-- Demo Settings -->
	<script id="script-resource-18" src="assets/js/neon-demo.js">
	</script>
	<script id="script-resource-19" src="assets/js/neon-skins.js">
	</script>
</body>
</html>
