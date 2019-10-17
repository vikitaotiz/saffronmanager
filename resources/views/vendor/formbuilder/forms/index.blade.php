@extends('formbuilder::layout')

@section('content')

<div class="panel panel-success">
        <div class="panel-heading">
              <div class="row">
                <div class="col-md-2">
                    <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>  
                </div>
                <div class="col-md-2">
                    <a href="{{ route('formbuilder::forms.index') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-arrow-left"></i> Back To My Form
                        </a>  
                </div>
                <div class="col-md-2">
                    <a href="{{ route('formbuilder::my-submissions.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-th-list"></i> My Submissions
                    </a>
                </div>
                <div class="col-md-2">
                    <strong>Forms</strong>
                </div>
                <div class="col-md-4">
                        @can('user_management_access')
                        <a href="{{ route('formbuilder::forms.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i> Create a New Form
                        </a>@endcan
                </div>
            </div>
        </div>
      
        <div class="panel-body">
            <div class="card rounded-0">
    
                @if($forms->count())
                    <div class="table-responsive">
                        <table class="table table-bordered d-table table-striped pb-0 mb-0">
                            <thead>
                                <tr>
                                    <th class="five">#</th>
                                    <th>Name</th>
                                    <th class="ten">Department</th>
                                    <th class="fifteen">Allows Edit?</th>
                                    <th class="ten">Submissions</th>
                                    <th class="twenty-five">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($forms as $form)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $form->name }}</td>
                                        {{-- <td>{{ App\Department::find($form->department_id)['name']}}</td> --}}
                                        <td>{{ App\Department::find($form->department_id)['name']}}</td>
                                        <td>{{ $form->allowsEdit() ? 'YES' : 'NO' }}</td>
                                        <td>{{ $form->submissions->count() }}</td>

                                        <td>
                                            <a href="{{ route('formbuilder::forms.submissions.index', $form) }}" class="btn btn-primary btn-sm" title="View submissions for form '{{ $form->name }}'">
                                                <i class="fa fa-th-list"></i> Data
                                            </a>
                                            <a href="{{ route('formbuilder::forms.show', $form) }}" class="btn btn-primary btn-sm" title="Preview form '{{ $form->name }}'">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            @can('user_management_access')
                                            <a href="{{ route('formbuilder::forms.edit', $form) }}" class="btn btn-primary btn-sm" title="Edit form">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="btn btn-primary btn-sm clipboard" data-clipboard-text="{{ route('formbuilder::form.render', $form->identifier) }}" data-message="" data-original="" title="Copy form URL to clipboard">
                                                <i class="fa fa-clipboard"></i>
                                            </button>

                                            <form action="{{ route('formbuilder::forms.destroy', $form) }}" method="POST" id="deleteFormForm_{{ $form->id }}" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteFormForm_{{ $form->id }}" data-message="Delete form '{{ $form->name }}'?" title="Delete form '{{ $form->name }}'">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- @if($forms->hasPages())
                        <div class="card-footer mb-0 pb-0">
                            <div>{{ $forms->links() }}</div>
                        </div>
                    @endif --}}
                @else
                    <div class="card-body">
                        <h4 class="text-danger text-center">
                            No forms available.
                        </h4>
                    </div>
                @endif
            </div>
    </div>
@endsection
