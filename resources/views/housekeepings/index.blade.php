@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
                <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>Housekeepings - Linen Used And In Circulation</strong>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.housekeepings.create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Record New Housekeeping</a>
                        </div>
                    </div>
                </div>
            </div>

                <div>

                  @if($rooms->count() > 0)
                  @foreach($rooms as $room)
                  <div class="col-md-2">
                    <div class="box box-warning">
                      <div class="box-header with-border">
                        <h3 class="box-title"><a href="{{route('admin.housekeepings.edit', $room->id)}}"> Room : {{$room->room_number}}</a></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" style="">
                        <ul class="list-group">
                          <li class="list-group-item">Bath Towel : </li>
                          <li class="list-group-item">Bed Sheet : </li>
                          <li class="list-group-item">Pillow Case : </li>
                          <li class="list-group-item">Duvet Cover : </li>
                          <li class="list-group-item">Bed Cover : </li>
                          <li class="list-group-item">Prayer Mat : </li>
                        </ul>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  @endforeach
                  @else
                    <h4>There are no rooms</h4>
                  @endif


                </div>

@endsection
