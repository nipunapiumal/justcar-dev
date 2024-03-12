"use strict";
// theme implementation
$(document).ready(function () {
    if ($(".dataTable").length > 0) {
        const dataTable = new simpleDatatables.DataTable(".dataTable");
    }
    if ($(".dataTable1").length > 0) {
        const dataTable = new simpleDatatables.DataTable(".dataTable1");
    }
    var dataTabelLang = {
        paginate: {
            previous: "{{__('Previous')}}",
            next: "{{__('Next')}}"
        },
        lengthMenu: "{{__('Show')}} _MENU_ {{__('entries')}}",
        zeroRecords: "{{__('No data available in table')}}",
        info: "{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}",
        infoEmpty: " ",
        search: "{{__('Search:')}}"
    }


    $(".popup-img-dashboard").magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        // mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
        // type: "image",
        // gallery: {
        //     enabled: true,
        // }
    });

    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
});

if ($(".multi-select").length > 0) {
    $($(".multi-select")).each(function (index, element) {
        var id = $(element).attr('id');
        var multipleCancelButton = new Choices(
            '#' + id, {
            removeItemButton: true,
        }
        );
    });
}

$('.show_confirm').click(function (event) {
    var form = $(this).closest("form");
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This action can not be undone. Do you want to continue?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })
});

$(document).on("click", '.bs-pass-para', function () {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: $(this).data('confirm'),
        text: $(this).data('text'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: false,
    }).then((result) => {
        if (result.isConfirmed) {

            document.getElementById($(this).data('confirm-yes')).submit();

        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) { }
    })
});

// ***********

$(document).on('click', '.fc-day-grid-event', function (e) {
    // if (!$(this).hasClass('project')) {
    e.preventDefault();
    var event = $(this);
    var title = $(this).find('.fc-content .fc-title').html();
    var size = 'lg';
    var url = $(this).attr('href');
    $("#commonModal .modal-title").html(title);
    $("#commonModal .modal-dialog").addClass('modal-' + size);
    $.ajax({
        url: url,
        success: function (data) {
            $('#commonModal .modal-body').html(data);
            $("#commonModal").modal('show');
            common_bind();
        },
        error: function (data) {
            data = data.responseJSON;
            toastrs('Error', data.error, 'error')
        }
    });
    // }
});

$(document).ready(function () {


    $('#enable_header_img').trigger('change');
    $('#enable_subscriber').trigger('change');
    $('#enable_flat').trigger('change');
    $('#domainnote').trigger('change');
    $('#enable_product_variant').trigger('change');
    $('#enable_social_button').trigger('change');

    if ($(".summernote-simple").length) {
        setTimeout(function () {
            $('.summernote-simple').summernote({
                dialogsInBody: !0,
                minHeight: 200,
                toolbar: [
                    ['style', ['style']],
                    ["font", ["bold", "italic", "underline", "clear", "strikethrough"]],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ["para", ["ul", "ol", "paragraph"]],
                ]
            });
        }, 3000);
    }

    $(document).ready(function () {
        $('.custom-list-group-item').on('click', function () {
            var href = $(this).attr('data-href');
            $('.tabs-card').addClass('d-none');
            $(href).removeClass('d-none');
            $('#tabs .custom-list-group-item').removeClass('text-primary');
            $(this).addClass('text-primary');
        });
    });

    $('[data-confirm]').each(function () {
        var me = $(this),
            me_data = me.data('confirm');
        me_data = me_data.split("|");
        me.fireModal({
            title: me_data[0],
            body: me_data[1],
            buttons: [{
                text: me.data('confirm-text-yes') || 'Yes',
                class: 'btn btn-sm btn-primary btn-icon rounded-pill',
                handler: function () {
                    eval(me.data('confirm-yes'));
                }
            },
            {
                text: me.data('confirm-text-cancel') || 'Cancel',
                class: 'btn btn-sm btn-danger btn-icon rounded-pill',
                handler: function (modal) {
                    $.destroyModal(modal);
                    eval(me.data('confirm-no'));
                }
            }
            ]
        })
    });

    var Select = function () {
        var e = $('[data-toggle="select"]');
        e.length && e.each(function () {
            $(this).select2({
                minimumResultsForSearch: -1
            })
        })
    }()
});

$(document).on('change', '#enable_subscriber', function (e) {
    if ($('#enable_subscriber').is(':checked')) {
        $('#subscriber').show();
    } else {
        $('#subscriber').hide();
    }
});

$(document).on('change', 'body #blog_social_form #enable_social_button', function (e) {
    $('body #blog_social_form #enable_social_button').toggleClass('data-check');
    if ($('body #blog_social_form #enable_social_button').hasClass('data-check')) {
        $('body #blog_social_form .social-btn').hide();
    } else {
        $('body #blog_social_form .social-btn').show();
    }
});

