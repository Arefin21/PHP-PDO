<?php
include 'inc/header.php';
include 'lib/Database.php';
?> 
<div class="panel panel-default">
<div class="panel-heading">
    <h2>Update Student<a class="btn btn-success pull-right" href="index.php">Back</a></h2>
</div>
    <?php

        $id=$_GET['id'];
        $db= new Database();
        $table="tbl_student";
        $wherecond=array(
            'where'=>array('id'=>$id),
            'return_type'=>'single'
        );
        $getData= $db->select($table,$wherecond);
        if(!empty($getData)){
        
    ?>
    <div class="pannel-body">
    <form action="lib/process_student.php" method="post">
        <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $getData['name'];?>" required="1"/>
        </div>

        <div class="form-group">
            <label for="email">Student Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $getData['email'];?>" required="1"/>
        </div>

        <div class="form-group">
            <label for="phone">Student Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $getData['phone'];?>" required="1"/>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $getData['id']?>"/>
            <input type="hidden" name="action" value="edit"/>
            <input type="submit" class="btn btn-primary" name="submit" value="Update Student"/>
        </div>
    </form>
</div>
<?php } ?>
</div>
<?php
    include 'inc/footer.php';
?> 