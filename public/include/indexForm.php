<?php
      $sql = "SELECT `carname` FROM  `ads` GROUP BY `carname` ORDER BY `carname`";
      $rows = fetchResult($sql);
      //fething bodytype
      $sqlBodyType = "SELECT `bodytype` FROM  `ads` GROUP BY `bodytype` ORDER BY `bodytype`";
      $bodyTypeRow = fetchResult($sqlBodyType);
     
      // fetch all car from db
       $carSql = "SELECT COUNT(`id`) FROM  `ads`";
       $carCount = fetchResult($carSql);
       //fetching minimum value;  

?>


<div class="enquiryDiv">
 
    <?php require_once(TEMPLATE_FRONT.DS.'slider.php');?>

        <div class="home-filter-div">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="my-3">Find your next Car</h2>
              <button class="btn btn-active btn-link fancy-link carSearchBtn mx-2">All</button>
              <button class="btn carSearchBtn btn-link fancy-link mx-2">New</button>
              <button class="btn carSearchBtn btn-link fancy-link mx-2">Used</button>
            </div>
          </div>

        <form action="filterVehicle.php" method="" class="filter-form" id="homeFilterForm">
          <input type="hidden" id="carSearch" value="all" name="carType">
            <div class="row">
              <div class="col-md-8 offset-md-2 text-center mt-4">
                <div class="row">
                  <div class="col-md-4 col-6">
                    <div class="form-group">
                      
                      <select class="form-control carname homefilter" name="carName"> 
                        <option value="" selected>Make</option>
                          <?php
                            foreach($rows as $row):
                              echo "<option value='$row[0]'>".ucfirst($row[0])."</option>";  
                            endforeach;
                          ?>   
                      </select>
                    </div>
                    
                  </div> 
                  <div class="col-md-4 col-6">
                    <div class="form-group">
                        <select class="form-control carmodel homefilter" name="carModel">
                           <option value="">Model</option>
                        </select>
                    </div>
                  </div> 

                  <div class="col-md-4 col-6">
                    <div class="form-group">
                      <select class="form-control bodyType homefilter" name="cBodyType">
                          <option value="">Body Type</option>
                          <?php
                            foreach($bodyTypeRow as $row):
                                  echo "<option value='$row[0]'>".ucfirst($row[0])."</option>";     
                            endforeach;
                          ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2 col-6">
                    <div class="form-group">
                       <select class="form-control homefilter" name="minPrice">
                        <option value="">Price Min</option>
                        <?php
                          foreach($price as $minPrice){
                            echo "<option value=$minPrice>".number_format($minPrice)."</option>";
                          };
                        ?>
                      </select>
                    </div>
                  </div> 

                  <div class="col-md-2 col-6">
                    <div class="form-group"> 
                       <select class="form-control homefilter" name="maxPrice">
                        <option value="">Price Max</option>
                        <?php
                          foreach($price as $minPrice){
                            echo "<option value=$minPrice>".number_format($minPrice)."</option>";
                          };
                        ?>
                      </select>
                    </div>
                    
                  </div> 
                  <div class="col-md-4 col-6">
                    <div class="form-group">
                      
                      <select class="form-control homefilter" name="location">
                        <option value="">Location</option>
                        <?php showOptions($states);?>
                      </select>
                    </div>
                    
                  </div> 
                  <div class="col-md-4 col-6">
                    <div class="form-group">
                      
                      <input type="text" class="form-control keyword" name="keyword" placeholder="keyword">
                    </div>
                    
                  </div> 

                  </div>
              </div> 
            </div>

              <div class="col-md-4 offset-md-4 mt-1 mt-md-5">
                <button class="btn btn-primary btn-lg btn-block  dark countCar" type="submit" name="filterSubmit">
                  <i class="fas fa-car text-dark"></i> <?php echo $carCount[0][0];?> Cars
                  <i class="fas fa-chevron-right float-right mt-2 text-dark"></i>
                </button>
              </div>
          </form>


       </div> 
</div>