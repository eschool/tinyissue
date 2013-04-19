<h3>
  <?php echo __('eschool.add_new_role'); ?>
</h3>

<form method="post" action="" class="form-horizontal">
    <?= Eschool\Form::control_group(__('eschool.role_form_name'), Form::text('name', Input::old('name'), $attributes = array())); ?>
    <?= $errors->first('name', '<span class="error">:message</span>'); ?>

    <?= Eschool\Form::control_group(__('eschool.role_form_role'), Form::text('role', Input::old('role'))); ?>
    <?= $errors->first('role', '<span class="error">:message</span>'); ?>

    <?= Eschool\Form::control_group(__('eschool.role_form_description'), Form::textarea('description', Input::old('description'))); ?>

    <?= Eschool\Form::control_group('', Eschool\Form::submit(__('eschool.add_role')), false); ?>

    <?php echo Form::token(); ?>
</form>