$(document).on('change', 'body #store_blog_from #enable_social_button', function (e) {
    if ($('body #store_blog_from #enable_social_button').is(':checked')) {
        $('body #store_blog_from .sub_social_button').show();
    } else {
        $('body #store_blog_from .sub_social_button').hide();
    }
});
$(document).on('change', '#product-coupon-store #enable_flat', function (e) {
    if ($(this).is(':checked')) {
        $('#product-coupon-store .flat_discount').show();
        $('#product-coupon-store .nonflat_discount').hide();
    } else {
        $('#product-coupon-store .flat_discount').hide();
        $('#product-coupon-store .nonflat_discount').show();
    }
});
$(document).on('change', '#enable_product_variant', function (e) {
    if ($('#enable_product_variant').is(':checked')) {

        $('#productVariant').show();
        $('.proprice').hide();

    } else {
        $('#productVariant').hide();
        $('.proprice').show();
    }
});
$(document).on('change', '#vehicle_type_id', function (e) {
    var vehicleType = $(this).val();
    var url = $(this).attr("data-url");
    // var selectType = $(this).data("select");//select-picker or other type
    $.ajax({
        url: url,
        method: 'POST',
        data: { "vehicleType": vehicleType },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            // console.log(data);
            $("#brand_id").prop("disabled", false);
            $("#brand_id").html(data.output)
            if ($("#brand_id").hasClass('selectpicker')) {
                $("#brand_id").selectpicker('refresh');
            } else {
                $('select').niceSelect('update');
            }
        },
        error: function (data) {
            // console.log("ERROR");
            console.log(data);
        }
    });

});
$(document).on('change', '#vehicle_type_id2', function (e) {
    var vehicleType = $(this).val();
    var url = $(this).attr("data-url");
    $.ajax({
        url: url,
        method: 'POST',
        data: { "vehicleType": vehicleType },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            // console.log(data);
            $("#brand_id2").prop("disabled", false);
            $("#brand_id2").html(data.output)
            if ($("#brand_id2").hasClass('selectpicker')) {
                $("#brand_id2").selectpicker('refresh');
            }
        },
        error: function (data) {
            // console.log("ERROR");
            console.log(data);
        }
    });

});
$(document).on('change', '#brand_id', function (e) {
    var brand = $(this).val();
    var url = $(this).attr("data-url");
    $.ajax({
        url: url,
        method: 'POST',
        data: { "brand": brand },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {

            $("#model_id").prop("disabled", false);
            $("#model_id").html(data.output)
            if ($("#model_id").hasClass('selectpicker')) {
                $("#model_id").selectpicker('refresh');
            } else {
                $('select').niceSelect('update');
            }
        },
        error: function (data) {
            console.log(data);
        }
    });

});
$(document).on('change', '#brand_id2', function (e) {
    var brand = $(this).val();
    var url = $(this).attr("data-url");
    $.ajax({
        url: url,
        method: 'POST',
        data: { "brand": brand },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $("#model_id2").prop("disabled", false);
            $("#model_id2").html(data.output)
            if ($("#model_id2").hasClass('selectpicker')) {
                $("#model_id2").selectpicker('refresh');
            }
        },
        error: function (data) {
            console.log(data);
        }
    });

});
$(document).on('change', '.domain_click#enable_storelink', function (e) {
    $('#StoreLink').show();
    $('.sundomain').hide();
    $('.domain').hide();
    $('#domainnote').hide();
    $("#enable_storelink").parent().addClass('active');
    $("#enable_domain").parent().removeClass('active');
    $("#enable_subdomain").parent().removeClass('active');
});
$(document).on('change', '.domain_click#enable_domain', function (e) {
    $('.domain').show();
    $('#StoreLink').hide();
    $('.sundomain').hide();
    $('#domainnote').show();
    $("#enable_domain").parent().addClass('active');
    $("#enable_storelink").parent().removeClass('active');
    $("#enable_subdomain").parent().removeClass('active');
});
$(document).on('change', '.domain_click#enable_subdomain', function (e) {
    $('.sundomain').show();
    $('#StoreLink').hide();
    $('.domain').hide();
    $('#domainnote').hide();
    $("#enable_subdomain").parent().addClass('active');
    $("#enable_domain").parent().removeClass('active');
    $("#enable_domain").parent().removeClass('active');
});
$(document).on('change', '#enable_header_img', function (e) {
    if ($('#enable_header_img').is(':checked')) {
        $('#headerimg').show();
    } else {
        $('#headerimg').hide();
    }
});

$(document).on('change', '#role', function (e) {
    var role = $(this).val();
    if (role == "Owner") {
        $("#store_name").prop("disabled", false);
    } else {
        $("#store_name").prop("disabled", true);
    }
});


$(document).on('click', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]', function () {
    var title = $(this).data('title');
    var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    var url = $(this).data('url');
    $("#commonModal .modal-title").html(title);
    $("#commonModal .modal-dialog").addClass('modal-' + size);
    $.ajax({
        url: url,
        success: function (data) {
            // console.log(data);
            $('#commonModal .modal-body').html(data);
            $("#commonModal").modal('show');
            taskCheckbox();
            common_bind("#commonModal");
            common_bind_select("#commonModal");
            $('#enable_subscriber').trigger('change');
            $('#enable_flat').trigger('change');
            $('#enable_domain').trigger('change');
            $('#enable_header_img').trigger('change');
            $('#enable_product_variant').trigger('change');
            $('#enable_social_button').trigger('change');

            if ($(".multi-select").length > 0) {
                $($(".multi-select")).each(function (index, element) {
                    var id = $(element).attr('id');
                    var multipleCancelButton = new Choices(
                        '#' + id, {
                        removeItemButton: true,
                    }
                    );


                });
            }
        },
        error: function (data) {
            data = data.responseJSON;
        }
    });

});


