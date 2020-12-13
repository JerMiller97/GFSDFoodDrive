<?php
session_start();
include 'checkauth.php';
?>
<html>
  <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
    <nav class="bd-links" id="bd-docs-nav">
      <div class="bd-toc-item">
        <h3 class="bd-toc-link">
          Delivery Day Tools 
        </h3>
      </div>  
      <div class="bd-toc-item">
        <a class="bd-toc-link" href="/DeliveryDay/DeliveryFamily.php">
          All Families
        </a>
      </div>
      <div class="bd-toc-item">
        <a class="bd-toc-link" href="/DeliveryDay/AddressPrint.php">
          Address Printout
        </a>
      </div>
      <div class="bd-toc-item">
        <a class="bd-toc-link" href="/DeliveryDay/DeliveryStatus.php">
          Delivery Status
        </a>
      </div>
    </nav>
  </div> 
</html>