@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-4">
      <strong class="page-title">{{$user->name}}</strong>
    </div>
    <div class="col-md-4">
      <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-sm btn-success">@lang('quickadmin.qa_edit')</a>
    </div>
    <div class="col-md-4">
      @can('user_delete')
      {!! Form::open(array(
          'style' => 'display: inline-block;',
          'method' => 'DELETE',
          'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
          'route' => ['admin.users.destroy', $user->id])) !!}
      {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-sm btn-block btn-danger')) !!}
      {!! Form::close() !!}
      @endcan
    </div>
  </div><hr>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td field-key='role'>{{ $user->role->title ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Department(s)</th>
                            <td>@foreach ($user->departments as $department)
                                {{ $department->name}}<br>
                            @endforeach</td>
                            {{-- <td field-key='role'>{{ App\Department::find($user->department_id)->name}}</td> --}}
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
