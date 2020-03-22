<?php

$url = basename($_SERVER['PHP_SELF']);

?>
        <div class="Admin__sidebar">
            <a href="#" id="sidebarClose" ><i class="fas fa-times fa-2x" ></i></a>
            <header>Admin Panel</header>
            <ul>
                <li><a href="../" ><i class="fas fa-link"></i>Website</a></li>
                <li class="<?php if($url == 'index.php'){echo 'active';}?>" ><a href="index.php"><i class="fas fa-home "></i>Home</a></li>
                <li class="<?php if($url == 'cars.php'){echo 'active';}?>" ><a href="cars.php"><i class="fas fa-car "></i>Cars</a></li>

                <!-- <li>
                    <a class="" data-toggle="collapse" href="#collapseExample" >
                        <i class="fas fa-car "></i>Cars <i class="fas fa-chevron-down float-right mt-4"></i>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <a href="cars.php"><i class="ml-4"></i>All Cars</a>
                        <a href="#"><i class="ml-4"></i>Add Logo</a>
                    </div>    
                </li> -->


                <li>
                    <a class="" data-toggle="collapse" href="#collapseExample" >
                        <i class="fas fa-users "></i>Users <i class="fas fa-chevron-down float-right mt-4"></i>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <a href="allusers.php"><i class="fas fa-user ml-4"></i>All Users</a>
                        <a href="profile.php"><i class="fas fa-user ml-4"></i>Profile</a>
                       
                        
                    </div>
                </li>


                <li class="<?php if($url == 'ads.php'){echo 'active';}?>"><a href="ads.php"><i class="fas fa-ad "></i>Ads</a></li>
                
            </ul>
        </div>
    
