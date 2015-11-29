<?php
	if (substr_count($_SERVER["REQUEST_URI"], '/') == 1)
		$pre_url = "/";
	else
		$pre_url = "../";
?>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="<?php echo $pre_url; ?>">Billetterie Évènementielle UTC</a>
	  </div>
		<div id="navbar" class="navbar-collapse collapse">
			<a href="https://github.com/DEKHTIARJonathan/BilletterieUTC">
				<img style="position: absolute; top: 0; right: 0; border: 0;" src="<?php echo $pre_url; ?>images/forkme.png">
			</a>
			<ul class="nav navbar-nav navbar-right">
				<li id="home">
					<a href="<?php echo $pre_url; ?>">Home</a>
				</li>
				<li id="billetterie">
					<a href="<?php echo $pre_url; ?>billetterie/">Billetterie</a>
				</li>
				<li id="contact">
					<a href="<?php echo $pre_url; ?>contact/">Contact</a>
				</li>
				<li class="dropdown" id="admin">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo $pre_url; ?>admin/">Panneau d'administration</a>
						</li>
						<li>
							<a href="<?php echo $pre_url; ?>setup/">Setting Up NFC</a>
						</li>
						<li>
							<a href="<?php echo $pre_url; ?>offline/">Setting Up Offline Server</a>
						</li>
					</ul>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>


<script type="text/javascript">
	jQuery(document).ready(function () {

		var current_href = $(location).attr('href');

		if (current_href.indexOf("admin") !== -1)
			$("#admin").addClass("active");
		else if (current_href.indexOf("setup") !== -1)
			$("#admin").addClass("active");
		else if (current_href.indexOf("offline") !== -1)
			$("#admin").addClass("active");
		else if (current_href.indexOf("billetterie") !== -1)
			$("#billetterie").addClass("active");
		else if (current_href.indexOf("contact") !== -1)
			$("#contact").addClass("active");
		else
			$("#home").addClass("active");

	});
</script>
