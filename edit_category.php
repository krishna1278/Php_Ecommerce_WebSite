
<?php 
$edit_cat = mysqli_query($con,"select * from categories where cat_id='$_GET[cat_id]'");

$fetch_cat = mysqli_fetch_array($edit_cat);

?>


    <div class="form_box">

	 <form action="" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="100%">
	     
		 <tr>
		   <td colspan="7">
		   <h2>Edit Category</h2>
		   <div class="border_bottom"></div><!--/.border_bottom -->
		   </td>
		 </tr>
		 
		 <tr>
		   <td><b>Edit Cateogry:</b></td>
		   <td><input type="text" name="product_cat" value="<?php echo $fetch_cat['cat_title']; ?>" size="60" required/></td>
		 </tr>	 
		
		<tr>
		   <td></td>
		   <td colspan="7"><input type="submit" name="edit_cat" value="Save"/></td>
		</tr>
	   </table>
	   
	 </form>
	 
  </div><!-- /.form_box -->

<?php 

if(isset($_POST['edit_cat'])){   
   
   $cat_title = mysqli_real_escape_string($con,$_POST['product_cat']);
   
   $edit_cat = mysqli_query($con,"update categories set cat_title='$cat_title' where cat_id='$_GET[cat_id]'");
   
   if($edit_cat){
    echo "<script>alert('Product category was updated successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>








