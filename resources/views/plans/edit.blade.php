<form class="" method="post" enctype="multipart/form-data" action="{{ route('plans.update',$plan->id) }}">
    @csrf
     <div class="modal-body">
    <div class="row">
        <div class="{{($plan->id == 1) ? 'col-12' : 'col-md-10' }}">
            <div class="form-group">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $plan->name }}" required/>
            </div>
        </div>
        @if($plan->id != 1)
           
                    <div class="form-group col-md-2 pt-3">
                      <div class="form-check form-switch d-inline-block">
                        <input type="checkbox" class="form-check-input" name="status" id="status"@if($plan->status) checked="checked" @endif>
                        <label class="custom-control-label form-control-label" for="status">{{ __('Status') }}</label>
                      </div>
                   </div>
            
            <div class="form-group col-md-4">
                <label for="monthly_price" class="form-label">{{ __('Monthly Price') }}</label>
                <div class="form-icon-user">
                    <span class="currency-icon bg-primary">{{ (env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$') }}</span>
                    <input class="form-control currency_input" type="number" min="0" id="monthly_price" name="monthly_price" value="{{ $plan->monthly_price }}" placeholder="{{ __('Monthly Price') }}">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="annual_price" class="form-label">{{ __('Annual Price') }}</label>
                <div class="form-icon-user">
                    <span class="currency-icon bg-primary">{{ (env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$') }}</span>
                    <input class="form-control currency_input" type="number" min="0" id="annual_price" name="annual_price" value="{{ $plan->annual_price }}" placeholder="{{ __('Annual Price') }}">
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="duration" class="form-label">{{ __('Trial Days') }} *</label>
                <input type="number" class="form-control mb-0" id="trial_days" name="trial_days" value="{{$plan->trial_days}}" required/>
                <span><small>{{__("Note: '-1' for Unlimited")}}</small></span>
            </div>
        @endif
        <div class="form-group col-md-6">
            <label for="max_workspaces" class="form-label">{{ __('Maximum Workspaces') }} *</label>
            <input type="number" class="form-control mb-0" id="max_workspaces" name="max_workspaces" value="{{$plan->max_workspaces}}" required/>
            <span><small>{{__("Note: '-1' for Unlimited")}}</small></span>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="max_users" class="form-label">{{ __('Maximum Users Per Workspace') }} *</label>
                <input type="number" class="form-control mb-0" id="max_users" name="max_users" value="{{$plan->max_users}}" required/>
                <span><small>{{__("Note: '-1' for Unlimited")}}</small></span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="max_clients" class="form-label">{{ __('Maximum Clients Per Workspace') }} *</label>
            <input type="number" class="form-control mb-0" id="max_clients" name="max_clients" value="{{$plan->max_clients}}" required/>
            <span><small>{{__("Note: '-1' for Unlimited")}}</small></span>
        </div>
        <div class="form-group col-md-6">
            <label for="max_projects" class="form-label">{{ __('Maximum Projects Per Workspace') }} *</label>
            <input type="number" class="form-control mb-0" id="max_projects" name="max_projects" value="{{$plan->max_projects}}" required/>
            <span><small>{{__("Note: '-1' for Unlimited")}}</small></span>
        </div>
        <div class="form-group col-md-12 mb-0">
            <div class="form-group">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" id="description" name="description">{{$plan->description}}</textarea>
            </div>
        </div>
    </div>
</div>
   <div class=" modal-footer">
       
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close')}}</button>
        <input type="submit" value="{{ __('Save')}}" class="btn  btn-primary">
    </div>
</form>
