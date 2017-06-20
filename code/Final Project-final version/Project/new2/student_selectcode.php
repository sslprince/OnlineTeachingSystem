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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <title>select code</title>

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
              <a class="nav-link active" href="student_selectcode.php">Select code</a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div style="text-align:center"><h1>Select code</h1></div>
            <section class="row text-center placeholders">
              <div class="col-6 col-sm-3 placeholder">
                <form name="selectcode" method="POST" action="">
                Class:
                <!--left part select button-->
                <select name="select1" id="select1">
                  <?php
                  $username = $_SESSION['username'];
                  $query = "SELECT `class` FROM `studentlist` WHERE username = '$username' ";
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
                <br><br>
                File name:
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
                    echo "<option value= $class ></option>";
                    echo "<option value= $class >$name</option>";
                  }
                  ?>
                </select>
                <input id="make_text" type = "hidden" name = "make_text" value = "" />
                <br><br><br>
                <input type="submit" name="submit1" value="Show code">
                <br><br><br>
                 <input type="submit" name="submit2" onClick="window.location.href='student_tracetable.php'" value="Go tracetable">
                 <?php
                 if(@$_POST["submit2"] && trim($_POST['comment']))
                 {
                      header('Refresh: 0; URL = student_tracetable.php');
                 }

                  ?>

              </div>

              <!--right part textarea-->
              <div class="col-6 col-sm-3 placeholder">
                <textarea name="comment" rows="15" cols="40">
<?php if(@$_POST["submit1"])
      {
        $a=$_POST['select2'];
        $a=$_POST['make_text'];
        $_SESSION['a'] = $a;
        $query = "SELECT `source_file` FROM `file` WHERE name='$a' ";
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
      }
?>
                </textarea>
              </div>
            </section>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>


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
</script>
