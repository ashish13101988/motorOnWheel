$(document).ready(function () {
        let carNameUrl = 'include/carName.php';
        let carCountUrl = 'filterVehicle.php';
        $('#homeFilterForm')[0].reset();
       /* Scroll to top when arrow up clicked BEGIN */
        $(window).scroll(function () {
                let height = $(window).scrollTop();
                if (height > 100) {
                        $('#back2Top').fadeIn();
                } else {
                        $('#back2Top').fadeOut();
                }
        });
        
        $("#back2Top").click(function (event) {
                event.preventDefault();
                $("html, body").animate({
                        scrollTop: 0
                }, "slow");
                return false;
        });
/******************************************changing car condition*******************************************/
        $('.home-filter-div .carSearchBtn').click(function(e){
                let carCondition = $(e.target).text().toLowerCase();
                $('.home-filter-div #carSearch').val(carCondition);
                $.each($('.carSearchBtn'),function(){
                        $(this).removeClass('btn-active');
                        $(e.target).addClass('btn-active');
                });

                let formData = new FormData(homeFilterForm);
                $.when(
                        fetchResponse(formData,carCountUrl)
                ).done((resCount) => {
                        btnValChange(resCount.count);
                });

        });
    /*********************************************************************************************************/
      
        $('.homefilter').change(function(){
                let homeFilterForm = $('#homeFilterForm')[0];
                let minPrice = parseInt($("#homeFilterForm select[name='minPrice']").val());
                let maxPrice = parseInt($("#homeFilterForm select[name='maxPrice']").val());
                let formData = new FormData(homeFilterForm);
                        if (minPrice > maxPrice && maxPrice != '') {
                                alert('Min price must be lesser than Max Price');
                                return;
                        }

                if($(this).attr('name') == 'carName'){
                        $('.carmodel').val('');
                        $('.bodyType').val('');
                        formData = new FormData(homeFilterForm);
                        $.when(
                                fetchResponse(formData, carNameUrl),
                                fetchResponse(formData, carCountUrl)
                        ).done((res, resCount) => {
                               
                                setCarModel(res);
                                btnValChange(resCount[0].count);
                        });
                       return;
                } //setting carmodel

                if ($(this).attr('name') == 'carModel'){
                        $('.bodyType').val('');
                        formData = new FormData(homeFilterForm);
                       
                        $.when(
                                fetchResponse(formData,carNameUrl),
                                fetchResponse(formData,carCountUrl)
                        ).done((res, resCount) => {
                                setCarBodyType(res);
                                btnValChange(resCount[0].count);
                        });
                }//setting carbody

                if($(this).attr('name') == 'cBodyType') {
                        fetchAjaxCount(formData);
                }
                if($(this).attr('name') == 'minPrice'){
                       fetchAjaxCount(formData);
                }
                if ($(this).attr('name') == 'maxPrice') {
                        fetchAjaxCount(formData);
                }
                
        });
        function fetchAjaxCount(formData) {
                $.when(
                        fetchResponse(formData, carCountUrl)
                ).done((resCount) => {
                        btnValChange(resCount.count);
                });
        }

    /*********************************************************************************************************/  
        function fetchResponse(formData,url) {
                return $.ajax({
                        url: url,
                        type: 'POST',
                        data: formData,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false
                });
        }
  
        //setting car model create ads
        function createAdsFormAjax(carname = null, carmodel= null){
                return $.ajax({
                        url: 'include/carName.php',
                        type: 'POST',
                        data: {
                                carName: carname,
                                carModel: carmodel,
                                fromTable: `cars`
                                }
                                 
                });
        }

        $('#createAdsForm .createAdsForm').change(function () {

               let carname = $('select[name="vName"]').val().toLowerCase();
               let carmodel = $('select[name="vModel"]').val().toLowerCase();
                
               if ($(this).attr('name') === 'vName') {
                       $.when(createAdsFormAjax(carname,carmodel)).done(function(res){
                                setCarModel(res);
                       });
               }
               if ($(this).attr('name') === 'vModel') {
                       $.when(createAdsFormAjax(carname,carmodel)).done(function (res) {
                               setCarBodyType(res);
                       });
               }
               
               
        });

//set model into option fields
        function setCarModel(res) {
               
            let carmodel = $('.carmodel');
            $('.carmodel option').remove();
            carmodel.append(`<option value=''>Select Model</option>`);
            res[0].forEach(modelName => {
                    carmodel.append(`<option value='${modelName}'>${modelName}</option>`);
            });
        }


        function setCarBodyType(res) {
            let bodytype = $('.bodyType');
            $('.bodyType option').remove();
            bodytype.append(`<option value=''>Select Body Type</option>`);
            res[0].forEach(bodyname => {
                    if (bodyname != '') {
                        bodytype.append(`<option value='${bodyname}'>${bodyname}</option>`);
                    }
            });
        }


        function btnValChange(resCount) {
                let Text = `<i class ='fas fa-car text-dark' ></i> ${resCount} Cars <i class = 'fas fa-chevron-right float-right mt-2 text-dark'></i>`;
                $('.countCar').html(Text);
        }

   /***********************************************************************************************************/

        //view modal

        $('.viewData').click((e)=>{
                let adId;
                if($(e.target).hasClass('viewData')){
                 adId = $(e.target).data('ad-value'); 

                }
                //method

                $.ajax({
                        url: "include/singleAd.php",
                        method: "post",      
                        data:{adId:adId},
                        success:function(data){
                                $('#showViewContent').html(data);
                        }
                });
        
                $('#viewDetailsModal').modal('show');
        });
        
// show modal

        $('.delete').click( e =>{
                let deleteId;
                if($(e.target).hasClass('delete')){
                        deleteId = $(e.target).data('ad-value');
                       
                        let deleteHtml = "<h2 class='text-center text-danger'>Are you sure?</h2>";
                       
                        $(".deleteModal .btn-danger").attr('data-delete-value', deleteId);

                        $(".deleteModal").modal('show');
                       
                        $('.deleteModal .modal-body').html(deleteHtml);
                }
        });
//delete funciton
        $('.deleteModal .btn-danger').click(e=>{
                if($(e.target).data('delete-value')){
                        let deleteId = $(".deleteModal .btn-danger").attr('data-delete-value');
                        
                         $.ajax({
                                url:'include/manageAdsProcess.php',
                                type: 'POST',
                                data: { deleteId: deleteId },
                                dataType: "JSON",
                                

                        }).done(function(data){
                                
                                $(e.target).attr('disabled',true);
                                let abc= $(e.target).parent().parent().parent().parent();
                                $('abc .modal-body').html('hello wold');

                                setTimeout(function(){
                                        location.reload(); 
                                        $(abc).modal('hide');      
                                },500) 
                        }); 
      
                }
        });

//wishlist function

        $('.addWishlist').click(function(e){

                let adId = $(e.target).data('ad-value');
                $.ajax({
                        url:'include/wishlist.php',
                        type:'POST',
                        dataType:'JSON',
                        data:{wishlist:adId},
                        success:function(response){
                                if(response.login == false){
                                        location.href = "login.php";
                                } else if (response.status == 'added') {
                                        $(e.target).text('Wishlisted');
                                } else if (response.status == 'removed') {
                                        $(e.target).text('Add To Wishlist');
                                }

                               // console.log(response.status);
                        }
                });
        });


 //enquiry modal
 
        $('.enquiryBtn').click(function(e){
                let adId =  $(e.target).data('ad-value');
                $formAdVal = $('#enquiryModal .advalue').val(adId);
                console.log($formAdVal);
                $('#enquiryForm')[0].reset();
                $('#FooterenquiryModal').modal('show');
        });

        $('#enquiryForm').submit(function(e){
                e.preventDefault();
                let fd = new FormData(this);
                fd.append('enqSubmit','enqSubmit');
                url = 'include/enquiryProcess.php';
                $.when(fetchResponse(fd, url)).done(function(res){
                        if(res.msg == true){
                           $('#FooterenquiryModal').modal('hide');
                           $('#enquiryForm')[0].reset();
                           let msg = `Thanks for showing Interest. We'll contact you soon!`;
                          
                           $(noticePopup(msg, 'success')).appendTo('body');
                                setTimeout(function () {
                                        $(".notice_popup").alert('close');
                                }, 4000);
                        }else{
                          $('#enqResStatus').html(simpleNoticePopup(res.msg, 'warning'));
                        }   
                });
                
        });

        function noticePopup(msg, alertStatus) {
                return `<div class="alert alert-${alertStatus} alert-dismissible fade show notice_popup" role="alert">
                <strong>${msg}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                </div>`;
        }

        function simpleNoticePopup(msg, alertStatus) {
                 return `<div class="alert alert-${alertStatus} alert-dismissible fade show " role="alert">
                <strong>${msg}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                </div>`;
        };
        
});//document ready function  bracket