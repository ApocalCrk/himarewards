$(document).ready(function() {
    $('.detail').click(function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/get_data.php',
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                $('.info-peringkat').html(data.rank);
                $('.info-data-name').html(data.name);
                $('.info-data-score').html(data.score);
                $('.info-data-detail-uts').html(data.uts);
                $('.info-data-detail-uas').html(data.uas);
                $('.info-data-detail-workshop').html(data.workshop);
                $('.info-data-detail-sharing1').html(data.sharing1);
                $('.info-data-detail-sharing2').html(data.sharing2);
                $('.info-data-detail-pengabdian').html(data.pengabdian);
            }
        });
        $('#open-modal').addClass('modal-window-active');
        $('.page-leaderboard').css('overflow', 'hidden');
    });
    
    $('.modal-close').click(function() {
        $('#open-modal').removeClass('modal-window-active');
        $('.page-leaderboard').css('overflow', 'auto');
        $('.info-data-name').empty();
    });

    $(document).mouseup(function(e) {
        var container = $('#open-modal');
        if (container.is(e.target) && container.has(e.target).length === 0) {
            container.removeClass('modal-window-active');
            $('.page-leaderboard').css('overflow', 'auto');
            $('.info-data-name').empty();
        }
    });
});