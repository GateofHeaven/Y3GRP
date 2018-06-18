			<script src="/CI/assets/js/jquery-1.7.2.js" type="text/jscript"></script>
			<script src="/CI/assets/js/MagicZoom.js" type="text/jscript"></script>
			<script src="/CI/assets/js/ShopShow.js" type="text/jscript"></script>
		
	
	<div class="box center" style="margin-top:220px;">
		<div class="pdt_pic fl" style="margin-top:100px;">
			<div id="tsShopContainer">
				<div id="tsImgS">
							<a href="#" class="MagicZoom" id="MagicZoom" style="position: relative; display: block; outline: 0px; text-decoration: none; width: 397px;"><img width="397" height="397" src="/CI/<?php echo $this->Good_model->getoneimgurl($goodid);?>" id="sim78957">
							<div id="bc78957" class="MagicZoomBigImageCont" style="width: 400px; height: 400px; left: -10000px; top: -1px; overflow: hidden; z-index: 100; visibility: hidden; position: absolute;"><div style="overflow: hidden;"><img src="http://101.251.192.138/upload/uploads/products/20165511155504.png" style="position: relative;"></div></div><div class="MagicZoomPup" style="z-index: 10; visibility: hidden; position: absolute; opacity: 0.5; width: 397px; height: 402px;"></div></a>				
				</div>
				<div id="tsPicContainer">
					<div id="tsImgSCon" style="width: 400px;">
						<ul>
									<?php 
									$frist=true;
									foreach($this->Good_model->getallimg($goodid) as $row){ ?>
									<li onclick="showPic(&#39;0&#39;)" rel="MagicZoom" class="tsSelectImg" style="outline: 0px;"><img height="48" width="48" src="/CI/<?php echo $row['imgPath']; ?>" tsimgs="/CI/<?php echo $row['imgPath']; ?>"></li>							
									<?php } ?>
						</ul>
					</div>
				</div>

				
			</div>
					
		</div>
		
			<div class="pdt_mdl fl" >
			<div class="pdt_mdl_big"><?php echo $name; ?></div>
			<div class="wid dis">

				<div class="pdt_mdl_prc fl">
					Change Price：<i style="font-family: Arial;">¥</i>
					
					
						<span class="moneyO1"><?php echo $value; ?></span>
					
				</div>

			</div>
			<div class="pdt_mdl_cls">
				<div class="fl" style="font-size:14;font-weight:bolder;">Barter Prefer：</div>
				<ul style="width: 380px; height: 22px;  margin-left: 6px; color:red;">		
							<?php echo $e_name; ?>
				</ul>
				<div class="clear"></div>
			</div>
			
			<div class="pdt_mdl_other" style="word-break:break-all;line-height:36px;height:230px;padding:10px 10px 10px 10px">
			<span style="font-size:14;font-weight:bolder;">Introduction:</span>&nbsp;&nbsp;&nbsp;<?php echo $item_appor; ?>
			</div>	
						

			<div class="pdt_choose wid" id="pdt_choose" style="display: none;">
				<div class="pdt_choose_lt fl">
					
						
						
							<span class="money">￥0</span>元 | <span class="total">1</span>件
						
					
					
				</div>
				<div class="pdt_choose_rt pdt_choose_rt1 fl">
					<!-- <span> <a href="javascript:;" id="showSelect">查看已选</a> -->
					
				</div>
			</div>
				<div class="wid pdt_mdl_bt shopStatus">
					<!-- 我要换 加入换物车 -->
					<span class="qrcode"></span> 
					<div id="changeNow" class="change_icon" style="margin-left:100px; width:300px;text-align:center;"><a href="http://47.94.218.209/CI/index.php/user/myinfo" style="color:white;">Go To My Center</a></div>
					
						<!--<span class="look_tel">查看联系方式</span>-->						
				</div>
		</div>
		<div class="pdt_sp fr" style="margin-top:40px;">
				<div Class="seller_icon">Goods Information</div>
			<div class="con">
				<p>
					Status ：<?php
								  switch ($status)
								  {
									  case 1:?>
									  <span class="label label-primary label-mini" style="background-color:#dedee0;color:red;">Normal</span>
									  <?php break;
									  case 2:?>
									  <span class="label label-success label-mini" style="background-color:#dedee0;color:blue;">Locked</span>
									  <?php break;
									  case 3:?>
									  <span class="label label-success label-mini" style="background-color:#dedee0;color:green;">Dealing</span>
									  <?php break;
									  case 4:?>
									  <span class="label label-warning label-mini" style="background-color:#dedee0;color:yellow;">History</span>
									  <?php break;
									  case 0:?>
									  <span class="label label-danger label-mini" style="background-color:red;color:white;">Banned</span>
									  <?php break;
									  default:
									  echo "error";  
								  }								  
								  ?>
					
				</p>
				<p>
					Last match time：<?php if ($matchtime){ echo (date("Y-m-d",$matchtime)); }?><span style="position: relative; top: 4px;"> 
						    

					</span>
				</p>
				
				<p>
					Upload time：<?php echo (date("Y-m-d",$lasttime)); ?>
				</p>
			</div>
			<div class="tip">
				<p style="text-align:center">Owner Email: <?php if ($this->User_model->getuserbyid($ownerid)){echo $this->User_model->getuserbyid($ownerid)->email;}?></p>
				<!--<div class="tip_btn" style="margin-left: 20px;">
					
					<a href="javascript:gotoMainPage(&#39;1&#39;,&#39;1087182&#39;);">Enter </a>
				</div>
				<div class="tip_btn">
					<a href="javaScript:collectShop();">Collect </a>
				</div>
				<p style="clear: both"></p>-->
			</div>

			<!-- <div class="tips"> -->
				<!-- <div class="one">实名认证</div> -->
				<!-- <div class="two">银联担保</div> -->
				<!-- <div class="tre">诚信商家</div> -->
				<!-- <div class="four">支持退货</div> -->
				<!-- <p style="clear: both"></p> -->
			<!-- </div> -->
		</div>
	