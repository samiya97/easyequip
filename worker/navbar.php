 <header class="header">
                <nav class="navbar fixed-top">         
                    <!-- Begin Search Box-->
                    <div class="search-box">
                        <button class="dismiss"><i class="ion-close-round"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="Search something ..." class="form-control">
                        </form>
                    </div>
                    <!-- End Search Box-->
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="db-default.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                      <img src="images/icons/logo.png" alt="logo" class="logo-big" style="background-color: grey;" >
                                </div>
                                <div class="brand-image brand-small">
                                     <img src="images/icons/icon.ico" alt="logo" class="logo-small" style="height: 50px;width: 50px;
">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            <!-- Search -->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="la la-search"></i></a></li>
                            <!-- End Search -->
                            <!-- Begin Notifications -->
                            <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-bell animated infinite swing"></i><span class="badge-pulse"></span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu notification">
                                    <li>
                                        <div class="notifications-header" >
                                            <div class="title">Notifications</div>
                                            <div class="notifications-overlay" style="background:-webkit-linear-gradient(0deg, #bfacff 0%, #795fff 100%);"></div>
                                            <img src="assets/img/notifications/01.jpg" alt="..." class="img-fluid">
                                        </div>
                                    </li>
                                     <?php
                                                    $con = $con = mysqli_connect("localhost","root","") or die(mysqli_error());
                                                    $db = mysqli_select_db($con,"easyequip") or die(mysqli_error());
                                                    
                                                    $sql = "SELECT * FROM tbl_order o, tbl_worker w where  w.id = o.worker_id AND w.email = '".$_SESSION['email']."' AND  o.status= 'pending'"; 
                                                        $record = mysqli_query($con,$sql) or die(mysqli_error());
                                                        if($R = mysqli_num_rows($record) > 0) 
                                                        {
                                                           while ($row=mysqli_fetch_array($record)) {?>
                                    <li>
                                        <a href="order-view.php">
                                            <div class="message-icon">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                                              
                                                       <?php
                                                            echo "<span>";

                                                           echo $row['user_id']."&nbsp"."Just bid you..";
                                                          echo "</span>";
                                                           
                                                           ?>



                        
                                                </div>
                                                 <span class="date"><?php echo $row['date']; ?></span>
                                            </div>
                                        </a>
                                    </li>
                                     <?php
                                }
                            }
                            else{
                                echo "No Bid yet";
                            }
                            ?>
                                    
                                  
                                 
                                   
                                </ul>
                            </li>
                            <!-- End Notifications -->
                            <!-- User -->
                             <?php
                           $con = mysqli_connect("localhost","root","") or die(mysqli_error());
                           $db = mysqli_select_db($con,"easyequip") or die(mysqli_error());


                           $p = "SELECT s.id, s.address, s.shop, s.shop_address, s.rating, c.name, c.email, c.phone_no, p.services, s.img, d.city FROM tbl_worker_details s, tbl_worker c, tbl_profession p, tbl_city d WHERE s.status = 'approve' AND s.worker_id = c.id AND email = '".$_SESSION['email']."' AND s.prof_id = p.id";
                           $result = mysqli_query($con,$p);

                           while($abc = mysqli_fetch_array($result))
                           {
                              ?>
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="<?php echo  $abc['img'];  ?>" alt="..." class="avatar rounded-circle"></a>
                                <?php
                            }
                                ?>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <?php
                           $con = mysqli_connect("localhost","root","") or die(mysqli_error());
                           $db = mysqli_select_db($con,"easyequip") or die(mysqli_error());


                           $p = "SELECT s.id, s.address, s.shop, s.shop_address, s.rating, c.name, c.email, c.phone_no, p.services, s.img, d.city FROM tbl_worker_details s, tbl_worker c, tbl_profession p, tbl_city d WHERE s.status = 'approve' AND s.worker_id = c.id AND email = '".$_SESSION['email']."' AND s.prof_id = p.id";
                           $result = mysqli_query($con,$p);

                           while($abc = mysqli_fetch_array($result))
                           {
                              ?>
                                    <li class="welcome">
                                        <a href="pages-profile.php" class="edit-profil"><i class="la la-gear"></i></a>
                                        <img src="<?php echo  $abc['img'];  ?>" alt="..." class="rounded-circle">
                                    </li>
                                     <?php
                            }
                                ?>
                                    <li>
                                        <a href="pages-profile.php" class="dropdown-item"> 
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="order-view.php" class="dropdown-item"> 
                                            Messages
                                        </a>
                                    </li>
                                    
                                    <li><a rel="nofollow" href="logout.php" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                                </ul>
                            </li>
                            <!-- End User -->
                            <!-- Begin Quick Actions -->
                            
                            <!-- End Quick Actions -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>