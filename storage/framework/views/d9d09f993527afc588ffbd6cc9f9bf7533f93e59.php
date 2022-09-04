<?php $__env->startSection('page-title'); ?> <?php echo e(__('Contract Type')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
<?php if(\Auth::guard('client')->check()): ?>   
<li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php else: ?>
 <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php endif; ?>
<li class="breadcrumb-item"> <?php echo e(__('Contract Type')); ?></li>
 <?php $__env->stopSection(); ?>


<?php $__env->startSection('action-button'); ?>
    <?php if(auth()->guard('web')->check()): ?>
        <?php if($currentWorkspace->creater->id == Auth::user()->id): ?>
             <a href="#" class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Create Contract Type')); ?>" data-toggle="tooltip" title="<?php echo e(__('Create Contract Type')); ?>" data-url="<?php echo e(route('contract_type.create',$currentWorkspace->slug)); ?>">
                    <i class="ti ti-plus"></i>
             </a>
           
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-hover mb-0 animated" id="selection-datatable">
                                <thead>
                                
                                <th data-sortable="" style="width: 82.97%;"><?php echo e(__('Contract Type')); ?></th>
                                <?php if(auth()->guard('web')->check()): ?>
                                <th width="250px" data-sortable="" style="width: 17.03%;"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                                </thead>
                                <tbody>
                                  <?php $__currentLoopData = $contractTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       
                                         <td>
                                           <?php echo e($contractType->name); ?>

                                        </td>
                                 
                                        <?php if(auth()->guard('web')->check()): ?>
                                            <td class="text-right">
                                                <a href="#" class="action-btn btn-info  btn btn-sm d-inline-flex align-items-center" data-url="<?php echo e(route('contract_type.edit',[$currentWorkspace->slug,$contractType->id])); ?>" data-size="md" data-toggle="tooltip" title="<?php echo e(__('Edit Contract Type')); ?>"  data-ajax-popup="true" data-title="<?php echo e(__('Edit Contract Type')); ?>">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <a href="#" class="action-btn btn-danger  btn btn-sm d-inline-flex align-items-center bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"  data-confirm-yes="delete-form-<?php echo e($contractType->id); ?>" data-toggle="tooltip" title="<?php echo e(__('Delete Contract Type')); ?>">
                                                    <i class="ti ti-trash"></i>
                                                </a>

                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['contract_type.destroy',[$currentWorkspace->slug,$contractType->id]],'id'=>'delete-form-'.$contractType->id]); ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/contracts/contract_type.blade.php ENDPATH**/ ?>