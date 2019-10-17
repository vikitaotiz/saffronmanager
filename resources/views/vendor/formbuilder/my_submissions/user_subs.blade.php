@extends('formbuilder::layout')

@section('content')

<div class="panel panel-success">
        <div class="panel-heading">
              <div class="row">
                <div class="col-md-4">
                    <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                </div>
                <div class="col-md-4">
                    <strong>User Name : {{ $pageTitle }} <br> Submissions : {{ $submissions->count() }} <br> 
                        Department Name : {{ $departmentName }}
                    </strong>
                </div>
                <div class="col-md-4">
                        {{-- <a href="{{ route('formbuilder::form.render', $form->identifier) }}" class="btn btn-sm btn-primary btn-block" title="Create New Task">
                                <i class="fa fa-plus"></i> Create New Task
                           </a> --}}
                </div>
            </div>
        </div>

        <div class="panel-body">

               


                @if($submissions->count())

                        
                        <div class="table-responsive">
                            <table class="table-bordered" id="housekeeps_table">
                                <thead>
                                    <tr>
                                        {{-- <th class="five">#</th> --}}
                                        {{-- <th class="fifteen">User Name</th> --}}
                                        <th class="fifteen">Time</th>
                                        <th class="fifteen">Form Name</th>
                                        {{-- @foreach($form_headers as $header)
                                            <th>{{ $header['label'] ?? title_case($header['name']) }}</th>
                                        @endforeach --}}
                                        {{-- <th class="fifteen">Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($submissions as $submission)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                {{-- <td>{{ $submission->user->name ?? 'n/a' }}</td> --}}
                                                <td>{{ $submission->created_at->toDayDateTimeString() }}</td>
                                                <td>{{ $submission->form->name}}</td>
                                                {{-- @foreach($form_headers as $header)
                                                    <td>
                                                        {{
                                                            $submission->renderEntryContent(
                                                                $header['name'], $header['type'], true
                                                            )
                                                        }}
                                                    </td>
                                                @endforeach --}}
                                                {{-- <td>
                                                    <a href="{{ route('formbuilder::forms.submissions.show', $submission->id) }}" class="btn btn-primary btn-sm" title="View submission">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                    @can('user_management_access')
                                                    <form action="{{ route('formbuilder::forms.submissions.destroy', $submission->id) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>@endcan
                                                </td> --}}
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>

                @else

                    <h4>There are no submissions</h4>

                @endif

    </div>
</div>
@endsection
