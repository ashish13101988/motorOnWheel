<section class="container-fluid footer-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3 col-6 ">
               <img src="bootstrap/img/logo.png" alt="logo" id="footer-logo" >
            </div>
            <div class="col-md-4 col-lg-3 col-6 ">
                <h5>Car For Sale</h5>
                <ul>
                    <li><a href="posts.php">All Cars</a></li>
                    <li><a href="posts.php?condition=new">New cars for sale</a></li>
                    <li><a href="posts.php?condition=used">Used cars for sale</a></li>
                   
                </ul>

            </div>
            <div class="col-md-4 col-lg-3 col-6">
                <h5>Quick Link</h5>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="posts.php">Privacy</a></li>
                    <li><a href="#">About Us</a></li>
                    
                </ul>

            </div>
            <div class="col-md-4 col-lg-3 col-6 ">
                <h5>Contact Us</h5>
                

                <address>
                    <strong>Motor On Wheels, Inc.</strong><br>
                    <a type="button" class="btn-link enquiryBtn" >Contact Us</a>
                   <!--  34 Henry Street<br>
                    MOUNT DUNEED,Victoria 3216<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890<br>
                    <a href="mailto:first.last@example.com">first.last@example.com</a> -->
                </address>
                

            </div>
        </div>
    </div>
</section>
<div class="d-flex justify-content-center p-2" id="copy-right">&copy; Motor On Wheels, 2019-<?php echo date('Y')?> </div>



<!-- //enquiry model -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enquiryModal" data-whatever="@mdo">Open modal for @mdo</button>  -->


<?php include_once('templates/enqTemp.php');?>
