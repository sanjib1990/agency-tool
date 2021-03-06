"use strict";

let projectStatuses = null;

// Get all project statuses
fetchProjectStatuses();

$(() => {
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
        makeProgress($(this).data('status'));
        $(".requirments_tab").removeClass('disabled').trigger('click');
        $(".tab-content").css({position:"absolute"});
    });
    $("#requirments_next_btn").on('click', function () {
        makeProgress($(this).data('status'));

        $(".tab-content").css({position:"inherit"});
        $(".project_progress_tab").removeClass('disabled').trigger('click');
    });

    $(".tab_click").on('click', function () {
        let tabContent  = $(".tab-content");

        if ($(this).attr('id') === 'requirments_tab') {
            tabContent.css({position:"absolute"});

            return true;
        }

        tabContent.css({position:"inherit"});
    });

    $(".search_developer").easyAutocomplete({
        data:["easy", "hard", "medium"]
    });

    $(".dev_select").on('click', function () {
        makeProgress($(this).data('status'));

        $(".assigned_dev").html($(".search_developer").val());
        $("#assign-dev-modal").modal("hide");
    });
    $(".remove_dev").on('click', function () {
        makeProgress($(this).data('status'));

        $(".assigned_dev").html("No Development team assigned yet.");
    });
    $(".add_comment").on('click', () => {
        comment($(this).data('identifier'));
    });
    $(".edit-requirment").on('click', () => {
        let uuid   = $(this).data('uuid');

        $("#title").val($(".requirment-title-"+uuid).text().trim());
        $("#requirment_desc").val($(".requirment-desc-"+uuid).text().trim());
        $("#requirement-modal").modal('show');
    });

    $(".client_sign_off_btn," +
        ".dev_sign_off_btn," +
        ".requirement_freeze_btn," +
        ".dev_start_btn," +
        ".dev_start_btn," +
        ".given_to_qa_btn," +
        ".deployed_btn").click(function () {
        makeProgress($(this).data('status'));
    });
});

/**
 * Fetch all the project statuses
 */
function fetchProjectStatuses() {
    $.ajax({
        url: apiUrl + '/project/statuses',
        headers: jsonAuthHeader(),
        success: result => {
            hideLoader();
            projectStatuses = result.data;
        },
        error: error => {
            ajaxErrorLogout(error.status);
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

/**
 * Comment.
 *
 * @param forIdentifier
 */
function comment(forIdentifier = null) {
    swal({
        title: 'Comment',
        input: 'text',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: function (text) {
            return new Promise((resolve, reject) => {
                if (empty(text)) {
                    reject('Please enter a comment.')
                } else {
                    resolve()
                }
            })
        },
        allowOutsideClick: false
    }).then(text => {
        let html        = $("#comment-template").html();
        let userImage   = $(".user-image").attr('src');
        let userName    = $(".user-name").text();
        let date        = (new Date).toISOString();

        $("."+forIdentifier+"-comment-list").prepend(formTemplate(html, {
            userImage: userImage,
            userName: userName,
            time: date,
            comment: text
        }));
        $(".time-human-diff").prettyDate();

        swal({
            type: 'success',
            title: 'Comment Submitted Successfully!'
        });
    })
}