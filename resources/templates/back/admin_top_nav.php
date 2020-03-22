             <div id="admin_top_nav">
                    <a href="#" id="hamburger" ><i class="fas fa-bars fa-2x"></i></a>

                   <div class="dropdown show pt-3 float-right mr-5">
                        <a class="btn btn-primary dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                 if(isset($_SESSION['id']) && $_SESSION['role']=='admin'):
                                    echo ucfirst($_SESSION['name']);
                                 endif;
                            ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user-circle mr-2"></i>
                                 Profile
                            </a>
                            <a class="dropdown-item" href="cPwd.php">
                                 <i class="fas fa-key mr-2"></i>
                                  Change Password
                            </a>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                 Logout
                            </a>
                        </div>
                    </div>

                </div>
   