      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="http://47.94.218.209/CI/index.php/admin/view"><img src="assets/img/admin-head.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Admin Name</h5>
              	  	
                  <li class="mt">
                      <a href="http://47.94.218.209/CI/index.php/admin/view">
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Overview</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>User</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://47.94.218.209/CI/index.php/admin/userlist">All Users</a></li>
                          <li><a  href="http://47.94.218.209/CI/index.php/admin/userban">Ban List</a></li>
                          <li><a  href="#">Complaint Box</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Goods</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://47.94.218.209/CI/index.php/admin/goodlist">All Goods</a></li>
                          <li><a  href="#">placeholder</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="http://47.94.218.209/CI/index.php/admin/exrecord" >
                          <i class="fa fa-tasks"></i>
                          <span>Exchange record</span>
                      </a>
                  </li>
                  
              </ul>		
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
	<section id="main-content">
          <section class="wrapper">

			<?php $query = $this->db->query("select Exchange_record.exid,Exchange_record.subid,Exchange_record.sender_userid,Exchange_record.receiver_userid,Exchange_record.goodid,Exchange_record.time_ready,Goods.status from Goods,Exchange_record where Goods.goodid=Exchange_record.goodid order by exid;");?>
          		<?php $tmp=0?>

			<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
			<!--looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooop start-->
          	<?php foreach ($query->result_array() as $row)
				 {?>
				 <?php if ($tmp!=$row['exid'])
					{?>
				<?php if ($tmp!=0){?>
				</table>
			  </div>
			  </div>
			  </div>
			<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
				<?php } ?>
	                  	  	  <h4><i class="fa fa-angle-right"></i> Dealing ID: <?php echo $row['exid'];?></h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-chain"></i> subID</th>
                                  <th class="hidden-phone"><i class="fa fa-group"></i> Sender</th>
								  <th class="hidden-phone"><i class="fa fa-group"></i> Receiver</th>
                                  <th><i class="fa fa-ellipsis-h"></i> Good ID</th>
								  <th><i class="fa fa-time"></i> Time</th>  
								  <th><i class=" fa fa-comment-o"></i> Comment</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php $tmp=$row['exid'];} ?>
                              <tr>
                                  <td><?php echo $row['subid'];?></td>
                                  <td class="hidden-phone"><?php echo $row['sender_userid'];?></td>
								  <td class="hidden-phone"><?php echo $row['receiver_userid'];?></td>
								  <td><?php echo $row['goodid'];?></td>
                                  <td><?php echo date("Y/m/d H:i:s",$row['time_ready']);?></td>
								  <td>
								  <?php
								  switch ($row['status'])
								  {
									  case 1:?>
									  <span class="label label-primary label-mini">Normal</span>
									  <?php break;
									  case 2:?>
									  <span class="label label-success label-mini">Locked</span>
									  <?php break;
									  case 3:?>
									  <span class="label label-success label-mini">Dealing</span>
									  <?php break;
									  case 4:?>
									  <span class="label label-warning label-mini">History</span>
									  <?php break;
									  case 0:?>
									  <span class="label label-danger label-mini">Banned</span>
									  <?php break;
									  default:
									  echo "error";  
								  }	?>
								  </td>                               
                              </tr>
				 
			  <?php } ?>
			  </table>
			  </div>
			  </div>
			  </div>
			  <!--looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooop end-->
			
		  </section>
	</section>
      <!--main content end-->
      <!--footer start-->
          
              <a href="main.html" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          

      <!--footer end-->
  </section>

  </body>
</html>