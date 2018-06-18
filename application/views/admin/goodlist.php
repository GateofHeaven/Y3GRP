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
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Goods</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a href="http://47.94.218.209/CI/index.php/admin/goodlist">All Goods</a></li>
                          <li><a  href="#">placeholder</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="http://47.94.218.209/CI/index.php/admin/exrecord" >
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
			<!-- INLINE FORM ELELEMNTS -->
          	
          	<div class="row mt">
			<?php $query = $this->db->query("select * from Goods;");?>
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Ban User List</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-chain"></i> GoodID</th>
                                  <th class="hidden-phone"><i class="fa fa-list"></i> Item</th>
                                  <th><i class="fa fa-ellipsis-h"></i> Good Name</th>
								  <th><i class="fa fa-money"></i> Value</th>
								  <th><i class="fa fa-navicon"></i> Status</th>
								  <th><i class="fa fa-group"></i> OwnerID</th>
								  <th><i class=" fa fa-gear"></i> Management</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php foreach ($query->result_array() as $row)
							  {?>
                              <tr>
                                  <td><?php echo $row['goodid'];?></td>
                                  <td class="hidden-phone">
								  <?php
								  switch ($row['item'])
								  {
									  case 1:
									  echo "book";
									  break;
									  case 2:
									  echo "tools";
									  break;
									  default:
									  echo "others";
								  }
								  ?>
								  </td>
                                  <td><?php echo $row['name'];?></td>
								  <td><?php echo $row['value'];?></td>
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
								  }								  
								  ?>
								  </td>
								  <td><?php echo $row['ownerid'];?></td>
                                  <td>
								  <?php if ($row['status']==1){ ?>
                                      <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $row['goodid'];?>"><i class="fa fa-trash-o "></i></button>
								  <?php } ?>
                                  </td>
                              </tr>
						<div class="modal fade" id="<?php echo $row['goodid'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $row['name'];?></h4>
						      </div>
						      <div class="modal-body">
						        Are you sure you want to delete this good?
						      </div>
						      <div class="modal-footer">
						        <?php $hidden = array('banid' => $row['goodid']); ?>
								<?php echo form_open('admin/goodlist','',$hidden);?>
						        <button type="submit" class="btn btn-primary">Confirm</button>
								</form>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						      </div>
						    </div>
						  </div>
						</div>
						<?php } ?>
                              <tr>
                                  <td>1234556767</td>
                                  <td class="hidden-phone">telephone</td>
                                  <td>iphone7</td>
								  <td>5000</td>
								  <td><span class="label label-success label-mini">Dealing</span></td>
								  <td>337845818</td>
                                  <td>
                                      <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o "></i></button>
                                  </td>
                         
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
          	<!-- INPUT MESSAGES -->

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