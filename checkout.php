

<!------------ Header starts --------------------->
<?php include('includes/header.php'); ?>
<!------------ Header ends ----------------------->

<!------------ Content wrapper starts -------------->
  <div class="content_wrapper">	  
	    
	  <?php 	  
      if(!isset($_SESSION['user_id'])){
	     include('login.php');
	  }else{
	    include('payment.php');
	  } 
	  
	  ?>  
	
	
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  
  <?php include ('includes/footer.php'); ?>
  
  
