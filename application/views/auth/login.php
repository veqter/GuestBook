<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-sm-12 ">
        <?php
        $msg = $this->session->flashdata('flash_msgSuccess');
        if ($msg) {
            echo '<div class="alert alert-success">' . $msg . '</div>';
        }
        $msgFail = $this->session->flashdata('flash_msgFail');
        if ($msgFail) {
            echo '<div class="alert alert-danger">' . $msgFail . '</div>';
        }
        ?>

        <h2><?php echo lang('log_in'); ?></h2>

        <div class="row">
            <div class="col-sm-6 ">
                <?php echo form_open(base_url() . 'login'); ?>
                <div class="form-group">
                    <?php
                    echo form_error('username');
                    echo form_label(lang('username'));
                    echo form_input(array(
                        'id' => 'username',
                        'name' => 'username',
                        'class' => 'form-control',
                        'placeholder' => lang('username_placeholder'),
                        'value' => (isset($login_data['username']) && $login_data['username'] != '') ? $login_data['username'] : '',
                        'maxlength' => '50'
                    ));
                    ?>
                </div>

                <div class="form-group">
                    <?php
                    echo form_error('password');
                    echo form_label(lang('password'));
                    echo form_input(array(
                        'id' => 'password',
                        'name' => 'password',
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' => lang('password_placeholder'),
                        'maxlength' => '50'
                    ));
                    ?>
                </div>
                <div>
                    <?php echo form_submit('submit', lang('log_in'), array('class' => 'btn btn-primary')); ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>