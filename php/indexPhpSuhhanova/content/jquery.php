<div class="content" onload="start()">
    <h1>JQuery</h1>
    <input type="button" value="Move to the left" onclick="$('div#txt').animate({left: '600px'}, 1000)">
    <input type="button" value="Move back" onclick="$('div#txt').animate({left: '0px'}, 5000)">
    <input type="button" value="Hide" id="btn" onclick="show_hide()">
    <div id="txt"> jQuery is a fast, small, and feature-rich JavaScript library.
        It makes things like HTML document traversal and manipulation, event handling, animation,
        and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.
        With a combination of versatility and extensibility,
        jQuery has changed the way that millions of people write JavaScript.
    </div>

    <div id="txt2">
        <h3>The jQuery library contains the following features:</h3>
        <ul>
            <li>HTML/DOM manipulation</li>
            <li>CSS manipulation</li>
            <li>HTML event methods</li>
            <li>Effects and animations</li>
            <li>AJAX</li>
            <li>Utilities</li>
        </ul>
    </div>
    <h2>jQuery CDN - library</h2>
    <img src="images/earth.png" alt="png" id="png">
    <div id="answer"></div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script>
    function orange() {
        $('div#txt, h1').css('color', 'orange');
    }
    function black() {
        $('div#txt').css('color', 'black');
    }
    function movement(event, ui) {
        var place = ui.offset;
        $('#answer').html(place.top + " // " + place.left);
    }
    let open = true;
    function show_hide() {
        $('div#txt').slideToggle();
        if (open) {
            open = false;
            $('#btn').val('Show');
        } else {
            open = true;
            $('#btn').val('Hide');
        }
    }
    function start() {
        $('#png').draggable();
        $('#png').bind("drag", movement);
        $('div#txt, h1').mouseenter(orange);
        $('div#txt').mouseleave(black);
    }

</script>
