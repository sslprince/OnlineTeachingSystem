<?php
include 'database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>trace table</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Student mode</a>
<!--
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      -->
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="student_index.php">Overview<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student_selectcode.php">Select code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="student_tracetable.php">Trace table</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Result</a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-20 offset-md-2 pt-3">
            <div style="text-align:center"><h1>Please fill trace table</h1></div>
            <section class="row text-center placeholders">
              <div class="col-6 col-sm-3 placeholder">
                <div style="text-align:left"><h2>Code:</h2></div>
                <textarea name="comment" rows="15" cols="35">
<?php $a=$_SESSION['a'];
      $query = "SELECT `source_file` FROM `file` WHERE name='$a' ";
      $start=100;
      $count1=0;
      if(!$query_run= mysql_query($query))
      {
        echo "fail";
      }
      while($query_row = @mysql_fetch_assoc($query_run))
      {
        foreach($query_row as $value)
        {
          $str1=$value;
        }
      }
      $code=(explode("\n",$str1));
      for($i=0;$i<sizeof($code);$i++)                    //how many columns
      {
        if(!strcmp($code[$i],"int main(int argc, const char * argv[]) {"))
        {
          $start=$i;
        }
        if($i>=$start)
        {
          echo "$count1";
          echo "    ";
          echo "$code[$i]\n";
          $count1++;
        }
        else
        {
          echo "    ";
          echo "$code[$i]\n";
        }
      }
?>
                </textarea>
              </div>
              <div class="col-6 col-sm-3 placeholder">
              </div>

              <div class="col-6 col-sm-3 placeholder">
                <div><h2>Trace table:</h2></div>
                <form name="add_name" id="add_name" method="POST" action="student_check.php">
                   <table class="" id="dynamic_field" border="1">
                        <tr>
                          <?php
                          $var = array();
                          $query = "SELECT `variable` FROM `file` WHERE name='$a' ";
                          if(!$query_run= mysql_query($query))
                          {
                            echo "fail";
                          }
                          while($query_row = @mysql_fetch_assoc($query_run))
                          {
                            foreach($query_row as $value)
                            {
                              $str=$value;
                            }
                          }
                          $var=(explode("\n",$str));
                          echo "<td>statement(s)</td>";                     //current statement
                          for($i=0;$i<sizeof($var)-1;$i++)                    //how many columns
                          {
                            echo "<td>$var[$i]</td>";
                          }
                           ?>
                        </tr>
                        <tr>
                          <?php
                          echo '<td><input type="text" name="s[]" /></td>';                     //current statement
                          for($i=0;$i<sizeof($var)-1;$i++)                    //how many columns
                          {
                            echo '<td><input class="example" type="text" name="text[]" /></td>';
                          }
                           ?>

                        </tr>
                   </table>
                   <br>
                   <div style="text-align:left">
                   <button type="button" name="add" id="add" class="btn btn-success">Add Line</button>
                   <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                   </div>
                   <br><br>
                   <div style='text-align:left' class='notice'>*Notice: The first statement in trace table must be the <i><strong>int mian()</strong></i> line!</div>

<?php
$result_s = array();
$query = "SELECT `statement` FROM `file` WHERE name='$a' ";
if(!$query_run= mysql_query($query))
{
  echo "fail";
}
while($query_row = @mysql_fetch_assoc($query_run))
{
  foreach($query_row as $value)
  {
    $str_s=$value;
  }
}
$result_s=(explode("\n",$str_s));
array_pop($result_s);
$_SESSION['result_s']=$result_s;


 ?>
                </form>
              </div>
            </section>
        </main>
      </div>
    </div>
  </body>

<style>
.notice{
  width:500px;
  height:80px;
}

input[type=text]{
    width: 100%;
    padding: 5px 20%;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.example {
width: 100%;
max-width: 120px;
min-width: 80px;
}
</style>

</html>
<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
       i++;
       $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="s[]" /></td><?php for($i=0;$i<sizeof($var)-1;$i++){ echo '<td><input class="example" type="text" name="text[]" /></td>'; } ?><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  $(document).on('click', '.btn_remove', function(){
       var button_id = $(this).attr("id");
       $('#row'+button_id+'').remove();
  });
  $('#submit').click(function(){
    //alert("ok");
    $.ajax({
         url:"result.php",
         method:"POST",
         data:$('#add_name').serialize(),
         success:function(data)
         {
           /*
              alert("data");
              $('#add_name')[0].reset();
              */
         }
    });
  });
});
</script>
