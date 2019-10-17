<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="box-footer box-comments alert {{ $class }}">
        <div class="box-comment">
            <h4 style="text-decoration: underline;">
                <a href="{{ action('MessagesController@show', $thread->id) }}" style="color: black;">{{ $thread->subject }}</a>
                ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
            </h4>
          <!-- User image -->
          <img class="img-circle img-sm" src="{{asset('images/user.png')}}" alt="User Image">
          

          <div class="comment-text">

                <span class="username">
                        {{ $thread->creator()->name }}  
                        <small class="text-muted">{{ $thread->created_at->diffForHumans() }}</small>
                  <span class="text-muted pull-right">
                        @if($thread->department_id)
                        {{App\Department::find($thread->department_id)['name']}}
                    @else
                        No Department
                    @endif  
                    </span>
                </span><hr><!-- /.username -->
                {{ $thread->latestMessage->body }} <hr>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>

          </div>
          <!-- /.comment-text -->
        </div>
       
        <!-- /.box-comment -->
      </div><br>