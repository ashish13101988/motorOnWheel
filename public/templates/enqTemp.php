<div class="modal fade" id="FooterenquiryModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div id="enqResStatus"></div>
                <form  method="POST" action="include/enquiryProcess.php" id="enquiryForm">
                    <input type="hidden" value="na"  class="advalue" name="adId">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Your Name:</label>
                        <input type="text" class="form-control" id="recipient-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Your Email:</label>
                        <input type="email" class="form-control" id="recipient-name" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Your Phone:</label>
                        <input type="text" class="form-control" id="recipient-name" name="contact" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text" name="message" required></textarea>
                    </div>
            
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary" name="enqSubmit">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>