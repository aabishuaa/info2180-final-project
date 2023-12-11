$(document).ready(function(){

    $("#user-submit").click(function(e){
        e.preventDefault()
        const form_data = $("#add-user-form").serializeArray()
        $(".user-add-success").addClass("hide")

        $.ajax({
            type: "POST",
            url: "modules/adduser.module.php",
            data: form_data,
            success: function(data) {
                let error_data = JSON.parse(data)
                $(".input-error").addClass("hide")
                for(error in error_data) {
                    $(`.${error}-error`).html(error_data[error])
                    $(`.${error}-error`).removeClass("hide")
                }

                if(jQuery.isEmptyObject(error_data)) {
                    $("#add-user-form").trigger("reset")
                    $(".user-add-success").removeClass("hide")      
                }
            },
            error: function(data) {}
        })

    })
})