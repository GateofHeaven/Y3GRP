   <link href="/CI/assets/css/style.css" rel="stylesheet">

<div class = "item "style="position:relative;">
          	<div class="row mt" style="margin-top:0px;">
			<?php $rows=$this->Good_model->getgoodbyowner($_SESSION['id']);?>
                  <div class="col-md-12">
                      <div class="content-panel" style="box-shadow:0px 0px 0px white">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Your Goods</h4>
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
							  <?php foreach ($rows as $row)
							  {?>
                              <tr>
                                  <td><?php echo $row->goodid;?></td>
                                  <td class="hidden-phone">
								  <?php
								  switch ($row->item)
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
                                  <td><a href="http://47.94.218.209/CI/index.php/backyard/gooddetail/<?php echo $row->goodid;?>"><?php echo $row->name;?></a></td>
								  <td><?php echo $row->value;?></td>
								  <td>
								  <?php
								  switch ($row->status)
								  {
									  case 1:?>
									  <span class="label btn-primary label-mini">Normal</span>
									  <?php break;
									  case 2:?>
									  <span class="label btn-success label-mini">Locked</span>
									  <?php break;
									  case 3:?>
									  <span class="label btn-success label-mini">Dealing</span>
									  <?php break;
									  case 4:?>
									  <span class="label btn-warning label-mini">History</span>
									  <?php break;
									  case 0:?>
									  <span class="label btn-danger label-mini">Banned</span>
									  <?php break;
									  default:
									  echo "error";  
								  }								  
								  ?>
								  </td>
								  <td><?php echo $row->ownerid;?></td>
                                  <td>
								  <?php if ($row->status==1){ ?>
                                      <?php $hidden = array('banid' => $row->goodid); ?>
								<?php echo form_open('User/mygoods','',$hidden);?>
						        <button type="submit" class="btn btn-danger">Delete</button>
								</form>
								  <?php } ?>
                                  </td>
                              </tr>
						
						<?php } ?>
                              
                              
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
			  </div>

</body>
</html>