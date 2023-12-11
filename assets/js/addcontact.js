$(document).ready(function(){

    $("#contact-submit").click(function(e){
        e.preventDefault()
        const form_data = $("#add-contact-form").serializeArray()
        $(".contact-add-success").addClass("hide")

        $.ajax({
            type: "POST",
            url: "modules/addcontact.module.php",
            data: form_data,
            success: function(data) {
                let error_data = JSON.parse(data)
                $(".input-error").addClass("hide")
                for(error in error_data) {
                    $(`.${error}-error`).html(error_data[error])
                    $(`.${error}-error`).removeClass("hide")
                }

                if(jQuery.isEmptyObject(error_data)) {
                    $("#add-contact-form").trigger("reset")
                    $(".contact-add-success").removeClass("hide")     
                }

            },
            error: function(data) {}
        })

    })
})