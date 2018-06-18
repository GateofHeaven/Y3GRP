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
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>User</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="http://47.94.218.209/CI/index.php/admin/userlist">All Users</a></li>
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
                      <a href="http://47.94.218.209/CI/index.php/admin/exrecord" >
                          <i class="fa fa-tasks"></i>
                          <span>Exchange record</span>
                      </a>
                  </li>
                  
              </ul>	
              <!-- sidebar menu end-->
          </div>
      </aside>
	<section id="main-content">
          <section class="wrapper">
			<!-- INLINE FORM ELELEMNTS -->

          	<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Infomation</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-chain"></i> UserID</th>
                                  <th class="hidden-phone"><i class="fa fa-group"></i> UserName</th>
                                  <th><i class="fa fa-phone"></i> Tel</th>
								  <th><i class="fa fa-envelope"></i> Email</th>
								  <th><i class="fa fa-navicon"></i> stauts</th>
								  <th><i class=" fa fa-gear"></i> Management</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php foreach ($userlist as $row)
							  {?>
                              <tr>
                                  <td><?php echo $row['id'];?></td>
                                  <td class="hidden-phone"><?php echo $row['username'];?></td>
                                  <td><?php echo $row['tel'];?></td>
								  <td><?php echo $row['email'];?></td>
								  
								  <?php if ($row['active']!=1){?> 
								  <td><span class="label label-danger label-mini">Banned</span></td>
								  <?php }else { ?>
									  <td><span class="label label-primary label-mini">Normal</span></td>
								  
								  
                                  <td>
                                      
                                      <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $row['username'];?>"><i class="fa fa-ban "></i></button>
                                  </td>
                              </tr>
						<div class="modal fade" id="<?php echo $row['username'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $row['username'];?></h4>
						      </div>
						      <div class="modal-body">
						        Are you sure you want to ban this account?
						      </div>
						      <div class="modal-footer">
								<?php $hidden = array('banid' => $row['id']); ?>
								<?php echo form_open('admin/userlist','',$hidden);?>
						        <button type="submit" class="btn btn-primary">Confirm</button>
								</form>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						      </div>
						    </div>
						  </div>
						</div>
						<?php } ?>
							  <?php } ?>
                              
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