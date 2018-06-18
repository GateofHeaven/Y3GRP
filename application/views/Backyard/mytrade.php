<div class="centen">
	<p class="centen_tit" style="margin-bottom: 20px;">Unfinished Barter</p>
	<?php
		$rows=$this->Record_model->getunfinishtrade($_SESSION['id']);
		foreach($rows as $row){
	?>
	<div class="centen_bor">
		<ul class="list_tr">
			<li class="shop_seller_goods">Receiving Goods</li>
			<li class="shop_infor">Goods information</li>
			<li class="shop_excg">Exchange</li>
			<li class="shop_own_goods">Sending Goods</li>
			<li class="shop_own_infor">Receiver information</li>
		</ul>
	<?php  $goo=$this->Record_model->getgoodbyownerexid($_SESSION['id'],$row['exid']);?>
			<!--遍历出的每一个店铺和店铺下被选中的订单 -->
		<div class="loop">
			<div class="shop_name">
				<span class="buy_choice buy_choice3"></span> <input type="checkbox" name="input_checked" class="checkbox_all" style="display: none;" disabled="disabled"> <span>Receive From: <span><a href="" class="buy_name"><?php echo $this->User_model->getuserbyid($row['sender_userid'])->username; ?></a>
				<span class="buy_choice buy_choice3"></span> <input type="checkbox" name="input_checked" class="checkbox_all" style="display: none;" disabled="disabled"> <span style="margin-left:30%">Send To：<span><a href="" class="buy_name"><?php echo $this->User_model->getuserbyid($goo->receiver_userid)->username; ?></a>
			</div>
			<div class="shop_goods">
				<div class="goods_image">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank">
					<img src="/CI/<?php echo $this->Good_model->getoneimgurl($row['goodid']);?>">
					</a>
				</div>
				<div class="goods_information">
					<div class="main_tit">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank"><?php echo $this->Good_model->getgoodbyid($row['goodid'])->name;?></a>
					</div>
					
					<div class="price">
					<p>Email:<?php echo $this->User_model->getuserbyid($row['sender_userid'])->email; ?></p>
					</div>
					
					<div class="trade_state">
					<p>Tel:<?php echo $this->User_model->getuserbyid($row['sender_userid'])->tel; ?></p>
					</div>
				</div>
				<div class="exchange_icon">
					<img src="/CI/assets/img/transfer.png">
				</div>
				<div class="own_goods_image">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $goo->goodid; ?>" target="_blank">
					<img src="/CI/<?php echo $this->Good_model->getoneimgurl($goo->goodid);?>">
					</a>
				</div>
				<div class="own_goods_information">
					<div class="main_tit">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $goo->goodid; ?>" target="_blank"><?php echo $this->Good_model->getgoodbyid($goo->goodid)->name;?></a>
					</div>
					
					<div class="price">
					<p>Email:<?php echo $this->User_model->getuserbyid($goo->receiver_userid)->email; ?></p>
					</div>
					
					<div class="trade_state">
					<p>Tel:<?php echo $this->User_model->getuserbyid($goo->receiver_userid)->tel; ?></p>
					</div>
				</div>
			</div>
			<div class="shop_operation">
				<div class="goods_number">
					<span>Order Form Number:<?php echo $row['exid'];?></span>
				</div>
				<div class="operation_confirm operation">
					<!-- <a href="javascript:;" onclick="">Confirm</a> -->
					<?php $hidden = array('rid' => $row['subid']); ?>
					<?php echo form_open('user/finish','',$hidden);?>
					<button type="submit" style="font-weight:bold;height:20px;width:115px;border-radius:5px;">Finish</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
		<?php } ?>
	<!--/centen_bor-->
</div>
<!--/centen-->

<div class="centen_finished ">
			<p class="centen_tit" style="margin-bottom:20px;">Finished Barter</p>
	<?php
		$rows=$this->Record_model->getfinishedtrade($_SESSION['id']);
		foreach($rows as $row){
	?>
	<div class="centen_bor">
		<ul class="list_tr">
			<li class="shop_seller_goods">Receiving Goods</li>
			<li class="shop_infor">Goods information</li>
			<li class="shop_excg">Exchange</li>
			<li class="shop_own_goods">Sending Goods</li>
			<li class="shop_own_infor">Receiver information</li>
		</ul>
	<?php  $goo=$this->Record_model->getgoodbyownerexid($_SESSION['id'],$row['exid']);?>
			<!--遍历出的每一个店铺和店铺下被选中的订单 -->
		<div class="loop">
			<div class="shop_name">
				<span class="buy_choice buy_choice3"></span> <input type="checkbox" name="input_checked" class="checkbox_all" style="display: none;" disabled="disabled"> <span>Receive From: <span><a href="" class="buy_name"><?php echo $this->User_model->getuserbyid($row['sender_userid'])->username; ?></a>
				<span class="buy_choice buy_choice3"></span> <input type="checkbox" name="input_checked" class="checkbox_all" style="display: none;" disabled="disabled"> <span style="margin-left:30%">Send To：<span><a href="" class="buy_name"><?php echo $this->User_model->getuserbyid($goo->receiver_userid)->username; ?></a>
			</div>
			<div class="shop_goods">
				<div class="goods_image">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank">
					<img src="/CI/<?php echo $this->Good_model->getoneimgurl($row['goodid']);?>">
					</a>
				</div>
				<div class="goods_information">
					<div class="main_tit">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank"><?php echo $this->Good_model->getgoodbyid($row['goodid'])->name;?></a>
					</div>
					
					<div class="price">
					<p>Email:<?php echo $this->User_model->getuserbyid($row['sender_userid'])->email; ?></p>
					</div>
					
					<div class="trade_state">
					<p>Tel:<?php echo $this->User_model->getuserbyid($row['sender_userid'])->tel; ?></p>
					</div>
				</div>
				<div class="exchange_icon">
					<img src="/CI/assets/img/transfer.png">
				</div>
				<div class="own_goods_image">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $goo->goodid; ?>" target="_blank">
					<img src="/CI/<?php echo $this->Good_model->getoneimgurl($goo->goodid);?>">
					</a>
				</div>
				<div class="own_goods_information">
					<div class="main_tit">
					<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $goo->goodid; ?>" target="_blank"><?php echo $this->Good_model->getgoodbyid($goo->goodid)->name;?></a>
					</div>
					
					<div class="price">
					<p>Email:<?php echo $this->User_model->getuserbyid($goo->receiver_userid)->email; ?></p>
					</div>
					
					<div class="trade_state">
					<p>Tel:<?php echo $this->User_model->getuserbyid($goo->receiver_userid)->tel; ?></p>
					</div>
				</div>
			</div>
			<div class="shop_operation">
				<div class="goods_number">
					<span>Order Form Number:<?php echo $row['exid'];?></span>
				</div>
				<div class="operation_confirm operation">
					<!-- <a href="javascript:;" onclick="">Confirm</a> -->
					<button type="button" style="font-weight:bold;height:20px;width:115px;border-radius:5px;">Complaint</button>
				</div>
				
			</div>
		</div>
	</div>
		<?php } ?>
	<!--/centen_bor-->
</div>
<!--/centen-->
</body>
</html>