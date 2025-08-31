$(document).ready(function () {
    $('#view1').hide();
    $('#view2a').hide();
    $('#view2b').hide();
    $('#view3').hide();

    $.viewMap = {
        '0': $([]),
        'view1': $('#view1'),
        'view2': $('#view2a, #view2b'),
        'view3': $('#view3')
    };

    $('#viewSelector').change(function () {
        // hide all
        $.each($.viewMap, function () { this.hide(); });
        // show current
        $.viewMap[$(this).val()].show();
    });
});
