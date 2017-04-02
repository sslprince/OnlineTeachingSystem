<?php include 'database.php';?>
<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">





<?php
    $query = "SELECT * FROM file";
    $shouts = mysqli_query($con,$query);

    ?>

<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/choose0.css" type="text/css" />
</head>
<body>
</body>
</html>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<div class ="parent">
<div class = "title"><b>Delete C Code</b></div>
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">


<div id="shouts">
<ul>
<?php while($row = mysqli_fetch_assoc($shouts)) : ?>
<li class = "shout"><span><strong><input name ="input1" type="button" value="<?php echo $row['name']?>"/></li>
<?php endwhile;?>
</ul>
</div>


<script>
window.onload = function() {
    var btns = document.getElementsByName('input1');
    for (var i = 0; i < btns.length; i++) {
        btns[i]._index = i;
        btns[i].onclick = function() {
          var name =this.value;
           var oText=document.getElementById('input2');
           oText.value=name;
        };
    }
};



</script>

<div id = "input">
<?php if(isset($_GET['error'])) : ?>
<div class = "error"><?php echo $_GET['error'];?></div>>
<?php endif; ?>
<form method = "post" action = "delete.php">

<input id="input2" type="text" name ="message"placeholder = "enter a file name"/>
<br />

<br />
<input class="shout-btn"type="submit" name ="submit" value = "delete"/>
</form>

</div>
</div>


<div class ="child">

  <div class = "title">Upload C Code</div>
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<div id = "input">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input class="shout-btn"<input type="submit" name="submit" value="Submit" />
</form>
</div>
</div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
