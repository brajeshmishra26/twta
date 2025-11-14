 <?php
mysqli_set_charset($link,'utf8');
?>
<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

                
                
            
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="https://twtamp.co.in/php/<?php echo $im; ?>" alt="">
                        
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
				  //<?php
//						$date=date("Y-m-d");
//						$s=mysqli_query($link,"select * from warticle where date='$date' and wid=$id");
//						if($r=mysqli_fetch_array($s)){
//							
//						}else{
//						
//						$date=date("Y-m-d");
//						$query=mysqli_query($link,"select * from writer inner join topicassign on(writer.cityid=topicassign.cityid)where topicassign.date='$date' and writer.wid=$id ");
//						while($q=mysqli_fetch_array($query)){
//							$topic=$q['topic'];
//							$taid=$q['taid'];
//						}
//						?>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>TWTA</span>
                          <!--<span class="time">3 mins ago</span>-->
                        </span>
					
						
                        <span class="message">
                         <a href="new_article.php"><b>You have got a new topic <?php echo $topic;?> to write</b></a>
                        </span>
                      </a>
                    </li>
						
						//<?php
//						}
//						?>
						
                    
                    
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <li>
                    <div class="text-center">
                        <span>User : <?php echo ($_SESSION['user_name']);?> </span>
                    </div>
                   
                </li>
              </ul>
            </nav>
          </div>
        </div>