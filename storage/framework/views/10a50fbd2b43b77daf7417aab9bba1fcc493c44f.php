<form class="" method="post" action="<?php echo e(route('contract_type.store',[$currentWorkspace->slug])); ?>">
    <?php echo csrf_field(); ?>
<div class="modal-body">
    
    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('name', __('Contract Type Name'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::text('name', '', array('class' => 'form-control','required'=>'required'))); ?>

        </div>
    </div>             
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
</div>
    
</form><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/contracts/contracttype_create.blade.php ENDPATH**/ ?>