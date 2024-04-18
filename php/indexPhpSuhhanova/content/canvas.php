<div class="content">
    <h2>Draw something!!</h2>
    <canvas id="window" width="700" height="500">

    </canvas>
    <br>
    <input type="button" value="circle" onclick="circle()">
    <input type="button" value="square" onclick="square()">
    <input type="button" value="line" onclick="line()">
    <input type="button" value="clear" onclick="delete_()">
    <br>
    <input type="number" id="width" min="10" max="150" step="10" value="50"> :X
    <input type="number" id="height" min="10" max="150" value="50"> :Y
    <input type="button" value="like square" onclick="square2()">
    <br>


    <div><input type="number" id="xRec" value="300"> :X
        <input type="number" id="yRec" value="175"> :Y
        <input type="button" value="walls" onclick="rectangle()">
    </div>
    <div><input type="number" id="r" min="10" max="150" value="40"> :window radius
        <input type="button" value="window" onclick="window_()">
    </div>
    <div>
        <input type="number" id="h_roof" value="50"> :height roof
        <input type="number" id="angle" min="100" max="190" value="45"> :Interior angle of a trapizoid roof
        <input type="button" value="roof" onclick="roof()">
    </div>
    <div><input type="number" id="h_door" value="100"> :height
        <input type="number" id="w_door" value="45"> :width
        <input type="radio" id="single" name="door" value="1" checked>
        <lable for="single">single door</lable>
        <input type="radio" id="double" name="door" value="2">
        <lable for="double">double door</lable>
        <input type="button" value="door" onclick="door()">
    </div>
    <div><input type="number" min="1" max="10" value="5" id="handle"> :radius of door handle
        <input type="button" value="handle" onclick="handle()">
    </div>
    <div><input type="number" min="5" max="15" value="10" id="porch"> :Height of porch step
        <input type="button" value="porch step" onclick="porch()">
    </div>
    <script src="js/canvasscript.js"></script>
</div>
