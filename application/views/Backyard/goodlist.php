<style>
.item li img {
    
    height: 160px;
	
    
}
.item{
	
	margin-left:10%;
	margin-top: 30px;
	width: 85%;
}
.item_tit {
    color: #8e8e8e;
    height: 36px;
    padding: 0 16px;
    overflow: hidden;
    font-size: 13px;
	margin: 0px;
}
.item_money {
    color: #000000;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    padding: 5px 16px;
    font-weight: 500;
	margin: 0px;
}

.item li {
    float: left;
    width: 221px;
    height: 240px;
    max-width: 221px;
    max-height: 240px;
    border: 1px solid #ddd;
    /* border-bottom: 1px solid #ddd; */
    background: #fff;
    position: relative;
}
.item_show{margin-bottom:0;margin-top:40px;}


.fr { float: right; 
</style>
 <script type="text/javascript"> 

		$(function(){ 
			//取得div层 
			var $search = $('#Search'); 
			//取得输入框JQuery对象 
			var $searchInput = $search.find('#search-text'); 
			//关闭浏览器提供给输入框的自动完成 
			$searchInput.attr('autocomplete','off'); 
			//创建自动完成的下拉列表，用于显示服务器返回的数据,插入在搜索按钮的后面，等显示的时候再调整位置 
			var $autocomplete = $('<div id = "acid"></div>') .hide().insertAfter('#submit'); 
			//清空下拉列表的内容并且隐藏下拉列表区 
			var clear = function(){ 
				$autocomplete.empty().hide(); 
			}; 
			//注册事件，当输入框失去焦点的时候清空下拉列表并隐藏 
			$searchInput.blur(function(){ 
				setTimeout(clear,500); 
			}); 
			//下拉列表中高亮的项目的索引，当显示下拉列表项的时候，移动鼠标或者键盘的上下键就会移动高亮的项目，想百度搜索那样 
			var selectedItem = null; 
			//timeout的ID 
			var timeoutid = null; 
			//设置下拉项的高亮背景 
			var setSelectedItem = function(item){ 
			//更新索引变量 
				selectedItem = item ; 
				//按上下键是循环显示的，小于0就置成最大的值，大于最大值就置成0 
				if(selectedItem < 0){ 
					selectedItem = $autocomplete.find('li').length - 1; 
				} 
				else if(selectedItem > $autocomplete.find('li').length-1 ) { 
					selectedItem = 0; 
				} 
				//首先移除其他列表项的高亮背景，然后再高亮当前索引的背景 
				$autocomplete.find('li').removeClass('highlight').eq(selectedItem).addClass('highlight'); 
			}; 



			var ajax_request = function(){ 
			//ajax服务端通信 
			$.ajax({ 
				url:"<?php  echo site_url('Backyard/search') ?>", //服务器的地址 
				data:{searchtext:$("#search-text").val()  }, //参数 
				dataType:'json', //返回数据类型 
				type:'POST', //请求类型 
				timeout: 500,
				success:function(data){ 
					$autocomplete.empty().hide(); 
					if(data.length) { 
					$.each(data, function(index,term) { 

					$('<li class = "list"></li>').text(term).appendTo($autocomplete) .addClass('clickable').hover(function(){ 
						$(this).siblings().removeClass('highlight'); 
						$(this).addClass('highlight'); 
						selectedItem = index; 
					},function(){ $(this).removeClass('highlight');selectedItem = -1;})
					.click(function(){ $searchInput.val(term);$autocomplete.empty().hide();}); 
			
					});//事件注册完毕 
					//设置下拉列表的位置，然后显示下拉列表 
					var ypos = $searchInput.position().top; 
					var xpos = $searchInput.position().left; 
					$autocomplete.css('width',$searchInput.css('width')); 
					$autocomplete.css({'position':'relative','left':xpos + "px",'top':ypos +"px"}); 
					setSelectedItem(0); 
					//显示下拉列表 
					$autocomplete.show(); 
				} 
				},

			}); 
			}; 




			//对输入框进行事件注册 
			$searchInput.keyup(function(event) { 
			//字母数字，退格，空格 
			if(event.keyCode > 40 || event.keyCode == 8 || event.keyCode ==32) { 
			//首先删除下拉列表中的信息 
				$autocomplete.empty().hide(); 
				clearTimeout(timeoutid); 
				timeoutid = setTimeout(ajax_request,100); 
			} 
			else if(event.keyCode == 38){ 
				//上 
				//selectedItem = -1 代表鼠标离开 
				if(selectedItem == -1){ 
					setSelectedItem($autocomplete.find('li').length-1); 
				} 
				else { 
				//索引减1 
					setSelectedItem(selectedItem - 1); 
				} 
				event.preventDefault(); 
			} 
			else if(event.keyCode == 40) { 
				//下 
				//selectedItem = -1 代表鼠标离开 
				if(selectedItem == -1){ 
					setSelectedItem(0); 
				} 
				else { 
				//索引加1 
					setSelectedItem(selectedItem + 1); 
				} 
				event.preventDefault(); 
			} 
			}) 
			.keypress(function(event){ 
			//enter键 
			if(event.keyCode == 13) { 
			//列表为空或者鼠标离开导致当前没有索引值 
				if($autocomplete.find('li').length == 0 || selectedItem == -1) { 
					return; 
				} 
				$searchInput.val($autocomplete.find('li').eq(selectedItem).text()); 
				$autocomplete.empty().hide(); 
				event.preventDefault(); 
			} 
			}) 
			.keydown(function(event){ 
			//esc键 
			if(event.keyCode == 27 ) { 
				$autocomplete.empty().hide(); 
				event.preventDefault(); 
			} 
			}); 



			//注册窗口大小改变的事件，重新调整下拉列表的位置 
			$(window).resize(function() { 
				var ypos = $searchInput.position().top; 
				var xpos = $searchInput.position().left; 
				$autocomplete.css('width',$searchInput.css('width')); 
				$autocomplete.css({'position':'relative','left':xpos + "px",'top':ypos +"px"}); 
			}); 
	
	}); 
</script>
    <div id="Search">
	<?php echo form_open('backyard/goodlist',''); ?>
			<img src="/CI/assets/img/search.jpeg" width="45" height="45" />
			
			<input type="text" name="searchCol" id = "search-text" style="height:20%; width:40%; border-radius: 5px;
  border: 2px solid #808080; font-size:18px; position: relative;" >
  			<input type="submit" id = "submit" value="Search" style="height:36px; width:100px;vertical-align: top; border-radius: 5px;
  border: 0 solid #808080; font-size:20px; font-weight:bold; color:#505050;  position: relative;" ></form>
		</div><!--<?php 
				/*$sql="SELECT * FROM Goods Where name like '%?%' order by matchtime ASC;";
				$this->db->like('name','ace','both');
				
				$query=$this->db->get('Goods');
				$rows=$query->result_array();
				foreach ($rows as $row){
					echo $row['name'];
					echo "<br>";
				}*/
				?>--!>
    <!--000000000000这里是搜索框00000000000-->
	<div class = "item">
	<ul>
	<?php foreach($goodlist as $row){?>
		<li >
        <a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank"><p style="text-align:center;"><img style="height:160px;width:auto;" src="/CI/<?php echo $this->Good_model->getoneimgurl($row['goodid']);?>"></p></a>
        <p class="item_tit"><a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row['goodid']; ?>" target="_blank"><?php echo $row['name']; ?></a></p>
        <p class="item_money"><b>Value: </b>$<?php echo $row['value']; ?></p>
    </li>
	<?php } ?>
    
	<ul>
	</div>
</body>
</html>
