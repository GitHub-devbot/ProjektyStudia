<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-29 23:41:56
  from 'D:\Prg\xampp\htdocs\Progressus\app\calcview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ea9f4a439d383_65860500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4543df198de54ddfec14eee1b7b49554ea1a9aa' => 
    array (
      0 => 'D:\\Prg\\xampp\\htdocs\\Progressus\\app\\calcview.tpl',
      1 => 1587897113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea9f4a439d383_65860500 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
include _ROOT_PATH . '/parts/top.php';
include _ROOT_PATH . '/parts/main.php';
<?php echo '?>';?>
    
<div style="width:90%; margin: 2em auto;">
    <form action="<?php echo '<?php ';?>
print($conf->APP_URL); <?php echo '?>';?>
/index.php?action=Oblicz" method="post" class="pure-form pure-form-stacked">
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


            <input type="submit" class="pure-button pure-button-active"value="Oblicz" />

        </fieldset>

    </form>
</div>	
<?php echo '<?php
';?>
//wyświeltenie listy błędów, jeśli istnieją
if ($this->messages->isError()) {

    echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f22; width:300px;">';
    foreach ($this->messages->getErrors() as $key => $msg) {
        echo '<li>' . $msg . '</li>';
    }
    echo '</ol>';
    echo '<embed src="http://localhost:80/progressus/assets/onie.mp3" loop="false" autostart="true" width="0" height="0" >';
    
}
<?php echo '?>';?>


<?php echo '<?php
';?>
if (isset($this->result->result)) {
//echo "<br>";  
//echo "OK - calc_view otrzymał dane"
    <?php echo '?>';?>

    <div style="margin: 60px; padding: 10px; border-radius: 5px; background-color: #1f1; width:300px;">
        <?php echo '<?php
        ';?>
echo "Kapitał po " . $this->form->z;
        echo " miesiącach: " . $this->result->result;
        echo " zł";
        <?php echo '?>';?>

    </div>
    <embed src="http://localhost:80/progressus/assets/nice.mp3" loop="false" autostart="true" width="0" height="0" >
    <?php echo '<?php
';?>
}
<?php echo '?>';?>







<?php echo '<?php
';?>
include $conf->ROOT_PATH . '/parts/bottom.php';
<?php echo '?>';?>

<?php }
}
