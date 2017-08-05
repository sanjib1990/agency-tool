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
 * Convert time to human readable format.
 *
 * @param time
 * @returns {boolean|string|string|string|string|string}
 */
function prettyDate(time){
    d = new Date();
    let date = new Date((time || "").replace(/-/g,"/").replace(/[TZ]/g," ")),
        diff = ((d.getTime() + (d.getTimezoneOffset()*60000) - date.getTime()) / 1000),
        day_diff = Math.floor(diff / 86400);
    if ( isNaN(day_diff) || day_diff < 0 || day_diff >= 31 )
        return;

    return day_diff === 0 && (
        diff < 60 && "just now" ||
        diff < 120 && "1 min ago" ||
        diff < 3600 && Math.floor( diff / 60 ) + " mins ago" ||
        diff < 7200 && "1 hour ago" ||
        diff < 86400 && Math.floor( diff / 3600 ) + " hours ago") ||
        day_diff === 1 && "Yesterday" ||
        day_diff < 7 && day_diff + " days ago" ||
        day_diff < 31 && Math.ceil( day_diff / 7 ) + " week ago";
}

// If jQuery is included in the page, adds a jQuery plugin to handle it as well
if ( typeof jQuery !== "undefined" )
    jQuery.fn.prettyDate = function(){
        return this.each(function(){
            let $this = jQuery(this),
                date = prettyDate($this.text());
            if ( date )
                $this.text( date );
        });
    };

$(".time-human-diff").prettyDate();

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

$('.modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})

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
    let jwt     = localStorage.getItem('jwt');

    if (empty(jwt) || empty(jwt.split(" ")[1]) || jwtExpired()) {
        authorize();
    }

    return {
        "Authorization": jwt
    }
}

/**
 * Check if jwt is expired.
 *
 * @return {boolean}
 */
function jwtExpired() {
    if (empty(localStorage.getItem('jwt')) || empty(localStorage.getItem('jwt_created_at'))) {
        return false;
    }

    let now         = Math.floor(Date.now() / 1000);
    let createdAt   = localStorage.getItem('jwt_created_at');

    return !((now - createdAt) >= 60);
}

function logout() {
    localStorage.clear();
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
    if (status === 401) {
        return authorize();
    }

    if (status > 400 && status < 422) {
        return logout();
    }
}

/**
 * Set Jwt in session storage.
 *
 * @param token
 */
function setJwt(token) {
    localStorage.setItem('jwt', "Bearer " + token);
    localStorage.setItem('jwt_created_at', Math.floor(Date.now() / 1000));
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

/**
 * Templating.
 *
 * @param html
 * @param params
 * @returns {*}
 */
function formTemplate(html, params) {
    $.each(params, function (key, value) {
        while (html.indexOf("###" + key) >= 0) {
            html = html.replace("###" + key, value);
        }
    });

    return html;
}