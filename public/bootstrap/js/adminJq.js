$(document).ready(function(){

  

    /***********************/
    $('#logoUpload').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
    //JSON obj
        formData.append('logoUpload', JSON.stringify('logoUpload'));
        $.when(
            uploadImg(formData)
        ).done(function (response) {
            if(response.status == 'success'){
                $('#logoUpload')[0].reset();
                let Text = alertBox("New car brand added.",'success');
                $('.logoStatus').html(Text);
            }else{
                let Text = alertBox(response.status);
                $('.logoStatus').html(Text);
            }

        });
        
    });

////******bodytype*********************** */

    $('#uploadBodyType').submit(function(e) {
        e.preventDefault();
        let fd = new FormData(this);
        //JSON obj
        fd.append('bodytype', JSON.stringify('bodytype'));
        $.when(
            uploadImg(fd)
        ).done(function(response) {
            if (response.status == 'success') {
                $('#uploadBodyType')[0].reset();
                let Text = alertBox("New car brand added.", 'success');
                $('.bodyTypeStatus').html(Text);
            } else {
                let Text = alertBox(response.status);
                $('.bodyTypeStatus').html(Text);
            }

        });
    });


    /*******************************************************************/

    $('.modelDelBtn').click(function(e){
        let delId = $(this).data('index');
        $('#confirmModal .modal-body').html(DeleteModal(delId, 'Want to remove car model?','modelDeleteSubmit','data-index'));
        $('#confirmModal').modal('show');
    });
/*******************************delete logo**********************************************************/


    $('.logoDelBtn').click(function(){
        let delLogo = $(this).data('logo-index');
        $('#confirmModal .modal-body').html(DeleteModal(delLogo, 'Want to remove logo?', 'logoDeleteSubmit', 'data-logo-index'));
        $('#confirmModal').modal('show');
    });
   
    /*****************************delete bodytype************************************************ */
    $('.bodytypeDelBtn').click(function(){
        let bodytypeId = $(this).data('bodytype-index');
        $('#confirmModal .modal-body').html(DeleteModal(bodytypeId, 'Want to remove bodytype?', 'bodytypeDelSubmit', 'data-bodytype-index'));
        $('#confirmModal').modal('show');
    });

/******************************delete car model******************************************/
    $('#deletFormModal').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        // formData.append('modelDeleteSubmit', JSON.stringify('modelDeleteSubmit'));
        let dataIndex = $('[data-index-value]').val();
        deleteSubmit(formData, dataIndex);
        
    });





});//document  ready ends here

/****************************Model*********************************************/
$('#addCarModel').submit(function (e) {
    e.preventDefault();
    let fd = new FormData(this);
    //JSON obj
   
    fd.append('carModelSubmit', JSON.stringify('carModelSubmit'));
    $.when(
        uploadImg(fd)
    ).done(function (response) {
        if (response.status == 'success') {
            $('#addCarModel')[0].reset();
            let Text = alertBox("New car model added.", 'success');
            $('.bodyModelStatus').html(Text);
        } else {
            let Text = alertBox(response.status);
            
            $('.bodyModelStatus').html(Text);
        }

    });
});


function uploadImg(formData){
    return $.ajax({
        url: "include/carAction.php",
        type: "POST",
        dataType:'JSON',
        data: formData,
        contentType: false,
        cache: false,
        processData: false
    });
}

function alertBox(alertMsg,alertType="warning"){
   return `
        <div class="alert alert-${alertType} alert-dismissible fade show" role="alert">
                ${alertMsg}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
        </div>
  `;
}

function DeleteModal(id=null,msg,submitName,indexValue){
    return `
        <input type="text" name="delId" value="${id}">
        <input type="text" name="${submitName}" value="${submitName}">
        <input type="text" value="${indexValue}" data-index-value>
        <h3>${msg}</h3>  
    `;
}

function deleteSubmit(formData,dataIndex){
        $.when(
            uploadImg(formData)
        ).done(function (response) {
            if (response.status == 'success') {
                let Text = alertBox("Car model removed.", 'success');
                $('.delModelStatus').html(Text);
                $('['+dataIndex+'=' + response.id + ']').parent().parent().remove();
                $('#confirmModal').modal('hide');
            } else {
                let Text = alertBox(response.status);
                $('.delModelStatus').html(Text);
            }
            $('#deletFormModal')[0].reset();
            $('#confirmModal').modal('hide');
             window.scrollTo(0, 50); 
        });
   
}
