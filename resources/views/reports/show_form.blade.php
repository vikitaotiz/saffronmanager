@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
         <div class="row">
               <div class="col-md-4">
                  <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
               </div>
                <div class="col-md-4">
                   <strong>{{$form->name}}</strong>
                </div>
                <div class="col-md-4">
                   {{-- <a href="{{route('notes.create')}}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Create New note</a> --}}
             </div>
         </div>
  </div>
</div>

<div class="panel-body">

               @if ($submissions->count() > 0)

                   <table border="0" cellspacing="5" cellpadding="5" class="text-center">
                      <tbody>
                          <tr>
                              <td>From Date:</td>
                              <td><input name="min" id="min" type="text"></td>
                              <td>&nbsp;</td><td>&nbsp;</td>
                              <td>To Date:</td>
                              <td><input name="max" id="max" type="text"></td>
                          </tr>

                      </tbody>
                  </table><hr>

                   <div class="table-responsive">
                     <table class="table table-bordered" id="submissions-table">
                       <thead>
                         <tr>
                           <th>ID</th>
                           <th>Form Name</th>
                           <th>User Name</th>
                           {{-- <th>Content</th> --}}
                           <th>Created At</th>
                         </tr>
                       </thead>
                       <tbody>
                          @foreach ($submissions as $submission)
                            <tr>
                              <td>{{$submission->id}}</td>
                              <td>{{\jazmy\FormBuilder\Models\Form::find($submission->form_id)->name }}</td>
                              <td>{{App\User::find($submission->user_id)->name}}</td>
                              {{-- <td>{{$submission->content['total-pending']}}</td> --}}
                              <td>{{$submission->created_at->format('Y/m/d')}}</td>
                            </tr>
                          @endforeach
                       </tbody>

                       <tfoot>
                          <tr>
                              <th style="text-align:right">Number of Forms:</th>
                              <th></th>
                              <th style="text-align:right">Total:</th>
                              <th></th><th></th>
                          </tr>
                      </tfoot>

                     </table>
                   </div>

                   @else
                       There are no form submissions.
                   @endif


              </div>
        </div>
    </div>
@endsection
