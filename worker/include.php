<?php
                           $con = mysqli_connect("localhost","root","") or die(mysqli_error());
                           $db = mysqli_select_db($con,"easyequip") or die(mysqli_error());


                           $p = "SELECT s.id, s.address, s.shop, s.shop_address, s.rating, c.name, c.email, c.phone_no, p.services, s.img FROM tbl_worker_details s, tbl_worker c, tbl_profession p WHERE s.status = 'inactive' AND s.worker_id = c.id AND email = '".$_SESSION['email']."' AND s.prof_id = p.id";
                           $result = mysqli_query($con,$p);

                           while($abc = mysqli_fetch_array($result))
                           {
                           		echo  $abc['img'];
                           }
                              ?>

