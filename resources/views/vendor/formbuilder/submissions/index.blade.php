@extends('formbuilder::layout')

@section('content')

<div class="panel panel-success">
        <div class="panel-heading">
              <div class="row">
                <div class="col-md-4">
                    <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                    @can('user_management_access')
                            <a href="{{ route('formbuilder::forms.index') }}" class="btn btn-primary float-md-right btn-sm">
                                <i class="fa fa-arrow-left"></i> Back To Forms
                            </a>@endcan
                </div>
                <div class="col-md-4">
                    <strong>{{ $pageTitle }} ({{ $submissions->count() }})</strong>
                </div>
                <div class="col-md-4">
                        <a href="{{ route('formbuilder::form.render', $form->identifier) }}" class="btn btn-sm btn-primary btn-block" title="Create New Task">
                                <i class="fa fa-plus"></i> Create New Task
                           </a>
                </div>
            </div>
        </div>

        <div class="panel-body">

                @if(auth()->user()->role_id == 1)
                    @if($submissions->count())

                        <div class="table-responsive">
                            <table class="table-bordered" id="housekeeps_table">
                                <thead>
                                    <tr>
                                        {{-- <th class="five">#</th> --}}
                                        <th class="fifteen">User Name</th>
                                        <th class="fifteen">Time</th>
                                         @foreach($form_headers as $header)
                                            <th>{{ $header['label'] ?? title_case($header['name']) }}</th>
                                        @endforeach
                                        <th class="fifteen">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($submissions as $submission)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ $submission->user->name ?? 'n/a' }}</td>
                                                <td>{{ $submission->created_at->toDayDateTimeString() }}</td>

                                                @foreach($form_headers as $header)
                                                    <td>
                                                        {{
                                                            $submission->renderEntryContent(
                                                                $header['name'], $header['type'], true
                                                            )
                                                        }}
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <a href="{{ route('formbuilder::forms.submissions.show', [$form, $submission->id]) }}" class="btn btn-primary btn-sm" title="View submission">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>

                                                    @can('user_management_access')
                                                    <form action="{{ route('formbuilder::forms.submissions.destroy', [$form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>@endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>

                        @else
                            <div class="card-body">
                                <h4 class="text-danger text-center">
                                    No submission to display.
                                </h4>
                            </div>
                        @endif

                @else

                    @foreach ($departments as $department)
                        @if(App\Department::findOrfail($department)->name == 'Front Desk')

                        <div class="table-responsive">
                            <table class="table-bordered" id="housekeeps_table">
                                <thead>
                                    <tr>
                                        {{-- <th class="five">#</th> --}}
                                        <th class="fifteen">User Name</th>
                                        <th class="fifteen">Time</th>
                                        @foreach($form_headers as $header)
                                            <th>{{ $header['label'] ?? title_case($header['name']) }}</th>
                                        @endforeach
                                        <th class="fifteen">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user_submissions as $submission)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ $submission->user->name ?? 'n/a' }}</td>
                                                <td>{{ $submission->created_at->toDayDateTimeString() }}</td>
    
                                                @foreach($form_headers as $header)
                                                    <td>
                                                        {{
                                                            $submission->renderEntryContent(
                                                                $header['name'], $header['type'], true
                                                            )
                                                        }}
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <a href="{{ route('formbuilder::forms.submissions.show', [$form, $submission->id]) }}" class="btn btn-primary btn-sm" title="View submission">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                    @can('user_management_access')
                                                    <form action="{{ route('formbuilder::forms.submissions.destroy', [$form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
    
                                                        <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>@endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                              </table>
                            </div>

                        @elseif(App\Department::findOrfail($department)->name == 'Housekeeping')
                        <div class="table-responsive">
                            <table class="table-bordered" id="housekeeps_table">
                                <thead>
                                    <tr>
                                        {{-- <th class="five">#</th> --}}
                                        <th class="fifteen">User Name</th>
                                        <th class="fifteen">Time</th>
                                        @foreach($form_headers as $header)
                                            <th>{{ $header['label'] ?? title_case($header['name']) }}</th>
                                        @endforeach
                                        <th class="fifteen">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach (App\Department::findOrfail($department_id)->users as $user)

                                    @foreach($user_submissions as $submission)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ $submission->user->name ?? 'n/a' }}</td>
                                                <td>{{ $submission->created_at->toDayDateTimeString() }}</td>

                                                @foreach($form_headers as $header)
                                                    <td>
                                                        {{
                                                            $submission->renderEntryContent(
                                                                $header['name'], $header['type'], true
                                                            )
                                                        }}
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <a href="{{ route('formbuilder::forms.submissions.show', [$form, $submission->id]) }}" class="btn btn-primary btn-sm" title="View submission">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                    @can('user_management_access')
                                                    <form action="{{ route('formbuilder::forms.submissions.destroy', [$form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>@endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            @if(App\User::find(auth()->user()->id)->submissions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered d-table table-striped pb-0 mb-0">
                                    <thead>
                                        <tr>
                                            <th class="five">#</th>
                                            <th class="fifteen">User Name</th>
                                            <th class="fifteen">Time </th>
                                            @foreach($form_headers as $header)
                                                <th>{{ $header['label'] ?? title_case($header['name']) }}</th>
                                            @endforeach
                                            <th class="fifteen">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\User::find(auth()->user()->id)->submissions as $submission)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $submission->user->name ?? 'n/a' }}</td>
                                                <td>{{ $submission->created_at->toDayDateTimeString() }}</td>
        
                                                @foreach($form_headers as $header)
                                                    <td>
                                                        {{
                                                            $submission->renderEntryContent(
                                                                $header['name'], $header['type'], true
                                                            )
                                                        }}
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <a href="{{ route('formbuilder::forms.submissions.show', [$form, $submission->id]) }}" class="btn btn-primary btn-sm" title="View submission">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                    @can('user_management_access')
                                                    <form action="{{ route('formbuilder::forms.submissions.destroy', [$form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
        
                                                        <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>@endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="card-body">
                                    <h4 class="text-danger text-center">
                                        No submission to display.
                                    </h4>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    
                @endif


    </div>
</div>
@endsection
