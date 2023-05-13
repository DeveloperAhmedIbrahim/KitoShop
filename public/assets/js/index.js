
var success = $("#success").val();
var warning = $("#warning").val();
var error = $("#error").val();
var url = $("#url").val();

if(success != null && success != '')
{
    new Notify ({
        status: 'success',
        text: success,
        effect: 'slide',
        speed: 500,
        customClass: '',
        customIcon: '',
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 5000,
        gap: 20,
        distance: 20,
        type: 1,
        position: 'right top',
        customWrapper: '',
    });
}
else if (warning != null && warning != '')
{
    new Notify ({
        status: 'warning',
        text: warning,
        effect: 'slide',
        speed: 500,
        customClass: '',
        customIcon: '',
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 5000,
        gap: 20,
        distance: 20,
        type: 1,
        position: 'right top',
        customWrapper: '',
    });
}
else if (error != null && error != '')
{
    new Notify ({
        status: 'error',
        text: error,
        effect: 'slide',
        speed: 500,
        customClass: '',
        customIcon: '',
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 5000,
        gap: 20,
        distance: 20,
        type: 1,
        position: 'right top',
        customWrapper: '',
    });
}

$('.colorpicker').colorpicker();

$("#colors-form").submit(function(event){
    event.preventDefault();
    processing_popup()
    $(".field-error").html("&nbsp;");
    var data = new FormData(document.getElementById("colors-form"));
    var hit_url = url + "/product/color/save";
    var errors = "";
    var field = "";
    jQuery.ajax({
        url:hit_url,
        method:"POST",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        success:function(response) {
            if(response.code == 0)
            {
                errors = response.errors;
                for(var i = 0; i < errors.length; i++)
                {
                    field = errors[i].split(" ")[1];
                    $("."+field+"-error").html(errors[i]);
                }
                swal.close();
            }
            else if(response.code == 1)
            {
                window.location.href = url+"/product/color";
            }
            else if(response.code == 2)
            {
                exception(response.message)
            }
        }
    });
});

$("#sizes-form").submit(function(event){
    event.preventDefault();
    processing_popup()
    $(".field-error").html("&nbsp;");
    var data = new FormData(document.getElementById("sizes-form"));
    var hit_url = url + "/product/size/save";
    var errors = "";
    var field = "";
    jQuery.ajax({
        url:hit_url,
        method:"POST",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        success:function(response) {
            if(response.code == 0)
            {
                errors = response.errors;
                for(var i = 0; i < errors.length; i++)
                {
                    field = errors[i].split(" ")[1];
                    $("."+field+"-error").html(errors[i]);
                }
                swal.close();
            }
            else if(response.code == 1)
            {
                window.location.href = url+"/product/size";
            }
            else if(response.code == 2)
            {
                exception(response.message)
            }
        }
    });
});


function exception(message)
{
    swal({
        title: "Please try again",
        text: message,
        type: "error",
        showConfirmButton: false
    });
    setTimeout(function(){
        window.location.href = window.location.href;
    },5000);
}

function processing_popup()
{
    swal({
        title: "Processing...",
        text: "",
        showConfirmButton: false
    });
    $(".sweet-alert[data-has-confirm-button=false][data-has-cancel-button=false]").css("padding-bottom","0px");
}

$('[data-toggle="tooltip"]').tooltip()

function confirm_delete(name,path)
{
    swal({
        title: "Are you sure ?",
        text: "You will not be able to recover this " + name + " !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            processing_popup();
            window.location.href = path;
        } else {
            swal("Cancelled", "Your " + name + " is safe :)", "error");
        }
    });
}
