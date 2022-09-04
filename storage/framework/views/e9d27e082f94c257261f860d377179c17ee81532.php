<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
$setting = App\Models\Utility::getAdminPaymentSetting();
if ($setting['color']) {
    $color = $setting['color'];
}

?>
<?php $__env->startSection('links'); ?>
<?php if(\Auth::guard('client')->check()): ?>   
<li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php else: ?>
 <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php endif; ?>
<li class="breadcrumb-item"> <?php echo e(__('Setting')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
      <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card sticky-top" style="top:30px">
                            <div class="list-group list-group-flush" id="useradd-sidenav">
                                <a href="#site-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Site Setting')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a> 
                                <a href="#email-settings" class="list-group-item list-group-item-action border-0 "><?php echo e(__('Email Setting')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <a href="#payment-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Payment Setting')); ?>  <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <a href="#pusher-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Pusher Setting')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <a href="#recaptcha-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('ReCaptcha Setting')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                               
                         
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                       
                         <div id="site-settings" class="">
                           
                             <?php echo e(Form::open(['route'=>'settings.store','method'=>'post', 'enctype' => 'multipart/form-data'])); ?>

                             <div class="row">
                            <div class="col-4">
                            <div class="card ">
                            <div class="card-header">
                                <h5><?php echo e(__('Favicon')); ?></h5>
                              
                            </div>
                            <div class="card-body">
                                     <div class="logo-content">
                                        <img src="<?php echo e(asset(Storage::url('logo/favicon.png'))); ?>" class="small_logo" id="favicon" style="width: 90px !important;" />
                                    </div>
                                    <div class="choose-file mt-5 ">
                                        <label for="small-favicon">

                                            <div class=" bg-primary"> <i class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?></div>
                                            <input type="file" class="form-control" name="favicon" id="small-favicon" data-filename="edit-favicon">
                                        </label>
                                        <p class="edit-favicon"></p>
                                    </div>
                               
                            </div>
                            </div>
                        </div>
                         <div class="col-4">
                            <div class="card ">
                            <div class="card-header">
                                <h5><?php echo e(__('Dark Logo')); ?></h5>
                              
                            </div>
                            <div class="card-body">
                                     <div class="logo-content">
                                        <img src="<?php echo e(asset(Storage::url('logo/logo-light.png'))); ?>" id="dark_logo" class="small_logo"/>
                                    </div>
                                    <div class="choose-file mt-5 ">
                                        <label for="logo_blue">

                                            <div class=" bg-primary"> <i class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?></div>
                                            <input type="file" class="form-control" name="logo_blue" id="logo_blue" data-filename="edit-logo_blue">
                                        </label>
                                        <p class="edit-logo_blue"></p>
                                    </div>
                               
                            </div>
                            </div>
                        </div>
                         <div class="col-4">
                            <div class="card ">
                            <div class="card-header">
                                <h5><?php echo e(__('Light Logo')); ?></h5>
                              
                            </div>
                            <div class="card-body">
                                     <div class="logo-content">
                                        <img src="<?php echo e(asset(Storage::url('logo/logo-dark.png'))); ?>" id="image"  class="small_logo"/>
                                    </div>
                                    <div class="choose-file mt-5 ">
                                        <label for="logo_white">

                                            <div class=" bg-primary"> <i class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?></div>
                                            <input type="file" class="form-control" name="logo_white" id="logo_white" data-filename="edit-logo_white">
                                        </label>
                                        <p class="edit-logo_white"></p>
                                    </div>
                               
                            </div>
                            </div>
                        </div>
                             <div class="col-12">
                              <div class="card ">
                            <div class="card-header">
                                <h5><?php echo e(__('Settings')); ?></h5>
                            
                            </div>
                            <div class="card-body">
                                    <div class="row mt-2">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <?php echo e(Form::label('app_name',__('App Name'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::text('app_name',env('APP_NAME'),array('class'=>'form-control','placeholder'=>__('App Name')))); ?>

                                            <?php $__errorArgs = ['app_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-app_name" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                            <?php echo e(Form::label('footer_text',__('Footer Text'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::text('footer_text',env('FOOTER_TEXT'),array('class'=>'form-control','placeholder'=>__('Footer Text')))); ?>

                                            <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-footer_text" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                                  <?php echo e(Form::label('default_language',__('Default Language'),array('class'=>'form-label'))); ?>

                                            <div class="changeLanguage">
                                                <select name="default_language" id="default_language" class="form-control select2">
                                                    <?php $__currentLoopData = $workspace->languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($lang); ?>" <?php if(env('DEFAULT_LANG') == $lang): ?> selected <?php endif; ?>>
                                                            <?php echo e(Str::upper($lang)); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 ">
                                                   <div class="col switch-width">
                                                        <div class="form-group ml-2 mr-3">
                                                           <label class="form-label mb-1"><?php echo e(__('Landing Page Display')); ?></label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="display_landing" id="display_landing" <?php echo e(!empty(env('DISPLAY_LANDING')) && env('DISPLAY_LANDING') == 'on' ? 'checked="checked"' : ''); ?>>
                                                                 <label class="custom-control-label mb-1" for="status"></label>
                                                            </div>      
                                                        </div>
                                                    </div>
                                                </div>
                                              <div class="col-3">
                                                   <div class="col switch-width">
                                                        <div class="form-group ml-2 mr-3 ">
                                                            <label class="form-label mb-1"><?php echo e(__('RTL')); ?></label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="site_rtl" id="site_rtl" <?php echo e(! empty(env('SITE_RTL')) && env('SITE_RTL') == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label" for="site_rtl"></label>
                                                            </div>      
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-3">
                                                   <div class="col switch-width">
                                                        <div class="form-group ml-2 mr-3 ">
                                                            <label class="form-label mb-1"><?php echo e(__('Sign Up')); ?></label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="signup_button" id="signup_button" <?php echo e(!             empty(env('signup_button')) && env('signup_button') == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label" for="signup_button"></label>
                                                            </div>      
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                   <div class="col switch-width">
                                                        <div class="form-group ml-2 mr-3 ">
                                                            <label class="form-label mb-1"><?php echo e(__('GDPR Cookie')); ?></label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="gdpr_fulltime" name="gdpr_cookie" id="gdpr_cookie" <?php echo e(!empty(env('gdpr_cookie')) && env('gdpr_cookie') == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label" for="gdpr_cookie"></label>
                                                            </div>      
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                     <div class="form-group col-md-12">
                                               <?php if(env('gdpr_cookie')=='on'): ?>
                                               <?php echo e(Form::label('cookie_text',__('GDPR Cookie Text'),array('class'=>'fulltime form-label ') )); ?>

                                              <?php echo Form::textarea('cookie_text',env('cookie_text'), ['class'=>'form-control fulltime','rows'=>'2','style'=>'display: hidden;height: auto !important;resize:none;']); ?>

                                          
                                            <?php endif; ?>
                                         </div>
                                    </div>
                                    <h4 class="small-title mb-4">Theme Customizer</h4>
                                     <div class="col-12">
                                          <div class="pct-body">
                                            <div class="row">
                                            <div class="col-4">
                                              <h6 class="">
                                                <i data-feather="credit-card" class="me-2"></i>Primary color settings
                                              </h6>
                                              <hr class="my-2" />
                                              <div class="theme-color themes-color">
                                           <input type="hidden" name="theme_color" id="" value="<?php echo e($color); ?>"> 
                                               <a href="#!" class="<?php echo e(($color =='theme-1') ? 'active_color' : ''); ?>" data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                <input type="radio" class="theme_color " name="theme_color" value="theme-1" style="display: none;">
                                                <a href="#!" class="<?php echo e(($color =='theme-2') ? 'active_color' : ''); ?>" data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                 <input type="radio" class="theme_color" name="theme_color" value="theme-2" style="display: none;">
                                                <a href="#!" class="<?php echo e(($color =='theme-3') ? 'active_color' : ''); ?>" data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                 <input type="radio" class="theme_color" name="theme_color" value="theme-3" style="display: none;">
                                                <a href="#!" class="<?php echo e(($color =='theme-4') ? 'active_color' : ''); ?>" data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                <input type="radio" class="theme_color" name="theme_color" value="theme-4" style="display: none;">
                                              </div>
                                              </div>
                                            <div class="col-4">
                                              <h6 class="">
                                                <i data-feather="layout" class="me-2"></i>Sidebar settings
                                              </h6>
                                              <hr class="my-2" />
                                              <div class="form-check form-switch">
                                                  <input type="checkbox" class="form-check-input" id="cust-theme-bg" name="cust_theme_bg"  <?php if($setting['cust_theme_bg'] == 'on'): ?> checked <?php endif; ?>/>
                                           
                                                <label class="form-check-label f-w-600 pl-1" for="cust-theme-bg">Transparent layout</label>
                                              </div>
                                          </div>
                                           <div class="col-4">
                                              <h6 class="">
                                                <i data-feather="sun" class=""></i>Layout settings
                                              </h6>
                                              <hr class=" my-2" />
                                              <div class="form-check form-switch mt-2">
                                                  <input type="checkbox" class="form-check-input" id="cust-darklayout" name="cust_darklayout"<?php if($setting['cust_darklayout'] == 'on'): ?> checked <?php endif; ?>/>
                                              
                                                <label class="form-check-label f-w-600 pl-1" for="cust-darklayout" >Dark Layout</label>
                                              </div>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                     <div class="text-end">
                                <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-primary">
                            </div>
                            </div>
                            </div> 
                            </div>
                            </div>
                               
                        </div>
                         <?php echo e(Form::close()); ?>

                         <div id="email-settings" class="tab-pane">
                        <div class="col-md-12">
                       
                            <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            <?php echo e(__('Email settings')); ?>

                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                <?php echo e(Form::open(['route'=>'email.settings.store','method'=>'post'])); ?>

                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_driver',__('Mail Driver'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_driver',env('MAIL_DRIVER'),array('class'=>'form-control','placeholder'=>__('Enter Mail Driver')))); ?>

                                        <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_driver" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_host',__('Mail Host'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_host',env('MAIL_HOST'),array('class'=>'form-control ','placeholder'=>__('Enter Mail Host')))); ?>

                                        <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_driver" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_port',__('Mail Port'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_port',env('MAIL_PORT'),array('class'=>'form-control','placeholder'=>__('Enter Mail Port')))); ?>

                                        <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_port" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_username',__('Mail Username'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_username',env('MAIL_USERNAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Username')))); ?>

                                        <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_username" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_password',__('Mail Password'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_password',env('MAIL_PASSWORD'),array('class'=>'form-control','placeholder'=>__('Enter Mail Password')))); ?>

                                        <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_password" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_encryption',__('Mail Encryption'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_encryption',env('MAIL_ENCRYPTION'),array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))); ?>

                                        <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_encryption" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_from_address',__('Mail From Address'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_from_address',env('MAIL_FROM_ADDRESS'),array('class'=>'form-control','placeholder'=>__('Enter Mail From Address')))); ?>

                                        <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_from_address" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                        <?php echo e(Form::label('mail_from_name',__('Mail From Name'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('mail_from_name',env('MAIL_FROM_NAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail From Name')))); ?>

                                        <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-mail_from_name" role="alert">
                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                </div>
                     
                                   <div class="col-lg-12 ">
                                    <div class="row">
                                    
                                    <div class="text-start col-6">
                                             <a href="#"   data-ajax-popup="true" data-size="md" data-url="<?php echo e(route('test.email')); ?>" data-title="<?php echo e(__('Send Test Mail')); ?>"  class="btn  btn-primary send_email">
                                                <?php echo e(__('Send Test Mail')); ?>

                                            </a>
                                      </div>
                                          <div class="text-end col-6">
                                            <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary">
                                            </div>
                                       
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                            </div>
                        </div>
                    </div>
                         

                    <div id="payment-settings" class="faq">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            <?php echo e(__('Payment settings')); ?>

                                        </h5>
                                         <small class="d-block mt-2"><?php echo e(__("This detail will use for collect payment on plan from company . On plan company will find out pay now button based on your below configuration.")); ?></small>
                                    </div>
                                    <div class="card-body p-4">
                                        <form method="post" action="<?php echo e(route('payment.settings.store')); ?>" class="payment-form">
                                            <?php echo csrf_field(); ?>
                                            <div class="row mt-3">
                                                 <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('currency',__('Currency *'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::text('currency',env('CURRENCY'),array('class'=>'form-control font-style','required','placeholder'=>__('Enter Currency')))); ?>

                                            <small> <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?><br> <a href="https://stripe.com/docs/currencies" target="_blank"><?php echo e(__('you can find out here..')); ?></a></small> <br>
                                            <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-currency" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <?php echo e(Form::label('currency_symbol',__('Currency Symbol *'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::text('currency_symbol',env('CURRENCY_SYMBOL'),array('class'=>'form-control','required','placeholder'=>__('Enter Currency Symbol')))); ?>

                                            <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-currency_symbol" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="accordion accordion-flush" id="payment-gateways">
                                                      <div id="" class="accordion-item card">
                                                        <!-- Stripe -->
                                    
                                                        <h2 class="accordion-header" id="stripe">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseone"
                                                                aria-expanded="false" aria-controls="collapseone">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Stripe')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                <div id="collapseone" class="accordion-collapse collapse"
                                                    aria-labelledby="stripe" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input" name="is_stripe_enabled" id="is_stripe_enabled" <?php echo e((isset($payment_detail['is_stripe_enabled']) && $payment_detail['is_stripe_enabled'] == 'on') ? 'checked' : ''); ?>>
                                                                                <label class="custom-control-label form-control-label" for="is_stripe_enabled"><?php echo e(__('Enable Stripe')); ?></label>
                                                                            </div>



                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                     <?php echo e(Form::label('stripe_key', __('Stripe Key'),['class' => 'form-label'])); ?>

                                                                    <?php echo e(Form::text('stripe_key', (isset($payment_detail['stripe_key']) && !empty($payment_detail['stripe_key'])) ? $payment_detail['stripe_key']:'', ['class' => 'form-control','placeholder' => __('Stripe Key')])); ?>


                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                      <?php echo e(Form::label('stripe_secret', __('Stripe Secret'),['class' => 'form-label'])); ?>

                                                                       <?php echo e(Form::text('stripe_secret', (isset($payment_detail['stripe_secret']) && !empty($payment_detail['stripe_secret'])) ? $payment_detail['stripe_secret']:'', ['class' => 'form-control','placeholder' => __('Stripe Secret')])); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                             <div id="" class="accordion-item card">
                                                        <!-- paypal -->
                                    
                                                        <h2 class="accordion-header" id="paypal">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsetwo"
                                                                aria-expanded="false" aria-controls="collapsetwo">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Paypal')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapsetwo" class="accordion-collapse collapse"
                                                    aria-labelledby="paypal" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input" name="is_paypal_enabled" id="is_paypal_enabled" <?php echo e((isset($payment_detail['is_paypal_enabled']) && $payment_detail['is_paypal_enabled'] == 'on') ? 'checked' : ''); ?>><label class="custom-control-label form-control-label" for="is_paypal_enabled"><?php echo e(__('Enable Paypal')); ?></label>
                                                                            </div>            
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                        <div class="row pt-2">
                                                             <label class="pb-2" for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label> 
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio"  class="form-check-input input-primary " name="paypal_mode" value="sandbox" <?php echo e((!isset($payment_detail['paypal_mode']) || empty($payment_detail['paypal_mode']) || $payment_detail['paypal_mode'] == 'sandbox') ? 'checked' : ''); ?>>
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                        class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input input-primary "name="paypal_mode" value="live" <?php echo e((isset($payment_detail['paypal_mode']) && $payment_detail['paypal_mode'] == 'live') ? 'checked' : ''); ?>>
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                class="float-end"></strong><?php echo e(__('Live')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <?php echo e(Form::label('paypal_client_id', __('Client ID'),['class' => 'form-label'])); ?>

                                                                    <?php echo e(Form::text('paypal_client_id', (isset($payment_detail['paypal_client_id'])) ? $payment_detail['paypal_client_id'] : '', ['class' => 'form-control','placeholder' => __('Client ID')])); ?>


                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <?php echo e(Form::label('paypal_secret_key', __('Secret Key'),['class' => 'form-label'])); ?>

                                                                    <?php echo e(Form::text('paypal_secret_key', isset($payment_detail['paypal_secret_key']) ? $payment_detail['paypal_secret_key'] : '', ['class' => 'form-control','placeholder' => __('Secret Key')])); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                                <div id="" class="accordion-item card">
                                                        <!-- paystack -->
                                    
                                                        <h2 class="accordion-header" id="paystack">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsethree"
                                                                aria-expanded="false" aria-controls="collapsethree">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Paystack')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapsethree" class="accordion-collapse collapse"
                                                    aria-labelledby="paystack" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input" name="is_paystack_enabled" id="is_paystack_enabled" <?php echo e(isset($payment_detail['is_paystack_enabled']) && $payment_detail['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>  <label class="custom-control-label form-control-label" for="is_paystack_enabled"><?php echo e(__('Enable Paystack')); ?></label>
                                                                            </div>            
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                        
                                                    </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                     <div class="form-group">
                                                                    <label class="form-label" for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                                    <input type="text" name="paystack_public_key" id="paystack_public_key" class="form-control" value="<?php echo e(isset($payment_detail['paystack_public_key']) ? $payment_detail['paystack_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <div class="form-group">
                                                                    <label class="form-label" for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                    <input type="text" name="paystack_secret_key" id="paystack_secret_key" class="form-control" value="<?php echo e(isset($payment_detail['paystack_secret_key']) ? $payment_detail['paystack_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 


                                            <div id="" class="accordion-item card">
                                                        <!-- Flutterwave -->
                                    
                                                        <h2 class="accordion-header" id="Flutterwave">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsefor"
                                                                aria-expanded="false" aria-controls="collapsefor">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Flutterwave')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapsefor" class="accordion-collapse collapse"
                                                    aria-labelledby="Flutterwave" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                    <input type="checkbox" class="form-check-input"   name="is_flutterwave_enabled" id="is_flutterwave_enabled" <?php echo e(isset($payment_detail['is_flutterwave_enabled'])  && $payment_detail['is_flutterwave_enabled']== 'on' ? 'checked="checked"' : ''); ?>><label class="custom-control-label form-control-label" for="is_flutterwave_enabled"><?php echo e(__('Enable Flutterwave')); ?></label>
                                                                </div>            
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                        
                                                    </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                                    <input type="text" name="flutterwave_public_key" id="flutterwave_public_key" class="form-control" value="<?php echo e(isset($payment_detail['flutterwave_public_key'])?$payment_detail['flutterwave_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                 <label class="form-label" for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                 <input type="text" name="flutterwave_secret_key" id="flutterwave_secret_key" class="form-control" value="<?php echo e(isset($payment_detail['flutterwave_secret_key'])?$payment_detail['flutterwave_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div id="" class="accordion-item card">
                                                        <!-- Razorpay -->
                                    
                                                        <h2 class="accordion-header" id="Razorpay">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                                                aria-expanded="false" aria-controls="collapsefive">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Razorpay')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapsefive" class="accordion-collapse collapse"
                                                    aria-labelledby="Razorpay" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input" name="is_razorpay_enabled" id="is_razorpay_enabled" <?php echo e(isset($payment_detail['is_razorpay_enabled']) && $payment_detail['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>><label class="custom-control-label form-control-label" for="is_razorpay_enabled"><?php echo e(__('Enable Razorpay')); ?></label>
                                                                            </div>            
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                        
                                                    </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                     <label class="form-label" for="razorpay_public_key"><?php echo e(__('Public Key')); ?></label>
                                                                    <input type="text" name="razorpay_public_key" id="razorpay_public_key" class="form-control" value="<?php echo e(isset($payment_detail['razorpay_public_key'])?$payment_detail['razorpay_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                     <label class="form-label" for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                    <input type="text" name="razorpay_secret_key" id="razorpay_secret_key" class="form-control" value="<?php echo e(isset($payment_detail['razorpay_secret_key'])?$payment_detail['razorpay_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                                 <div id="" class="accordion-item card">
                                                        <!-- paypal -->
                                    
                                                        <h2 class="accordion-header" id="mercado">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsetsix"
                                                                aria-expanded="false" aria-controls="collapsetsix">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Mercado Pago')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapsetsix" class="accordion-collapse collapse"
                                                    aria-labelledby="mercado" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                               <input type="hidden" name="is_mercado_enabled" value="off">
                                                                                <input type="checkbox" class="form-check-input"  name="is_mercado_enabled" id="is_mercado_enabled" <?php echo e(isset($payment_detail['is_mercado_enabled']) &&  $payment_detail['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>> <label class="custom-control-label form-control-label" for="is_mercado_enabled"><?php echo e(__('Enable Mercado Pago')); ?></label>
                                                                            </div>            
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                        <div class="row pt-2">
                                                             <label class="pb-2" for="paypal_mode"><?php echo e(__('Mercado Mode')); ?></label> 
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input input-primary "name="mercado_mode" value="sandbox" <?php echo e(isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == '' || isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == 'sandbox' ? 'checked' : ''); ?>>

                                                                          
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                        class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input input-primary "name="mercado_mode" value="live" <?php echo e(isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                class="float-end"></strong><?php echo e(__('Live')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                 <label for="mercado_access_token" class="form-label"><?php echo e(__('Access Token')); ?></label>
                                                                    <input type="text" name="mercado_access_token" id="mercado_access_token" class="form-control" value="<?php echo e(isset($payment_detail['mercado_access_token']) ? $payment_detail['mercado_access_token']:''); ?>" placeholder="<?php echo e(__('Access Token')); ?>"/>                                                        
                                                                    <?php if($errors->has('mercado_secret_key')): ?>
                                                                        <span class="invalid-feedback d-block">
                                                                            <?php echo e($errors->first('mercado_access_token')); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                            </div>
                                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div id="" class="accordion-item card">
                                                        <!-- Paytm -->
                                    
                                                        <h2 class="accordion-header" id="Paytm">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapset7"
                                                                aria-expanded="false" aria-controls="collapset7">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Paytm')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapset7" class="accordion-collapse collapse"
                                                    aria-labelledby="Paytm" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input" name="is_paytm_enabled" id="is_paytm_enabled" <?php echo e(isset($payment_detail['is_paytm_enabled']) && $payment_detail['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>> 
                                                                                  <label class="custom-control-label form-control-label" for="is_paytm_enabled"><?php echo e(__('Enable Paytm')); ?></label>
                                                                            </div>            
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                        <div class="row pt-2">
                                                             <label class="pb-2" for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label> 
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input input-primary "name="paytm_mode" value="local" <?php echo e(isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == '' || isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>>

                                                                          
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                        class="float-end"></strong><?php echo e(__('Local')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input input-primary"name="paytm_mode" value="production" <?php echo e(isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                class="float-end"></strong><?php echo e(__('Production')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-4">
                                                                  <div class="form-group">
                                                                    <label class="form-label" for="paytm_public_key"><?php echo e(__('Merchant ID')); ?></label>
                                                                    <input type="text" name="paytm_merchant_id" id="paytm_merchant_id" class="form-control" value="<?php echo e(isset($payment_detail['paytm_merchant_id'])? $payment_detail['paytm_merchant_id']:''); ?>" placeholder="<?php echo e(__('Merchant ID')); ?>"/>
                                                                </div>
                                                            </div>
                                                           <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="paytm_secret_key"><?php echo e(__('Merchant Key')); ?></label>
                                                                        <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" class="form-control" value="<?php echo e(isset($payment_detail['paytm_merchant_key']) ? $payment_detail['paytm_merchant_key']:''); ?>" placeholder="<?php echo e(__('Merchant Key')); ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="paytm_industry_type"><?php echo e(__('Industry Type')); ?></label>
                                                                        <input type="text" name="paytm_industry_type" id="paytm_industry_type" class="form-control" value="<?php echo e(isset($payment_detail['paytm_industry_type']) ?$payment_detail['paytm_industry_type']:''); ?>" placeholder="<?php echo e(__('Industry Type')); ?>"/>
                                                                    </div>
                                                                </div>
                                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="" class="accordion-item card">
                                                        <!-- Mollie -->
                                    
                                                        <h2 class="accordion-header" id="Mollie">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapset8"
                                                                aria-expanded="false" aria-controls="collapset8">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Mollie')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapset8" class="accordion-collapse collapse"
                                                    aria-labelledby="Mollie" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input"name="is_mollie_enabled" id="is_mollie_enabled" <?php echo e(isset($payment_detail['is_mollie_enabled']) && $payment_detail['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>> 
                                                                                 <label class="custom-control-label form-control-label" for="is_mollie_enabled"><?php echo e(__('Enable Mollie')); ?></label>
                                                                            </div>            
                                                        </div>
                                        
                                                        <div class="row mt-2">
                                                               <div class="col-md-4 col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="mollie_api_key"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                                <input type="text" name="mollie_api_key" id="mollie_api_key" class="form-control" value="<?php echo e(isset($payment_detail['mollie_api_key'])?$payment_detail['mollie_api_key']:''); ?>" placeholder="<?php echo e(__('Mollie Api Key')); ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" col-md-4 col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="mollie_profile_id"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                                                <input type="text" name="mollie_profile_id" id="mollie_profile_id" class="form-control" value="<?php echo e(isset($payment_detail['mollie_profile_id'])?$payment_detail['mollie_profile_id']:''); ?>" placeholder="<?php echo e(__('Mollie Profile Id')); ?>"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="mollie_partner_id"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                                                <input type="text" name="mollie_partner_id" id="mollie_partner_id" class="form-control" value="<?php echo e(isset($payment_detail['mollie_partner_id'])?$payment_detail['mollie_partner_id']:''); ?>" placeholder="<?php echo e(__('Mollie Partner Id')); ?>"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                           </div>
                                                       </div>
                                                 <div id="" class="accordion-item card">
                                                        <!-- Skrill -->
                                    
                                                        <h2 class="accordion-header" id="Skrill">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapset9"
                                                                aria-expanded="false" aria-controls="collapset9">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Skrill')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapset9" class="accordion-collapse collapse"
                                                    aria-labelledby="Skrill" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input"name="is_skrill_enabled" id="is_skrill_enabled" <?php echo e(isset($payment_detail['is_skrill_enabled']) && $payment_detail['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>> 
                                                                                 <label class="custom-control-label form-control-label" for="is_skrill_enabled"><?php echo e(__('Enable Skrill')); ?></label>
                                                                            </div>            
                                                              </div>
                                        
                                                                 <div class="row mt-2">
                                                                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for=""><?php echo e(__('Skrill Email')); ?></label>
                                                                                <input type="email" name="skrill_email" id="skrill_email" class="form-control" value="<?php echo e(isset($payment_detail['skrill_email'])?$payment_detail['skrill_email']:''); ?>" placeholder="<?php echo e(__('Skrill Email')); ?>"/>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                           </div>
                                                      </div>
                                                  </div>

                                                    <div id="" class="accordion-item card">
                                                        <!-- paypal -->
                                    
                                                        <h2 class="accordion-header" id="CoinGate">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapset10"
                                                                aria-expanded="false" aria-controls="collapset10">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('CoinGate')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                  <div id="collapset10" class="accordion-collapse collapse"
                                                    aria-labelledby="CoinGate" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox" class="form-check-input" name="is_coingate_enabled" id="is_coingate_enabled" <?php echo e(isset($payment_detail['is_coingate_enabled']) && $payment_detail['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>> <label class="custom-control-label form-control-label" for="is_mercado_enabled"><?php echo e(__('Enable CoinGate')); ?></label>
                                                                            </div>            
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                        <div class="row pt-2">
                                                             <label class="pb-2" for="paypal_mode"><?php echo e(__('CoinGate Mode')); ?></label> 
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input input-primary "name="coingate_mode" value="sandbox" <?php echo e(isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == '' || isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>

                                                                          
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                        class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="border card p-3">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input input-primary name="coingate_mode" value="live" <?php echo e(isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="form-check-label d-block" for="">
                                                                            <span>
                                                                                <span class="h5 d-block"><strong
                                                                                class="float-end"></strong><?php echo e(__('Live')); ?></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row mt-2">
                                                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="coingate_auth_token"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                                                <input type="text" name="coingate_auth_token" id="coingate_auth_token" class="form-control" value="<?php echo e(isset($payment_detail['coingate_auth_token'])?$payment_detail['coingate_auth_token']:''); ?>" placeholder="<?php echo e(__('CoinGate Auth Token')); ?>"/>
                                                                            </div>
                                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
 
                                                  <div id="" class="accordion-item card">
                                                        <!-- Paymentwall -->
                                    
                                                        <h2 class="accordion-header" id="Paymentwall">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapse11"
                                                                aria-expanded="false" aria-controls="collapse11">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card"></i> <?php echo e(__('Paymentwall')); ?>

                                                                </span>
                                                            </button>
                                                        </h2>
                                                <div id="collapse11" class="accordion-collapse collapse"
                                                    aria-labelledby="Paymentwall" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-12 d-flex justify-content-between">

                                                            <small class="">
                                                                <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>

                                                                   <div class="form-check form-switch d-inline-block">
                                                                        
                                                                                 <input type="hidden" name="is_paymentwall_enabled" value="off">
                                                                                <input type="checkbox" class="form-check-input" name="is_paymentwall_enabled" id="is_paymentwall_enabled" <?php echo e(isset($payment_detail['is_paymentwall_enabled'])  && $payment_detail['is_paymentwall_enabled']== 'on' ? 'checked="checked"' : ''); ?>>
                                                                                 <label class="custom-control-label form-control-label" for="is_paymentwall_enabled"><?php echo e(__('Enable PaymentWall')); ?></label>
                                                                            </div>



                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="paymentwall_public_key" class="form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                <input type="text" name="paymentwall_public_key" id="paymentwall_public_key" class="form-control" value="<?php echo e(isset($payment_detail['paymentwall_public_key'])?$payment_detail['paymentwall_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                                                <?php if($errors->has('paymentwall_public_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paymentwall_public_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <div class="form-group">
                                                                          <label for="paymentwall_private_key" class="form-label"><?php echo e(__('Private Key')); ?></label>
                                                                                <input type="text" name="paymentwall_private_key" id="paymentwall_private_key" class="form-control form-control-label" value="<?php echo e(isset($payment_detail['paymentwall_private_key'])?$payment_detail['paymentwall_private_key']:''); ?>" placeholder="<?php echo e(__('Private Key')); ?>"/>
                                                                                <?php if($errors->has('paymentwall_private_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paymentwall_private_key')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                          </div>
                                                                     </div>
                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                            <button type="submit" class="btn-submit btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div id="pusher-settings" class="card">
                        <div class="col-md-12">
                             <form method="POST" action="<?php echo e(route('pusher.settings.store')); ?>" accept-charset="UTF-8">
                                    <?php echo csrf_field(); ?>
                            <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                        <h5 class=""><?php echo e(__('Pusher settings')); ?></h5>
                                    </div>
                                   <div class=" col-6 text-end">
                                     <div class="col switch-width">
                                        <div class="form-group ml-2 mr-3 ">
                                            <div class="custom-control custom-switch">
                                                <label class="custom-control-label form-control-label px-2" for="enable_chat "><?php echo e(__('Enable Chat')); ?></label>
                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="enable_chat" id="enable_chat" <?php echo e(!empty(env('CHAT_MODULE')) && env('CHAT_MODULE') == 'on' ? 'checked="checked"' : ''); ?>>
                                                               
                                               </div>      
                                         </div>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                               
                                    <div class="row">
                                               
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_id" class="form-label"><?php echo e(__('Pusher App Id')); ?></label>
                                            <input class="form-control" placeholder="Enter Pusher App Id" name="pusher_app_id" type="text" value="<?php echo e(env('PUSHER_APP_ID')); ?>" id="pusher_app_id">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_key" class="form-label"><?php echo e(__('Pusher App Key')); ?></label>
                                            <input class="form-control " placeholder="Enter Pusher App Key" name="pusher_app_key" type="text" value="<?php echo e(env('PUSHER_APP_KEY')); ?>" id="pusher_app_key">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_secret" class="form-label"><?php echo e(__('Pusher App Secret')); ?></label>
                                            <input class="form-control " placeholder="Enter Pusher App Secret" name="pusher_app_secret" type="text" value="<?php echo e(env('PUSHER_APP_SECRET')); ?>" id="pusher_app_secret">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="pusher_app_cluster" class="form-label"><?php echo e(__('Pusher App Cluster')); ?></label>
                                            <input class="form-control " placeholder="Enter Pusher App Cluster" name="pusher_app_cluster" type="text" value="<?php echo e(env('PUSHER_APP_CLUSTER')); ?>" id="pusher_app_cluster">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary">
                                    </div>
                                
                            </div>
                            </form>
                        </div>
                    </div> 
                     <div id="recaptcha-settings" class="card">
                        <div class="col-md-12">
                        <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>" accept-charset="UTF-8">
                                    <?php echo csrf_field(); ?>
                                <div class="card-header">
                                    <div class="row">
                                      <div class="col-6">
                                            <h5 class=""><?php echo e(__('ReCaptcha settings')); ?></h5>
                                            <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/" target="_blank" class="text-blue ">
                                            <small class="d-block mt-2">(<?php echo e(__('How to Get Google reCaptcha Site and Secret key')); ?>)</small>
                                            </a>
                                        </div>
                                     <div class="col-6 text-end">
                                        <div class="col switch-width">
                                            <div class="form-group ml-2 mr-3 ">
                                               <div class="custom-control custom-switch">
                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="recaptcha_module" id="recaptcha_module" <?php echo e(!empty(env('RECAPTCHA_MODULE')) && env('RECAPTCHA_MODULE') == 'on' ? 'checked="checked"' : ''); ?>>                   
                                                </div>      
                                            </div>
                                         </div>
                                     </div>
                                 </div>
                              </div>
                           
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_key" class="form-label"><?php echo e(__('Google Recaptcha Key')); ?></label>
                                            <input class="form-control" placeholder="<?php echo e(__('Enter Google Recaptcha Key')); ?>" name="google_recaptcha_key" type="text" value="<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>" id="google_recaptcha_key">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                            <label for="google_recaptcha_secret" class="form-label"><?php echo e(__('Google Recaptcha Secret')); ?></label>
                                            <input class="form-control " placeholder="<?php echo e(__('Enter Google Recaptcha Secret')); ?>" name="google_recaptcha_secret" type="text" value="<?php echo e(env('NOCAPTCHA_SECRET')); ?>" id="google_recaptcha_secret">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn-submit btn btn-primary">
                                    </div>
                              
                            </div>
                              </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>
        $(document).ready(function () {
            
            if ($('.gdpr_fulltime').is(':checked')) {

                $('.fulltime').show();
            } else {
                $('.fulltime').hide();
            }
            $('#gdpr_cookie').on('change', function() {

                if ($('.gdpr_fulltime').is(':checked') ) {

                    $('.fulltime').show();
                } else {
                    
                    $('.fulltime').hide();
                }
            });

        cust_theme_bg();
        cust_darklayout();  


                $(document).on('click', '.list-group-item', function() {
                $('.list-group-item').removeClass('active');
                $('.list-group-item').removeClass('text-primary');
                setTimeout(() => {
                    $(this).addClass('active').removeClass('text-primary');
                }, 10);
            });

                   var type = window.location.hash.substr(1);
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('text-primary');
            if (type != '') {
                $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
            } else {
                $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
            }
        });

    </script>


      <script>
         function cust_theme_bg() {
            var custthemebg = document.querySelector("#cust-theme-bg");
           
            if (custthemebg.checked) {
                document.querySelector(".dash-sidebar").classList.add("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.add("transprent-bg");
            } else {
                document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
                document
                    .querySelector(".dash-header:not(.dash-mob-header)")
                    .classList.remove("transprent-bg");
            }
            
        }
    
        function cust_darklayout() {
            var custdarklayout = document.querySelector("#cust-darklayout");
           
            if (custdarklayout.checked) {
                document
                    .querySelector(".m-header > .b-brand > .logo-lg")
                    .setAttribute("src", "<?php echo e(asset('assets/images/logo.svg')); ?>");
                document
                    .querySelector("#main-style-link")
                    .setAttribute("href", "<?php echo e(asset('assets/css/style-dark.css')); ?>");
            } else {
                document
                    .querySelector(".m-header > .b-brand > .logo-lg")
                    .setAttribute("src", "<?php echo e(asset('assets/images/logo-dark.svg')); ?>");
                document
                    .querySelector("#main-style-link")
                    .setAttribute("href", "<?php echo e(asset('assets/css/style.css')); ?>");
            }
            
        }
</script>

<script>

            function check_theme(color_val) {
            $('.theme-color').prop('checked', false);
            $('input[value="'+color_val+'"]').prop('checked', true);
        }
       var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300
    })
</script>
    <script>
        $(document).on("click", '.send_email', function (e) {

            e.preventDefault();
            var title = $(this).attr('data-title');

            var size = 'md';
            var url = $(this).attr('data-url');

            if (typeof url != 'undefined') {
                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $("#commonModal").modal('show');

                $.post(url, {
                    mail_driver: $("#mail_driver").val(),
                    mail_host: $("#mail_host").val(),
                    mail_port: $("#mail_port").val(),
                    mail_username: $("#mail_username").val(),
                    mail_password: $("#mail_password").val(),
                    mail_encryption: $("#mail_encryption").val(),
                    mail_from_address: $("#mail_from_address").val(),
                    mail_from_name: $("#mail_from_name").val(),
                }, function (data) {
                 
                    $('#commonModal .body .modal-body').html(data);
                });
            }
        });
        $(document).on('submit', '#test_email', function (e) {

            e.preventDefault();
            $("#email_sending").show();
            var post = $(this).serialize();
            var url = $(this).attr('action');

            $.ajax({
                type: "post",
                url: url,
                data: post,
                cache: false,
                beforeSend: function () {
                    $('#test_email .btn-create').attr('disabled', 'disabled');
                },
                success: function (data) {

                    if (data.is_success) {
                        show_toastr('Success', data.message, 'success');
                    } else {
                        show_toastr('Error', data.message, 'error');
                    }
                    $("#email_sending").hide();
                },
                complete: function () {
                    $('#test_email .btn-create').removeAttr('disabled');
                },
            });
        })
    </script>


<script type="text/javascript">
    $('#small-favicon').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#favicon').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });


    $('#logo_blue').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#dark_logo').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });

    $('#logo_white').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
  </script>


<?php $__env->stopPush(); ?>
<style>
.active_color{
    background-color: #ffffff !important;
    border: 2px solid #000 !important;
}
</style>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/setting.blade.php ENDPATH**/ ?>