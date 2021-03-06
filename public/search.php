
<?php include_once(TEMPLATE_FRONT.DS.'header.php');?>  

 <!-- navbar -->
<?php include_once(TEMPLATE_FRONT.DS.'nav.php');?>  


<div class="container mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php" ><i class="fas fa-home mr-2"></i>Home</a></li>
            <li class="breadcrumb-item active">Search Results</li>
        </ol>
    </nav>

 
     <?php 
          if(isset($rows)):
                

            foreach($rows as $row):
                $adId =$row['id'];
                $query = "SELECT `imgname` FROM `adimg` WHERE `ads_id` = $adId";
                $images = getResult($query);

    
        ?>
        <div class="ads p-3 mt-4">
        <div class="row">
            <div class="col-md-6"> 
              <div class="wishlist_heart">
                <a href="#" data-ad-value="<?php echo $row['id']?>" class="addWishlist" title="wishlist">

                    <?php
                        if(isset($_SESSION['id'])){
                            $loggedId = $_SESSION['id'];
                            $wishQuery =  "SELECT `ads_id` FROM `wishlist` WHERE `ads_id` = $adId  AND `user_id`= $loggedId";

                            $wishlist = getResult($wishQuery);
                            if(count($wishlist)>0){ 
                                    $wishlist[0]['ads_id'];
                                    ?>
                                <i class="fas fa-heart fa-2x"></i>
                            <?php }else{?>
                                    <i class="fas fa-heart fa-2x text-white"></i>
                            <?php }
                        
                        }else{?>
                            <i class="fas fa-heart fa-2x text-white"></i>      
                      <?php }?> 
            
                    
                    <!--  -->
                    
                  </a>  
                </div> 

            
                <div id="sliderm<?=$row['id']?>" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">  
                        <div class="carousel-item active">
                                <img src="uploads/<?=$images[0]['imgname']?>" class="d-block w-100 rounded" alt="...">
                        </div>
                        
                            <?php  for($i=1; $i < count($images); $i++){ ?>
                       
                       
                            <div class="carousel-item">
                                    <img src="uploads/<?=$images[$i]['imgname'] ;?>" class="d-block w-100 rounded" alt="...">
                            </div>
                                
                       
                            <?php }  ?>
                         </div>
                          <a class="carousel-control-prev" href="#sliderm<?=$row['id']?>" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#sliderm<?=$row['id']?>" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                   
                        
                       
                </div>



            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="float-left">2019 <?php echo $row['carname']." "; echo $row['carmodel']?>  Auto</h4>
                        
                    </div>
                    <div class="col-md-4">
                         <h4 class="float-right">Price: <?="$ ".number_format($row['price'])?></h4>
                    </div>
                </div>
                
               
                <table class="table table-striped table-dark">
                    <tr>
                        <td>Condition</td>
                        <th><?=$row['cartype']?></th> 
                    </tr>
                    <tr>
                        <td>Odometer</td>
                        <th><?=number_format($row['odometer'])?> Km</th> 
                    </tr>
                    <tr>
                        <td>Transmission</td>
                        <th><?=$row['transmission']?></th> 
                    </tr>
                    <tr>
                        <td>Body Type</td>
                        <th><?=$row['bodytype']?></th> 
                    </tr>
                    <tr>
                        <td>Engine</td>
                        <th><?=$row['cylinder']?></th> 
                    </tr>
                    <tr>
                        <td>Economy</td>
                        <th><?=$row['fuelEconomy']?> Km/Ltr.</th> 
                    </tr>

                </table>
                     <a href="vehicle.php?adid=<?php echo $row['id'];?>" class="btn btn-primary">View</a>                           
                    


                    <button class="btn btn-warning sellerEnq" data-ad-value="<?php echo $row['user_id']?>">Enquiry</button> 


                
                
            </div>
        </div><!---row-->
    </div>
       
                        <?php   endforeach; 
                    
                        else:
                        
                             echo '<div class="alert alert-info"><h5>No car found. Find Again </h5></div>';
                                    include('include/indexForm.php');
                        endif;
      
                            
                        ?>

    
        
</div>    

                      <div class='my-3' >
                            <?php
                               isset($_GET['page']) ? $currentPage=$_GET['page'] : $currentPage= 1;

                              // print_r($_GET);
                               $q = '';
                               foreach($_GET as $key => $value){
                                 if(isset($_GET['page'])){
                                    unset($_GET['page']);
                                 }
                                  $q .=  $key ."=".$value."&";
                               }
                               substr_replace($q,"",-1);
                              
                               $baseUrl = 'filterVehicle.php?'.$q;
                            
                                $pagination =  new Pagination(array(
                                    'baseUrl'       =>  $baseUrl,
                                    'totalRows'     =>  $totalRows,
                                    'perPage'       =>  10,
                                    'currentPage'   =>  $currentPage,
                                    
                                ));
                                ?>
                      </div>   



<!-- model -->



<div class="modal fade viewDetailsModal" tabindex="-1" id="viewDetailsModal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showViewContent">
        <p>Modal body text goes here.</p>
      </div>
    </div>
  </div>
</div>


<!-- delete modal -->

<div class="modal deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="button" class="btn btn-danger" data-delete-value value="Delete">
      </div>
    </div>
  </div>
</div>


    <!-- footer -->
<?php require_once(TEMPLATE_FRONT.DS.'footer.php');?>