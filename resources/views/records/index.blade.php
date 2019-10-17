@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
                <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>Housekeeping Records</strong>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.records.create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Record New Housekeeping</a>
                        </div>
                    </div>
                </div>

    <div class="panel-body">

      @if(count($records) > 0)
      <table class="table table-bordered" id="clients_table">
          <thead>
              <tr>
                  {{-- <th>#ID</th> --}}
                  <th>Record</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>

                  @foreach ($records as $record)
                      <tr>
                      {{-- <td>{{$record->id}}</td> --}}
                      <td>{{$record}}</td>
                      {{-- <td>{{$record->created_at->format('D, M j, Y g:i A')}}</td> --}}
                      <td>
                          test
                          {{-- <div class="row">
                              <div class="col-md-4">
                                  <a href="{{route('admin.records.show', $record->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> View</a>
                              </div>
                              <div class="col-md-8">
                                  <form action="{{route('admin.records.destroy', $record->id)}}" method="POST">
                                      {{csrf_field()}}{{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                                  </form>
                              </div>
                          </div> --}}
                      </td>
                      </tr>
                  @endforeach

              </tbody>
          </table>
      @else
          <h4>There are no records</h4>
      @endif

    </div>
  </div>
@endsection