if ($(".icon-select").length > 0) {
    $($(".icon-select")).each(function (index, element) {
        var id = $(element).attr('id');
        var multipleCancelButton = new Choices(
            '#' + id, {
            removeItemButton: true,
            allowHTML: true,
            callbackOnCreateTemplates: function (strToEl) {
                var classNames = this.config.classNames;
                var itemSelectText = this.config.itemSelectText;
                // console.log(classNames);
                return {
                    item: function ({ x }, data) {
                        return strToEl('<div class="' + String(classNames.item) + ' ' + String(data.highlighted ? classNames.highlightedState : classNames.itemSelectable) + '" data-id="' + String(data.id) + '" data-value="' + String(data.value) + '" ' + String(data.active ? 'aria-selected="true"' : '') + ' ' + String(data.disabled ? 'aria-disabled="true"' : '') + '><i class="' + String(data.label) + '"></i>  ' + String(data.label) + '</div>');
                    },
                    choice: function ({ x }, data) {
                        return strToEl('<div class="' + String(classNames.item) + ' ' + String(classNames.itemChoice) + ' ' + String(data.disabled ? classNames.itemDisabled : classNames.itemSelectable) + '" role="option" data-choice="" data-id="' + String(data.id) + '" data-value="' + String(data.value) + '" data-select-text="' + String(itemSelectText) + '" data-choice-selectable="" aria-selected="true"><i class="' + String(data.label) + '"></i>  ' + String(data.label) + '</div>');
                    },
                };
            },
        }
        );


    });
}

$(document).on('click', 'a[data-ajax-popup-over="true"], button[data-ajax-popup-over="true"], div[data-ajax-popup-over="true"]', function () {

    var validate = $(this).attr('data-validate');
    var id = '';
    if (validate) {
        id = $(validate).val();
    }

    var title = $(this).data('title');
    var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    var url = $(this).data('url');

    $("#commonModalOver .modal-title").html(title);
    $("#commonModalOver .modal-dialog").addClass('modal-' + size);

    $.ajax({
        url: url + '?id=' + id,
        success: function (data) {
            $('#commonModalOver .modal-body').html(data);
            $("#commonModalOver").modal('show');
            taskCheckbox();
        },
        error: function (data) {
            data = data.responseJSON;
            show_toastr('Error', data.error, 'error')
        }
    });

});

function show_toastr(title, message, type) {
    var o, i;
    var icon = '';
    var cls = '';
    if (type == 'success') {
        icon = 'fas fa-check-circle';
        cls = 'primary';
    } else {
        icon = 'fas fa-times-circle';
        cls = 'danger';
    }

    if (typeof $.notify === 'function') {
        $.notify({ icon: icon, title: " " + title, message: message, url: "" }, {
            element: "body",
            type: cls,
            allow_dismiss: !0,
            placement: { from: 'top', align: 'right' },
            offset: { x: 15, y: 15 },
            spacing: 10,
            z_index: 1080,
            delay: 2500,
            timer: 2000,
            url_target: "_blank",
            mouse_over: !1,
            animate: { enter: o, exit: i },
            template: '<div class="toast text-white bg-' + cls + ' fade show pr-5" role="alert" aria-live="assertive" aria-atomic="true">' +
                '<div class="d-flex">' +
                '<div class="toast-body"> ' + message + ' </div>' +
                '<button type="button" class="btn-close btn-close-white me-2 pt-3 m-auto" data-notify="dismiss" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>' +
                '</div>'
        });
    } else {
        showToast(title, message, type)
    }


}

function showToast(title, message, type) {
    notify(type, title, message);
}

function arrayToJson(form) {
    var data = $(form).serializeArray();
    var indexed_array = {};

    $.map(data, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

$(document).on("submit", "#commonModalOver form", function (e) {
    e.preventDefault();
    var data = arrayToJson($(this));
    data.ajax = true;

    var url = $(this).attr('action');
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        success: function (data) {
            show_toastr('Success', data.success, 'success');
            $(data.target).append('<option value="' + data.record.id + '">' + data.record.name + '</option>');
            $(data.target).val(data.record.id);
            $(data.target).trigger('change');
            $("#commonModalOver").modal('hide');

            $(".selectric").selectric({
                disableOnMobile: false,
                nativeOnMobile: false
            });

        },
        error: function (data) {
            data = data.responseJSON;
            show_toastr('Error', data.error, 'error')
        }
    });
});

function common_bind(selector = "body") {
    var $datepicker = $(selector + ' .datepicker');
    if ($(".datepicker").length) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });

    }
    if ($(".custom-datepicker").length) {
        $('.custom-datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'Y-MM',
            locale: {
                format: 'Y-MM'
            }
        });
    }

    if ($(".summernote-simple").length) {
        $('.summernote-simple').summernote({
            dialogsInBody: !0,
            minHeight: 200,
            toolbar: [
                ['style', ['style']],
                ["font", ["bold", "italic", "underline", "clear", "strikethrough"]],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ["para", ["ul", "ol", "paragraph"]],
            ]
        });
    }
}

function common_bind_select(selector = "body") {
    if (jQuery().selectric) {
        $(".selectric").selectric({
            disableOnMobile: false,
            nativeOnMobile: false
        });
    }
    if ($(".jscolor").length) {
        jscolor.installByClassName("jscolor");
    }

    // LetterAvatar.transform();

    var Select = function () {
        var e = $('[data-toggle="select"]');
        e.length && e.each(function () {
            $(this).select2({
                minimumResultsForSearch: -1
            })
        })
    }()
}

function common_bind_confirmation() {

    $('[data-confirm]').each(function () {
        var me = $(this),
            me_data = me.data('confirm');

        me_data = me_data.split("|");
        me.fireModal({
            title: me_data[0],
            body: me_data[1],
            buttons: [{
                text: me.data('confirm-text-yes') || 'Yes',
                class: 'btn btn-danger btn-shadow',
                handler: function () {
                    eval(me.data('confirm-yes'));
                }
            },
            {
                text: me.data('confirm-text-cancel') || 'Cancel',
                class: 'btn btn-secondary',
                handler: function (modal) {
                    $.destroyModal(modal);
                    eval(me.data('confirm-no'));
                }
            }
            ]
        })
    });
}

