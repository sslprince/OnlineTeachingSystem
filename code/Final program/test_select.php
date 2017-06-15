<?php
include 'database.php';
session_start();
$pre=array();
$flag=0;
$query = "SELECT `class` FROM `studentlist` WHERE username='bill'";
if(!$query_run= mysql_query($query))
{
  echo "fail";
}

while($query_row = @mysql_fetch_assoc($query_run))
{
  foreach($query_row as $value)
  {
    echo $value;
  }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<form name="selectcode" method="POST" action="">
<select name="select1" id="select1" onchange="myfunction()">
  <?php
  $query = "SELECT `class` FROM `studentlist` WHERE username='bill'";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
  echo "<option value='0'>Please select</option>";
  while($query_row = @mysql_fetch_assoc($query_run))
  {
    foreach($query_row as $value)
    {
      echo "<option value= $value >$value</option>";
      $i++;
    }
  }
  ?>

</select>

<select name="select2" id="select2" onchange="setTextField(this)">
  <?php
  $query = "SELECT `name`, `class` FROM `file`";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
  echo "<option value='0'>Please select</option>";
  while($query_row = @mysql_fetch_assoc($query_run))
  {
    $class = $query_row['class'];
    $name = $query_row['name'];
    echo "<option value= '$class' ></option>";
    echo "<option value= '$class' >$name</option>";

  }
  ?>
</select>
<input id="make_text" type = "hidden" name = "make_text" value = "" />
<input type="submit" name="submit" value="Show code">
<textarea>
  <?php
  if(isset($_POST['select2']))
  {
    $value= $_POST["select2"];
    $text= $_POST["make_text"];
    echo $value;
    echo $text;
  }
  ?>
  <?php
  if(@$_POST['submit'])
  {

  }
  ?>
</textarea>
<textarea id="show_select2"></textarea>
</form>
<script>
$("#select1").change(function() {
  if ($(this).data('options') === undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select2 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value=' + id + ']');
  $('#select2').html(options);
  $('select[name="select2"]').change(function(){
    var text = $(this).find("option:selected").text();

    $('#show_select2').val(text);
  });
});


function setTextField(ddl) {
    document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;
}

function myfunction(){
//location.reload();
}

</script>
