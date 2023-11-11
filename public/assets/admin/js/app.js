!(function () {
    class Main {
        static init() {
            let toast = Swal.mixin({
                buttonsStyling: false,
                target: '#page-container',
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1',
                    input: 'form-control'
                },
                confirmButtonText: lang.toast.ok,
                cancelButtonText: lang.toast.cancel,
                timer: 2000,
                timerProgressBar: true,
            });

            $('form[data-toggle="ajax"]').validate({
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
                    let submit = $(form).find('[type=submit]'),
                        action = $(form).attr('action'),
                        method = $(form).attr('method');

                    $.ajax({
                        type: method,
                        url: action,
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: new FormData(form),
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
                                icon: response.status !== undefined ? response.status : 'success',
                                showConfirmButton: false
                            }).then(result => {
                                if (response.redirectTo !== undefined) {
                                    window.location.href = response.redirectTo;
                                }
                            });

                            $(form).find('[type=password]').val('');
                        }
                    }).always(function (data) {
                        submit.attr('disabled', false);
                        submit.find('i.fa-spinner').remove();
                    });
                }
            });

            $(document).on('change', 'select[data-onchange="table"]', function (e) {
                e.preventDefault();
                let value = $(this).val(),
                    name = $(this).attr('name'),
                    table = $(this).data('table');

                let queryParams = {};
                queryParams[name] = value;

                $(table).bootstrapTable('refreshOptions', {
                    queryParams: queryParams
                })
            });

            $(document).on('change', '[data-toggle="preview"]', function (e) {
                e.preventDefault();
                let target = $(this).data('target'),
                    file = this.files[0];

                if (file){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        console.log(event.target.result);
                        $(target).attr('src', event.target.result);
                        $(target).find('img').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            $(document).on('click', '[data-toggle="delete"]', function (e) {
                e.preventDefault();
                let btn = $(this),
                    route = $(this).data('route'),
                    id = $(this).data('id'),
                    message = $(this).data('message'),
                    table = $(this).closest('table');

                toast.fire({
                    // title: message,
                    text: message,
                    icon: 'question',
                    showCancelButton: true,
                    customClass: {
                        confirmButton: 'btn btn-danger m-1',
                        cancelButton: 'btn btn-secondary m-1'
                    },
                    confirmButtonText: '<i class="fa fa-trash mx-2"></i>' + lang.toast.delete,
                    html: false,
                    timer: false,
                    preConfirm: e => {
                        return new Promise(resolve => {
                            setTimeout(() => {
                                resolve();
                            }, 50);
                        });
                    }
                }).then(result => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'DELETE',
                            url: route,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            cache: false,
                            data: {id: id},
                            dataType: "json",
                            beforeSend: function () {
                                btn.attr('disabled', true);
                                btn.find('i').removeClass('fa-times').addClass('fa-spinner fa-pulse');
                            },
                            error: function (result) {
                                toast.fire('', result.responseJSON.message, 'error');
                            },
                            success: function (response) {
                                toast.fire({
                                    text: response.message,
                                    icon: response.status !== undefined ? response.status : 'success',
                                    showConfirmButton: false
                                });
                                if (table.attr('id') !== undefined) {
                                    $('#' + table.attr('id')).bootstrapTable('refresh');
                                }
                            }
                        }).always(function (data) {
                            btn.attr('disabled', false);
                            btn.find('i').addClass('fa-times').removeClass('fa-spinner fa-pulse');
                        });
                    }
                });
            });
        }
    }
    One.onLoad(() => Main.init());
})();

