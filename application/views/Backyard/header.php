<!DOCTYPE html>
<html>
<head>
	<title>BackYard Home</title>
	<link rel="stylesheet" type="text/css" href="/CI/assets/css/title.css">
  <link rel="stylesheet" type="text/css" href="/CI/assets/css/bootstrap.min.css">
<link href="/CI/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/CI/assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" target="view_window" href="/CI/assets/css/shop_info.css">
  <link rel="stylesheet" type="text/css" href="/CI/assets/css/BackYard-index.css">
  
</head>
<body>
  <script src="/CI/assets/js/jquery.js"></script>
    <script src="/CI/assets/js/bootstrap.min.js"></script>
    <script src="/CI/assets/js/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"  type="text/javascript">
</script>

<script src="https://cdn.bootcss.com/jquery/3.3.0/jquery.js"></script>


	<div id="Home">
		
    <div id="Fixed" >

			<div id="logo"><img src="/CI/assets/img/logo.jpeg" width="270" height="56" style="float:left"/></div>

			<div class="nav">
 			<ul>
   				<li><?php 
				if (!isset($_SESSION['username'])){
					?><a class="trigger" href="javascript:;"><?php echo "Log in";?></a><?php
				}
				else{
					 ?><a href="http://47.94.218.209/CI/index.php/backyard/logout"><?php echo "LogOff";?></a><?php 
				} ?></li>
   				<li><a href="http://47.94.218.209/CI/index.php/backyard/help">Help</a></li>
   				<?php 
				if (isset($_SESSION['username'])){
				?><li><a href="http://47.94.218.209/CI/index.php/user/myinfo"><?php	echo $_SESSION['username'];?></a></li><?php
				}?>
				
   				<li><a href="http://47.94.218.209/CI/">Home</a></li>
 			</ul>
 			</div>

		</div>
		
		<div class="modalBox">
    <div class="overLay"></div>
        <div class="container">
		<div id="switch">
		<span class="login" style="cursor:pointer">Log in</span><span class="|">|</span><span class="signup " style="cursor:pointer">Sign up</span>
		</div>
		
		<div class="formLogIn">
		<?php if (isset($passwrong)||isset($nouser)){?>
		<p style="text-align:center;color:red;font-size:20px"><?php 
		if (isset($passwrong)){
			echo "Wrong Password!";
		}
		else {
			echo "User does not exist";
		}
		?></p>
		<?php }?>
		<?php echo form_open('backyard/login','');?>
		<font size="3">Account: <?php echo form_error('loginusername'); ?>&nbsp;</font>
		<input type="text" required="required" id="name1" name="loginusername" placeholder="Account"  style="width:250px;height:25px" onfocus="this.placeholder=''" onblur="this.placeholder='Account'"/><br><br>
		<font size="3">Password: </font>
		<input type="password" required="required" id="name1" name="loginpassword" placeholder="Password"  style="width:250px;height:25px" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"/><br><br>
		<input type="submit" class="loginButton" value="Log in" style="width:250px"/>
		</form>
		</div>
		<div class="formSignUp hide">
		<?php echo validation_errors('<div style="text-align:center;color:red;font-size:20px">', '</div>'); ?>
		<?php echo form_open('backyard/register','');?>
		<font size="3">Account: &nbsp;</font>
		<input type="text" required="required" id="name1" name="username" value="<?php echo set_value('username'); ?>" placeholder="Account"  style="width:250px;height:25px" onfocus="this.placeholder=''" onblur="this.placeholder='Account'"/><br><br>
		<font size="3">Password: </font>
		<input type="password" required="required" id="name1" name="password" value="<?php echo set_value('password'); ?>"placeholder="Password"  style="width:250px;height:25px" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"/><br><br>
		<font size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
		<input type="password" required="required" id="name1" name="passconf" value="<?php echo set_value('passconf'); ?>"placeholder="Enter your password again"  style="width:250px;height:25px" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your password again'"/><br><br>
		
		<font size="3">Phone: &nbsp;&nbsp;&nbsp;&nbsp;</font>
		<input type="text" required="required" id="name1" name="tel" value="<?php echo set_value('tel'); ?>"placeholder="Phone"  style="width:250px;height:25px" onfocus="this.placeholder=''" onblur="this.placeholder='Phone'"/><br><br>
		<font size="3">Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
		<input type="email" required="required" id="name1" name="email" value="<?php echo set_value('email'); ?>"placeholder="Email"  style="width:250px;height:25px" onfocus="this.placeholder=''" onblur="this.placeholder='Email'"/><br><br>
		<input type="submit" class="signUpButton" value="Sign up" style="width:250px"/>
		</form>
		</div>
    </div>
	</div>
