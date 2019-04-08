let image = "https://i.imgur.com/7tdLsqi.png";
$('img').each(function () {
    if($(this).attr('src').length === 0) {
        $(this).attr('src', image);
    }
});