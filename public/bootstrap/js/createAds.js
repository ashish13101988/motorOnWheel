$(document).ready(function () {
  
    $('#createAdsForm').submit(function (e) {
        e.preventDefault();
        let fd = new FormData(this);
        $('#submitBtn').text('Please wait');
        $('#submitBtn').prop('disabled', true);
       
        $.when(ajaxFormProcess(fd)).done(function (res) {
            if(res.msg==true){
                let msg = 'Your Post has been uploaded'
                $(noticePopup(msg, 'success')).appendTo('body');
                $('#createAdsForm')[0].reset();
            }else{
                let msg = 'Something went wrong';
                $(noticePopup(msg, 'warning')).appendTo('body');
            }
             $('#submitBtn').text('Post Ad');
             setTimeout(function () {
                 $(".notice_popup").alert('close');
                 $('#submitBtn').prop('disabled', false);
             }, 3000);
        });
    }); 
});



function ajaxFormProcess(formData) {
    return $.ajax({
        url: 'include/createAdsProcess.php',
        type: 'POST',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON'

    });
}

function noticePopup(msg, alertStatus) {
    return `<div class="alert alert-${alertStatus} alert-dismissible fade show notice_popup" role="alert">
  <strong>${msg}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>`;
}