<form class="" method="post" action="<?php echo e(route('invoices.store',[$currentWorkspace->slug])); ?>">
    <?php echo csrf_field(); ?>
     <div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="project_id" class="col-form-label"><?php echo e(__('Projects')); ?></label>
            <select class="form-control select2" name="project_id" id="project_id">
                <option value=""><?php echo e(__('Select Project')); ?></option>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div> 
        <div class="form-group col-md-6">
            <label for="discount" class="col-form-label"><?php echo e(__('Discount')); ?></label>
            <div class="form-icon-user">
                <span class="currency-icon bg-primary"><?php echo e((!empty($currentWorkspace->currency)) ? $currentWorkspace->currency : '$'); ?></span>
                <input class="form-control currency_input" type="number" min="0" id="discount" name="discount" placeholder="<?php echo e(__('Enter Discount')); ?>" value="0">
            </div>
        </div>
    <!--     <div class="form-group col-md-6">
            <label for="issue_date" class="col-form-label"><?php echo e(__('Issue Date')); ?></label>
            <input class="form-control datepicker" type="text" id="issue_date" name="issue_date" autocomplete="off" required="required">
        </div>
 -->
        <div class="form-group col-md-6">
              <label for="issue_date" class="col-form-label"><?php echo e(__('Issue Date')); ?></label>  
            <div class="input-group date ">
            <input class="form-control datepicker" type="text" id="issue_date" name="issue_date"  autocomplete="off" required="required">
             <span class="input-group-text">
                 <i class="feather icon-calendar"></i>
            </span>
        </div>
      </div>

        <div class="form-group col-md-6">
              <label for="due_date" class="col-form-label"><?php echo e(__('Due Date')); ?></label>  
            <div class="input-group date ">
            <input class="form-control datepicker2" type="text" id="due_date" name="due_date"  autocomplete="off" required="required">
             <span class="input-group-text">
                 <i class="feather icon-calendar"></i>
            </span>
        </div>
      </div>

        <div class="form-group col-md-6">
            <label for="tax_id" class="col-form-label"><?php echo e(__('Tax')); ?>%</label>
            <select class="form-control select2" name="tax_id" id="tax_id">
                <option value=""><?php echo e(__('Select Tax')); ?></option>
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="client_id" class="col-form-label"><?php echo e(__('Client')); ?></label>
            <select class="form-control select2" name="client_id" id="client_id">
                <option value=""><?php echo e(__('Select Client')); ?></option>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?> - <?php echo e($p->email); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">

        </div>
  
</form>

<script>
     (function () {
        const d_week = new Datepicker(document.querySelector('.datepicker2'), {
            buttonClass: 'btn',
            todayBtn: true,
            clearBtn: true,
             format: 'yyyy-mm-dd',
        });
    })();
</script>

<script>
     (function () {
        const d_week = new Datepicker(document.querySelector('.datepicker'), {
            buttonClass: 'btn',
            todayBtn: true,
            clearBtn: true,
             format: 'yyyy-mm-dd',
        });
    })();
</script><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/invoices/create.blade.php ENDPATH**/ ?>