
<div class="box-footer">
        <form  action="{{ action('MessagesController@update', $thread->id) }}" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}

            Select Participants
            @if($users->count() > 0)
                <div class="checkbox" style="background: #D2D6DE; padding: 1%;">
                    @foreach($users as $user)
                        <label title="{{ $user->name }}">
                            <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}
                        </label>
                    @endforeach
                </div>
            @endif

          
                <div class="form-group">
                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                    </div>
           
                  <button type="submit" class="btn btn-primary btn-flat btn-block">Send</button>
        
        </form>
      </div>