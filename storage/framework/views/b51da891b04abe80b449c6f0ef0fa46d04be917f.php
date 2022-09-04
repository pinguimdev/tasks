<?php
    $client_keyword = Auth::user()->getGuard() == 'client' ? 'client.' : '';
?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($contract->subject); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/dropzone.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('links'); ?>
<?php if(\Auth::guard('client')->check()): ?>   
<li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php else: ?>
 <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php endif; ?>
 <?php if(\Auth::guard('client')->check()): ?>  
<li class="breadcrumb-item"><a href="<?php echo e(route($client_keyword.'contracts.index',$currentWorkspace->slug)); ?>"><?php echo e(__('Contracts')); ?></a></li>
 <?php else: ?>
 <li class="breadcrumb-item"><a href="<?php echo e(route($client_keyword.'contracts.index',$currentWorkspace->slug)); ?>"><?php echo e(__('Contracts')); ?></a></li> <?php endif; ?> 
<li class="breadcrumb-item"><?php echo e(__('Contract Detail')); ?></li>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="row align-items-center m-1">
        <?php if($currentWorkspace->permission == 'Owner'): ?>
            <div class="col-auto p-0 w-auto ">
                <a href="<?php echo e(route('send.mail.contract',[$currentWorkspace->slug,$contract->id])); ?>" class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Send Email')); ?>">
                    <i class="ti ti-mail text-white"></i>
                </a>
            </div>
        <?php endif; ?>
         <?php if($currentWorkspace->permission == 'Owner'): ?>
            <div class="col-auto pe-0">
                <a href="#" class="btn btn-sm btn-primary btn-icon" data-url="<?php echo e(route('contracts.copy',[$currentWorkspace->slug,$contract->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Duplicate Contract')); ?>" data-size="lg" title="<?php echo e(__('Duplicate')); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="ti ti-files"></i>
                </a>
            </div>
        <?php endif; ?>
         <?php if($currentWorkspace->permission == 'Owner' || \Auth::user()->getGuard() == 'client'): ?>
            <div class="col-auto pe-0">
                <a href="<?php echo e(route('contract.download.pdf',[$currentWorkspace->slug,\Crypt::encrypt($contract->id)])); ?>" class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Download')); ?>" target="_blanks"><i class="ti ti-download"></i></a>
            </div>
        <?php endif; ?>
        <?php if($currentWorkspace->permission == 'Owner' || \Auth::user()->getGuard() == 'client'): ?>
            <div class="col-auto pe-0">
                <a href="<?php echo e(route('get.contract',[$currentWorkspace->slug,$contract->id])); ?>" target="_blank" class="btn btn-sm btn-primary btn-icon" title="<?php echo e(__('Preview')); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="ti ti-eye"></i>
                </a>
            </div>
        <?php endif; ?>

        <?php if($currentWorkspace->permission == 'Owner' && $contract->company_signature == null ||\Auth::user()->getGuard() == 'client' && $contract->client_signature == null): ?>

            <div class="col-auto pe-0">
                <a href="#" class="btn btn-sm btn-primary btn-icon" data-url="<?php echo e(route($client_keyword.'signature',[$currentWorkspace->slug,$contract->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create Signature')); ?>" data-size="md" title="<?php echo e(__('Signature')); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
                    <i class="ti ti-pencil"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                           <div class="card sticky-top" style="top:30px">
                            <div class="list-group list-group-flush" id="useradd-sidenav">
                                <a href="#general" class="list-group-item list-group-item-action border-0"><?php echo e(__('General')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#attachments" class="list-group-item list-group-item-action border-0 "><?php echo e(__('Attachment')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#comment" class="list-group-item list-group-item-action border-0"><?php echo e(__('Comment')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#notes" class="list-group-item list-group-item-action border-0"><?php echo e(__('Notes')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            </div>
                        </div>
                </div>

                <div class="col-xl-9">
                    <div id="general">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="card">
                                            <div class="card-body" style="min-height: 205px;">
                                                <div class="theme-avtar bg-primary">
                                                    <i class="ti ti-user-plus"></i>
                                                </div>
                                                <h6 class="mb-3 mt-4"><?php echo e(__('Attachment')); ?></h6>
                                                    <h3 class="mb-0"><?php echo e(count($contract->files)); ?></h3>
                                                <h3 class="mb-0"></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card">
                                            <div class="card-body" style="min-height: 205px;">
                                                <div class="theme-avtar bg-info">
                                                    <i class="ti ti-click"></i>
                                                </div>
                                                <h6 class="mb-3 mt-4"><?php echo e(__('Comment')); ?></h6>
                                                <h3 class="mb-0"><?php echo e(count($contract->comment)); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card">
                                            <div class="card-body" style="min-height: 205px;">
                                                <div class="theme-avtar bg-warning">
                                                    <i class="ti ti-file"></i>
                                                </div>
                                                <h6 class="mb-3 mt-4 "><?php echo e(__('Notes')); ?></h6>
                                                <h3 class="mb-0"><?php echo e(count($contract->note)); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-5">
                                <div class="card report_card total_amount_card">
                                    <div class="card-body pt-0" style="margin-bottom: -30px; margin-top: -10px;">
                                        
                                        <address class="mb-0 text-sm">
                                            <dl class="row mt-4 align-items-center">
                                                <dt class="col-sm-4 h6 text-sm"><?php echo e(__('Name')); ?></dt>
                                                <dd class="col-sm-8 text-sm"> <?php echo e($contract->clients->name); ?></dd>

                                                <dt class="col-sm-4 h6 text-sm"><?php echo e(__('Project')); ?></dt>
                                                <dd class="col-sm-8 text-sm"><?php echo e(!empty( $contract->projects)?$contract->projects->name:''); ?></dd>

                                                <dt class="col-sm-4 h6 text-sm"><?php echo e(__('Subject')); ?></dt>
                                                <dd class="col-sm-8 text-sm"> <?php echo e($contract->subject); ?></dd>

                                                <dt class="col-sm-4 h6 text-sm"><?php echo e(__('Value')); ?></dt>
                                                <dd class="col-sm-8 text-sm"><?php echo e($currentWorkspace->priceFormat($contract->value)); ?> </dd>

                                                <dt class="col-sm-4 h6 text-sm"><?php echo e(__('Type')); ?></dt>
                                                <dd class="col-sm-8 text-sm"><?php echo e($contract->contract_type->name); ?></dd>

                                                <dt class="col-sm-4 h6 text-sm"><?php echo e(__('Start Date')); ?></dt>
                                                <dd class="col-sm-8 text-sm"><?php echo e(App\Models\Utility::dateFormat($contract->start_date)); ?></dd>

                                                <dt class="col-sm-4 h6 text-sm"><?php echo e(__('End Date')); ?></dt>
                                                <dd class="col-sm-8 text-sm"><?php echo e(App\Models\Utility::dateFormat($contract->end_date)); ?></dd>
                                            </dl>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Description ')); ?></h5>
                            </div>
                            <div class="card-body p-3">
                                <?php echo e(Form::open(['route' => [$client_keyword.'contract.contract_description.store', [$currentWorkspace->slug,$contract->id]]])); ?>

                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                            <textarea class="tox-target pc-tinymce-2" name="contract_description"  id="summernote" rows="8"><?php echo $contract->contract_description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-end">
                                        <div class="form-group mt-3 me-3">

                                            <?php if(\Auth::user()->getGuard() == 'client'): ?>

                                              <?php if($contract->status == 'on'): ?>
                                                <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn  btn-primary'])); ?>

                                              <?php else: ?>
                                               -
                                              <?php endif; ?>

                                             <?php else: ?>
                                              <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn  btn-primary'])); ?>


                                             <?php endif; ?>

                                      
                                        </div>
                                    </div>

                                      <?php echo e(Form::close()); ?>

                                
                            </div>
                        </div>
                    </div>

                    <div id="attachments" >
                        <div class="row ">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Attachments')); ?></h5>
                                    </div>
                                    <div class="card-body">

                                      <?php if(\Auth::guard('client')->check()): ?> 


                                           <?php if($contract->status == 'on'): ?>
                                                 <div class=" ">
                                                     <div class="col-md-12 dropzone browse-file" id="dropzonewidget">
                                                        <div class="dz-message" data-dz-message>
                                                            <span>
                                                                <?php if(Auth::user()->getGuard() == 'client'): ?>
                                                                    <?php echo e(__('No files available')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(__('Drop files here to upload')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                     </div>
                                                </div>
                                            <?php endif; ?>    
                                      <?php else: ?>
                                        <div class=" ">
                                             <div class="col-md-12 dropzone browse-file" id="dropzonewidget">
                                                <div class="dz-message" data-dz-message>
                                                    <span>
                                                        <?php if(Auth::user()->getGuard() == 'client'): ?>
                                                            <?php echo e(__('No files available')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(__('Drop files here to upload')); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                             </div>
                                        </div>
                                      <?php endif; ?>
                                    <div class="col-md-12 mt-3">
                                        <div class="list-group list-group-flush mb-0" id="attachments">
                                                <?php $__currentLoopData = $contract->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card mb-3 border shadow-none">
                                            <div class="px-3 py-3">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h6 class="text-sm mb-0">
                                                            <a href="#!"><?php echo e($file->files); ?></a>
                                                        </h6>
                                                        <p class="card-text small text-muted">
                                                            <?php echo e(number_format(\File::size(storage_path('contract_attechment/' . $file->files)) / 1048576, 2) . ' ' . __('MB')); ?>

                                                        </p>
                                                    </div>
                                                    <div class="action-btn bg-warning p-0 w-auto    ">
                                                        <a href="<?php echo e(asset(Storage::url('contract_attechment')) . '/' . $file->files); ?>"
                                                            class=" btn btn-sm d-inline-flex align-items-center"
                                                            download="" data-bs-toggle="tooltip" title="Download">
                                                        <span class="text-white"><i class="ti ti-download"></i></span>
                                                        </a>
                                                    </div>
                                               <?php if(\Auth::guard('client')->check()): ?> 

                                               <?php if($contract->status == 'on' && \Auth::user()->id == $file->client_id): ?>

                                                         <div class="col-auto actions">
                                                        <div class="action-btn bg-danger ms-2">
                                                            <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($file->id); ?>" title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><span class="text-white"><i class="ti ti-trash"></i></span></a>
            
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => [$client_keyword.'contracts.file.delete', [$currentWorkspace->slug,$file->id]], 'id' => 'delete-form-' . $file->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        </div>   
                                                    </div>
                                                    <?php endif; ?>
                                                 
                                                <?php else: ?>

                                                 <div class="col-auto actions">
                                                        <div class="action-btn bg-danger ms-2">
                                                            <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($file->id); ?>" title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><span class="text-white"><i class="ti ti-trash"></i></span></a>
            
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => [$client_keyword.'contracts.file.delete', [$currentWorkspace->slug,$file->id]], 'id' => 'delete-form-' . $file->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        </div>   
                                                    </div>

                                                <?php endif; ?>   

                                               
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                        </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                    <div  id="comment" >
                        <div class="row pt-2">
                            <div class="col-12">
                                <div id="comment">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Comments')); ?></h5>
                                        </div>
                                        <div class="card-footer">

                                            <?php if(\Auth::guard('client')->check()): ?> 
                                                 <?php if($contract->status == 'on'): ?>


                                                <div class="col-12 d-flex">
                                                     <div class="form-group mb-0 form-send w-100">
                                                    <form method="post" class="card-comment-box" id="form-comment" action="<?php echo e(route($client_keyword.'comment_store.store', [$currentWorkspace->slug,$contract->id])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <textarea rows="1" class="form-control" name="comment" placeholder="Add a comment..." ></textarea><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension>

                                                         <button id=""  type="submit" class="btn btn-send"><i class="f-16 text-primary ti ti-brand-telegram">
                                                         </i>
                                                         </button>
                                                      </form>
                                                </div>
                                               
                                                </div>

                                                 <?php endif; ?>

                                            <?php else: ?>

                                                   <div class="col-12 d-flex">
                                                <div class="form-group mb-0 form-send w-100">
                                                    <form method="post" class="card-comment-box" id="form-comment" action="<?php echo e(route($client_keyword.'comment_store.store', [$currentWorkspace->slug,$contract->id])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <textarea rows="1" class="form-control" name="comment" placeholder="Add a comment..." ></textarea><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension>

                                                         <button id=""  type="submit" class="btn btn-send"><i class="f-16 text-primary ti ti-brand-telegram">
                                                    </i>
                                                </button>
                                                    </form>
                                                </div>
                                               
                                            </div>

                                            <?php endif; ?>     
                                        
                                     
                                                <div class="">

                                                    <div class="list-group list-group-flush mb-0" id="comments">
                                                        <?php $__currentLoopData = $contract->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="list-group-item ">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <a href="#" class="img-fluid rounded-circle card-avatar">
                                                       
                                                                  
                                                                  <img class="avatar-sm rounded-circle img-thumbnail" width="" style="max-width: 30px; max-height: 30px;"
                                                                  <?php if($comment->user_id != '' && $comment->user_id != null): ?>

                                                                  <?php if($comment->user->avatar): ?> src="<?php echo e(asset('/storage/avatars/'.$comment->user->avatar)); ?>"
                                                                   <?php else: ?> 
                                                                   avatar="<?php echo e($comment->user->name); ?>"
                                                                    <?php endif; ?>
                                                                    alt="<?php echo e($comment->user->name); ?>"

                                                                  <?php else: ?> 


                                                                  <?php if($comment->client->avatar): ?> src="<?php echo e(asset('/storage/avatars/'.$comment->client->avatar)); ?>"
                                                                   <?php else: ?> 
                                                                   avatar="<?php echo e($comment->client->name); ?>"
                                                                    <?php endif; ?>




                                                                   alt="<?php echo e($comment->client->name); ?>" <?php endif; ?> />
                                                                    </a>



                                                                </div>
                                                                <div class="col ml-n2">
                                                                    <p class="d-block h6 text-sm font-weight-light mb-0 text-break"><?php echo e($comment->comment); ?></p>
                                                                    <small class="d-block"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                                                                </div>
                                                               
                                                                <?php if(\Auth::guard('client')->check()): ?> 

                                                                     <?php if($contract->status == 'on' && \Auth::user()->id == $comment->client_id): ?>
                                                                      <div class="col-auto">
                                                                                <a href="<?php echo e(route($client_keyword.'comment_store.destroy',[$currentWorkspace->slug,$comment->id])); ?>" class="action-btn btn-danger mx-1 mt-1 btn btn-sm d-inline-flex align-items-center" title="<?php echo e(__('Delete')); ?>"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                                                            </div>
                                                                      <?php endif; ?>

                                                                <?php else: ?>

                                                                       <div class="col-auto">
                                                                            <a href="<?php echo e(route($client_keyword.'comment_store.destroy',[$currentWorkspace->slug,$comment->id])); ?>" class="action-btn btn-danger mx-1 mt-1 btn btn-sm d-inline-flex align-items-center" title="<?php echo e(__('Delete')); ?>"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                                                        </div>

                                                                 <?php endif; ?>   
                                                             
                                                            </div>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                           </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="notes">
                        <div class="row pt-2">
                            <div class="col-12">
                                <div id="">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Notes')); ?></h5>
                                        </div>



                                        <div class="card-body">

                                        <?php if(\Auth::guard('client')->check()): ?> 
                                                 <?php if($contract->status == 'on'): ?>
                                                    <div class="col-12 d-flex">
                                                        <div class="form-group mb-0 form-send w-100">
                                                            <form method="post" class="card-note-box" id="form-note" action="<?php echo e(route($client_keyword.'note_store.store', [$currentWorkspace->slug,$contract->id])); ?>">
                                                                <?php echo csrf_field(); ?>

                                                                <textarea rows="1" class="form-control" name="notes" data-toggle="autosize" placeholder="Add a note..." spellcheck="false"></textarea><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension>

                                                                  <button id="" type="submit" class="btn btn-send"><i class="f-16 text-primary ti ti-brand-telegram">
                                                                    </i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                   <?php endif; ?> 
                                        <?php else: ?>

                                            <div class="col-12 d-flex">
                                                        <div class="form-group mb-0 form-send w-100">
                                                            <form method="post" class="card-note-box" id="form-note" action="<?php echo e(route($client_keyword.'note_store.store', [$currentWorkspace->slug,$contract->id])); ?>">
                                                                <?php echo csrf_field(); ?>

                                                                <textarea rows="1" class="form-control" name="notes" data-toggle="autosize" placeholder="Add a note..." spellcheck="false"></textarea><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 1;" class="cGcvT"></grammarly-extension>

                                                                  <button id="" type="submit" class="btn btn-send"><i class="f-16 text-primary ti ti-brand-telegram">
                                                                    </i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>

                                        <?php endif; ?>




                                            <div class="list-group list-group-flush mb-0" id="comments">
                                                <?php $__currentLoopData = $contract->note; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                                                    <div class="list-group-item ">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <a href="#" class="img-fluid rounded-circle card-avatar">
                                                                <img class="avatar-sm rounded-circle img-thumbnail" width="" style="max-width: 30px; max-height: 30px;"
                                                                   <?php if($note->user_id != '' && $note->user_id != null): ?>

                                                                  <?php if($note->user->avatar): ?> src="<?php echo e(asset('/storage/avatars/'.$note->user->avatar)); ?>"
                                                                   <?php else: ?> 
                                                                   avatar="<?php echo e($note->user->name); ?>"
                                                                    <?php endif; ?>
                                                                    alt="<?php echo e($note->user->name); ?>"
                                                               <?php else: ?> 


                                                                   <?php if($note->client->avatar): ?> src="<?php echo e(asset('/storage/avatars/'.$note->client->avatar)); ?>"
                                                                   <?php else: ?> 
                                                                   avatar="<?php echo e($note->client->name); ?>"
                                                                    <?php endif; ?>
                                                                   alt="<?php echo e($note->client->name); ?>" 

                                                                <?php endif; ?> />
                                                                </a>
                                                            </div>
                                                            <div class="col ml-n2">
                                                                <p class="d-block h6 text-sm font-weight-light mb-0 text-break"><?php echo e($note->notes); ?></p>
                                                                <small class="d-block"><?php echo e($note->created_at->diffForHumans()); ?></small>
                                                            </div>
                                                           
                                                            



                                                            <?php if(\Auth::guard('client')->check()): ?> 

                                                                     <?php if($contract->status == 'on' && \Auth::user()->id == $note->client_id): ?>
                                                                     <div class="col-auto">
                                                                        <a href="<?php echo e(route($client_keyword.'note_store.destroy',[$currentWorkspace->slug,$note->id])); ?>" class="action-btn btn-danger mx-1 mt-1 btn btn-sm d-inline-flex align-items-center" title="<?php echo e(__('Delete')); ?>"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                                                    </div>
                                                                      <?php endif; ?>

                                                            <?php else: ?>

                                                                       <div class="col-auto">
                                                                            <a href="<?php echo e(route($client_keyword.'note_store.destroy',[$currentWorkspace->slug,$note->id])); ?>" class="action-btn btn-danger mx-1 mt-1 btn btn-sm d-inline-flex align-items-center" title="<?php echo e(__('Delete')); ?>"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                                                        </div>

                                                             <?php endif; ?>   




                                                         
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


 <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>

    
<script src="<?php echo e(asset('custom/js/dropzone.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        if ($(".pc-tinymce-2").length) {
            tinymce.init({
                selector: '.pc-tinymce-2',
                height: "400",
                content_style: 'body { font-family: "Inter", sans-serif; }'
            });
        }
    </script>
    <script>

  Dropzone.autoDiscover = true;
        myDropzone = new Dropzone("#dropzonewidget", {
            maxFiles: 20,
            maxFilesize: 209715200,
            parallelUploads: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.doc,.txt",
            url: "<?php echo e(route($client_keyword.'contracts.file.upload',[$currentWorkspace->slug, $contract->id])); ?>",
            success: function (file, response) {
                location.reload();
                if (response.is_success) {
                    dropzoneBtn(file, response);
                } else {
                    myDropzone.removeFile(file);
                    show_toastr('<?php echo e(__("Error")); ?>', response.error, 'error');
                }
            },
            error: function (file, response) {
                myDropzone.removeFile(file);
                if (response.error) {
                    show_toastr('<?php echo e(__("Error")); ?>', response.error, 'error');
                } else {
                    show_toastr('<?php echo e(__("Error")); ?>', response.error, 'error');
                }
            }
        });
        myDropzone.on("sending", function (file, xhr, formData) {
            formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
            formData.append("contract_id", <?php echo e($contract->id); ?>);
        });

        function dropzoneBtn(file, response) {
            var download = document.createElement('a');
            download.setAttribute('href', response.download);
            download.setAttribute('class', "action-btn btn-primary mx-1 mt-1 btn btn-sm d-inline-flex align-items-center");
            download.setAttribute('data-toggle', "tooltip");
            download.setAttribute('data-original-title', "<?php echo e(__('Download')); ?>");
            download.innerHTML = "<i class='fas fa-download'></i>";

            var del = document.createElement('a');
            del.setAttribute('href', response.delete);
            del.setAttribute('class', "action-btn btn-danger mx-1 mt-1 btn btn-sm d-inline-flex align-items-center");
            del.setAttribute('data-toggle', "tooltip");
            del.setAttribute('data-original-title', "<?php echo e(__('Delete')); ?>");
            del.innerHTML = "<i class='ti ti-trash'></i>";

            del.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                if (confirm("Are you sure ?")) {
                    var btn = $(this);
                    $.ajax({
                        url: btn.attr('href'),
                        data: {_token: $('meta[name="csrf-token"]').attr('content')},
                        type: 'DELETE',
                        success: function (response) {
                            if (response.is_success) {
                                btn.closest('.dz-image-preview').remove();
                            } else {
                                show_toastr('<?php echo e(__("Error")); ?>', response.error, 'error');
                            }
                        },
                        error: function (response) {
                            response = response.responseJSON;
                            if (response.is_success) {
                                show_toastr('<?php echo e(__("Error")); ?>', response.error, 'error');
                            } else {
                                show_toastr('<?php echo e(__("Error")); ?>', response.error, 'error');
                            }
                        }
                    })
                }
            });

            var html = document.createElement('div');
            html.setAttribute('class', "text-center mt-10");
            html.appendChild(download);
            html.appendChild(del);

            file.previewTemplate.appendChild(html);
        }
    </script> 


    <script>
        $(document).on('click', '#comment_submit', function (e) {
                    var curr = $(this);

                    var comment = $.trim($("#form-comment textarea[name='comment']").val());

                    if (comment != '') {
                        $.ajax({
                            url: $("#form-comment").data('action'),
                            data: {comment: comment, "_token": "<?php echo e(csrf_token()); ?>",},
                            type: 'POST',
                            success: function (data) {
                                location.reload();
                                data = JSON.parse(data);
                               
                                var html = "<div class='list-group-item px-0'>" +
                                    "                    <div class='row align-items-center'>" +
                                    "                        <div class='col-auto'>" +
                                    "                            <a href='#' class='avatar avatar-sm rounded-circle ms-2'>" +
                                    "                                <img src="+data.default_img+" alt='' class='avatar-sm rounded-circle'>" +
                                    "                            </a>" +
                                    "                        </div>" +
                                    "                        <div class='col ml-n2'>" +
                                    "                            <p class='d-block h6 text-sm font-weight-light mb-0 text-break'>" + data.comment + "</p>" +
                                    "                            <small class='d-block'>"+data.current_time+"</small>" +
                                    "                        </div>" +
                                    "                        <div class='action-btn bg-danger me-4'><div class='col-auto'><a href='#' class='mx-3 btn btn-sm  align-items-center delete-comment' data-url='" + data.deleteUrl + "'><i class='ti ti-trash text-white'></i></a></div></div>" +
                                    "                    </div>" +
                                    "                </div>";

                                $("#comments").prepend(html);
                                $("#form-comment textarea[name='comment']").val('');
                                load_task(curr.closest('.task-id').attr('id'));
                                show_toastr('success', 'Comment Added Successfully!');
                            },
                            error: function (data) {
                                show_toastr('error', 'Some Thing Is Wrong!');
                            }
                        });
                    } else {
                        show_toastr('error', 'Please write comment!');
                    }
                });
                $(document).on("click", ".delete-comment", function () {
                    var btn = $(this);

                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {comment: comment, "_token": "<?php echo e(csrf_token()); ?>",},
                        success: function (data) {
                            load_task(btn.closest('.task-id').attr('id'));
                            show_toastr('success', 'Comment Deleted Successfully!');
                            btn.closest('.list-group-item').remove();
                        },
                        error: function (data) {
                            data = data.responseJSON;
                            if (data.message) {
                                show_toastr('error', data.message);
                            } else {
                                show_toastr('error', 'Some Thing Is Wrong!');
                            }
                        }
                    });
                });
    </script>


    <script>
        $(document).on('click', '#note_submit', function (e) {
                    var curr = $(this);

                    var note = $.trim($("#form-note textarea[name='notes']").val());

                    if (note != '') {
                        $.ajax({
                            url: $("#form-note").data('action'),
                            data: {note: note, "_token": "<?php echo e(csrf_token()); ?>",},
                            type: 'POST',
                            success: function (data) {
                                location.reload();
                                data = JSON.parse(data);
                                console.log(data);
                                var html = "<div class='list-group-item px-0'>" +
                                    "                    <div class='row align-items-center'>" +
                                    "                        <div class='col-auto'>" +
                                    "                            <a href='#' class='avatar avatar-sm rounded-circle ms-2'>" +
                                    "                                <img src="+data.default_img+" alt='' class='avatar-sm rounded-circle'>" +
                                    "                            </a>" +
                                    "                        </div>" +
                                    "                        <div class='col ml-n2'>" +
                                    "                            <p class='d-block h6 text-sm font-weight-light mb-0 text-break'>" + data.note + "</p>" +
                                    "                            <small class='d-block'>"+data.current_time+"</small>" +
                                    "                        </div>" +
                                    "                        <div class='action-btn bg-danger me-4'><div class='col-auto'><a href='#' class='mx-3 btn btn-sm  align-items-center delete-note' data-url='" + data.deleteUrl + "'><i class='ti ti-trash text-white'></i></a></div></div>" +
                                    "                    </div>" +
                                    "                </div>";

                                $("#comments").prepend(html);
                                $("#form-note textarea[name='notes']").val('');
                                load_task(curr.closest('.task-id').attr('id'));
                                show_toastr('success', 'note Added Successfully!');
                            },
                            error: function (data) {
                                show_toastr('error', 'Some Thing Is Wrong!');
                            }
                        });
                    } else {
                        show_toastr('error', 'Please write Note!');
                    }
                });
                $(document).on("click", ".delete-note", function () {
                    var btn = $(this);

                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {note: note, "_token": "<?php echo e(csrf_token()); ?>",},
                        success: function (data) {
                            load_task(btn.closest('.task-id').attr('id'));
                            show_toastr('success', 'note Deleted Successfully!');
                            btn.closest('.list-group-item').remove();
                        },
                        error: function (data) {
                            data = data.responseJSON;
                            if (data.message) {
                                show_toastr('error', data.message);
                            } else {
                                show_toastr('error', 'Some Thing Is Wrong!');
                            }
                        }
                    });
                });
    </script>

<?php $__env->stopPush(); ?>

    
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/contracts/show.blade.php ENDPATH**/ ?>