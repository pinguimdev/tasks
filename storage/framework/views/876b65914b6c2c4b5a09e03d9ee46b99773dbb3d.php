<?php if($project && $currentWorkspace): ?>

    <form class="" method="post" action="<?php if(auth()->guard('web')->check()): ?><?php echo e(route('projects.milestone.store',[$currentWorkspace->slug,$project->id])); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.projects.milestone.store',[$currentWorkspace->slug,$project->id])); ?><?php endif; ?>">
        <?php echo csrf_field(); ?>
         <div class="modal-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="milestone-title" class="col-form-label"><?php echo e(__('Milestone Title')); ?></label>
                    <input type="text" class="form-control form-control-light" id="milestone-title" placeholder="<?php echo e(__('Enter Title')); ?>" name="title" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="milestone-status" class="col-form-label"><?php echo e(__('Status')); ?></label>
                    <select class="form-control select2" name="status" id="milestone-status" required>
                        <option value="incomplete"><?php echo e(__('Incomplete')); ?></option>
                        <option value="complete"><?php echo e(__('Complete')); ?></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="milestone-title" class="col-form-label"><?php echo e(__('Milestone Cost')); ?></label>
            <div class="form-icon-user">
                <span class="currency-icon bg-primary"><?php echo e((!empty($currentWorkspace->currency)) ? $currentWorkspace->currency : '$'); ?></span>
                <input type="number" class="form-control currency_input form-control-light" id="milestone-title" placeholder="<?php echo e(__('Enter Cost')); ?>" min="0" name="cost" value="0" required>
            </div>
        </div>
        <div class="form-group">
            <label for="task-summary" class="col-form-label"><?php echo e(__('Summary')); ?></label>
            <textarea class="form-control form-control-light" id="task-summary" rows="3" name="summary"></textarea>
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
<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/projects/milestone.blade.php ENDPATH**/ ?>