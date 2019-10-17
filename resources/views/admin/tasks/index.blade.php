@extends('layouts.app')

@section('content')

<div class="panel panel-success">
    <div class="panel-heading">
          <div class="row">
            <div class="col-md-4">
                <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
            </div>
            <div class="col-md-4">
                <strong>Forms</strong>
            </div>
            <div class="col-md-4">
              @can('user_management_access')
               <a href="{{ route('formbuilder::forms.create') }}" class="btn btn-sm btn-block btn-success">
                  <i class="fa fa-plus"></i> Create New Form</a>
            </div>
            @endcan
        </div>
    </div>
  </div>

    <div class="panel-body">
      @if(auth()->user()->role_id == 1)
          @if(\jazmy\FormBuilder\Models\Form::all()->count() > 0)
            @foreach(\jazmy\FormBuilder\Models\Form::all() as $form)

              <div class="col-lg-3 col-md-6 col-xs-12">
                        <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h5>{{ $form->name }}</h5>

                            <small>{{ $form->name }}</small>
                          </div>
                          <div class="icon">
                              <i class="fa fa-tasks nav-icon"></i>
                          </div>
                          <a href="{{ route('formbuilder::forms.submissions.index', $form) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                @endforeach
            </div>
          @else
            <div class="card-body">
                <h4 class="text-danger text-center">
                    No form available.
                </h4>
            </div>
          @endif

    @else
        @foreach ($departments as $department)
          @foreach ($department->forms as $form)
                <div class="col-lg-3 col-md-6 col-xs-12">
                      <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h5>{{ $form->name }}</h5>
                      <small>{{ $form->name }}</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tasks nav-icon"></i>
                        </div>
                        <a href="{{ route('formbuilder::forms.submissions.index', $form->id) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
          @endforeach
        @endforeach

       @forelse ($departments as $department)
           @if ($department->name == 'Front Desk')

              <div class="col-lg-3 col-md-6 col-xs-12">
                        <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h5>{{$agent_form->name }}</h5>

                            <small>{{ $agent_form->name }}</small>
                          </div>
                          <div class="icon">
                              <i class="fa fa-tasks nav-icon"></i>
                          </div>
                          <a href="{{ route('formbuilder::forms.submissions.index', $agent_form) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

           @endif
       @empty
           
       @endforelse
    @endif
  </div>
</div>
@endsection
