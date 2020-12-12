<?php

session_start();



?>

<html>

<!-- Bootstrap core CSS -->
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/floating-labels.css" rel="stylesheet">
<link href="/css/docs.css" rel="stylesheet">



<form class="form-signin" method="post" action="/auth.php">

<?php 
if (isset($_GET['error'])) {
$error = $_GET['error'];};

if ($error == 1)
	print "

<div class=\"alert alert-danger\" role=\"alert\">
  You don't have permission to view this page.
</div>
";
?>

 <div class="text-center mb-4">
<a class="h1" tabindex="-1" href="/">North Pole
</a>
        <h1 class="h4"><br>
GFSD Food Drive<br>
		Family Management System</h1>
        <p><i>Please Sign In</i>
		</p>
      </div>
  <div class="form-group">
    <label>Username</label>
    <input tabindex="1" type="text" name="username" class="form-control" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input tabindex="2" type="password" name="password" class="form-control" placeholder="Enter Password">
  </div>
<br>
    <div class="col-auto my-1">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<br>
</html>