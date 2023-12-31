
<?php
include 'lib/Session.php';
include 'inc/header.php';
include 'lib/Database.php';


?> 
<?php 
    Session::init();
    $msg=Session::get();
    if(!empty($msg)){
        echo '<h2 class="alert alert-info">'.$msg.'</h2>';
        //unset($_SESSION['$msg']);
        Session::unset();
    }
?>
<div class="panel panel-default">
<div class="panel-heading">
    <h2>Student List <a class=" btn btn-primary pull-right" href="addstudent.php">Add Student Data</a></h2>
</div>
<div class="pannel-body">
<table class="table table-striped">
<tr>
    <th>Serial</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Action</th>
</tr>
<?php

    $db       = new Database();
    $table    = "tbl_student";
    $order_by = array('order_by' => 'id DESC');

    $studentData = $db->select($table,$order_by);

    if(!empty($studentData)){
        $i=0;
        foreach($studentData as $data) { $i++; ?>    
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data['name']?></td>
    <td><?php echo $data['email']?></td>
    <td><?php echo $data['phone']?></td>
    <td>
        <a class="btn btn-success" href="editstudent.php?id=<?php echo $data['id']?>">Edit</a>
        <a class="btn btn-danger" href="lib/process_student.php?action=delete&id=<?php echo $data['id']?>" onclick="return confirm('Are you sure want to delete?')">Delete</a>
    </td>
</tr>
<?php }} else{ ?>
    <tr><td colspan="5"><h2>No Student Data Found....</h2></td></tr>
<?php }?>
    </table>
</div>
</div>
<?php
    include 'inc/footer.php';
?> 
