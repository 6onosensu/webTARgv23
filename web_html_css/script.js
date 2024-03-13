
$(document).ready(function () {
    const seasonImg = $('#seasonImg');
    const seasons = ["Spring", "Summer", "Fall", "Winter"];
    const borderR = 'border-right';
    const bg = 'background-color';
    let currentSeasonId = 0;
    let nav = $('.nav');
    let html = $('html');
    let section = $('.section');
    let duck = $('#duck');
    let h2 = $('#h2');
    let panel = $('#panel');

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
        $("#snow").fadeIn();
        $("#div2").fadeIn("slow");
        $("#div3").fadeIn(3000);
    });

    function move(event, ui) {
        let place = ui.offset;
        $('#address').html(place.top + " // " + place.left);
    }
});