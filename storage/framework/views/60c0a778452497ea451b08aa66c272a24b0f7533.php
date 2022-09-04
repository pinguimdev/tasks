<?php
    $permissions = Auth::user()->getPermission($project->id);
    $client_keyword = Auth::user()->getGuard() == 'client' ? 'client.' : '';
?>

<?php $__env->startSection('page-title'); ?> <?php echo e(__('Gantt Chart')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
<?php if(\Auth::guard('client')->check()): ?>   
<li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php else: ?>
 <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php endif; ?>
 <?php if(\Auth::guard('client')->check()): ?>  
<li class="breadcrumb-item"><a href="<?php echo e(route('client.projects.index',$currentWorkspace->slug)); ?>"><?php echo e(__('Project')); ?></a></li>
 <?php else: ?>  
<li class="breadcrumb-item"><a href="<?php echo e(route('projects.index',$currentWorkspace->slug)); ?>"><?php echo e(__('Project')); ?></a></li>
<?php endif; ?>
<li class="breadcrumb-item"><a href="<?php echo e(route($client_keyword.'projects.show',[$currentWorkspace->slug,$project->id])); ?>"><?php echo e(__('Project Details')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Gantt Chart')); ?></li>
 <?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="btn-group mx-1" id="change_view" role="group">
        <a href="<?php echo e(route($is_client.'projects.gantt',[$currentWorkspace->slug,$project->id,'Quarter Day'])); ?>" class="btn btn-sm px-3 btn-info <?php if($duration == 'Quarter Day'): ?>active <?php endif; ?>" data-value="Quarter Day"><?php echo e(__('Quarter Day')); ?></a>
        <a href="<?php echo e(route($is_client.'projects.gantt',[$currentWorkspace->slug,$project->id,'Half Day'])); ?>" class="btn btn-sm  px-3 btn-info <?php if($duration == 'Half Day'): ?>active <?php endif; ?>" data-value="Half Day"><?php echo e(__('Half Day')); ?></a>
        <a href="<?php echo e(route($is_client.'projects.gantt',[$currentWorkspace->slug,$project->id,'Day'])); ?>" class="btn btn-sm px-3 btn-info <?php if($duration == 'Day'): ?>active <?php endif; ?>" data-value="Day"><?php echo e(__('Day')); ?></a>
        <a href="<?php echo e(route($is_client.'projects.gantt',[$currentWorkspace->slug,$project->id,'Week'])); ?>" class="btn btn-sm px-3 btn-info <?php if($duration == 'Week'): ?>active <?php endif; ?>" data-value="Week"><?php echo e(__('Week')); ?></a>
        <a href="<?php echo e(route($is_client.'projects.gantt',[$currentWorkspace->slug,$project->id,'Month'])); ?>" class="btn btn-sm px-3 btn-info <?php if($duration == 'Month'): ?>active <?php endif; ?>" data-value="Month"><?php echo e(__('Month')); ?></a>
    </div>
    <?php if(auth()->guard('client')->check()): ?>
        <a href="<?php echo e(route('client.projects.show',[$currentWorkspace->slug,$project->id])); ?>" class="btn-submit btn btn-md btn-primary btn-icon px-2 py-2" data-toggle="tooltip" title="<?php echo e(__('Back')); ?>">
            <i class=" ti ti-arrow-back-up"></i> 
        </a>
    <?php elseif(auth()->guard()->check()): ?>
       <div class="col-auto">
        <a href="<?php echo e(route('projects.show',[$currentWorkspace->slug,$project->id])); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="<?php echo e(__('Back')); ?>">
            <i class=" ti ti-arrow-back-up"></i>
        </a>
    </div>


    <?php endif; ?>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>

    <?php $permissions = Auth::user()->getPermission($project->id); ?>

    <section class="section">

        <?php if($project && $currentWorkspace): ?>
            <div class="row">
                <div class="col-12">
                    <div class="gantt-target"></div>
                </div>
            </div>
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
    </section>

<?php $__env->stopSection(); ?>
<?php if($project && $currentWorkspace): ?>
    <?php $__env->startPush('css-page'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('custom/css/frappe-gantt.css')); ?>" />
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <?php
            $currantLang = basename(App::getLocale());
        ?>
        <script>
            const month_names = {
                "<?php echo e($currantLang); ?>": [
                    '<?php echo e(__('January')); ?>',
                    '<?php echo e(__('February')); ?>',
                    '<?php echo e(__('March')); ?>',
                    '<?php echo e(__('April')); ?>',
                    '<?php echo e(__('May')); ?>',
                    '<?php echo e(__('June')); ?>',
                    '<?php echo e(__('July')); ?>',
                    '<?php echo e(__('August')); ?>',
                    '<?php echo e(__('September')); ?>',
                    '<?php echo e(__('October')); ?>',
                    '<?php echo e(__('November')); ?>',
                    '<?php echo e(__('December')); ?>'
                ],
                "en": [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'
                ],
            };
        </script>
        <script src="<?php echo e(asset('custom/js/frappe-gantt.js')); ?>"></script>
        <script>
            var tasks = JSON.parse('<?php echo addslashes(json_encode($tasks)); ?>');
            var gantt_chart = new Gantt(".gantt-target", tasks, {
                custom_popup_html: function(task) {
                    var status_class = 'success';
                    if(task.custom_class == 'medium'){
                        status_class = 'info'
                    }else if(task.custom_class == 'high'){
                        status_class = 'danger'
                    }
                    return `<div class="details-container">
                                <div class="title">${task.name} <span class="badge badge-${status_class} float-right">${task.extra.priority}</span></div>
                                <div class="subtitle">
                                    <b>${task.progress}%</b> <?php echo e(__('Progress')); ?> <br>
                                    <b>${task.extra.comments}</b> <?php echo e(__('Comments')); ?> <br>
                                    <b><?php echo e(__('Duration')); ?></b> ${task.extra.duration}
                                </div>
                            </div>
                          `;
                },
                on_click: function (task) {
                    //console.log(task);
                },
                on_date_change: function(task, start, end) {
                    task_id = task.id;
                    start = moment(start);
                    end = moment(end);
                    $.ajax({
                        url:"<?php if(auth()->guard('client')->check()): ?><?php echo e(route('client.projects.gantt.post',[$currentWorkspace->slug,$project->id])); ?><?php else: ?><?php echo e(route('projects.gantt.post',[$currentWorkspace->slug,$project->id])); ?><?php endif; ?>",
                        data:{
                            start:start.format('YYYY-MM-DD HH:mm:ss'),
                            end:end.format('YYYY-MM-DD HH:mm:ss'),
                            task_id:task_id,
                        },
                        type:'POST',
                        success:function (data) {

                        },
                        error:function (data) {
                            show_toastr('Error', '<?php echo e(__("Some Thing Is Wrong!")); ?>', 'error');
                        }
                    });
                },
                view_mode: '<?php echo e($duration); ?>',
                language: '<?php echo e($currantLang); ?>'
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/werberson/Web/projetos/task/resources/views/projects/gantt.blade.php ENDPATH**/ ?>