  
  <?php

            $setting = App\Models\Utility::getcompanySettings($currentWorkspace->id);
            $color = $setting->theme_color;
            $dark_mode = $setting->cust_darklayout; 
            $SITE_RTL = $setting->site_rtl;
            $cust_theme_bg = $setting->cust_theme_bg;
       

           if($color == '' || $color == null){
              $settings = App\Models\Utility::getAdminPaymentSettings();
              $color = $settings['color'];           
           }

           if($dark_mode == '' || $dark_mode == null){
              $dark_mode = $settings['cust_darklayout'];
           }

           if($cust_theme_bg == '' || $dark_mode == null){
              $cust_theme_bg = $settings['cust_theme_bg'];
           }

            if($SITE_RTL == '' || $SITE_RTL == null){
              $SITE_RTL = env('SITE_RTL');
           }
      ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>
      
    </title>

    <link rel="shortcut icon" href="<?php echo e(asset(Storage::url('logo/favicon.png'))); ?>">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/@fontawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/select2/dist/css/select2.min.css')); ?>">

    <?php echo $__env->yieldPushContent('css-page'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dragula.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>" />


    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">


</head>


    <script>
        var dataTableLang = {
            paginate: {previous: "<i class='fas fa-angle-left'>", next: "<i class='fas fa-angle-right'>"},
            lengthMenu: "<?php echo e(__('Show')); ?> _MENU_ <?php echo e(__('entries')); ?>",
            zeroRecords: "<?php echo e(__('No data available in table.')); ?>",
            info: "<?php echo e(__('Showing')); ?> _START_ <?php echo e(__('to')); ?> _END_ <?php echo e(__('of')); ?> _TOTAL_ <?php echo e(__('entries')); ?>",
            infoEmpty: "<?php echo e(__('Showing 0 to 0 of 0 entries')); ?>",
            infoFiltered: "<?php echo e(__('(filtered from _MAX_ total entries)')); ?>",
            search: "<?php echo e(__('Search:')); ?>",
            thousands: ",",
            loadingRecords: "<?php echo e(__('Loading...')); ?>",
            processing: "<?php echo e(__('Processing...')); ?>"
        }
    </script>





<body class="<?php echo e($color); ?>">

<!-- <div class="container-fluid container-application"> -->

    <script>
        var dataTableLang = {
            paginate: {previous: "<i class='fas fa-angle-left'>", next: "<i class='fas fa-angle-right'>"},
            lengthMenu: "<?php echo e(__('Show')); ?> _MENU_ <?php echo e(__('entries')); ?>",
            zeroRecords: "<?php echo e(__('No data available in table.')); ?>",
            info: "<?php echo e(__('Showing')); ?> _START_ <?php echo e(__('to')); ?> _END_ <?php echo e(__('of')); ?> _TOTAL_ <?php echo e(__('entries')); ?>",
            infoEmpty: "<?php echo e(__('Showing 0 to 0 of 0 entries')); ?>",
            infoFiltered: "<?php echo e(__('(filtered from _MAX_ total entries)')); ?>",
            search: "<?php echo e(__('Search:')); ?>",
            thousands: ",",
            loadingRecords: "<?php echo e(__('Loading...')); ?>",
            processing: "<?php echo e(__('Processing...')); ?>"
        }

    </script>

<div class="dash-container">
    <div class="dash-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="row mb-1">
                        <div class="col-xl-5">
                         <?php if(trim($__env->yieldContent('page-title'))): ?>
                        <div class="page-header-title">
                            <h4 class="m-b-10"><?php echo $__env->yieldContent('page-title'); ?></h4>
                        </div>
                          <?php endif; ?>
                      </div>
                      <div class="col-xl-7">
                          <?php if(trim($__env->yieldContent('action-button'))): ?>
                                <!-- <div class="col-xl-6 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2"> -->
                                    <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
                                        <?php echo $__env->yieldContent('action-button'); ?>
                                    </div>
                                <!-- </div> -->
                            <?php elseif(trim($__env->yieldContent('multiple-action-button'))): ?>
                                <div class='row text-end row d-flex justify-content-end col-auto'>  <?php echo $__env->yieldContent('multiple-action-button'); ?></div>
                            <?php endif; ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
         </div>
   <?php echo $__env->yieldContent('content'); ?>
    </div>

 </div>
 </div> 




<?php
    \App::setLocale(env('DEFAULT_LANG'));
    $currantLang = 'en'
?>

<!-- Scripts -->
<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->

<script src="<?php echo e(asset('custom/js/site.core.js')); ?>"></script>

<script src="<?php echo e(asset('custom/libs/progressbar.js/dist/progressbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/libs/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/libs/bootstrap-timepicker/js/bootstrap-timepicker.js')); ?>"></script>
<script src="<?php echo e(asset('custom/libs/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('custom/libs/select2/dist/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('custom/libs/nicescroll/jquery.nicescroll.min.js')); ?> "></script>
<script src="<?php echo e(asset('custom/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>

<?php if(env('CHAT_MODULE') == 'yes' && isset($currentWorkspace) && $currentWorkspace): ?>
    <?php if(auth()->guard('web')->check()): ?>
        
        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
        <script>
            $(document).ready(function () {
                pushNotification('<?php echo e(Auth::id()); ?>');
            });

            function pushNotification(id) {

                // ajax setup form csrf token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = false;

                var pusher = new Pusher('<?php echo e(env('PUSHER_APP_KEY')); ?>', {
                    cluster: '<?php echo e(env('PUSHER_APP_CLUSTER')); ?>',
                    forceTLS: true
                });

                var channel = pusher.subscribe('<?php echo e($currentWorkspace->slug); ?>');
                channel.bind('notification', function (data) {

                    if (id == data.user_id) {
                        $(".notification-toggle").addClass('beep');
                        $(".notification-dropdown .dropdown-list-icons").prepend(data.html);
                    }
                });
                channel.bind('chat', function (data) {
                    if (id == data.to) {
                        getChat();
                    }
                });
            }

            function getChat() {
                $.ajax({
                    url: '<?php echo e(route('message.data')); ?>',
                    cache: false,
                    dataType: 'html',
                    success: function (data) {
                        if (data.length) {
                            $(".message-toggle").addClass('beep');
                            $(".dropdown-list-message").html(data);
                            LetterAvatar.transform();
                        }
                    }
                })
            }

            getChat();

            $(document).on("click", ".mark_all_as_read", function () {
                $.ajax({
                    url: '<?php echo e(route('notification.seen',$currentWorkspace->slug)); ?>',
                    type: "get",
                    cache: false,
                    success: function (data) {
                        $('.notification-dropdown .dropdown-list-icons').html('');
                        $(".notification-toggle").removeClass('beep');
                    }
                })
            });
            $(document).on("click", ".mark_all_as_read_message", function () {
                $.ajax({
                    url: '<?php echo e(route('message.seen',$currentWorkspace->slug)); ?>',
                    type: "get",
                    cache: false,
                    success: function (data) {
                        $('.dropdown-list-message').html('');
                        $(".message-toggle").removeClass('beep');
                    }
                })
            });
        </script>
        
    <?php endif; ?>
<?php endif; ?>

<!-- Site JS -->
<script src="<?php echo e(asset('custom/js/letter.avatar.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/fire.modal.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/site.js')); ?>"></script>
<script src="<?php echo e(asset('custom/js/jquery.dataTables.min.js')); ?>"></script>
<!-- Demo JS - remove it when starting your project -->

<script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>
<script>
    var date_picker_locale = {
        format: 'YYYY-MM-DD',
        daysOfWeek: [
            "<?php echo e(__('Sun')); ?>",
            "<?php echo e(__('Mon')); ?>",
            "<?php echo e(__('Tue')); ?>",
            "<?php echo e(__('Wed')); ?>",
            "<?php echo e(__('Thu')); ?>",
            "<?php echo e(__('Fri')); ?>",
            "<?php echo e(__('Sat')); ?>"
        ],
        monthNames: [
            "<?php echo e(__('January')); ?>",
            "<?php echo e(__('February')); ?>",
            "<?php echo e(__('March')); ?>",
            "<?php echo e(__('April')); ?>",
            "<?php echo e(__('May')); ?>",
            "<?php echo e(__('June')); ?>",
            "<?php echo e(__('July')); ?>",
            "<?php echo e(__('August')); ?>",
            "<?php echo e(__('September')); ?>",
            "<?php echo e(__('October')); ?>",
            "<?php echo e(__('November')); ?>",
            "<?php echo e(__('December')); ?>"
        ],
    };
    var calender_header = {
        today: "<?php echo e(__('today')); ?>",
        month: '<?php echo e(__('month')); ?>',
        week: '<?php echo e(__('week')); ?>',
        day: '<?php echo e(__('day')); ?>',
        list: '<?php echo e(__('list')); ?>'
    };
</script>

 <?php if(env('gdpr_cookie')=='on'): ?>

<script type="text/javascript">
    
    var defaults = {
    'messageLocales': {
        /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
        'en': '<?php echo e(env('cookie_text')); ?>'

    },
    'buttonLocales': {
        'en': 'Ok'
    },
    'cookieNoticePosition': 'bottom',
    'learnMoreLinkEnabled': false,
    'learnMoreLinkHref': '/cookie-banner-information.html',
    'learnMoreLinkText': {
      'it': 'Saperne di più',
      'en': 'Learn more',
      'de': 'Mehr erfahren',
      'fr': 'En savoir plus'
    },
    'buttonLocales': {
      'en': 'Ok'
    },
    'expiresIn': 30,
    'buttonBgColor': '#d35400',
    'buttonTextColor': '#fff',
    'noticeBgColor': 'var(--primary)',
    'noticeTextColor': '#fff',
    'linkColor': '#009fdd'
};
</script>
<script src="<?php echo e(asset('custom/js/cookie.notice.js')); ?>"></script>
<?php endif; ?>

<?php if(isset($currentWorkspace) && $currentWorkspace): ?>
    <script src="<?php echo e(asset('custom/js/jquery.easy-autocomplete.min.js')); ?>"></script>
    <script>
        var options = {
            url: function (phrase) {
                return "<?php if(auth()->guard('web')->check()): ?><?php echo e(route('search.json',$currentWorkspace->slug)); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.search.json',$currentWorkspace->slug)); ?><?php endif; ?>/" + phrase;
            },
            categories: [
                {
                    listLocation: "Projects",
                    header: "<?php echo e(__('Projects')); ?>"
                },
                {
                    listLocation: "Tasks",
                    header: "<?php echo e(__('Tasks')); ?>"
                }
            ],
            getValue: "text",
            template: {
                type: "links",
                fields: {
                    link: "link"
                }
            }
        };
        $(".search-element input").easyAutocomplete(options);
    </script>
<?php endif; ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php if(Session::has('success')): ?>
    <script>
        show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
    </script>
<?php endif; ?>
<?php if(Session::has('error')): ?>
    <script>
        show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
    </script>
<?php endif; ?>

</body>
</html>
<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/layouts/invoicepayheader.blade.php ENDPATH**/ ?>