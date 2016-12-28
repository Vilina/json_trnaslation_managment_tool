$(document).ready(function() {
    $("#compare_form").submit(function (event) {
        alert('asaaa');
        // /* stop form from submitting normally */
        event.preventDefault();
        //
        // /* get the action attribute from the <form action=""> element */
        var $form = $( this ),
            url = $form.attr( 'action' );
        //
        // /* Send the data using post with element id name and name2*/

        var data = {
            $('#original_file').val(),
            $('#comparable_file').val()
        }

        $.ajax({
            type: "POST",
            data: thisObj.serialize(),
            url: url,
            success: function (data) {
                thisObj.parent("#content").empty().html(data).hide().fadeIn(function () {
                    setBlocks();
                    setLiClick();
                    hideOverLayer();
                });
                changeCalNaviHref();
            }
        });
        var posting = $.post( url, { original_file: $('#original_file').val(), comparable_file: $('#comparable_file').val() } );
        //
        // /* Alerts the results */
        posting.done(function( data ) {
            alert('success');
        });
    });
});