function taskCheckbox() {
    var checked = 0;
    var count = 0;
    var percentage = 0;

    count = $("#check-list input[type=checkbox]").length;
    checked = $("#check-list input[type=checkbox]:checked").length;
    percentage = parseInt(((checked / count) * 100), 10);
    if (isNaN(percentage)) {
        percentage = 0;
    }
    $(".custom-label").text(percentage + "%");
    $('#taskProgress').css('width', percentage + '%');


    $('#taskProgress').removeClass('bg-warning');
    $('#taskProgress').removeClass('bg-primary');
    $('#taskProgress').removeClass('bg-success');
    $('#taskProgress').removeClass('bg-danger');

    if (percentage <= 15) {
        $('#taskProgress').addClass('bg-danger');
    } else if (percentage > 15 && percentage <= 33) {
        $('#taskProgress').addClass('bg-warning');
    } else if (percentage > 33 && percentage <= 70) {
        $('#taskProgress').addClass('bg-primary');
    } else {
        $('#taskProgress').addClass('bg-success');
    }
}

(function ($, window, i) {


    // Bootstrap 4 Modal
    $.fn.fireModal = function (options) {
        var options = $.extend({
            size: 'modal-md',
            center: false,
            animation: true,
            title: 'Modal Title',
            closeButton: true,
            header: true,
            bodyClass: '',
            footerClass: '',
            body: '',
            buttons: [],
            autoFocus: true,
            created: function () { },
            appended: function () { },
            onFormSubmit: function () { },
            modal: {}
        }, options);

        this.each(function () {
            i++;
            var id = 'fire-modal-' + i,
                trigger_class = 'trigger--' + id,
                trigger_button = $('.' + trigger_class);

            $(this).addClass(trigger_class);

            // Get modal body
            let body = options.body;

            if (typeof body == 'object') {
                if (body.length) {
                    let part = body;
                    body = body.removeAttr('id').clone().removeClass('modal-part');
                    part.remove();
                } else {
                    body = '<div class="text-danger">Modal part element not found!</div>';
                }
            }

            // Modal base template
            var modal_template = '   <div class="modal' + (options.animation == true ? ' fade' : '') + '" tabindex="-1" role="dialog" id="' + id + '">  ' +
                '     <div class="modal-dialog ' + options.size + (options.center ? ' modal-dialog-centered' : '') + '" role="document">  ' +
                '       <div class="modal-content">  ' +
                ((options.header == true) ?
                    '         <div class="modal-header">  ' +
                    '           <h5 class="modal-title">' + options.title + '</h5>  ' +
                    ((options.closeButton == true) ?
                        '           <button type="button" class="close" data-dismiss="modal" aria-label="Close">  ' +
                        '             <span aria-hidden="true">&times;</span>  ' +
                        '           </button>  ' :
                        '') +
                    '         </div>  ' :
                    '') +
                '         <div class="modal-body">  ' +
                '         </div>  ' +
                (options.buttons.length > 0 ?
                    '         <div class="modal-footer">  ' +
                    '         </div>  ' :
                    '') +
                '       </div>  ' +
                '     </div>  ' +
                '  </div>  ';

            // Convert modal to object
            var modal_template = $(modal_template);

            // Start creating buttons from 'buttons' option
            var this_button;
            options.buttons.forEach(function (item) {
                // get option 'id'
                let id = "id" in item ? item.id : '';

                // Button template
                this_button = '<button type="' + ("submit" in item && item.submit == true ? 'submit' : 'button') + '" class="' + item.class + '" id="' + id + '">' + item.text + '</button>';

                // add click event to the button
                this_button = $(this_button).off('click').on("click", function () {
                    // execute function from 'handler' option
                    item.handler.call(this, modal_template);
                });
                // append generated buttons to the modal footer
                $(modal_template).find('.modal-footer').append(this_button);
            });

            // append a given body to the modal
            $(modal_template).find('.modal-body').append(body);

            // add additional body class
            if (options.bodyClass) $(modal_template).find('.modal-body').addClass(options.bodyClass);

            // add footer body class
            if (options.footerClass) $(modal_template).find('.modal-footer').addClass(options.footerClass);

            // execute 'created' callback
            options.created.call(this, modal_template, options);

            // modal form and submit form button
            let modal_form = $(modal_template).find('.modal-body form'),
                form_submit_btn = modal_template.find('button[type=submit]');

            // append generated modal to the body
            $("body").append(modal_template);

            // execute 'appended' callback
            options.appended.call(this, $('#' + id), modal_form, options);

            // if modal contains form elements
            if (modal_form.length) {
                // if `autoFocus` option is true
                if (options.autoFocus) {
                    // when modal is shown
                    $(modal_template).on('shown.bs.modal', function () {
                        // if type of `autoFocus` option is `boolean`
                        if (typeof options.autoFocus == 'boolean')
                            modal_form.find('input:eq(0)').focus(); // the first input element will be focused
                        // if type of `autoFocus` option is `string` and `autoFocus` option is an HTML element
                        else if (typeof options.autoFocus == 'string' && modal_form.find(options.autoFocus).length)
                            modal_form.find(options.autoFocus).focus(); // find elements and focus on that
                    });
                }

                // form object
                let form_object = {
                    startProgress: function () {
                        modal_template.addClass('modal-progress');
                    },
                    stopProgress: function () {
                        modal_template.removeClass('modal-progress');
                    }
                };

                // if form is not contains button element
                if (!modal_form.find('button').length) $(modal_form).append('<button class="d-none" id="' + id + '-submit"></button>');

                // add click event
                form_submit_btn.on('click', function () {
                    modal_form.submit();
                });

                // add submit event
                modal_form.submit(function (e) {
                    // start form progress
                    form_object.startProgress();

                    // execute `onFormSubmit` callback
                    options.onFormSubmit.call(this, modal_template, e, form_object);
                });
            }

            $(document).on("click", '.' + trigger_class, function () {
                $('#' + id).modal(options.modal);

                return false;
            });
        });
    }

    // Bootstrap Modal Destroyer
    $.destroyModal = function (modal) {
        modal.modal('hide');
        modal.on('hidden.bs.modal', function () { });
    }
})(jQuery, this, 0);

