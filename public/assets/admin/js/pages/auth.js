!(function () {
    class Auth {
        static init() {
            let toast = Swal.mixin({
                buttonsStyling: false,
                target: '#page-container',
                customClass: {
                    confirmButton: 'btn btn-primary m-1',
                    cancelButton: 'btn btn-danger m-1',
                    input: 'form-control'
                },
                confirmButtonText: lang.ok
            });

            $("form.validation-signin").validate({
                errorElement: "span",
                errorClass: 'invalid-feedback',
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                submitHandler: function (form, e) {
                    e.preventDefault();
                    let submit = $(form).find('[type=submit]');

                    $.ajax({
                        type: $(form).attr('method'),
                        url: $(form).attr('action'),
                        data: $(form).serialize(),
                        dataType: "json",
                        beforeSend: function () {
                            submit.attr('disabled', true).append('<i class="mx-2 fa fa-spinner fa-pulse"></i>');
                        },
                        error: function (result) {
                            toast.fire('', result.responseJSON.message, 'error');
                        },
                        success: function (response) {
                            toast.fire({
                                text: response.message,
                                icon: 'success',
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                if (response.redirectTo) {
                                    window.location.href = response.redirectTo;
                                } else {
                                    location.reload();
                                }
                            }, 500);
                        }
                    }).always(function (data) {
                        submit.attr('disabled', false);
                        submit.find('i.fa-spinner').remove();
                    });
                }
            });
        }
    }
    One.onLoad(() => Auth.init());
})();
