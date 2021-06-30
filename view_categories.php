

<div class="view_product_box">

<h2>View Categories</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data" />

<div class="search_bar">
  <input type="text" id="search" placeholder="Type to search..." />
</div>

<table width="100%">
 <thead>
  <tr>
   <th><input type="checkbox" id="checkAll" />Check</th>
   <th>ID</th>
   <th>Category Title</th>   
   <th>Status</th>
   <th>Delete</th>
   <th>Edit</th>
  </tr>
 </thead>
 
 <?php 
 $all_categories = mysqli_query($con,"select * from categories order by cat_id DESC ");
 
 $i = 1;
 
 while($row=mysqli_fetch_array($all_categories)){
 ?>
 
 <tbody>
  <tr>
   <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['cat_id'];?>" /></td>
   <td><?php echo $i; ?></td>
   <td><?php echo $row['cat_title']; ?></td>
   
   <td>
   <?php 
   if($row['visible'] == 1){
    echo "Approved";
   }else{
    echo "Pending";
   }
   ?>
   </td><!-- / status -->
   <td><a href="index.php?action=view_cat&delete_cat=<?php echo $row['cat_id'];?>">Delete</a></td>
   <td><a href="index.php?action=edit_cat&cat_id=<?php echo $row['cat_id'];?>">Edit</a></td>
  </tr>
 </tbody>
 
 <?php $i++;} // End while loop ?>
 
<tr>
<td><input type="submit" name="delete_all" value="Remove" /></td>
</tr> 
</table>

</form>

</div><!-- /.view_product_box -->

<?php
// Delete Category

if(isset($_GET['delete_cat'])){
  $delete_cat = mysqli_query($con,"delete from categories where cat_id='$_GET[delete_cat]' ");
  
  if($delete_cat){
  echo "<script>alert('Product category has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_cat','_self')</script>";
  
  }
}

// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($con,"delete from categories where cat_id='$key'");
  
  if($run_remove){
  echo "<script>alert('Items selected have been removed successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_cat','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";
  }
  }
}
 ?>



