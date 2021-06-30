

<div class="view_product_box">

<h2>View Users</h2>
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
   <th>Name</th>
   <th>Email</th>
   <th>Image</th>
   
   <th>Status</th>
   <th>Delete</th>
   
  </tr>
 </thead>
 
 <?php 
 $all_users = mysqli_query($con,"select * from users order by id DESC ");
 
 $i = 1;
 
 while($row=mysqli_fetch_array($all_users)){
 ?>
 
 <tbody>
  <tr>
   <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['id'];?>" /></td>
   <td><?php echo $i; ?></td>
   <td><?php echo $row['name']; ?></td>
   <td><?php echo $row['email']; ?></td>
   <td>
   <?php if($row['image'] !=''){ ?>
   <img src="../upload-files/<?php echo $row['image']; ?>" width="70" height="50" />
   
   <?php }else{ ?>
   <img src="../images/profile-icon.png" width="70" height="50" />
   
   <?php } ?>
   
   </td>
   
   <td>
   <?php 
   if($row['visible'] == 1){
    echo "Approved";
   }else{
    echo "Pending";
   }
   ?>
   </td><!-- / status -->
   <td><a href="index.php?action=view_users&delete_user=<?php echo $row['id'];?>">Delete</a></td>
   
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
// Delete User Account

if(isset($_GET['delete_user'])){
  $delete_user = mysqli_query($con,"delete from users where id='$_GET[delete_user]' ");
  
  if($delete_user){
  echo "<script>alert('User Account has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_users','_self')</script>";
  
  }
}

// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($con,"delete from users where id='$key'");
  
  if($run_remove){
  echo "<script>alert('Items selected have been removed successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_users','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";
  }
  }
}
 ?>



