
<?php if(isset($error_msg) and $error_msg!=''):
?>
<div >
    <h6 class="alert alert-danger text-center mt-1" >
        <?php echo $error_msg;  ?></h6>
</div>
<?php endif;?>

<?php if(isset($success_msg) and $success_msg!=''):
    ?>
    <div class="col-md-9 offset-md-2">
    <h6 class="alert alert-success text-center" ><?php echo $success_msg;  ?></h6>
    </div>
<?php endif;?>