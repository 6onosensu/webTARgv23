<div class="content">
    <?php

    // eemalda urlist muutujad
    function clearVarsExcept($url, $varname) {
        return strtok(basename($_SERVER['REQUEST_URI']),"?")."?$varname=".$_REQUEST[$varname];
    }

    $text='April is spring';
    echo "<h2>We are using text functions</h2>";
    echo $text;
    echo "<br>";
    echo "<section>";

    echo "<div>";
    // All letters must be low!
    echo strtolower($text);
    echo "<br>";
    echo strtoupper($text);
    echo "<br>";
    echo ucwords(strtolower($text));
    echo "<br>";

    echo 'Text length is '.strlen($text);
    echo "<br>";

    echo 'Number of words in the text: '.str_word_count($text);
    echo "<br>";

    $search = 'is';
    echo 'Searching "is" in the text: '.strpos($text, $search)+1;
    echo "<br>";

    //eraldame esimesed 4 tahte
    echo ''.substr($text, 0, 5);
    echo "<br>";

    //vqdelit all words beginning from is - "is spring"
    echo ''.substr($text, strpos($text, $search), strlen($text)-1);

    echo "</div>";
    echo "</section>";





    echo "<section>";
    echo "<h2>Kasutame veebis leitud näidised</h2>";
    echo "<div>";
    $text2 = ' 	A woman should soften but not weaken a man   ';
    echo "<pre>$text2</pre>";
    // eemaldas ülearuse tühja nii paremalt kui vasakult
    echo "<pre>".trim($text2)."</pre>";
    //Teised kaks, ltrim() ja rtrim() eemaldab vasavalt vasakult ja paremalt.
    echo "<pre>".ltrim($text2)."</pre>";
    echo "<pre>".rtrim($text2)."</pre>";
    echo "<br>";

    //Eemaldame teksti otstest märgid A ja a ning k kuni n.
    $text2 = 'A woman should soften but not weaken a man';
    echo trim($text2, "A, a, k..n, w");	//oman should soften but not weake
    echo "<br>";


    //Tekst kui massiiv
    $text3 = 'All thinking men are atheists';
    echo $text3[0]; 				//A- the firts letter
    echo '<br>';
    echo $text3[4];                 //t- fifth letter
    echo '<br>';

    echo substr($text3, 3, 5);		//thin
    echo '<br>';
    //-13? arvutakse lõpust alguseni, cuts from the left side 4 signs and from the right side 13
    echo substr($text3, 4, -13);	//thinking men
    echo '<br>';
    echo substr($text3, -8, 7);		//atheist
    echo '<br>';

    // 1 - words to array
    $word = str_word_count($text3, 1);
    echo $word[2]; //men
    echo '<br>';

    print_r(str_word_count($text3, 2));
    // sArray ( [0] => All [4] => thinking [13] => men [17] => are [21] => atheists )
    echo "</div>";
    echo "<h2>Teksti asendamine</h2>";

    echo "<div>";
    $tekst = 'Pai papa, pane paadile punased purjed peale';
    $asendus = 'emme'; // 4em zamenit
    $otsitav_algus = 4; //start
    $otsitav_pikkus = 4; //vsego zameneno
    echo substr_replace($tekst, $asendus, $otsitav_algus, $otsitav_pikkus);
    echo '<br>';
    $otsitav = 'papa';
    $nihe = 0;
    $asenduse_algus = strpos($tekst, $otsitav, $nihe);
    $asenduse_markide_arv = strlen($otsitav);
    echo substr_replace($tekst, $asendus, $asenduse_algus, $asenduse_markide_arv);

    echo '<br>';
    $tekst = 'Musta lehma saba musta lehma taga, valge lehma saba valge lehma taga';
    $otsi = 'lehm';
    $asenda = 'koer';
    echo str_replace($otsi, $asenda, $tekst);
    echo '<br>';

    $otsi = array('lehm', 'saba', 'taga');
    $asenda = array('koer', 'sarv', 'ees');
    echo str_replace($otsi, $asenda, $tekst);


    echo "</div>";
    echo "</section>";



    echo "<section>";


    echo "<h2>Riddle: Warm European city</h2>";
    // 6 podskazok vqvod spiskom pri pomowi func
    $word = 'Lisbon';

    echo "<ul>";
    echo "<li>";
    echo 'The word length is '.strlen($word);
    echo "</li>";

    echo "<li>";
    $city = 'One of the warmest cities in .. Europe';
    echo substr($city,6, -6);
    echo "</li>";

    echo "<li>";
    $country = 'Portugal';
    echo 'The country of the city in the riddle: '.trim($country, "o, P, l");
    echo "</li>";

    echo "<li>";
    $limoges = 'limoges - a city in southwestern france';
    $similar = 'A similar word is ';
    echo $similar.ucwords(strtolower($limoges));
    echo "</li>";

    echo "<li>";
    echo "There is a tramway nr 8!";
    echo "</li>";

    echo "<li>";
    $search = array('cities');
    $replace = array('capitals');
    echo str_replace($search, $replace, $city);
    echo "</li>";
    echo "</ul>";


    echo "</section>";
    ?>

    <form name="check" method="post" action="<?=clearVarsExcept(basename($_SERVER['REQUEST_URI']),"veebileht")?>">
        <label for="checkword">Enter the word!</label>
        <input type="text" name="checkword" id="checkword">
        <input type="submit" value="check">
    </form>


    <?php
    if (isset($_REQUEST["checkword"])) {
        if ($_REQUEST["checkword"] == $word) {
            echo "<body style='background-color: #95c998;'>";
        } else {
            echo "<body style='background-color: #c995a3;'>";
        }
    }
    ?>
</div>
