<?php

session_start();

include 'checkauth.php';



?>

<html>

        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">

<nav class="bd-links" id="bd-docs-nav"><div class="bd-toc-item">
      <h3 class="bd-toc-link">
        Santa's Tools 
      </h3>

    </div>
	<div class="bd-toc-item">
      <a class="bd-toc-link" href="/Santa/AdminAllFamily.php">
        All Families
    </a>
    </div>
	
	<div class="bd-toc-item">
		<a class="bd-toc-link" href="/Santa/NumberAssignment.php">
		Family # Assignment
		</a>
    </div>

	<div class="bd-toc-item">
		<a class="bd-toc-link" href="/Santa/Duplicates.php">
		Potential Duplicates
		</a>
    </div>
	
	<div class="bd-toc-item">
		<a class="bd-toc-link" href="/Santa/AddUsers.php">
		Add Users
		</a>
    </div>
	
    </nav>

        </div> 
		
		</html>