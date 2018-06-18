<p class="centen_tit" style="margin:180px 0px 0px 420px">My Information</p>
<div class="personal_rit">
<ul class="input_list" style="padding:0;">
    <li><span class="per_txtrit">User Name:</span>
		<span class="per_name nickName" id="nickName"><?php	echo $_SESSION['username'];?></span>
	</li>

    <li><span class="per_txtrit">E-mail：</span>
        <span class="per_name"><?php	echo $_SESSION['email'];?></span>	
    </li>
    <li><span class="per_txtrit">Phone Number：</span>
        <span class="per_name"><?php	echo $_SESSION['tel'];?></span>
    </li>

</ul>
</div>

<style type="text/css">
.personal_rit{
margin-left:420px;
margin-top:35px;
}
.per_txtrit{
font-weight:bold;
font-size:18px;
}
.per_name{
font-size:18px;                                                          
width:300px;                                                             
color: #666;                                                             
padding-left:5px;                                                                       
}
.personal_rit li{
margin-top:15px;
}
.mr19{
font-size:15px;
display:inline;
padding-left:10px;
}
.ywradio{
display:inline;
padding-right:10px;
}
#triggerModify{
width: 100px;
height: 30px;
line-height: 28px;
color:#08c;
font-weight: 900;
font-size: 18px;
display: block;
}


</style>



</body>
</html>