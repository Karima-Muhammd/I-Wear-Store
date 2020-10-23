<?php if(isset($error_message) and $error_message!=''):
?>
<div>
    <h6 class="alert alert-danger text-center mt-1" >
        <?php echo $error_message;  ?></h6>
</div>
<?php endif;?>

<?php if(isset($success_message) and $success_message!=''):
    ?>
    <div class="col-md-9 offset-md-2">
    <h6 class="alert alert-success text-center" ><?php echo $success_message;  ?></h6>
    </div>
<?php endif;?>