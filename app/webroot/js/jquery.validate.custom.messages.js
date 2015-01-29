/**
 * Created by aan on 27/01/15.
 */
jQuery.extend(jQuery.validator.messages, {
    required: "Harus diisi.",
    remote: "Please fix this field.",
    email: "Harus menggunakan alamat email yang valid.",
    url: "Please enter a valid URL.",
    date: "Harus menggunakan format tanggal yang valid.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Hanya angka.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Minimal {0} karakter."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});

$.validator.setDefaults({
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

jQuery.validator.addMethod("tags", function (value, element) {
    return this.optional(element) || value.length > 0;
}, "Tidak boleh kosong");