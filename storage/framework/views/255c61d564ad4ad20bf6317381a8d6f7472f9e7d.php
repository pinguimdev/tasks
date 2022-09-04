<?php echo e(Form::open(['url' => route('project.timesheet.store', ['slug' => $currentWorkspace->slug, 'project_id' => $parseArray['project_id']]), 'id' => 'project_form'])); ?>

 <div class="modal-body">
<input type="hidden" name="project_id" value="<?php echo e($parseArray['project_id']); ?>">
<input type="hidden" name="task_id" value="<?php echo e($parseArray['task_id']); ?>">
<input type="hidden" name="date" value="<?php echo e($parseArray['date']); ?>">
<input type="hidden" id="totaltasktime" value="<?php echo e($parseArray['totaltaskhour'] . ':' . $parseArray['totaltaskminute']); ?>">

<div class="form-group">
    <label class="col-form-label"><?php echo e(__('Project')); ?></label>
    <input type="text" class="form-control" value="<?php echo e($parseArray['project_name']); ?>" disabled="disabled">
</div>

<div class="form-group">
    <label class="col-form-label"><?php echo e(__('Task')); ?></label>
    <input type="text" class="form-control" value="<?php echo e($parseArray['task_name']); ?>" disabled="disabled">
</div>

<div class="row">
    <div class="col-md-12">
        <label for="time" class="col-form-label"><?php echo e(__('Time')); ?></label>
    </div>
    <div class="col-md-6">
        <select class="form-control select2" name="time_hour" id="time_hour" required="">
            <option value=""><?php echo e(__('Hours')); ?></option>

            <?php for ($i = 0; $i < 23; $i++) { $i = $i < 10 ? '0' . $i : $i; ?>

            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>

            <?php } ?>

        </select>
    </div>

    <div class="col-md-6">
        <select class="form-control select2" name="time_minute" id="time_minute" required>
            <option value=""><?php echo e(__('Minutes')); ?></option>

            <?php for ($i = 0; $i < 61; $i += 10) { $i = $i < 10 ? '0' . $i : $i; ?>

            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>

            <?php } ?>

        </select>
    </div>
</div>

<div class="form-group">
    <label for="description"><?php echo e(__('Description')); ?></label>
    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
</div>

<div class="display-total-time">
    <i class="fas fa-clock"></i>
    <span><?php echo e(__('Total Time')); ?> : <?php echo e($parseArray['totaltaskhour'] . ' ' . __('Hours') . ' ' . $parseArray['totaltaskminute'] . ' ' . __('Minutes')); ?></span>
</div>

</div>
<div class="modal-footer">
   <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
<input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/projects/timesheet-create.blade.php ENDPATH**/ ?>