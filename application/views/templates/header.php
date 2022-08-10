<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$user_loggin_in  = is_logged_in();
$user_id = (isset($_SESSION['user_id']) && ($_SESSION['user_id']) != '') ? ($_SESSION['user_id']) : '';
?>
<div class="row">
    <div class="col-sm-4 ">
        <img class="Logo_img" src="../../../images/guest-book.png">
    </div>
    <div class="col-sm-8 text-right">
        <?php if ($user_loggin_in) { ?>
            <div class="person_logged text-end">
                <input name="user_id" class="invisible" value="<?php echo $user_id; ?>" />
                
                <?php 
                $WhereClause=array(
                    'id'=>$user_id,
                    'IsActive'=>1
                );

                $user_name = $this->MGuestBook->get_single_field_from_table('username','users',$WhereClause); ?>
                <p><?php echo lang('hello') . " " . ucfirst($user_name); ?> | <a class="white" href="/logout">Log Out</a></p>
            </div>
        <?php } ?>
    </div>
</div>