
{global $conf;
include file = $conf->ROOT_PATH . '/parts/top.php';
include file = $conf->ROOT_PATH . '/parts/main.php';
}
<div style="width:90%; margin: 2em auto;">
    <form action=" { print($conf->APP_URL); } /index.php?action=Oblicz" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <font size = 5> 
            <label for="id_x">Kalkulator lokat bankowych </label> 	
            <font size = 3> 
            <label for="id_x">(Konsolidacja środków następuje pod koniec każdego miesiąca) </label> 	
            <br>
            <label for="id_x">Ilość kapitału w zł: </label> 
            <input id="id_x" type="text" name="x" /><br />

            <label for="id_y">Oprocentowanie roczne: </label>
            <input id="id_y" type="text" name="y" /><br />

            <label for="id_z">Ilość miesięcy: </label>
            <input id="id_z" type="text" name="z" /><br />


            <input type="submit" class="pure-button pure-button-active" value="Oblicz" />

        </fieldset>

    </form>
</div>	

if ($this->messages->isError()) {

    echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f22; width:300px;">';
    foreach ($this->messages->getErrors() as $key => $msg) {
        echo '<li>' . $msg . '</li>';
    }
    echo '</ol>';
    echo '<embed src="http://localhost:80/progressus/assets/onie.mp3" loop="false" autostart="true" width="0" height="0" >';
    
}



if (isset($this->result->result)) {
    }
    <div style="margin: 60px; padding: 10px; border-radius: 5px; background-color: #1f1; width:300px;">
     {   
        echo "Kapitał po " . $this->form->z;
        echo " miesiącach: " . $this->result->result;
        echo " zł";
    }  
    </div>
    <embed src="http://localhost:80/progressus/assets/nice.mp3" loop="false" autostart="true" width="0" height="0" >
{   
}

include file = $conf->ROOT_PATH . '/parts/bottom.php';
}
