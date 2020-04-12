<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
        <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                <div id="forgotpwdMsg"></div>
                <form  method="POST" action="include/forgotpwdProcess.php" id="forgotPwdForm">
                    
                    
                     
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Registered Email:</label>
                        <input type="text" class="form-control" id="recipient-name" name="email" rrequired>
                    </div>
                   
                    <input type="hidden" name="forgotSubmit">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="forgotSubmit">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>