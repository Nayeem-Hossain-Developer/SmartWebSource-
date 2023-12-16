$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).on('submit','.ajax-form', function(e){
        e.preventDefault()
        let $this = $(this);
        let formData = new FormData(this);

        $this.find(".has-danger").removeClass('has-error');
        $this.find(".form-errors").remove();

        $.ajax({
            type: $this.attr('method'),
            url: $this.attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {

                if (response.success) {
                    $('#dynamic-modal-md').modal('hide');
                    swal("", `${response.success}`, "success");
                    $("#datatable").DataTable().ajax.reload();
                }
                if (response.warning) {
                    swal("", `${response.warning}`, "warning");
                }
                if (response.error) {
                    swal("", `${response.error}`, "error");
                }
                if (response.login) {
                    swal("Login Successfully Done","Redirecting Please Wait","success")
                    return window.location.href = response.login
                }

                // redirect swal
                if (response.redirect) {
                    swal("", `${response.redirectMessage}`, "success");
                    return window.location.href = response.redirect
                }

                console.clear()
            },
            error: function (response) {
                $(".loading").hide()

                let data = JSON.parse(response.responseText);
                $.each(data.errors, (key, value) => {
                    swal("", `${value}`, "warning");
                    $("[name^=" + key + "]").parent().addClass('has-error')
                    $("[name^=" + key + "]").parent().append('<small class="text-danger form-errors">' + value[0] + '</small>');
                })

                console.clear()
            }
        })
    })


})
