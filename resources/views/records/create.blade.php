@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
                <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-4">
                            <button onclick="goBack()" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-4">
                            <strong>Create Housekeeping Record</strong>
                        </div>
                        <div class="col-md-4">
                            <!-- <a href="{{ route('admin.records.create') }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-plus"></i> Record New Housekeeping</a> -->
                        </div>
                    </div>
                </div>

    <div class="panel-body">

      <form action="{{route('admin.records.store')}}" method="post">
        {{csrf_field()}}

        
          <div class="form-group">
            <label>Select Room Number</label>
            <select name="room_id" class="form-control">
              @foreach($rooms as $room)
                <option value="{{$room->id}}">{{$room->room_number}}</option>
              @endforeach
            </select>
          </div>
      

        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label>Bath Towel</label>
              <input type="text" name="bath_towel" value="{{old('bath_towel')}}" class="form-control">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Bed Sheet</label>
              <input type="text" name="bed_sheet" value="{{old('bed_sheet')}}" class="form-control">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Bed Cover</label>
              <input type="text" name="bed_cover" value="{{old('bed_cover')}}" class="form-control">
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Pillow Case</label>
              <input type="text" name="pillow_case" value="{{old('pillow_case')}}" class="form-control">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Duvet Cover</label>
              <input type="text" name="duvet_cover" value="{{old('duvet_cover')}}" class="form-control">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Prayer Mat</label>
              <input type="text" name="prayer_mat" value="{{old('prayer_mat')}}" class="form-control">
            </div>
          </div>

        </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" value="Submit Record">
          </div>

      </form>

   </div>
  </div>

@endsection
