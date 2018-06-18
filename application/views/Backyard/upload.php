	<link type="text/css" href="/CI/assets/css/publish1.css" rel="stylesheet">
	<link type="text/css" href="/CI/assets/css/publish2.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="/CI/assets/css/publish3.css">
	<div class="contentRight" style="margin:180px 0px 0px 420px">
    <p class="centen_tit" >Upload information</p>

		<div id="formWrap" style="">
		<ul class="imgbox-wrap">
			<li class="imgbox">
				
				<div class="toolbar">
					<a href="javascript:;" class="prev-pos"></a>
					<a href="javascript:;" class="next-pos"></a>
					<a href="javascript:;" class="delete"></a>
				</div>
			</li>
		</ul>
		<?php echo form_open_multipart('User/do_upload');?>
			
		<div class="block_wrap" style="">
		<div class="block_content" style="">

		<div class="rows_wrap clearfix" style=""><div class="rows_content">
		<div class="tip"></div>
		<div class="volatile_wrap">
		<div class="volatile_required_wrap clearfix">		
		<select name="classify"  style="height:36px; border:1px solid #cccccc">
          <option value="clothing">Clothings</option>
          <option value="staple" selected>Jewelry</option>
          <option value="cosmetics">Books</option>
          <option value="medicine">Cosmetics</option>
          <option value="jewelry">Food</option>
          <option value="digital" >Digital Products</option>
          <option value="electrical">Furniture</option>
		</select></div>
		<div class="volatile_optioinal_wrap clearfix" style="display:none;"><h4>最多选择三项哦！(非必填项)</h4></div></div></div>
		<div class="rows_title"><span><span class="rows_title_star">*</span>Classification</span>
		</div>
		</div>
		
		
		<div class="rows_wrap clearfix"><div class="rows_content">
		<div class="tip validate_success" style="left: 176px;"></div>
		<div class="input_text_wrap clearfix success" name="MinPrice" style="position: relative;">
		<input type="inputText" name="Oprice" tabindex="3" id="MinPrice" autocomplete="off" style="width: 132px;" ><span>yuan</span></div></div>
		<div class="rows_title"><span><span class="rows_title_star">*</span>Price</span></div></div>
		
		
		<div class="rows_wrap clearfix">
		<div class="rows_content">
		<div class="tip"></div>
		<div class="input_text_wrap" name="Title" style="position: relative;">
		<input type="inputText" name="Ntitle" method="POST" tabindex="4" id="Title" autocomplete="off" maxlength="40" style="width: 395px;" ></div></div>
		<div class="rows_title"><span><span class="rows_title_star">*</span>Title</span></div></div>
		
		<div class="rows_wrap clearfix">
		<div class="rows_content">
		<div class="tip"></div>
		<div class="input_text_wrap" name="Time" style="position: relative; padding:0;">
		<input type="date" name="Bdate" method="POST" tabindex="6" id="Time" autocomplete="off" maxlength="40" style="width:485px; height:25px;" ></div></div>
		<div class="rows_title"><span>Buy time</span></div></div>
		
		
		<div class="rows_wrap clearfix" style="">
		<div class="rows_content" style="">
		<div class="tip"></div>
		<div class="input_text_wrap" name="Information" style="position: relative;">
		<input type="textarea" tabindex="7" method="POST" name="Oapproach" id="Information" autocomplete="off" maxlength="1200" style="width: 395px;"></div></div>
		<div class="rows_title"><span><span class="rows_title_star">*</span>Detail Information</span></div></div>
		
				
		<div class="rows_wrap clearfix">
		<div class="rows_content">
		<div class="tip"></div>
		<div class="input_text_wrap" name="want" style="position: relative;">
		<input type="inputText" name="e_name" method="POST" tabindex="8" id="Title" autocomplete="off" maxlength="50" style="width: 395px;" ></div></div>
		<div class="rows_title"><span><span class="rows_title_star">*</span>Goods you want</span></div></div>
		
		
		<div class="rows_wrap clearfix">
		<div class="rows_content">
		<div class="tip">
		</div>
		<div class="imgbar_wrap" id="flashflashContent"><ul class="clearfix img_list" id="dd"></ul>
		<div class="upload_wrap">	
		<div class="upload">    
		<div class="localUpload_wrap">		    
		<div class="localTitle">Image Upload</div>		    
		<div class="localUpload">			    
		<div class="imgUpload">
		<div class="html5s"><input type="file" name="userfile" id="doc" multiple="multiple" onchange="javascript:setImagePreviews();" accept="image/*" ></div></div>			    
		<div class="maxlength_cover">6</div></div></div></div> 
		<div class="info">Please upload images less than <span>6</span> ，most <span>10M</span> each</div></div></div></div>
		<div class="rows_title"><span>Upload images</span></div></div>
		
		<div class="rows_wrap clearfix">
		<div class="rows_content">
		<div class="tip"></div>
		<div class="submit_wrap"><span><button type="submit" style="background-color:#006090;font-size:20px;color:white;">Upload</button></span>
		</div></div>
		<div class="rows_title"><span></span></div></div>
		</div>
	</div>
		<div id="clicknum" style="display:none">0</div>

