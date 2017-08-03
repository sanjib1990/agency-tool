"use strict";

let projectStatuses = null;

// Get all project statuses
fetchProjectStatuses();

$(function() {
    $('#file_upload').fileupload({
        dataType: 'json',
        headers: jwtHeader(),
        done: function (e, data) {
            console.log(data.result);
            hideLoader();
        },
        fail: function(e, data) {
            ajaxErrorLogout(data.jqXHR.status);
        }
    });

    $("#project_info_btn").on('click', function () {
        $(".requirments_tab").removeClass('disabled').trigger('click');
        $(".tab-content").css({position:"absolute"});
    });
    $("#requirments_next_btn").on('click', function () {
        $(".tab-content").css({position:"inherit"});
        $(".project_progress_tab").removeClass('disabled').trigger('click');
    });

    $(".tab_click").on('click', function () {
        if ($(this).attr('id') == 'requirments_tab') {
            $(".tab-content").css({position:"absolute"});

            return true;
        }

        $(".tab-content").css({position:"inherit"});
    });

    $(".search_developer").easyAutocomplete({
        data:["easy", "hard", "medium"]
    });

    $(".dev_select").on('click', function () {
        $(".assigned_dev").html($(".search_developer").val());
        $("#assign-dev-modal").modal("hide");
    });
    $(".remove_dev").on('click', function () {
        $(".assigned_dev").html("No Development team assigned yet.");
    });
});

/**
 * Fetch all the project statuses
 */
function fetchProjectStatuses() {
    $.ajax({
        url: apiUrl + '/project/statuses',
        headers: jsonAuthHeader(),
        success: function (result) {
            hideLoader();
            projectStatuses = result.data;
        },
        error: function (error) {
            hideLoader();
        }
    })
}

/**
 * increase the progress bar as the status moves forward.
 *
 * @param status
 * @param value
 */
function makeProgress(status, value = null) {
    value = ! value ? projectStatuses[status] : value;

    $(".progress-bar").attr('aria-valuenow', value).css({width: value + '%'});
    $("#percentage_completed").html(value);
}