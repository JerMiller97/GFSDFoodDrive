    <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
  <a class="navbar-brand mr-0 mr-md-2" href="/" >North Pole
</a>

  <div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
	
<?php 
session_start();

if ($_SESSION["PermissionLevel"] == 9)
?>

	<li class="nav-item">
        <a class="nav-link " href="/Family/">Families</a>
</li>



      <li class="nav-item">
        <a class="nav-link active" href="/Santa/">Santa</a>
      </li>
	  	  <li class="nav-item">
        <a class="nav-link " href="/DeliveryDay/">Delivery Day</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/GiftWorld/">Gift World</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/FoodWorld/">Food World</a>
      </li>      

	  	  <li class="nav-item">
        <a class="nav-link " href="/LiveDashboards/">Dashboards</a>
      </li>

    </ul>
  </div>

  <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
    
Hello, <?php 
echo " " .ucwords($_SESSION["user"]);?>



  </ul>

  <a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="/logout.php">Logout</a>
</header>