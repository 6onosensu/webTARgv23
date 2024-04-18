<div class="content">
    <h2>Questionnaire</h2>
    <form name="kysimustik" id="myForm">
        <strong for="varv">Choose answer's colors:</strong>
        <input type="color" id="varv" class="inputForm" value="color" onclick="" onchange="chooseColor()">
        <table id="tableCont">
            <tr>
                <td>
                    <strong for="name">Name: </strong>
                </td>
                <td>
                    <input type="text" id="name" class="inputForm" name="nimi" placeholder="Your name.." oninput="readTextBox()">
                </td>
                <td>
                    <div id="answer" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Your group: </strong>
                </td>
                <td>
                    <input type="radio" id="targv23" class="inputForm" name="ryhm" value="TARgv23" onchange="readRadio()">
                    <label for="targv23">TARgv23</label>
                    <br>
                    <input type="radio" id="logitgv23" class="inputForm" name="ryhm" value="LOGITgv23" onchange="readRadio()">
                    <label for="logitgv23">LOGITgv23</label>
                </td>
                <td>
                    <div id="answer2" class="answer"></div>
                    <img src="" id="pilt">
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Choose your favorites:</strong>
                </td>
                <td>
                    <input type="checkbox" id="andmebaasid" class="inputForm" name="interest" value="andmebaasid" onchange="readCheckbox()">
                    <label for="andmebaasid">Andmebaasid</label>
                    <br>
                    <input type="checkbox" id="matemaatika" class="inputForm" name="interest" value="math" onchange="readCheckbox()">
                    <label for="matemaatika">Math</label>
                    <br>
                    <input type="checkbox" id="programeerimine" class="inputForm" name="interest" value="programeerimine" onchange="readCheckbox()">
                    <label for="programeerimine">Programeerimine</label>
                </td>
                <td>
                    <div id="answer3" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="kodu">Where are you from?</strong>
                    <br>
                    <strong for="km">Distance (km)</strong>
                </td>
                <td>
                    <select id="kodu" class="inputForm" onchange="selectOption()">
                        <option value="Tyhi">Vali...</option>
                        <option value="Tallinn">Tallinn</option>
                        <option value="Tartu">Tartu</option>
                        <option value="Haapsalu">Haapsalu</option>
                        <option value="Narva">Narva</option>
                        <option value="Parnu">Pärnu</option>
                        <option value="Kivioli">Kiviõli</option>
                    </select>
                    <br>
                    <input type="range" id="km" class="inputForm" min="0" max="200" onchange="selectOption()">
                </td>
                <td>
                    <div id="answer4" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="date">When were you born?</strong>
                </td>
                <td>
                    <input type="date" id="date" class="inputForm" onchange="for5()">
                </td>
                <td>
                    <div id="answer5" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="email">Your e-mail:</strong>
                </td>
                <td>
                    <input type="email" id="email" class="inputForm" value="email@mail.com" onchange="for6()">
                </td>
                <td>
                    <div id="answer6" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="file">Upload your CV:</strong>
                </td>
                <td>
                    <input type="file" id="file" class="inputForm" value="Your file" onchange="for7()">
                </td>
                <td>
                    <div id="answer7" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="time">Time of your birth:</strong>
                </td>
                <td>
                    <input type="time" id="time" class="inputForm" value="Your time zone:" onchange="for8()">
                </td>
                <td>
                    <div id="answer8" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="tel">Your phone number:</strong>
                </td>
                <td>
                    <input type="tel" id="tel" class="inputForm" value="+372" onchange="for9()">
                </td>
                <td>
                    <div id="answer9" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="datetime">Your date-time local:</strong>
                </td>
                <td>
                    <input type="datetime-local" class="inputForm" id="datetime" onchange="for10()">
                </td>
                <td>
                    <div id="answer10" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="hidden">Hidden:</strong>
                </td>
                <td>
                    <input type="hidden" id="hidden" class="inputForm" value="Hidden" onclick="for11()">
                </td>
                <td>
                    <div id="answer11" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <strong for="image">Your photo:</strong>
                </td>
                <td>
                    <input type="image" id="image" value="Image" class="inputForm" src="images/pers.png" onclick="for12()">
                </td>
                <td>
                    <div id="answer12" class="answer"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="OK" class="inputForm" onclick="createTable()">
                </td>
                <td>
                    <input type="reset" value="Clear" class="inputForm" onclick="toClear()">
                </td>
            </tr>
        </table>
        <div id="printAll"></div>
    </form>
    <div id="tableContainer">
        <!-- The table will be inserted here -->
    </div>
</div>
<script src="js/readfromform.js"></script>