var Charts = (function () {

    // Variable

    var $toggle = $('[data-toggle="chart"]');
    var mode = 'light'; //(themeMode) ? themeMode : 'light';
    var fonts = {
        base: 'Open Sans'
    }

    // Colors
    var colors = {
        gray: {
            100: '#f6f9fc',
            200: '#e9ecef',
            300: '#dee2e6',
            400: '#ced4da',
            500: '#adb5bd',
            600: '#8898aa',
            700: '#525f7f',
            800: '#32325d',
            900: '#212529'
        },
        theme: {
            'default': '#172b4d',
            'primary': '#5e72e4',
            'secondary': '#f4f5f7',
            'info': '#11cdef',
            'success': '#2dce89',
            'danger': '#f5365c',
            'warning': '#fb6340'
        },
        black: '#12263F',
        white: '#FFFFFF',
        transparent: 'transparent',
    };


    // Methods

    // Chart.js global options
    function chartOptions() {

        // Options
        var options = {
            defaults: {
                global: {
                    responsive: true,
                    maintainAspectRatio: false,
                    defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
                    defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
                    defaultFontFamily: fonts.base,
                    defaultFontSize: 13,
                    layout: {
                        padding: 0
                    },
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 16
                        }
                    },
                    elements: {
                        point: {
                            radius: 0,
                            backgroundColor: colors.theme['primary']
                        },
                        line: {
                            tension: .4,
                            borderWidth: 4,
                            borderColor: colors.theme['primary'],
                            backgroundColor: colors.transparent,
                            borderCapStyle: 'rounded'
                        },
                        rectangle: {
                            backgroundColor: colors.theme['warning']
                        },
                        arc: {
                            backgroundColor: colors.theme['primary'],
                            borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
                            borderWidth: 4
                        }
                    },
                    tooltips: {
                        enabled: true,
                        mode: 'index',
                        intersect: false,
                    }
                },
                doughnut: {
                    cutoutPercentage: 83,
                    legendCallback: function (chart) {
                        var data = chart.data;
                        var content = '';

                        data.labels.forEach(function (label, index) {
                            var bgColor = data.datasets[0].backgroundColor[index];

                            content += '<span class="chart-legend-item">';
                            content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
                            content += label;
                            content += '</span>';
                        });

                        return content;
                    }
                }
            }
        }

        // yAxes
        Chart.scaleService.updateScaleDefaults('linear', {
            gridLines: {
                borderDash: [2],
                borderDashOffset: [2],
                color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
                drawBorder: false,
                drawTicks: false,
                drawOnChartArea: true,
                zeroLineWidth: 0,
                zeroLineColor: 'rgba(0,0,0,0)',
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2]
            },
            ticks: {
                beginAtZero: true,
                padding: 10,
                callback: function (value) {
                    if (!(value % 10)) {
                        return value
                    }
                }
            }
        });

        // xAxes
        Chart.scaleService.updateScaleDefaults('category', {
            gridLines: {
                drawBorder: false,
                drawOnChartArea: false,
                drawTicks: false
            },
            ticks: {
                padding: 20
            },
            maxBarThickness: 10
        });

        return options;

    }

    // Parse global options
    function parseOptions(parent, options) {
        for (var item in options) {
            if (typeof options[item] !== 'object') {
                parent[item] = options[item];
            } else {
                parseOptions(parent[item], options[item]);
            }
        }
    }

    // Push options
    function pushOptions(parent, options) {
        for (var item in options) {
            if (Array.isArray(options[item])) {
                options[item].forEach(function (data) {
                    parent[item].push(data);
                });
            } else {
                pushOptions(parent[item], options[item]);
            }
        }
    }

    // Pop options
    function popOptions(parent, options) {
        for (var item in options) {
            if (Array.isArray(options[item])) {
                options[item].forEach(function (data) {
                    parent[item].pop();
                });
            } else {
                popOptions(parent[item], options[item]);
            }
        }
    }

    // Toggle options
    function toggleOptions(elem) {
        var options = elem.data('add');
        var $target = $(elem.data('target'));
        var $chart = $target.data('chart');

        if (elem.is(':checked')) {

            // Add options
            pushOptions($chart, options);

            // Update chart
            $chart.update();
        } else {

            // Remove options
            popOptions($chart, options);

            // Update chart
            $chart.update();
        }
    }

    // Update options
    function updateOptions(elem) {
        var options = elem.data('update');
        var $target = $(elem.data('target'));
        var $chart = $target.data('chart');

        // Parse options
        parseOptions($chart, options);

        // Toggle ticks
        toggleTicks(elem, $chart);

        // Update chart
        $chart.update();
    }

    // Toggle ticks
    function toggleTicks(elem, $chart) {

        if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
            var prefix = elem.data('prefix') ? elem.data('prefix') : '';
            var suffix = elem.data('suffix') ? elem.data('suffix') : '';

            // Update ticks
            $chart.options.scales.yAxes[0].ticks.callback = function (value) {
                if (!(value % 10)) {
                    return prefix + value + suffix;
                }
            }

            // Update tooltips
            $chart.options.tooltips.callbacks.label = function (item, data) {
                var label = data.datasets[item.datasetIndex].label || '';
                var yLabel = item.yLabel;
                var content = '';

                if (data.datasets.length > 1) {
                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                }

                content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
                return content;
            }

        }
    }


    // Events

    // Parse global options
    if (window.Chart) {
        parseOptions(Chart, chartOptions());
    }

    // Toggle options
    $toggle.on({
        'change': function () {
            var $this = $(this);

            if ($this.is('[data-add]')) {
                toggleOptions($this);
            }
        },
        'click': function () {
            var $this = $(this);

            if ($this.is('[data-update]')) {
                updateOptions($this);
            }
        }
    });


    // Return

    return {
        colors: colors,
        fonts: fonts,
        mode: mode
    };

})();