</div>

	<!-- 	<script type="text/javascript">
	var usertype = "person";
	if(!true){
		usertype = "NA";
	}
	else if(false){
		if(!false){
			usertype = "biz";
		}else{
			usertype = "vip";
		}
	}else if(false){
		usertype = "biz";
	}
	
    var _gaq = _gaq || []; var site_name = "58"; var page_type = "post";
    var _trackURL = "{'area':'135','pagetype':'post','cate':'70124,23089','poststep':'fillout','ver':'new','infoid':0,'postmode':'add','usertype':'person','page':'fillout','gaPageView':'/nb/ershoujiaoyi/tongxunyw/person/fillout/add/'}";
    _gaq.push(['pageTracker._setAccount', 'UA-877409-4']);
    _gaq.push(['pageTracker._setDomainName', '.58.com']);
    _gaq.push(['pageTracker._setAllowLinker', true]);
    _gaq.push(['pageTracker._addOrganic', 'sogou', 'query']);
    _gaq.push(['pageTracker._addOrganic', 'baidu', 'word']);
    _gaq.push(['pageTracker._addOrganic', 'soso', 'w']);
    _gaq.push(['pageTracker._addOrganic', 'youdao', 'q']);
    _gaq.push(['pageTracker._addOrganic', '360', 'q']); 
    _gaq.push(['pageTracker._trackPageview','/nb/tongxunyw/tongxunyw/' + usertype + '/fillout/update/']);
   // $.getScript( ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js');
    $.getScript('http://tracklog.58.com/referrer4.js', function(response,status) {
		// response - 包含来自请求的结果数据
		// status - 包含请求的状态（"success", "notmodified", "error", "timeout" 或 "parsererror"）
		try{
			if(clickLog != undefined && typeof(clickLog)=="function"){
				if(typeof(startEventTime) != "undefined") {
					clickLog('from=Post_TriggerEventTime&key=htmlStart&eventTime='+startEventTime);
				}
			}
		}catch(e){
		}
	});
</script> -->

    <script type="text/javascript">
       function setImagePreviews(avalue) {
            var docObj = document.getElementById("doc");
            var dd = document.getElementById("dd");
            var clicknum = document.getElementById("clicknum");
			var num = Number(document.getElementById("clicknum").innerHTML) + 1;
            dd.innerHTML = "";
            var fileList = docObj.files;

            if (fileList.length<6) {

              for (var i = 0; i < fileList.length; i++) 
              {            
                  dd.innerHTML += "<li> <img id='img" + i + "'/> </li>";

                  var imgObjPreview = document.getElementById("img"+i); 

                  if (docObj.files && docObj.files[i]) 
                  {
                        imgObjPreview.style.width = '150px';
                        imgObjPreview.style.height = '150px';

                        //imgObjPreview.src = docObj.files[0].getAsDataURL();
                        imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);
                  }
                  else 
                  {
                        //IE下，使用滤镜

                        docObj.select();
                        var imgSrc = document.selection.createRange().text;
                        alert(imgSrc)
                        var localImagId = document.getElementById("img" + i);

                        //必须设置初始大小

                        localImagId.style.width = "150px";
                        localImagId.style.height = "150px";

                        //图片异常的捕捉，防止用户修改后缀来伪造图片

                         try 
                         {
                              localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";

                              localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                          }
                          catch (e) 
                          {
                              alert("Error format, please choose your image again.");
                              return false;
                          }

                          imgObjPreview.style.display = 'none';
                          document.selection.empty();

                  }
              }  
            }
            else{
                  alert(" Please upload at most 6 pics!");

                  for (var i = 0; i < 6; i++) 
                  {            
                          dd.innerHTML += "<div style='float:left' > <img id='img" + i + "'  /> </div>"; 

                          var imgObjPreview = document.getElementById("img"+i); 

                  if (docObj.files && docObj.files[i]) 
                  {
                        imgObjPreview.style.display = 'block';
                        imgObjPreview.style.width = '150px';
                        imgObjPreview.style.height = '180px';

                        //imgObjPreview.src = docObj.files[0].getAsDataURL();
                        imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);
                  }
                  else 
                  {
                        //IE下，使用滤镜

                        docObj.select();
                        var imgSrc = document.selection.createRange().text;
                        alert(imgSrc)
                        var localImagId = document.getElementById("img" + i);

                        //必须设置初始大小

                        localImagId.style.width = "150px";
                        localImagId.style.height = "180px";

                        //图片异常的捕捉，防止用户修改后缀来伪造图片

                         try 
                         {
                              localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";

                              localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                          }
                          catch (e) 
                          {
                              alert("Error format, please choose your image again.");
                              return false;
                          }

                          imgObjPreview.style.display = 'none';
                  
                          document.selection.empty();
                  }
                  
                  }

            }

        return true;

    }
    </script>

			
</body>
</html>