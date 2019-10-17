<!-- /.box-header -->
<div class="box-body">
        <!-- Conversations are loaded here -->
        <div style="padding:2%;">
          <!-- Message. Default to the left -->
          <div class="direct-chat-msg">
            <div class="direct-chat-info clearfix">
              <span class="direct-chat-name pull-left">{{ $message->user->name }}</span>
              <span class="direct-chat-timestamp pull-right">Posted {{ $message->created_at->diffForHumans() }}</span>
            </div>
            <!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="{{asset('images/user.png')}}" alt="{{ $message->user->name }}"><!-- /.direct-chat-img -->
            <div class="direct-chat-text">
                    {{ $message->body }}
            </div>
            <!-- /.direct-chat-text -->
          </div>
          <!-- /.direct-chat-msg -->

          <!-- /.direct-chat-msg -->
        </div>
        <!--/.direct-chat-messages-->

        
        <!-- /.direct-chat-pane -->
      </div>