PurposeStyle = function () {
    var e = getComputedStyle(document.body);
    return {
        colors: {
            gray: { 100: "#f6f9fc", 200: "#e9ecef", 300: "#dee2e6", 400: "#ced4da", 500: "#adb5bd", 600: "#8898aa", 700: "#525f7f", 800: "#32325d", 900: "#212529" },
            theme: {
                primary: e.getPropertyValue("--primary") ? e.getPropertyValue("--primary").replace(" ", "") : "#6e00ff",
                info: e.getPropertyValue("--info") ? e.getPropertyValue("--info").replace(" ", "") : "#00B8D9",
                success: e.getPropertyValue("--success") ? e.getPropertyValue("--success").replace(" ", "") : "#36B37E",
                danger: e.getPropertyValue("--danger") ? e.getPropertyValue("--danger").replace(" ", "") : "#FF5630",
                warning: e.getPropertyValue("--warning") ? e.getPropertyValue("--warning").replace(" ", "") : "#FFAB00",
                dark: e.getPropertyValue("--dark") ? e.getPropertyValue("--dark").replace(" ", "") : "#212529"
            },
            transparent: "transparent"
        },
        fonts: { base: "Nunito" }
    }
}

var PurposeStyle = PurposeStyle();



function addNewSlider(languages, locale) {


    var html = "";
    var length = $("#sliders .slider").length;

    html += '<div class="row slider align-items-start">';
    html += '<div class="col-12">';


    html += '<div class="form-group">';
    html += '<input type="file" name="slider_image[]" class="form-control custom-input-file" placeholder="Slider Image">';
    html += '</div>';

    html += '<ul class="nav nav-tabs" role="tablist">';

    $.each(languages, function (key, val) {

        console.log('locale == val', locale, val);

        html += '<li class="nav-item" role="presentation">';
        html += '<button class="nav-link ' + (locale == val ? 'active' : '') + '" id="Slider_Setting_' + length + '-' + val + '-tab" data-bs-toggle="tab" data-bs-target="#Slider_Setting_' + length + '-' + val + '" type="button" role="tab" aria-controls="home" aria-selected="true">' + getLangCodes('' + val + '') + '</button>';
        html += '</li>';

    });
    html += '</ul>';



    html += '<div class="tab-content">';
    $.each(languages, function (key, val) {

        html += ' <div class="tab-pane fade show ' + (locale == val ? 'active' : '') + '" id="Slider_Setting_' + length + '-' + val + '" role="tabpanel" aria-labelledby="Slider_Setting_' + length + '-' + val + '-tab">';
        html += ' <div class="col-md-12">';
        html += '<div class="form-group">';
        html += '<input type="text" name="' + val + '_slider_title[]" class="form-control" placeholder="Enter Slider Title">';
        html += '</div>';

        html += '<div class="form-group">';
        html += '<input type="text" name="' + val + '_slider_description[]" class="form-control" placeholder="Enter Slider Description">';
        html += '</div>';
        html += '</div>';

        html += '</div>';

    });
    html += '</div>';
    html += '</div>';


    html += '<div class="col-md-12 mb-3 text-center">';
    html += '<button type="button" class="btn btn-default text-danger">';
    html += '<i class="fas fa-trash-alt"></i>';
    html += '</button>';
    html += '</div>';

    html += '</div>';

    $("#sliders").append(html);

    var id = 1;
    $("#sliders .row").each(function () {
        $(this).attr("id", "slider-" + id + "");
        $(this).find(".btn.text-danger").attr("onclick", "removeSlider(" + id + ")");
        id++;
    });
    // $("#sliders").append($("#slider-structure").html());
}

function getLangCodes($lang) {

    const person = {
        "ar": "Arabic",
        "da": "Danish",
        "de": "German",
        "en": "English",
        "es": "Spanish",
        "fr": "French",
        "it": "Italy",
        "ja": "Japanese",
        "nl": "Dutch",
        "pl": "Polish",
        "pt": "Portuguese",
        "ru": "Russian"
    };

    return person[$lang];
}

function removeSlider(id) {
    $("#slider-" + id + "").remove();
}

$(document).on('change', '.theme-changer .colorinput-input', function (e) {

    $(".theme-changer .btn-primary").hide(200);
    var button = $(this).parent().parent().find(".btn-primary");
    button.show(200);
});

function resetFilterForm() {
    $('#brand_id').prop('selectedIndex', 0);
    $("#brand_id").selectpicker('refresh');

    $('#model_id').prop('selectedIndex', 0);
    $("#model_id").selectpicker('refresh');
}

function resetFilterForm2() {
    $('#brand_id2').prop('selectedIndex', 0);
    $("#brand_id2").selectpicker('refresh');

    $('#model_id2').prop('selectedIndex', 0);
    $("#model_id2").selectpicker('refresh');
}

