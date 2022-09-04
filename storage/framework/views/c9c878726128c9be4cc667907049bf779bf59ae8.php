<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-10">
        <div class="container">
            <div class="d-block d-sm-flex align-items-center justify-content-end">
                <div class="col-auto pe-0">
                    <a href="<?php echo e(route('contract.download.pdf',[$currentWorkspace->slug,\Crypt::encrypt($contract->id)])); ?>" target="_blanks" class="btn btn-sm btn-primary btn-icon-only width-auto" title="<?php echo e(__('Download')); ?>" ><i class="ti ti-download"></i> <?php echo e(__('Download')); ?></a>
                </div>
            </div>
            <div class="card mt-5" id="printTable" >
                <div class="card-body">
                    <div class="">
                        <div class="col-auto pe-0 mb-3 ">
                            <img src="<?php echo e(asset(Storage::url('logo/'.$company_logo))); ?>" style="max-width: 150px;"/>
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
                            <div class="col-lg-6 col-md-8">
                                <h6 class="d-inline-block m-0 d-print-none"><?php echo e(__('Contract Value:')); ?></h6>
                                <span class="col-md-8"><span class="text-md"><?php echo e($currentWorkspace->priceFormat($contract->value)); ?></span></span>
                            </div>
                            <div class="col-lg-6 col-md-8 mt-3">
                                <h6 class="d-inline-block m-0 d-print-none"><?php echo e(__('Contract :')); ?></h6>
                                <span class="col-md-8"><span class="text-md"><?php echo e(App\Models\Utility::contractNumberFormat($contract->id)); ?></span></span>
                            </div>
                            <div class="col-lg-6 col-md-8 mt-3">
                                <h6 class="d-inline-block m-0 d-print-none"><?php echo e(__('Contract Type  :')); ?></h6>
                                <span class="col-md-8"><span class="text-md"><?php echo e($contract->contract_type->name); ?></span></span>
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <div>
                                <div class="float-end">
                                    <div class="">
                                        <h6 class="d-inline-block m-0 d-print-none"><?php echo e(__('Start Date   :')); ?></h6>
                                        <span class="col-md-8"><span class="text-md"><?php echo e(App\Models\Utility::dateFormat($contract->start_date)); ?></span></span>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="d-inline-block m-0 d-print-none"><?php echo e(__('End Date   :')); ?></h6>
                                        <span class="col-md-8"><span class="text-md"><?php echo e(App\Models\Utility::dateFormat($contract->end_date)); ?></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p data-v-f2a183a6="">
                        
                        <div><?php echo $contract->contract_description; ?></div>
                        <div class=""><?php echo $contract->description; ?></div>
                    </p>
                
                    <div class="row">
                        <div class="col-6" style="width: 300px;">
                            <div>
                                <img width="200px" src="<?php echo e($contract->company_signature); ?>" >
                            </div>
                            <div>
                                <h5 class="mt-4"><?php echo e(__('Company Signature')); ?></h5>
                            </div>
                        </div> 
                        <div class="col-6 text-end">
                            <div>
                                <img width="150px" src="<?php echo e($contract->client_signature); ?>" >
                            </div>
                            <div>
                                <h5 class="mt-auto"><?php echo e(__('Client Signature')); ?></h5>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.invoicepayheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/contracts/contract_view.blade.php ENDPATH**/ ?>