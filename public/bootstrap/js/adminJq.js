$(document).ready(function(){
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
                console.log(Text);
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
                console.log(response);
                if (response.status == 'success') {
                    $('#uploadBodyType')[0].reset();
                    let Text = alertBox("New car brand added.", 'success');
                    $('.bodyTypeStatus').html(Text);
                } else {
                    let Text = alertBox(response.status);
                    console.log(Text);
                    $('.bodyTypeStatus').html(Text);
                }

            });
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
        processData: false,

        
    });
}

function alertBox(alertMsg,alertType="warning"){
   return `<div class="alert alert-${alertType} alert-dismissible fade show" role="alert">
                    ${alertMsg}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
  `;
}