$(document).ready(function () {

    $(document).on('click', 'input[name="theme_color"]', function () {
        // console.log('ok');
        var eleParent = $(this).attr('data-theme');
        $('#themefile').val(eleParent);
        var imgpath = $(this).attr('data-imgpath');
        $('.' + eleParent + '_img').attr('src', imgpath);
    });


    setTimeout(function (e) {
        var checked = $("input[type=radio][name='theme_color']:checked");
        $('#themefile').val(checked.attr('data-theme'));
        $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
    }, 300);



    if (typeof interstitialAdURLs !== 'undefined') {

        var elements = "a";
        var threshold = 0.5; // Set a threshold value between 0 and 1
        //Regular expression that validate URLs that include 'localhost'
        const urlRegex = /^(https?:\/\/)?((([a-z0-9-]+\.)+[a-z]{2,})|localhost)(:[0-9]{1,5})?(\/[^\s]*)?$/i;
        $(document).on('click', elements, function (e) {
            e.preventDefault();
            console.log('enter interstitialAdURLs');


            //refresh iCookieAds if there is any date change
            var iCookieLUTime = getCookie("iCookieLUTime");
            if (iCookieLUTime) {
                if (iCookieLUTime != interstitialAdLUTime) {


                    //reset iCookieAds
                    iCookieAds = [];
                    interstitialAdURLs.forEach((url) => {
                        iCookieAds.push({ url: url, count: 0 });
                    });
                    //set new updated time
                    setCookie("iCookieLUTime", interstitialAdLUTime, 1); // expires in 1 day
                    setCookie("iCookieAds", JSON.stringify(iCookieAds), 1); // expires in 1 day
                }

            } else {
                iCookieAds = [];
                interstitialAdURLs.forEach((url) => {
                    iCookieAds.push({ url: url, count: 0 });
                });
                setCookie("iCookieLUTime", interstitialAdLUTime, 1); // expires in 1 day
                setCookie("iCookieAds", JSON.stringify(iCookieAds), 1); // expires in 1 day
            }

            //Check if there is a href attribute
            if ($(this).attr("href") && urlRegex.test($(this).attr("href"))) {
                var valHref = $(this).attr("href");

                try {

                    // Generate a random number between 0 and 1
                    var randomNumber = Math.random();
                    // console.log('randomNumber', randomNumber);

                    // Check if the random number is less than the threshold value
                    if (randomNumber < threshold) {
                        // Allow the click event to occur
                        // console.log("Click event allowed");


                        var length = interstitialAdURLs.length;
                        var url = Math.floor(Math.random() * (length - 1)) + 0;



                        // Get the value of the cookie
                        var iCookieAds = getCookie("iCookieAds");
                        // console.log('iCookieAds', JSON.parse(iCookieAds));

                        if (iCookieAds) {
                            iCookieAds = JSON.parse(iCookieAds);
                            $.each(iCookieAds, function (key, val) {


                                if (val.url == interstitialAdURLs[url]) {
                                    // Check if the cookie exists and the ad has been shown more than 3 times
                                    if (!isNaN(iCookieAds[key].count) && iCookieAds[key].count >= 3) {
                                        // Don't show the ad
                                        // console.log('Do not show the ad for ', val.url);
                                        return;
                                    }

                                    // Otherwise, show the ad and increment the ad count
                                    // Open ad page in new window
                                    window.open(valHref, '_blank');
                                    location.href = val.url;
                                    // location.href = val.url;
                                    // console.log(valHref,val.url);
                                    // //Open ad page in current window
                                    iCookieAds[key].count += 1;
                                    // return;
                                }

                            });

                        }

                        // Set a cookie to track the number of times the ad has been shown
                        setCookie("iCookieAds", JSON.stringify(iCookieAds), 1); // expires in 1 day

                    } else {
                        location.href = valHref;
                    }

                } catch (error) {
                    console.log(error);
                }


            }

        });

    }


    $(document).on('click', '.add_to_wishlist', function (e) {
        e.preventDefault();
        // var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var csrfToken = $(this).attr('data-csrf');
        $.ajax({
            type: "POST",
            url: url,
            data: {
                "_token": csrfToken,
            },
            success: function (response) {
                if (response.status == "Success") {
                    show_toastr('Success', response.message, 'success');
                    $(".wishlist_" + response.id + " i").addClass("fas text-danger").removeClass("far");
                    $('.wishlist_' + response.id).removeClass('add_to_wishlist');
                    // $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
                    $('.wishlist_count').html(response.count);
                } else {
                    // show_toastr('Error', response.message, 'error');
                    show_toastr('Error', response.error, 'error');
                }
            },
            error: function (result) {
            }
        });
    });

    $(document).on('click', '.delete_wishlist_item', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var csrfToken = $(this).attr('data-csrf');

        $.ajax({
            type: "DELETE",
            url: url,
            data: {
                "_token": csrfToken,
            },
            success: function (response) {
                if (response.status == "success") {
                    show_toastr('Success', response.message, 'success');
                    $('.wishlist_' + response.id).remove();
                    $('.wishlist_count').html(response.count);

                } else {
                    show_toastr('Error', response.message, 'error');
                }
            },
            error: function (result) {
            }
        });
    });

    $(".add_to_cart").click(function (e) {
        e.preventDefault();
        // var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var csrfToken = $(this).attr('data-csrf');
        var variants = [];
        $(".variant-selection").each(function (index, element) {
            variants.push(element.value);
        });

        if (jQuery.inArray('', variants) != -1) {
            show_toastr('Error', "{{ __('Please select all option.') }}", 'error');
            return false;
        }
        var variation_ids = $('#variant_id').val();

        $.ajax({
            url: url.replace('variation_id', variation_ids ?? 0),
            type: "POST",
            data: {
                "_token": csrfToken,
                variants: variants.join(' : '),
            },
            success: function (response) {
                if (response.status == "Success") {
                    show_toastr('Success', response.success, 'success');
                    if ($("header").length) {
                        $("header #shopping_count").html(response.item_count);
                    } else {
                        $("#shopping_count").html(response.item_count);//if this is not working, above script will work
                    }

                } else {
                    show_toastr('Error', response.error, 'error');
                }
            },
            error: function (result) {
                console.log('error');
            }
        });
    });



});



