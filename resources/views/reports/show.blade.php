@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{$form->name}}
            </div>
            <div class="panel-body">
                    <ul class="list-gruop">
                        <li class="list-group-item"><strong>Created On : </strong>{{$form->created_at}}</li>
                        <li class="list-group-item"><strong>No of Submissions : </strong>{{$form->submissions->count()}}</li>
                        <li class="list-group-item"><strong>Created By : </strong>{{App\User::findOrfail($form->user_id)->name}}</li>
                        <li class="list-group-item"><strong>Created On : </strong>{{$form->created_at}}</li>
                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection
