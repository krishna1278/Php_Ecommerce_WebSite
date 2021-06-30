

    <div class="form_box">

	 <form action="" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="100%">
	     
		 <tr>
		   <td colspan="7">
		   <h2>Add Category</h2>
		   <div class="border_bottom"></div><!--/.border_bottom -->
		   </td>
		 </tr>
		 
		 <tr>
		   <td><b>Add New Cateogry:</b></td>
		   <td><input type="text" name="product_cat" size="60" required/></td>
		 </tr>	 
		
		<tr>
		   <td></td>
		   <td colspan="7"><input type="submit" name="insert_cat" value="Add Category"/></td>
		</tr>
	   </table>
	   
	 </form>
	 
  </div><!-- /.form_box -->

<?php 

if(isset($_POST['insert_cat'])){   
   
   $product_cat = mysqli_real_escape_string($con,$_POST['product_cat']);
   
   $insert_cat = mysqli_query($con,"insert into categories (cat_title) values ('$product_cat') ");
   
   if($insert_cat){
    echo "<script>alert('Product category has been inserted successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>








