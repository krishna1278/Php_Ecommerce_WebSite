

    <div class="form_box">

	 <form action="" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="100%">
	     
		 <tr>
		   <td colspan="7">
		   <h2>Add Brand</h2>
		   <div class="border_bottom"></div><!--/.border_bottom -->
		   </td>
		 </tr>
		 
		 <tr>
		   <td><b>Add New Brand:</b></td>
		   <td><input type="text" name="product_brand" size="60" required/></td>
		 </tr>	 
		
		<tr>
		   <td></td>
		   <td colspan="7"><input type="submit" name="insert_brand" value="Add Brand"/></td>
		</tr>
	   </table>
	   
	 </form>
	 
  </div><!-- /.form_box -->

<?php 

if(isset($_POST['insert_brand'])){   
   
   $product_brand = mysqli_real_escape_string($con,$_POST['product_brand']);
   
   $insert_brand = mysqli_query($con,"insert into brands (brand_title) values ('$product_brand') ");
   
   if($insert_brand){
    echo "<script>alert('Product brand has been inserted successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>








