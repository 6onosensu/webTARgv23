
$(document).ready(function () {
    const seasonImg = $('#seasonImg');
    const seasons = ["Spring", "Summer", "Fall", "Winter"];
    const borderR = 'border-right';
    const bg = 'background-color';
    const nav = $('.nav');
    const html = $('html');
    const section = $('.section');
    const duck = $('#duck');
    const h2 = $('#h2');
    const panel = $('#panel');
    let currentSeasonId = 0;

    duck.draggable();
    duck.bind('drag', move);
    h2.mouseenter(function () {
        h2.css('color', '#715399');
    });
    h2.mouseleave(function () {
        h2.css('color', '#000000');
    });
    seasonImg.click(function () {
        currentSeasonId = (currentSeasonId + 1) % seasons.length;
        switch (seasons[currentSeasonId]) {
            case "Spring":
                nav.css(bg, '#d699b5');
                html.css(bg, '#f2dae8');
                section.css(borderR, '8px solid #d699b5');
                break;
            case "Summer":
                nav.css(bg, '#AEC6A6');
                html.css(bg, '#F5EDD8');
                section.css(borderR, '8px solid #AEC6A6');
                break;
            case "Fall":
                nav.css(bg, '#8D0327');
                html.css(bg, '#DABDAD');
                section.css(borderR, '8px solid #8D0327');
                break;
            case "Winter":
                nav.css(bg, '#00563F');
                html.css(bg, '#F5F5F5');
                section.css(borderR, '8px solid #00563F');
                break;
        }

    });
    $('#flip').click(function () {
        panel.slideToggle("slow");
        panel.css('color', '#715399');
        panel.css('border', '1px solid #715399');
        panel.css('border-radius', '25px');
    });
    $("#fade").click(function () {
        $("#redBox").fadeToggle();
        $("#greenBox").fadeToggle("slow");
        $("#blueBox").fadeToggle(3000);
    });
    let open = true;
    const hideShow = $("#hideShow");
    hideShow.click(function () {
        $('#gif').slideToggle();
        if (open) {
            open = false;
            hideShow.val('Show');
        } else {
            open = true;
            hideShow.val('Hide');
        }
    });
    function move(event, ui) {
        let place = ui.offset;
        $('#address').html(place.top + " // " + place.left);
    }
});