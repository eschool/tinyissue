<h3>
    <?= HTML::link(URL::to('administration/roles/add'), __('eschool.add_new_role'),array('class' => 'btn btn-success add-new-role')); ?>
    <?php echo __('eschool.roles'); ?>
    <span><?php echo __('eschool.roles_description'); ?></span>
</h3>

<table class="table table-condensed table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($roles as $role):?>
            <tr>
               <td><?= $role->name; ?></td>
               <td><?= $role->role; ?></td>
               <td><?= $role->description; ?></td>
               <td>
                   <a href="<?php echo URL::to('administration/roles/edit/' . $role->id);?>" class="icon-pencil"><?php echo __('eschool.edit'); ?></a>
                   <a href="<?php echo URL::to('administration/roles/delete/' . $role->id);?>" onClick="return confirm('<?php echo __('eschool.delete_role_confirm'); ?>');" class="icon-remove"><?php echo __('eschool.delete'); ?></a>
               </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>
