"use strict";

let apiUrl  = window.location.origin + '/api/v1';
let completed;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Additional' : jwtHeader()
    }
});

$(document).ajaxStart(function() { showLoader(); Pace.restart(); });

$.widget.bridge('uibutton', $.ui.button);

$.validator.setDefaults({
    debug: true,
    highlight: function(element) {
        errorBorder($(element))
    },
    unhighlight: function(element) {
        successBorder($(element));
    },
    submitHandler: function(form) {
        form.submit();
    }
});

/**
 * Toaster config.
 */
toastr.options  = {
    "closeButton": true,
    "preventDuplicates": true,
    "extendedTimeOut": 0,
    "tapToDismiss": true,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "newestOnTop": true,
    "positionClass": "toast-top-right",
    "timeOut": "10000"
};

//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass   : 'icheckbox_square-blue'
});

//Red color scheme for iCheck
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_square-red',
    radioClass   : 'iradio_square-red'
});

/**
 * Set Cookie
 *
 * @param cname
 * @param cvalue
 * @param exdays
 *
 * @return void
 */
function setCookie(cname, cvalue, exdays = 30) {
    let d = new Date();

    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires=" + d.toGMTString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

/**
 * Get a specific cookie
 *
 * @param cname
 * @returns {*}
 */
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');

    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }

    return null;
}

/**
 * Get JSON header for API Call.
 *
 * @return {{Content-Type: string, Accept: string}}
 */
function jsonHeader() {
    return {
        "Content-Type":"application/json",
        "Accept":"application/json",
    };
}

/**
 * Get Json Auth header.
 *
 * @return {{Content-Type, Accept, Authorization}}
 */
function jsonAuthHeader() {
    let header  = jsonHeader();

    $.extend(header, jwtHeader());

    return header;
}

/**
 * Get the Authorization Header.
 *
 * @return {{Authorization}}
 */
function jwtHeader() {
    let jwt     = sessionStorage.getItem('jwt');

    if (empty(jwt) || empty(jwt.split(" ")[1])) {
        authorize();
    }

    return {
        "Authorization": jwt
    }
}

function logout() {
    sessionStorage.clear();
    $("#logout-form").submit();
}

/**
 * Get and set the Authorization Header.
 */
function authorize() {
    $.ajax({
        url: apiUrl + '/auth/token',
        headers: jsonHeader(),
        success: function (data) {
            setJwt(data.data);
            hideLoader();
        },
        error: function (error) {
            ajaxErrorLogout(error.status);
        }
    });
}

function ajaxErrorLogout(status) {
    if (status > 400 && status < 422) {
        logout();
    }
}

/**
 * Set Jwt in session storage.
 *
 * @param token
 */
function setJwt(token) {
    sessionStorage.setItem('jwt', "Bearer " + token);
}

/**
 * Get cookie Id.
 *
 * @return {*}
 */
function getCookieId() {
    let cookieId    = getCookie('cookie_id');

    if (! cookieId) {
        cookieId    = uuid();

        setCookie('cookie_id', cookieId);
    }

    return cookieId;
}

/**
 * Show Loader
 */
function showLoader(text = 'Please Wait . . .') {
    $('body').loadingModal({
        text: text,
        animation: 'fadingCircle'
    });
}

/**
 * Hide Loader
 */
function hideLoader() {
    $('body').loadingModal('hide');
    $('body').loadingModal('destroy');
}

/**
 * Verify for emptiness.
 *
 * @param item
 * @returns {boolean}
 */
function empty(item) {
    return item == null || item == undefined || item.length == 0
}

/**
 * Remove object by attr.
 *
 * @param arr
 * @param attr
 * @param value
 * @return {*}
 */
function removeByAttr(arr, attr, value){
    var i = arr.length;
    while(i--){
        if( arr[i]
            && arr[i].hasOwnProperty(attr)
            && (arguments.length > 2 && arr[i][attr] === value ) ){

            arr.splice(i,1);

        }
    }
    return arr;
}

/**
 * Show validation errors.
 *
 * @param error
 */
function validationError(error) {
    if (error.status == 400) {
        $.each(error.responseJSON.data.validation, function (key, value) {
            $("#"+key).focus();
            errorBorder($("#"+key));
            toastr.error(value, error.responseJSON.message);
        });
    }
}

/**
 * Toggle display of an element.
 *
 * @param instance
 * @param bool
 */
function toggleDisplay(instance, bool = false) {
    if (bool) {
        return instance.hide();
    }

    return instance.show();
}

/**
 * Make input boarder error.
 *
 * @param instance
 */
function errorBorder(instance) {
    instance.parent(".form-group")
        .addClass('has-error')
        .removeClass('has-feedback')
        .removeClass('has-success')
}

/**
 * Make input boarder success
 *
 * @param instance
 */
function successBorder(instance) {
    instance.parent(".form-group")
        .removeClass('has-error')
        .removeClass('has-feedback')
        .addClass('has-success')
}

/**
 * Generate v4 UUID
 *
 * @returns {string}
 */
function uuid() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}