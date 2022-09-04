
<form class="" method="post" action="<?php echo e(route('zoom-meeting.store',$currentWorkspace->slug)); ?>">
    <?php echo csrf_field(); ?>
     <div class="modal-body">
     <div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('title', __('Topic'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Meeting Title'), 'required' => 'required'])); ?>

    </div>   
   
    <div class="form-group col-md-6">
        <?php echo e(Form::label('projects', __('Projects'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('project_id', $projects, null, ['class' => 'form-control ', 'id' => 'project_id', 'data-toggle' => 'select'])); ?>

    </div>
    <div class="form-group col-md-6" >

        <?php echo e(Form::label('users', __('Members'),['class' => 'col-form-label'])); ?>

        <div id="members-div">
             <?php echo e(Form::select('members[]', [], null, ['class' => 'form-control multi-select', 'placeholder' => __('Select Members'), 'id' => 'members', 'data-toggle' => 'select','multiple'=>'multiple'])); ?>

        </div>
       
    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('datetime', __('Start Date / Time'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('start_date',null,['class' => 'form-control date', 'placeholder' => __('Select Date/Time'), 'required' => 'required'])); ?>

    </div>    
    <div class="form-group col-md-6">
        <?php echo e(Form::label('duration', __('Duration'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::number('duration',null,['class' => 'form-control', 'placeholder' => __('Enter Duration'), 'required' => 'required'])); ?>

    </div> 
      
    <div class="form-group col-md-6">
        <?php echo e(Form::label('password', __('Password'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::password('password',['class' => 'form-control', 'placeholder' => __('Enter Password')])); ?>

    </div>
</div>
</div>
    <div class=" modal-footer">
       <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
       <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">
    </div>

</form>
<link rel="stylesheet" href="<?php echo e(asset('custom/libs/bootstrap-daterangepicker/daterangepicker.css')); ?>">
<script src="<?php echo e(asset('custom/libs/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<style>
.applyBtn .rounded-pill{
        background: #584ed2 !important;
         color: #fff !important;
     }
     </style>
<script>
    $(document).ready(function () {
    var workspace_id = "<?php echo e($currentWorkspace->id); ?>";
    function getMembers(project_id){

        $("#members-div").html('');
        $('#members-div').append('<select class="form-control" id="members" name="members[]" multiple></select>');
            
        $.get( "<?php echo e(route('projects.members',['workspace_id ','project_id'])); ?>".replace('workspace_id',workspace_id).replace('project_id',project_id), function( data ) {
            var list = '';
            $('.js-data-example-ajax').empty();
            if(data.length > 0){
                list += "<option value=''> <?php echo e(__('Select Project')); ?></option>";
            }else{
                list += "<option value=''> <?php echo e(__('No Projects')); ?> </option>";
            }

            $.each(data, function(i, item) {
                list += "<option value='"+item.id+"'>"+item.name+"</option>"
            });
            $('#members').html(list);
            var multipleCancelButton = new Choices(
                        '#members', {
                            removeItemButton: true,
                           
                        }
                    );

            // $('#members').Choices();
        });
    }
   $("#project_id").change(function(){
        var project_id = $(this).val();
        getMembers(project_id);
    });
      });

             $('.date').daterangepicker({
            "singleDatePicker": true,
            "timePicker": true,
            "locale": {
                "format": 'MM/DD/YYYY H:mm'
            },
            "timePicker24Hour": true,
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
        getMembers($('#project_id').val());

</script>
<?php /**PATH /Users/werberson/Web/projetos/task/resources/views/zoom_meeting/create.blade.php ENDPATH**/ ?>