$(document).ready(function () {
    monthArr = window.monthArr.split(',');
    
    if (window.sessionMsg !== '') {
        $.notify(window.sessionMsg);
    }
    
    $(document).on('keyup', '.month-input', function () {
        var allRowInput = $(this).parents('tr').find('.month-input'),
            total       = 0;
        
        $.each(allRowInput, function (key, input) {
            var value = parseInt($(input).val());
            console.log(value);
            if (!isNaN(value) && value !== undefined) {
                total = (parseInt(total) + value);
            }
        });
        
        $(this).parents('tr').find('.month-total').val(total);
    });
    
    $('#add_account').click(function () {
        var totalRow  = $(document).find('.content-holder').find('tr'),
            nextRowNo = (totalRow.length + 1),
            html      = getHtml(nextRowNo);
        
        $('.content-holder').append(html);
    });
    
});

function getHtml(nextRowNo) {
    var curTime = $.now(),
        html    = "<tr>";
    
    html += "<td><label for='Account " + nextRowNo + "'>Account " + nextRowNo + "</label><input type='hidden' name='account[" + curTime + "][row_id]' value=''></td>";
    
    $.each(monthArr, function (key, monthName) {
        html += "<td><input type='number' name='account[" + curTime + "][" + monthName + "]' class='form-control input-sm month-input' min='0' max='999999' value='0'></td>";
    });
    
    html += "<td><input type='number' name='account[" + curTime + "][total]' class='form-control input-sm month-total' disabled='disabled'></td>";
    
    html += "</tr>";
    
    return html;
}
