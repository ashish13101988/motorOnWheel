   
<div class="text-center bg-dark text-warning mb-4 p-1">
    <h3 class="mt-1">Add Car & Logo</h3>
</div>

 <div class="logoStatus">
 </div>        

<form action="<?php 'include/carAction.php';?>" method="POST" enctype="multipart/formdata" id="logoUpload">
    <div class="form-row">

            <div class="form-group col-md-6 thumpDisplay">
            <!-- <img src="cars/logos/logoplaceholder.png" alt="logo" class='' > -->
            <input type="file" name="logo" id=""  class="imgFile form-control">
        </div>

        <div class="form-group col-md-6">
            <!-- <label for="carname">Car Name</label> -->
            <input type="text" placeholder="carname" name="carname" class="form-control">
        </div>
        
            
            
    </div>  
    <div class="text-center mt-2"> 
        <div class="btn-group" role="group" aria-label="Basic example">
            <input type="submit" class="btn btn-primary" value="Upload" name="logoUpload">
            <input type="reset" class="btn btn-info" value="Cancel">  
        </div> 
    </div>    
    
</form>