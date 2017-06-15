
<form method="POST">
<select name='make' onchange="setTextField(this)">
<option value = '' selected> None </option>
<option value = '5'> Text 5 </option>
<option value = '7'> Text 7 </option>
<option value = '9'> Text 9 </option>
</select>
<input id="make_text" type = "hidden" name = "make_text" value = "" />
<input type="submit" name="submit" value="Show code">
<textarea>
<?php
if(@$_POST['submit'])
{
  $value= $_POST["make"];
  $text= $_POST["make_text"];
  echo $value;
  echo $text;
}



?>
</textarea>
</form>
<script type="text/javascript">
    function setTextField(ddl) {
        document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;
    }
</script>
