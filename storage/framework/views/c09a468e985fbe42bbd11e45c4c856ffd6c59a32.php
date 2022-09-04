<form class="" method="post" action="<?php echo e(route('contracts.store',[$currentWorkspace->slug])); ?>">
    <?php echo csrf_field(); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6 form-group">
            <?php echo e(Form::label('client_id', __('Client Name'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('client_id', $client, null, ['class' => 'form-control client_id','id' => 'client_id', 'data-toggle' => 'select', 'required' => 'required'])); ?>

        </div>  
        <div class="col-md-6 form-group">
            <?php echo e(Form::label('project', __('Project'), ['class' => 'col-form-label'])); ?>

            <div class="project-div"> 
                <?php echo e(Form::select('project_id', $projects, null, ['class' => 'form-control', 'id' => 'project','placeholder' => __('Select Projects'), 'name' => 'project','required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6 form-group">
            <?php echo e(Form::label('subject', __('Subject'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::text('subject', '', array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="col-md-6 form-group">
            <?php echo e(Form::label('value', __('Value'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::number('value', '', array('class' => 'form-control','required'=>'required','min' => '1'))); ?>

        </div>
        
        <div class="form-group col-md-6">
            <?php echo e(Form::label('start_date', __('Start Date'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::date('start_date', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('end_date', __('Due Date'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::date('end_date', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('type', __('Type'),['class'=>'col-form-label'])); ?>

            <?php echo Form::select('type', $contractType, null,array('class' => 'form-select','required'=>'required')); ?>

            <?php if(count($contractType) <= 0): ?>
                <div class="text-muted text-xs">
                    <?php echo e(__('Please create new contract type')); ?> <a href="<?php echo e(route('contract_type.index')); ?>"><?php echo e(__('here')); ?></a>.
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('description', __('Description'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::textarea('description', '', array('class' => 'form-control'))); ?>

            </div>
        </div>

         <div class="col-md-12 form-group">
                <label class="col-form-label"><?php echo e(__('Status')); ?></label>
                <div class="d-flex radio-check">
                    <div class="custom-control custom-radio custom-control-inline m-1">
                        <input class="form-check-input" type="radio" id="on" value="on" name="status">
                        <label class="form-check-labe" for="pre"><?php echo e(__('Start')); ?></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline m-1">
                        <input class="form-check-input" type="radio" id="off" value="off" name="status">
                        <label class="form-check-labe" for="post"><?php echo e(__('Close')); ?></label>
                    </div>
                </div>
            </div>



    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary ms-2">
</div>

</form>




        
<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/contracts/create.blade.php ENDPATH**/ ?>