<script>
    var trigger = document.getElementsByTagName("a")[0];
    var modal = document.getElementsByClassName("modalBox")[0];
	var pop= document.getElementsByClassName("container")[0];
	var count = 0;
    trigger.onclick = function (){
        modal.style.display = 'block';
    };
	$(function (){
	$('.login').click(function(){
		$('.formLogIn').removeClass('hide');
		$('.formSignUp').addClass('hide');
	});
	})
	$('.signup').click(function(){
		$('.formLogIn').addClass('hide');
		$('.formSignUp').removeClass('hide');
	});
	
	$('.overLay').click(function (e){
		e.stopPropagation();
		modal.style.display = 'none';
	});

	
</script>

<style>
        .trigger {
            display: inline-block;
            margin: 100px 400px;
        }
        /*----------模态框样式开始-----------*/
        .modalBox {
            display: none;
        }
        .overLay {
            position: fixed;/*这里的定位方式使用fixed能保证遮罩层百分百的覆盖整个窗口*/
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.5;
            background-color: #000000;
			z-index: 9;
        }
		<!-- 登陆的样式 -->
		.hide {
			display:none;
		}
		.container{
			border-radius:15px;
			width: 400px;
			margin-top:150px;
			margin-left:100px;
			background-color:white;
			position: absolute;
			top:50%;left: 50%; margin-top: -200px;margin-left: -250px;
			z-index: 999;
		}
		.login:hover{color:red;}
		.signup:hover{color:red;}
		#switch{
			padding-top:10px;
			text-align:center;
			font-size: x-large;
			margin-bottom:15px;
			font-weight:bold;
		}
		.formLogIn{
			padding-left:25px;
		}
		
		.formSignUp{
			padding-left:25px;
		}
		.signUpButton{
			width: 60px ;           
			height:30px ;           
			font-size:20px;         
			color:gray;             
			border: 1px solid red; 
			margin-left: 50px;   
			margin-bottom: 20px;              
			background-color:#F1F1F1;                               
			box-shadow:3px 3px 3px gray;           
			border-radius:10px 10px 10px 10px;
			cursor:pointer;
		}
		.signUpButton:hover{background-color:black;color:white;}
		.loginButton{
			width: 60px ;           
			height:30px ;           
			font-size:20px;         
			color:gray;             
			border: 1px solid red; 
			margin-left: 50px;   
			margin-bottom: 20px;              
			background-color:#F1F1F1;                               
			box-shadow:3px 3px 3px gray;           
			border-radius:10px 10px 10px 10px;
			cursor:pointer;
		}
		.loginButton:hover{background-color:black;color:white;}


			 #Search{ 
		text-align: center; 
		position:relative; 
	} 
	#acid{ 
		border: 1px solid #9ACCFB; 
		background-color: white; 
		text-align: left; 
		z-index:9999;
		position: absolute;
	} 
	.list{ 
		list-style-type: none; 
		text-align: left;
	} 
	.clickable { 
		cursor: default; 
	} 
	.highlight { 
		background-color: #9ACCFB; 
	} 

    </style>
<?php 
if (isset($passwrong)||isset($nouser)){?>
 <script>modal.style.display = 'block';</script>;
<?php } ?>