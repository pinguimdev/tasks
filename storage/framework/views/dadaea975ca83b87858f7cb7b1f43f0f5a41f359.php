<form class="" method="post" action="<?php echo e(route('users.update',[$currentWorkspace->slug,$user->id])); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('post'); ?>
    <div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="name" class="col-form-label"><?php echo e(__('Name')); ?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>"/>
        </div>
         <div class="col-md-12">
            <label for="email" class="col-form-label"><?php echo e(__('Email')); ?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>"/>
        </div>
        </div>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <input type="submit" value="<?php echo e(__('Save Changes' )); ?>" class="btn  btn-primary">
        </div>
    
</form>


<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/users/edit.blade.php ENDPATH**/ ?>