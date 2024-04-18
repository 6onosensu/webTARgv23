<div class="content cats">
    <h2>Sale of Cats</h2>
    <table id="beautiful-table">
        <tr>
            <td id="topLeft" class="highlight">
                <img src="" id="random-cat" alt="cat">
            </td>
            <td id="topRight" class="highlight">
                <div id="answer"></div>
                <label for="option">Make your choice: </label>
                <br>
                <select id="option" onchange="checkImg()">
                    <option> Choose...</option>
                    <option id="siam" value="../images/siamese.jpg">Siamese cat</option>
                    <option id="brit" value="../images/british.jpg">British cat</option>
                    <option id="mc" value="../images/maineCoon.jpg">Maine coon</option>
                </select>
            </td>
        </tr>
        <tr>
            <td id="centerleft" class="highlight">
                <label for="quantity">Quantity: </label>
                <input type="number" id="quantity" min="1" max="4">
            </td>
            <td id="centerright" class="highlight">
                <input type="radio" name="choice" id="siamese" value="img/cats/siamese.jpg" onchange="checkImgR()">
                <label for="siamese">Siamese cat</label>
                <br>
                <input type="radio" name="choice" id="british" value="img/cats/british.jpg" onchange="checkImgR()">
                <label for="british">British cat</label>
                <br>
                <input type="radio" name="choice" id="maineCoon" value="img/cats/maineCoon.jpg" onchange="checkImgR()">
                <label for="maineCoon">Maine coon</label>
            </td>
        </tr>
        <tr>
            <td id="bottomLeft" class="highlight">
                <input class="button" type="button" value="Calculate" onclick="showResult()">
            </td>
            <td id="bottomRight" class="highlight">
                <div id="answer2"></div>
            </td>
        </tr>
    </table>
</div>
<script src="../js/catsale.js"></script>
