<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FINDING MEMO 2018</title>
	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="<?php echo base_url()?>assets2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets2/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets2/css/form-elements.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets2/css/style.css">
  <link rel="icon" type="image/ico" href="<?php echo base_url()?>assets/img/image.png">
  <style>
     html {zoom: 100%;}
  </style>
</head>
<body>
   <!-- Top content -->
   <div class="top-content">
      <div class="inner-bg">
         <div class="container">
            <div class="row">
               <div class="col-sm-8 col-sm-offset-2 text">
                  <h1><strong>Finding Memo</strong> Login Form</h1>
                  <div class="description">
                     <p>
                        Finding Memo, aplikasi pelacak memo Balai Teknologi Survei Kelautan
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-sm-6 col-sm-offset-3 form-box">
              <div class="form-top">
                 <div class="form-top-left">
                    <h3>Login Finding Memo</h3>
                    <p>Masukkan username dan password untuk masuk</p>
                </div>
                <div class="form-top-right">
                    <img src="<?php echo base_url()?>assets/img/image.png">
                </div>
            </div>
            <div class="form-bottom">
             <form role="form" action="<?php echo base_url()?>User/login" method="post" class="login-form">
                <div class="form-group">
                   <label class="sr-only" for="form-username">Username</label>
                   <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" required>
               </div>
               <div class="form-group">
                   <label class="sr-only" for="form-password">Password</label>
                   <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" required>
               </div>
               <button type="submit" class="btn">Sign in!</button><br/>
               <div align="center">
                  <?php echo $this->session->flashdata("login_message")?>
              </div>
           </form>
       </div>
   </div>
</div>
</div>
</div>
</div>
<!-- Javascript -->
<script src="<?php echo base_url()?>assets2/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>assets2/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets2/js/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>assets2/js/scripts.js"></script>
</body>
</html>