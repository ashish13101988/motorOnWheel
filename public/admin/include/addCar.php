
<div class="text-center bg-dark text-warning mb-4 p-1">
    <h3 class="mt-1">Add Car</h3>
</div>
                       
<form action="include/carAction.php" method="POST" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="carname">Car Name</label>
        <input type="text" placeholder="carname" name="carname" class="form-control">
    </div>

    <div class="form-group col-md-4">
        <label for="carmodel">Car Model</label>
        <input type="text" placeholder="modelname" name="carmodel" class="form-control">
    </div>

    <div class="form-group col-md-3">
        <label for="bodytype">Body Type</label>
        <select id="inputState" class="form-control" name="bodytype">
            <option value="" selected>Choose..</option>
        
            <?php showOptions($bodyType);?> 

        </select>
    </div>

</div>

<div class="text-center mt-2"> 
    <div class="btn-group" role="group" aria-label="Basic example">
        <input type="submit" value="save" class="btn  btn-primary" name="submit">
        <input type="submit" class="btn btn-info" value="Cancel">  
    </div> 
</div> 
    
</form>
                   
               