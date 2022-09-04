<?php if($project && $currentWorkspace && $bug): ?>

    <form class="" method="post" action="<?php if(auth()->guard('web')->check()): ?><?php echo e(route('projects.bug.report.update',[$currentWorkspace->slug,$project->id,$bug->id])); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.projects.bug.report.update',[$currentWorkspace->slug,$project->id,$bug->id])); ?><?php endif; ?>">
        <?php echo csrf_field(); ?>
         <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-8">
                <label class="col-form-label"><?php echo e(__('Title')); ?></label>
                <input type="text" class="form-control" id="task-title" placeholder="<?php echo e(__('Enter Title')); ?>" name="title" value="<?php echo e($bug->title); ?>" required>
            </div>

            <div class="form-group col-md-4">
                <label for="task-priority" class="col-form-label"><?php echo e(__('Priority')); ?></label>
                <select class="form-control select2" name="priority" id="task-priority" required>
                    <option value="Low" <?php if($bug->priority=='Low'): ?> selected <?php endif; ?>><?php echo e(__('Low')); ?></option>
                    <option value="Medium" <?php if($bug->priority=='Medium'): ?> selected <?php endif; ?>><?php echo e(__('Medium')); ?></option>
                    <option value="High" <?php if($bug->priority=='High'): ?> selected <?php endif; ?>><?php echo e(__('High')); ?></option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="assign_to" class="col-form-label"><?php echo e(__('Assign To')); ?></label>
                <select class="form-control select2" id="assign_to" name="assign_to" required>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($bug->assign_to==$u->id): ?> selected <?php endif; ?> value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?> - <?php echo e($u->email); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="status" class="col-form-label"><?php echo e(__('Status')); ?></label>
                <select class="form-control select2" id="status" name="status" required>
                    <?php $__currentLoopData = $arrStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($bug->status==$id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e(__($status)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-md-12 mb-0">
                <label for="task-description" class="col-form-label"><?php echo e(__('Description')); ?></label>
                <textarea class="form-control" id="task-description" rows="3" name="description"><?php echo e($bug->description); ?></textarea>
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
<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/projects/bug_report_edit.blade.php ENDPATH**/ ?>