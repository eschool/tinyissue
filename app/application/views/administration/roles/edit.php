<h3>
  <?php echo __('eschool.update_role'); ?>
  <span><?php echo __('eschool.update_role_description'); ?></span>
</h3>

<form method="post" action="" class="form-horizontal">
    <?= Eschool\Form::control_group(__('eschool.role_form_name'), Form::text('name', Input::old('name', $role->name), $attributes = array())); ?>
    <?= $errors->first('name', '<span class="error">:message</span>'); ?>

    <?= Eschool\Form::control_group(__('eschool.role_form_role'), Form::text('role', Input::old('role', $role->role))); ?>
    <?= $errors->first('role', '<span class="error">:message</span>'); ?>

    <?= Eschool\Form::control_group(__('eschool.role_form_description'), Form::textarea('description', Input::old('description', $role->description))); ?>

    <?= Eschool\Form::control_group('', Eschool\Form::submit(__('eschool.update_role')), false); ?>

    <?php echo Form::token(); ?>
</form>
