<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url();?>assets/jquery/jquery.mobile-1.4.5.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
		<script src="<?php echo base_url();?>assets/jquery/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/jquery/jquery.mobile-1.4.5.js" type="text/javascript"></script>
	</head>
	
	<body>
		<div id="login">
		<section  data-theme="a" data-content-theme="b" data-title="Login" >
			<header>
				<h2>Finding Memo</h2>
			</header>
			<main data-role="main">
					<form action="<?php echo site_url();?>Administrator/clogin" method="post" data-ajax="false">
						<div class="ui-content">
							<label for="username">Username : </label>
							<input type="text"  name="username" id="username" data-mini="true" placeholder="username">
							<label for="password">Password : </label>
							<input type="password"  name="password" id="password" data-mini="true" placeholder="password">
							<input type='hidden' name='id' value=1>
						</div>
							<input type="submit" value="Masuk" name="submit">
					</form>
			</main>
		</section>
		</div>
	</body>
</html>