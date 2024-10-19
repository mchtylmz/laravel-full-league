!function () {
    "use strict";

    class e {
        static initValidation() {

            One.helpers("jq-validation");
            $('form.js-validation').each(function () {
                $(this).validate({
                    submitHandler: function (form, e) {
                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        let ajaxOptions = {
                            type: $(form).attr('method'),
                            url: $(form).attr('action'),
                            data: new FormData(form),
                            dataType: 'json',
                            processData: false,
                            contentType: false
                        };
                        if ($(form).attr('enctype') !== undefined) {
                            ajaxOptions = {
                                ...ajaxOptions,
                                cache: false,
                                enctype: $(form).attr('enctype'),
                            };
                        }

                        $.ajax({
                            ...ajaxOptions,
                            beforeSend: function () {
                                $(form).find('[type=submit]').loading('show');
                            },
                            success: function (response) {
                                if (response.message) {
                                    SweetAlert.fire({
                                        text: response.message,
                                        icon: 'success'
                                    });
                                }

                                setTimeout(() => {
                                    if (response.refresh) {
                                        location.reload();
                                    }
                                    if (response.redirect) {
                                        window.location.href = response.redirect;
                                    }
                                }, 500);
                            },
                            error: function (response) {
                                SweetAlert.fire({
                                    text: response.responseJSON.message,
                                    icon: 'error'
                                });
                            }
                        }).always(function () {
                            $(form).find('[type=submit]').loading('hide');
                        });
                    }
                });
            });
        }

        static initHelper() {
            // toggle password
            jQuery(document).on('click', '[data-toggle="password"]', function (e) {
                e.preventDefault();

                let btn = $(this);
                let prevInput = $(this).prev('input');

                if(prevInput.attr('type') === 'password') {
                    prevInput.attr('type', 'text');
                    btn.html('<i class="fa fa-eye-slash mx-2"></i>');
                } else {
                    prevInput.attr('type', 'password');
                    btn.html('<i class="fa fa-eye mx-2"></i>');
                }
            });

            // dark-mode
            jQuery(document).on('click', '[data-action="dark_mode_toggle"]', function (e) {
                e.preventDefault();
                let darkMode = !localStorage.getItem('oneuiDarkMode');
                sessionStorage.setItem('oneuiDarkMode', darkMode);
                Livewire.dispatch('runEvent', {event: 'darkMode', data: darkMode})
            });

            $.fn.loading = function (status) {
                if (status === 'show') {
                    $(this).append('<i class="fa fa-spinner fa-pulse mx-2" style="--fa-animation-duration: .75s;"></i>');
                    $(this).attr('disabled', true);
                }
                if (status === 'hide') {
                    $(this).find('i.fa-spinner').remove();
                    $(this).attr('disabled', false);
                }
            }

            window.SweetAlert = Swal.mixin({
                target: "#page-container",
                showConfirmButton: false,
                showDenyButton: false,
                showCancelButton: false,
                showCloseButton: true,
                confirmButtonText: window.lang !== undefined ? window.lang['ok'] : 'Tamam',
                cancelButtonText: window.lang !== undefined ? window.lang['cancel'] : 'Vazgeç',
                timer: 5000,
                timerProgressBar: true
            });

            $('.dropify').dropify({
                messages: {
                    'default': 'Bir dosyayı buraya sürükleyip bırakın veya tıklayın',
                    'replace': 'Değiştirmek için sürükleyip bırakın veya tıklayın',
                    'remove':  'Kaldır',
                    'error':   'Hata! Yanlış bir şey oldu.'
                },
                error: {
                    'fileSize': 'Dosya boyutu çok büyük ({{ value }} maks).',
                    'minWidth': 'Resim genişliği çok küçük ({{ value }}}px min).',
                    'maxWidth': 'Resim genişliği çok büyük ({{ value }}}px max).',
                    'minHeight': 'Resim yüksekliği çok küçük ({{ value }}}px min).',
                    'maxHeight': 'Resim yüksekliği çok büyük ({{ value }}px max).',
                    'imageFormat': 'Resim formatına izin verilmiyor (yalnızca {{ value }})',
                    'fileExtension': 'Dosyaya izin verilmiyor (yalnızca {{ value }}).'
                }
            });
        }

        static init() {
            One.helpersOnLoad(['js-flatpickr', 'jq-masked-inputs']);
            this.initHelper();
            this.initValidation();
        }
    }

    One.onLoad((() => e.init()))
}();
