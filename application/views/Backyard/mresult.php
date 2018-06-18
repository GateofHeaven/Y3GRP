<link rel="stylesheet" type="text/css" href="/CI/assets/css/myHome-match.css" />
<div class="centen">

      <p class="centen_tit">Matching Message</p>
	<style type="text/css">
    .aul{width: 150px;height: 150px; margin-right: 10px;float: left;border: 1px solid #f0f0f0;overflow: hidden;margin-right:90px;margin-left:10px;margin-bottom:10px;}
    .bul{width: 150px;height: 150px;float: left;border: 1px solid #f0f0f0;overflow: hidden;margin-right:100px;margin-bottom:10px;margin-left:10px;}
	.match_yourgoods{max-width:250px;display:inline-block;}
	.match_goods{max-width:250px;display:inline-block;}
	.match_operation{display:inline-block;vertical-align:top;padding-top:5%;}
	.goods_name a{padding-top:5px;}
	.exchange_icon{width:150px; height:80px;display:inline-block; vertical-align:top;padding-top:5%;}
    .exchange_icon img{width:40px;height:40px;}
	.operation_accept{width:150px;padding-left:20px}
	.operation_refuse{width:150px;margin-top:10px;padding-left:20px;}
    </style>
	
	<?php
		$rows=$this->Record_model->getmatchresult($_SESSION['id']);
		foreach($rows as $row){
	?>
      <div class="centen_bor">
        <ul class="list_tr">
          <li class="shop_yourgoods">Your Good</li>
          <li class="shop_matchinggoods">Matching Good</li>
          <li class="shop_operation" style="border:none;line-height:20px;">Operation</li>
        </ul>
          
    <div class="shop_goods">
                   
    <?php $goo=$this->Record_model->getgoodbyownerexid($row['receiver_userid'],$row['exid'])?>
	<div class="match_yourgoods">
		<div class = "aul"> <!-- 这里放user被匹配物品的图片 -->
			<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $goo->goodid; ?>" target="_blank">
			<img src="/CI/<?php echo $this->Good_model->getoneimgurl($goo->goodid); ?>" >
			</a>
		</div>
		<div class="goods_name">
			<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $goo->goodid; ?>" target="_blank" style="padding-left:10px;"><?php echo $this->Good_model->getgoodbyid($goo->goodid)->name; ?></a>
		</div>
	</div>
	<div class="exchange_icon">
		<img src="/CI/assets/img/transfer.png">
	</div>
	<div class="match_goods">
		<div class = "bul"><!-- 这里放user匹配到的物品的图片 -->
			<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank">
			<img src="/CI/<?php echo $this->Good_model->getoneimgurl($row['goodid']);?>">
			</a>
		</div>
		<div class="goods_name">
			<a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank" style="padding-left:10px;"><?php echo $this->Good_model->getgoodbyid($row['goodid'])->name; ?></a>
        </div>
    </div>              

    <div class="match_operation">
		<?php if ($row['active']==0){	?>
			
		
		<div class="operation_accept">
        <!--<a href="javascript:;" onclick="">Accept Exchange</a>-->
		<?php $hidden1 = array('gid'=>$goo->goodid,'rid' => $row['subid']); ?>
		<?php echo form_open('user/confrim','',$hidden1);?>
		<button type="submit" style="height:20px;width:115px;border-radius:5px;">Accept Exchange</button>
		</form>
		</div>
		<br>
		<div class="operation_refuse">
        <!-- <a href="javascript:;" onclick="">Refuse Exchange</a> -->
		<?php $hidden2 = array('gid'=>$goo->goodid,'rid' => $row['subid']); ?>
		<?php echo form_open('user/cancel','',$hidden2);?>
		<button type="submit" style="height:20px;width:115px;border-radius:5px;">Refuse Exchange</button>
		</form>
		</div>
		<?php }else{ ?>
		<div class="operation_accept" style="padding-top:20px;">
		<p>Waiting for Others Decision</p>	
		</div>
		<?php } ?>
	</div>

    </div>
	</div>
	
		<?php } ?>
</div>

</body>
</html>