function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        let expires = "expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + ";" + expires + ";path=/";

}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

$(document).ready(function () {
    $('.cp_link').on('click', function () {
        var value = $(this).attr('data-link');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(value).select();
        document.execCommand("copy");
        $temp.remove();
        show_toastr('Success', jsLang.linkCopied, 'success')
    });
});


function copyText(element = 'myInput') {
    var copyText = document.getElementById(element);
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    show_toastr('Success', 'Link copied', 'success');
}

$(document).on("click", '.theme-changer button', function () {

    if ($(this).data("premiumplan") == "on" || $(this).data("premiumplan") == undefined) {
        Swal.fire({
            title: jsLang.contentSharing,
            text: jsLang.desc1,
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: jsLang.yes,
            denyButtonText: jsLang.no,
        }).then((result) => {
            if (result.isConfirmed) {
                $("#content-sharing").val(1);
                $("#theme-changer").submit();
            } else if (result.isDenied) {
                $("#content-sharing").val(0);
                $("#theme-changer").submit();
            }
        })
    } else {

        var url = $(this).data("planpage");
        if ($(this).data("trial") == 2) {
            //premium trial expired

            Swal.fire({
                title: jsLang.expired,
                text: jsLang.desc2,
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: jsLang.upgradePlan,
                denyButtonText: jsLang.cancel,
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = url;
                }
            })

        } else {
            //premium trial still active
            Swal.fire({
                title: jsLang.premiumPlanFreeTrial,
                text: jsLang.desc3,
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: jsLang.noThanks,
                denyButtonText: jsLang.upgradePlan,
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#content-sharing").val(1);
                    $("#theme-changer").submit();
                } else {
                    location.href = url;
                }
            })

        }



    }


});


$(document).on('click', '.auto-gallery .overlay', function (e) {
    $(this).closest('.card').find('.card-img-top').trigger('click');
});

$(document).on('click', '.auto-gallery .card-img-top', function (e) {
    // Simulate clicking the associated radio button
    var radio = $(this).siblings('.radio-button');
    var value = radio.val();
    var element = $(this).data("element");

    $('.card-img-top').removeClass('active');
    $('.overlay').remove();
    $("input[name='ag_" + element + "']").val("");

    if (radio.is(":checked")) {
        radio.prop('checked', false);
    } else {
        radio.prop('checked', true);
        $(this).addClass('active');
        $("input[name='ag_" + element + "']").val(value);
        $(this).closest('.card').append('<div class="overlay"><i class="fas fa-check"></i></div>');

    }


});

$(document).on("click", '.ag-trigger', function () {

    var url = $(this).data('url');
    var type = $(this).data('type');


    Swal.fire({
        title: jsLang.autoGallery,
        text: jsLang.agIntroducingText2,
        // html: '<form class="auto-gallery"> <div class="row row-cols-1 row-cols-md-3 g-4"> <div class="col"> <div class="card mb-0"> <label> <input type="radio" name="selectedImage" class="radio-button" id="image1"> <img src="http://localhost/justcar/storage/uploads/product_image/Mazda_RX-8_on_freeway_1659411685_1661060932.jpeg" class="card-img-top" alt="..."> </label> </div> </div> <div class="col"> <div class="card mb-0"> <label> <input type="radio" name="selectedImage" class="radio-button" id="image2"> <img src="http://localhost/justcar/storage/uploads/product_image/Mazda_RX-8_on_freeway_1659411685_1661060932.jpeg" class="card-img-top" alt="..."> </label> </div> </div> </div> </form>',
        // input: 'text',
        // inputAttributes: {
        //     autocapitalize: 'off'
        // },
        showCancelButton: true,
        confirmButtonText: jsLang.show,
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
            return fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Request failed: ${error}`
                    )
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            // console.log(result);
            Swal.fire({
                showCancelButton: true,
                cancelButtonText: "OK",
                showConfirmButton: false,
                // confirmButtonText: 'Look up',
                // title: `${result.value.login}'s avatar`,
                // imageUrl: result.value.avatar_url
                html: result.value.output
            }).then((result) => {
                if (result.isConfirmed) {
                } else {

                    if ($("input[name='ag_" + type + "']").val()) {
                        show_toastr(jsLang.autoGallery, jsLang.agIntroducingText3, 'success');
                    }

                }
            })
        }
    })

});
$(document).on("click", '.payment-btn .submit-btn', function () {

    var form = $(this).closest("form");

    Swal.fire({
        title: jsLang.agreement,
        html: jsLang.agreementText1,
        showDenyButton: true,
        confirmButtonText: jsLang.agree,
        denyButtonText: jsLang.deny,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })

});

function generateHiddenInputs($element, $elementToAppend) {

    // Iterate through each li element and extract data-name attribute
    var name = $element.data("name");
    var count = 0;
    var hiddenField;
    $element.find("li").each(function () {
        count++;
        if ($(this).data("name")) {
            // Create a hidden field dynamically
            hiddenField = $("<input>").attr("type", "hidden")
                .attr("name", name).val($(this).data(
                    "name"));

            // Append the hidden field to the "info" element
            $("#" + $elementToAppend + "").append(hiddenField);
        }

    });

    if(count==1){
        hiddenField = $("<input>").attr("type", "hidden").attr("name", name).val("");
        $("#" + $elementToAppend + "").append(hiddenField);
    }

}



