@extends('formbuilder::layout')

@section('content')

<div class="panel panel-success">
        <div class="panel-heading">
              <div class="row">
                <div class="col-md-4">
                    <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                    @can('user_management_access')
                        <a href="{{ route('formbuilder::forms.index') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-arrow-left"></i> Back To Forms
                        </a>@endcan
                </div>
                <div class="col-md-4">
                    <strong>Viewing my submission for form 
                            <strong>{{ $submission->form->name }}</strong>
                </div>
                <div class="col-md-4">
                        @can('user_management_access')
                            @if($submission->form->allowsEdit())
                                <a href="{{ route('formbuilder::my-submissions.edit', $submission) }}" class="btn btn-primary btn-sm" title="Edit this submission">
                                    <i class="fa fa-pencil"></i> 
                                </a>
                            @endif

                            <form action="{{ route('formbuilder::my-submissions.destroy', [$submission->id]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                    @csrf 
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm rounded-0 confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete submission" title="Delete this submission?">
                                        <i class="fa fa-trash-o"></i> 
                                    </button>
                                </form>

                        @endcan
                </div>
            </div>
        </div>
      
        <div class="panel-body">

        <div class="col-md-8">
            <div class="card rounded-0">
                

                <ul class="list-group list-group-flush">
                    @foreach($form_headers as $header)
                        <li class="list-group-item">
                            <strong>{{ $header['label'] ?? title_case($header['name']) }}: </strong> 
                            <span class="float-right">
                                {{ $submission->renderEntryContent($header['name'], $header['type']) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Details</h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Form: </strong> 
                        <span class="float-right">{{ $submission->form->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Submitted By: </strong> 
                        <span class="float-right">{{ $submission->user->name ?? 'Guest' }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Last Updated On: </strong> 
                        <span class="float-right">{{ $submission->updated_at->toDayDateTimeString() }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Submitted On: </strong> 
                        <span class="float-right">{{ $submission->created_at->toDayDateTimeString() }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="panel panel-success">
    <div class="panel-heading">
                Comments
            </div>
            <div class="panel-body">
                @if ($comments->count() > 0)
                    @foreach ($comments as $comment)
                        <div class="panel-warning" style="border: 2px solid gray;">
                            <div class="panel-heading">
                               <strong>Created By: {{$comment->user->name}} </strong> <small><i>{{$comment->created_at->diffForHumans()}}</i></small>
                            </div>
                            <div class="panel-body">
                                {{$comment->body}}
                            </div>
                        </div><br>
                    @endforeach
                @else
                    <strong>No Comments for this submission.</strong>
                @endif
            </div>
            <div class="panel-footer">
                <form action="{{route('comments.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>Add Comment</label>
                        <textarea name="body" id="body" class="form-control">
                        </textarea>
                    </div>
                    <input type="hidden" name="submission_id" value="{{$submission->id}}">
                    <div class="form-group">
                        <input type="submit" value="Submit Comment" class="btn btn-sm btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
        
@endsection
