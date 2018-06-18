<div id="container">
	<h1>Welcome to CodeIgniter!<?php echo $danhao=date('Ymd').str_pad(mt_rand(1, 99999),5,'0',STR_PAD_LEFT); ?></h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p><?php 
		if ($matchlist){
			for($x=0;$x<count($matchlist);$x++){
				echo $matchlist[$x];
			echo "<br>";
			}
		}
		else{
			echo "nomatch";
		}		?></p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:<?php echo $this->Good_model->getgoodbyid(2)->name;?></p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>