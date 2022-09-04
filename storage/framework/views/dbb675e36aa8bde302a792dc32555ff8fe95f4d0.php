<?php $__env->startSection('page-title'); ?> <?php echo e(__('Plans')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
<?php if(\Auth::guard('client')->check()): ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php else: ?>
 <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php endif; ?>
<li class="breadcrumb-item"> <?php echo e(__('plans')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-button'); ?>

   <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-end">
                    <div class="text-sm-right status-filter">
                        <div class="btn-group  nav nav-tabs">
                             <a data-toggle="tab" href="#monthly-biling" class="btn_tab btn btn-light bg-primary active  text-white"><?php echo e(__('Monthly Biling')); ?></a>
                            <a data-toggle="tab" class="btn_tab btn btn-light bg-primary  text-white" href="#annual-billing"><?php echo e(__('Annual Billing')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $__env->stopSection(); ?>
<!-- <?php $__env->startPush('css-page'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>">
  <?php $__env->stopPush(); ?> -->
  <style type="text/css">

 .price-card .p-price {
    font-size: 67px !important;
}

.nav-tabs {
    border-bottom: unset !important;
}

  </style>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
      <div class="pricing-plan">
           <div class="tab-content mt-3">
                        <div id="monthly-biling" class="tab-pane in active">
         <div class="row">
               <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-3">
            <div
              class="card price-card price-1 wow animate__fadeInUp"
              data-wow-delay="0.4s"
              style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
            >
              <div class="card-body">
                <span class="price-badge bg-primary"><?php echo e($plan->name); ?> </span>
                 <?php if(\Auth::user()->type == 'user' && \Auth::user()->plan == $plan->id): ?>
                <div class="d-flex flex-row-reverse m-0 p-0 ">
                    <span class="d-flex align-items-center ms-2">
                        <i class="f-10 lh-1 fas fa-circle text-success"></i>
                         <span class="ms-2"> <?php echo e(__('Active')); ?></span>
                    </span>
                </div>
                <?php endif; ?>
                <span class="mb-4 f-w-600 p-price"
                  ><?php echo e((env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$')); ?><?php echo e($plan->monthly_price); ?><small class="text-sm">/<?php echo e(__('Per month')); ?></small></span
                >
                <p class="mb-0">
                   <?php echo e($plan->description); ?>

                </p>
                <ul class="list-unstyled my-5">
                  <li>
                    <span class="theme-avtar">
                      <i class=" text-primary ti ti-circle-plus"></i
                    ></span>
                   <?php echo e(($plan->trial_days < 0)?__('Unlimited'):$plan->trial_days); ?> <?php echo e(__('Trial Days')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                    <?php echo e(($plan->max_workspaces < 0)?__('Unlimited'):$plan->max_workspaces); ?> <?php echo e(__('Workspaces')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                   <?php echo e(($plan->max_users < 0)?__('Unlimited'):$plan->max_users); ?> <?php echo e(__('Users Per Workspace')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                    <?php echo e(($plan->max_clients < 0)?__('Unlimited'):$plan->max_clients); ?> <?php echo e(__('Clients Per Workspace')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                   <?php echo e(($plan->max_projects < 0)?__('Unlimited'):$plan->max_projects); ?> <?php echo e(__('Projects Per Workspace')); ?>

                  </li>
                </ul>
                  <?php if(Auth::user()->type != 'admin'): ?>
                <div class="d-grid text-center">

                   <?php if(\Auth::user()->plan == $plan->id && Auth::user()->is_trial_done == 1): ?>
                  <button
                    class="btn mb-3 btn-light d-flex justify-content-center align-items-center btn-primary text-white mx-sm-5"
                  >
                       <?php echo e(__('Trial Expires on ')); ?> <b> <?php echo e((date('d M Y',strtotime(\Auth::user()->plan_expire_date)))); ?></b>
                  </button>
                         <?php if((isset($paymentSetting['is_stripe_enabled']) && $paymentSetting['is_stripe_enabled'] == 'on') || (isset($paymentSetting['is_paypal_enabled']) && $paymentSetting['is_paypal_enabled'] == 'on') || (isset($paymentSetting['is_paystack_enabled']) && $paymentSetting['is_paystack_enabled'] == 'on') || (isset($paymentSetting['is_flutterwave_enabled']) && $paymentSetting['is_flutterwave_enabled'] == 'on') || (isset($paymentSetting['is_razorpay_enabled']) && $paymentSetting['is_razorpay_enabled'] == 'on') || (isset($paymentSetting['is_mercado_enabled']) && $paymentSetting['is_mercado_enabled'] == 'on') || (isset($paymentSetting['is_paytm_enabled']) && $paymentSetting['is_paytm_enabled'] == 'on') || (isset($paymentSetting['is_mollie_enabled']) && $paymentSetting['is_mollie_enabled'] == 'on') || (isset($paymentSetting['is_skrill_enabled']) && $paymentSetting['is_skrill_enabled'] == 'on') || (isset($paymentSetting['is_coingate_enabled']) && $paymentSetting['is_coingate_enabled'] == 'on')): ?>
                         <div class="row ">
                            <div class="col-8">
                         <button
                            class="btn mb-3 btn-primary d-flex justify-content-center align-items-center"
                          >
                              <a href="<?php echo e(route('payment',['monthly', \Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" id="interested_plan_<?php echo e($plan->id); ?>" class="text-white">
                                <i class="ti ti-shopping-cart px-2 text-white"></i><?php echo e(__('Subscribe')); ?>

                            </a>
                          </button>
                        </div>
                           <?php if($plan->id != 1 && \Auth::user()->plan != $plan->id): ?>
                        <div class="col-4">
                          <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                              <ul class="list-unstyled">
                                <li>
                                  <span class="btn btn-primary btn-icon m-1">
                                    <a href="<?php echo e(route('send.request',[\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" class="" data-title="<?php echo e(__('Send Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-arrow-forward-up text-white"></i></span>

                              </a></span>
                                </li>
                              </ul>
                          <?php else: ?>
                            <ul class="list-unstyled">
                              <li>
                                  <span class="btn btn-danger btn-icon m-1">
                                   <a href="<?php echo e(route('request.cancel',\Auth::user()->id)); ?>" class="" data-title="<?php echo e(__('Cancle Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-x text-white "></i></span>
                              </a></span>
                                </li>
                                 </ul>
                          <?php endif; ?>
                      </div>
                  <?php endif; ?>
                </div>
                         <?php endif; ?>
                <?php elseif(\Auth::user()->plan == $plan->id && (empty(\Auth::user()->plan_expire_date) || date('Y-m-d') < \Auth::user()->plan_expire_date)): ?>
                    <p class="">
                        <?php if(!empty(\Auth::user()->plan_expire_date)): ?>
                            <?php echo e(__('Plan Expires on ')); ?>- <b><?php echo e(date('d M Y',strtotime(\Auth::user()->plan_expire_date))); ?></b>
                        <?php else: ?>
                            <b><?php echo e(__('Unlimited')); ?></b>
                        <?php endif; ?>
                    </p>
                <?php elseif((isset($paymentSetting['is_stripe_enabled']) && $paymentSetting['is_stripe_enabled'] == 'on') || (isset($paymentSetting['is_paypal_enabled']) && $paymentSetting['is_paypal_enabled'] == 'on') || (isset($paymentSetting['is_paystack_enabled']) && $paymentSetting['is_paystack_enabled'] == 'on') || (isset($paymentSetting['is_flutterwave_enabled']) && $paymentSetting['is_flutterwave_enabled'] == 'on') || (isset($paymentSetting['is_razorpay_enabled']) && $paymentSetting['is_razorpay_enabled'] == 'on') || (isset($paymentSetting['is_mercado_enabled']) && $paymentSetting['is_mercado_enabled'] == 'on') || (isset($paymentSetting['is_paytm_enabled']) && $paymentSetting['is_paytm_enabled'] == 'on') || (isset($paymentSetting['is_mollie_enabled']) && $paymentSetting['is_mollie_enabled'] == 'on') || (isset($paymentSetting['is_skrill_enabled']) && $paymentSetting['is_skrill_enabled'] == 'on') || (isset($paymentSetting['is_coingate_enabled']) && $paymentSetting['is_coingate_enabled'] == 'on')): ?>
                    <?php if(\Auth::user()->is_trial_done == 0 && $plan->id != 1): ?>
                         <button
                            class="btn mb-3 btn-light btn-primary  d-flex justify-content-center align-items-center mx-sm-5"
                          >
                           <a href="<?php echo e(route('take.a.plan.trial',$plan->id)); ?>" class="text-white">
                                <i class="fas fa-cart-plus mr-2"></i><?php echo e(__('Active Free Trial')); ?>

                            </a>
                          </button>
                    <?php endif; ?>
                    <div class="row">
                            <div class="col-8">
                          <button
                            class="btn mb-3 btn-primary d-flex justify-content-center align-items-center"
                          >
                             <a href="<?php echo e(route('payment',['monthly', \Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" id="interested_plan_<?php echo e($plan->id); ?>" class="text-white">
                            <i class="ti ti-shopping-cart px-2 text-white"></i><?php echo e(__('Subscribe')); ?>

                        </a>
                          </button>
                          </div>
                       <?php if($plan->id != 1 && \Auth::user()->plan != $plan->id): ?>
                        <div class="col-4">
                          <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                              <ul class="list-unstyled">
                                <li>
                                  <span class="btn btn-primary btn-icon m-1">
                                    <a href="<?php echo e(route('send.request',[\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" class="" data-title="<?php echo e(__('Send Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-arrow-forward-up text-white"></i></span>

                              </a></span>
                                </li>
                              </ul>
                          <?php else: ?>
                            <ul class="list-unstyled">
                              <li>
                                  <span class="btn btn-danger btn-icon m-1">
                                   <a href="<?php echo e(route('request.cancel',\Auth::user()->id)); ?>" class="" data-title="<?php echo e(__('Cancle Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-x text-white "></i></span>
                              </a></span>
                                </li>
                                 </ul>
                          <?php endif; ?>
                      </div>
                  <?php endif; ?>
                  </div>
                    <?php endif; ?>



            </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

          <div id="annual-billing" class="tab-pane">
               <div class="row">
               <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-3">
            <div
              class="card price-card price-1 wow animate__fadeInUp"
              data-wow-delay="0.4s"
              style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
            >
              <div class="card-body">
                <span class="price-badge bg-primary"><?php echo e($plan->name); ?> </span>

               <?php if(\Auth::user()->type == 'user' && \Auth::user()->plan == $plan->id): ?>
                <div class="d-flex flex-row-reverse m-0 p-0 ">
                    <span class="d-flex align-items-center ms-2">
                        <i class="f-10 lh-1 fas fa-circle text-success"></i>
                         <span class="ms-2"> <?php echo e(__('Active')); ?></span>
                    </span>
                </div>
                <?php endif; ?>

                <span class="mb-4 f-w-600 p-price"
                  ><?php echo e((env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$')); ?><?php echo e($plan->annual_price); ?><small class="text-sm">/<?php echo e(__('Per Year')); ?></small></span
                >
                <p class="mb-0">
                   <?php echo e($plan->description); ?>

                </p>
                <ul class="list-unstyled my-5">
                  <li>
                    <span class="theme-avtar">
                      <i class=" text-primary ti ti-circle-plus"></i
                    ></span>
                  <?php echo e(($plan->trial_days < 0)?__('Unlimited'):$plan->trial_days); ?> <?php echo e(__('Trial Days')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                    <?php echo e(($plan->max_workspaces < 0)?__('Unlimited'):$plan->max_workspaces); ?> <?php echo e(__('Workspaces')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                   <?php echo e(($plan->max_users < 0)?__('Unlimited'):$plan->max_users); ?> <?php echo e(__('Users Per Workspace')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                    <?php echo e(($plan->max_clients < 0)?__('Unlimited'):$plan->max_clients); ?> <?php echo e(__('Clients Per Workspace')); ?>

                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                   <?php echo e(($plan->max_projects < 0)?__('Unlimited'):$plan->max_projects); ?> <?php echo e(__('Projects Per Workspace')); ?>

                  </li>
                </ul>
                  <?php if(Auth::user()->type != 'admin'): ?>
                <div class="d-grid text-center">

                   <?php if(\Auth::user()->plan == $plan->id && Auth::user()->is_trial_done == 1): ?>
                  <button
                    class="btn mb-3 btn-light d-flex justify-content-center align-items-center btn-primary text-white mx-sm-5"
                  >
                       <?php echo e(__('Trial Expires on ')); ?> <b> <?php echo e((date('d M Y',strtotime(\Auth::user()->plan_expire_date)))); ?></b>
                  </button>
                         <?php if((isset($paymentSetting['is_stripe_enabled']) && $paymentSetting['is_stripe_enabled'] == 'on') || (isset($paymentSetting['is_paypal_enabled']) && $paymentSetting['is_paypal_enabled'] == 'on') || (isset($paymentSetting['is_paystack_enabled']) && $paymentSetting['is_paystack_enabled'] == 'on') || (isset($paymentSetting['is_flutterwave_enabled']) && $paymentSetting['is_flutterwave_enabled'] == 'on') || (isset($paymentSetting['is_razorpay_enabled']) && $paymentSetting['is_razorpay_enabled'] == 'on') || (isset($paymentSetting['is_mercado_enabled']) && $paymentSetting['is_mercado_enabled'] == 'on') || (isset($paymentSetting['is_paytm_enabled']) && $paymentSetting['is_paytm_enabled'] == 'on') || (isset($paymentSetting['is_mollie_enabled']) && $paymentSetting['is_mollie_enabled'] == 'on') || (isset($paymentSetting['is_skrill_enabled']) && $paymentSetting['is_skrill_enabled'] == 'on') || (isset($paymentSetting['is_coingate_enabled']) && $paymentSetting['is_coingate_enabled'] == 'on')): ?>
                         <div class="row">
                          <div class="col-8">
                         <button
                            class="btn mb-3 btn-primary d-flex justify-content-center align-items-center"
                          >
                             <a href="<?php echo e(route('payment',['annual', \Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" id="interested_plan_<?php echo e($plan->id); ?>" class=""> <i class="ti ti-shopping-cart px-2"></i><?php echo e(__('Subscribe')); ?></a>
                          </button>
                        </div>
                          <?php if($plan->id != 1 && \Auth::user()->plan != $plan->id): ?>
                        <div class="col-4">
                          <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                              <ul class="list-unstyled">
                                <li>
                                  <span class="btn btn-primary btn-icon m-1">
                                    <a href="<?php echo e(route('send.request',[\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" class="" data-title="<?php echo e(__('Send Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-arrow-forward-up text-white"></i></span>

                              </a></span>
                                </li>
                              </ul>
                          <?php else: ?>
                            <ul class="list-unstyled">
                              <li>
                                  <span class="btn btn-danger btn-icon m-1">
                                   <a href="<?php echo e(route('request.cancel',\Auth::user()->id)); ?>" class="" data-title="<?php echo e(__('Cancle Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-x text-white "></i></span>
                              </a></span>
                                </li>
                                 </ul>
                          <?php endif; ?>
                      </div>
                  <?php endif; ?>
                </div>
                         <?php endif; ?>
                  <?php elseif(\Auth::user()->plan == $plan->id && (empty(\Auth::user()->plan_expire_date) || date('Y-m-d') < \Auth::user()->plan_expire_date)): ?>
                    <p class="">
                       <?php if(!empty(\Auth::user()->plan_expire_date)): ?>
                        <?php echo e(__('Plan Expires on ')); ?> <b><?php echo e(date('d M Y',strtotime(\Auth::user()->plan_expire_date))); ?></b>
                       <?php else: ?>
                        <b><?php echo e(__('Unlimited')); ?></b>
                       <?php endif; ?>
                    </p>


                     <?php elseif((isset($paymentSetting['is_stripe_enabled']) && $paymentSetting['is_stripe_enabled'] == 'on') || (isset($paymentSetting['is_paypal_enabled']) && $paymentSetting['is_paypal_enabled'] == 'on') || (isset($paymentSetting['is_paystack_enabled']) && $paymentSetting['is_paystack_enabled'] == 'on') || (isset($paymentSetting['is_flutterwave_enabled']) && $paymentSetting['is_flutterwave_enabled'] == 'on') || (isset($paymentSetting['is_razorpay_enabled']) && $paymentSetting['is_razorpay_enabled'] == 'on') || (isset($paymentSetting['is_mercado_enabled']) && $paymentSetting['is_mercado_enabled'] == 'on') || (isset($paymentSetting['is_paytm_enabled']) && $paymentSetting['is_paytm_enabled'] == 'on') || (isset($paymentSetting['is_mollie_enabled']) && $paymentSetting['is_mollie_enabled'] == 'on') || (isset($paymentSetting['is_skrill_enabled']) && $paymentSetting['is_skrill_enabled'] == 'on') || (isset($paymentSetting['is_coingate_enabled']) && $paymentSetting['is_coingate_enabled'] == 'on')): ?>
                     <?php if(\Auth::user()->is_trial_done == 0 && $plan->id != 1): ?>
                         <button
                            class="btn mb-3 btn-light btn-primary  d-flex justify-content-center align-items-center mx-sm-5"
                          >
                           <a href="<?php echo e(route('take.a.plan.trial',$plan->id)); ?>" class="text-white">
                                <i class="fas fa-cart-plus mr-2"></i><?php echo e(__('Active Free Trial')); ?>

                            </a>


                          </button>
                    <?php endif; ?>
                    <div class="row">
                      <div class="col-8">
                          <button
                            class="btn mb-3 btn-primary d-flex justify-content-center align-items-center"
                          >
                             <a href="<?php echo e(route('payment',['annual', \Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" id="interested_plan_<?php echo e($plan->id); ?>" class="text-white">
                            <i class="ti ti-shopping-cart px-2 text-white"></i><?php echo e(__('Subscribe')); ?>

                        </a>
                          </button>
                        </div>
                           <?php if($plan->id != 1 && \Auth::user()->plan != $plan->id): ?>
                        <div class="col-4">
                          <?php if(\Auth::user()->requested_plan != $plan->id): ?>
                              <ul class="list-unstyled">
                                <li>
                                  <span class="btn btn-primary btn-icon m-1">
                                    <a href="<?php echo e(route('send.request',[\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>" class="" data-title="<?php echo e(__('Send Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-arrow-forward-up text-white"></i></span>

                              </a></span>
                                </li>
                              </ul>
                          <?php else: ?>
                            <ul class="list-unstyled">
                              <li>
                                  <span class="btn btn-danger btn-icon m-1">
                                   <a href="<?php echo e(route('request.cancel',\Auth::user()->id)); ?>" class="" data-title="<?php echo e(__('Cancle Request')); ?>" data-toggle="tooltip">
                                  <span class=""><i class="ti ti-x text-white "></i></span>
                              </a></span>
                                </li>
                                 </ul>
                          <?php endif; ?>
                      </div>
                  <?php endif; ?>
                </div>
                    <?php endif; ?>


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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            var tohref = '';
            <?php if(Auth::user()->is_register_trial == 1): ?>
                tohref = $('#trial_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php elseif(Auth::user()->interested_plan_id != 0): ?>
                tohref = $('#interested_plan_<?php echo e(Auth::user()->interested_plan_id); ?>').attr("href");
            <?php endif; ?>

            if (tohref != '') {
                window.location = tohref;
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/plans/company.blade.php ENDPATH**/ ?>