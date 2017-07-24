"use strict";

let projectStatuses = null;

// Get all project statuses
fetchProjectStatuses();


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
 * @param instance
 * @param percentageInstance
 * @param status
 * @param value
 */
function makeProgress(uuid, status, value = null) {
    value = ! value ? projectStatuses[status] : value;

    $(".progress_bar_" + uuid).css({width: value + '%'});
    $(".percentage_completed_" + uuid).html(value);
}