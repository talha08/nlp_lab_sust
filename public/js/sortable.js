function sortableAndDatatable(csrf) {


    var table = $('#datatable').dataTable({
        "order": [[ 0, 'asc' ]]
    });
    $('.sortable').sortable({
        axis: 'y',
        stop: function (event, ui) {

        }
    });
    $('#update').click(function(){
        var data = $('.sortable').sortable('serialize');
        data = data + '&_token='+ csrf;
        console.log(data);

        // POST to server using $.post or $.ajax
        $.ajax({
            data: data,
            type: 'POST',
            url: '/teacher-sort',
            success: function(data) {
            console.log(data);
            location.reload();
        }
    });
    });

}