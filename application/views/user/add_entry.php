<h2><?php echo lang('new_entry'); ?></h2>
<div class="row">
    <div class="col-sm-6 ">
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
        <?php echo form_open(base_url() . 'user/add_entry/'); ?>
        <div class="form-group">
            <?php
            echo form_error('new_entry');
            echo form_textarea(array(
                'id' => 'new_entry',
                'name' => 'new_entry',
                'class' => 'form-control',
                'placeholder' => lang('new_entry_placeholder'),
                'value' => (isset($new_entry) && $new_entry != '') ? $new_entry : '',
                'maxlength' => '1000'
            ));
            ?>
        </div>
        <?php echo form_submit('submit', lang('new_entry'), array('class' => 'btn btn-primary')); ?>
        <?php echo form_close(); ?>
    </div>

</div>

<hr>
<table id="myTable" class="display">

    <?php if (isset($is_admin) && $is_admin) : ?>
        <thead>
            <tr>
                <th>Entry Text</th>
                <th>User Name</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ListEntries as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['text']; ?></td>
                    <td><?php echo $value['username']; ?></td>
                    <td><?php echo $value['date']; ?></td>
                    <td><a title="" data-toggle="tooltip" href="/user/delete_entry/<?php echo $value['id']; ?>" data-original-title="edit page"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></a>

                    </td>

                </tr>

            <?php } ?>
        </tbody>
    <?php else : ?>
        <thead>
            <tr>
                <th>Entry Text</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ListEntries as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['text']; ?></td>
                    <td><?php echo $value['date']; ?></td>

                </tr>

            <?php } ?>
        </tbody>
    <?php endif; ?>
</table>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>