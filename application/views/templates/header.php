<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php
$user_loggin_in  = is_logged_in();
$user_id = (isset($_SESSION['user_id']) && ($_SESSION['user_id']) != '') ? ($_SESSION['user_id']) : '';
?>
<div class="row">
    <div class="col-sm-4 float-left padding-topbottom">
        <img class="Logo_img" src="../../../images/guest-book.png">
    </div>
    <div class="col-sm-8 float-right zeroPaddingTopBottom text-end">
        <ul id="nav" class="list-inline">
            <?php if ($user_loggin_in) { ?>
                <!-- login header -->
                <?php
                $is_admin  = check_if_admin($user_id);
                if ($is_admin) {
                ?>
                    <li class="topnav">
                        <a class="btn btn-primary" href="admin">Admin</a>
                    </li>
                <?php } ?>
              
                </li>
            <?php } else { ?>
                <!-- logout header -->
                
            <?php } ?>
        </ul>
        <?php if ($user_loggin_in) { ?>
            <div class="person_logged text-end">
                <input name="user_id" class="invisible" value="<?php echo $user_id; ?>" />
                <?php $user_name = $this->Mprofile->get_user_name($user_id); ?>
                <p><?php echo lang('template_header_hello') . " " . ucfirst($user_name); ?> | <a class="white" href="/logout">Log Out</a></p>
            </div>
        <?php } ?>
    </div>
</div>