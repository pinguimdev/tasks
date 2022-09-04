<?php if($milestone && $currentWorkspace): ?>
    <form class="" method="post" action="<?php if(auth()->guard('web')->check()): ?><?php echo e(route('projects.milestone.update',[$currentWorkspace->slug,$milestone->id])); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.projects.milestone.update',[$currentWorkspace->slug,$milestone->id])); ?><?php endif; ?>">
        <?php echo csrf_field(); ?>
         <div class="modal-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="milestone-title" class="col-form-label"><?php echo e(__('Milestone Title')); ?></label>
                    <input type="text" class="form-control form-control-light" id="milestone-title" placeholder="<?php echo e(__('Enter Title')); ?>" value="<?php echo e($milestone->title); ?>" name="title" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="milestone-status" class="col-form-label"><?php echo e(__('Status')); ?></label>
                    <select class="form-control select2" name="status" id="milestone-status" required>
                        <option value="incomplete" <?php if($milestone->status=='incomplete'): ?> selected <?php endif; ?>><?php echo e(__('Incomplete')); ?></option>
                        <option value="complete" <?php if($milestone->status=='complete'): ?> selected <?php endif; ?>><?php echo e(__('Complete')); ?></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="milestone-title" class="col-form-label"><?php echo e(__('Milestone Cost')); ?></label>
            <div class="form-icon-user">
                <span class="currency-icon bg-primary"><?php echo e((!empty($currentWorkspace->currency)) ? $currentWorkspace->currency : '$'); ?></span>
                <input type="number" class="form-control form-control-light currency_input" id="milestone-title" placeholder="<?php echo e(__('Enter Cost')); ?>" value="<?php echo e($milestone->cost); ?>" min="0" name="cost" required>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
           <div class="form-group ">
               <label class="form-label"><?php echo e(__('Start Date')); ?></label>
       
             
            <div class="input-group date ">
            <input class="form-control datepicker22" type="text" id="start_date" name="start_date" value="<?php echo e($milestone->start_date); ?>" autocomplete="off">
             <span class="input-group-text">
                 <i class="feather icon-calendar"></i>
            </span>
        </div>
      </div>
      </div>
         <div class="col-md-6">
              <div class="form-group">
               <label class="form-label"><?php echo e(__('End Date')); ?></label>   
            <div class="input-group date ">
           <input class="form-control datepicker23" type="text" id="end_date" name="end_date" value="<?php echo e($milestone->end_date); ?>" autocomplete="off" >
             <span class="input-group-text">
                 <i class="feather icon-calendar"></i>
            </span>
        </div>
        </div>
    </div>
</div>

        <div class="form-group col-md-12">
            <label for="task-summary" class="col-form-label"><?php echo e(__('Summary')); ?></label>
            <textarea class="form-control form-control-light" id="task-summary" rows="3" name="summary"><?php echo e($milestone->summary); ?></textarea>
        </div>


         <div class="col-md-12">
            <div class="form-group">
                  <label for="task-summary" class="col-form-label"><?php echo e(__('Progress')); ?></label>
                <input type="range" class="slider w-100 mb-0 " name="progress" id="myRange" value="<?php echo e(($milestone->progress)?$milestone->progress:'0'); ?>" min="0" max="100" oninput="ageOutputId.value = myRange.value">
                <output name="ageOutputName" id="ageOutputId"><?php echo e(($milestone->progress)?$milestone->progress:"0"); ?></output>
                %
            </div>
        </div>
     </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">
        </div>
    </form>
<?php else: ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body p-4">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>404</h1>
                        <div class="page-description">
                            <?php echo e(__('Page Not Found')); ?>

                        </div>
                        <div class="page-search">
                            <p class="text-muted mt-3"><?php echo e(__("It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. Here's a little tip that might help you get back on track.")); ?></p>
                            <div class="mt-3">
                                <a class="btn-return-home badge-blue" href="<?php echo e(route('home')); ?>"><i class="fas fa-reply"></i> <?php echo e(__('Return Home')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<script>
     (function () {
        const d_week = new Datepicker(document.querySelector('.datepicker22'), {
            buttonClass: 'btn',
            todayBtn: true,
            clearBtn: true,
            format: 'yyyy-mm-dd',
        });
    })();
</script>

<script>
     (function () {
        const d_week = new Datepicker(document.querySelector('.datepicker23'), {
            buttonClass: 'btn',
            todayBtn: true,
            clearBtn: true,
            format: 'yyyy-mm-dd',
        });
    })();
</script>
<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/projects/milestoneEdit.blade.php ENDPATH**/ ?>