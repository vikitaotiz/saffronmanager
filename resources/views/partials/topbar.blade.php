<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('quickadmin.quickadmin_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('quickadmin.quickadmin_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        {{-- <div class="navbar-header">
            <a class="navbar-brand" href="#">Project Manager <small><code> version 0.0.1</code></small></a>
          </div> --}}

        <ul class="nav navbar-nav ml-auto pull-right">
          <!-- <li class="dropdown">
            <a href="#" class="nav-link">
              <i class="fa fa-bell"> <span class="badge badge-light">1</span></i>
            </a>
          </li> -->

          <li class="dropdown" style="margin-right: 100px;">
            <h4 class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
              <i class="fa fa-bell">
                {{-- @if (auth()->user()->unreadNotifications->count() >)
                    <span class="badge badge-light">
                       {{auth()->user()->unreadNotifications->count()}}
                    </span>
                @endif --}}
              </i>
            </h4>
            <ul class="dropdown-menu" style="padding: 5px;">
              <li>
                <a href="{{route('markAsRead')}}" class="btn btn-sm btn-info">Mark all as Read</a><br>


                {{-- @foreach (auth()->user()->unreadNotifications as $notification)
                    <a href="{{ route('formbuilder::forms.submissions.show', [$notification->data['form_id'], $notification->data['id']]) }}" class="bg-warning">
                      {{$notification->data['data']}}tt</a>
                @endforeach
                 <hr>
                 @foreach (auth()->user()->readNotifications as $notification)
                     <a href="#">{{$notification->data['data']}}</a>
                 @endforeach --}}
              </li>
              <!-- <li><a href="#">CSS</a></li>
              <li><a href="#">JavaScript</a></li> -->
            </ul>
          </li>
          <li class="dropdown user user-menu" id="message_alert">
              <a href="{{action('ContactsController@chats')}}">        
                <message-alert :user="{{auth()->user()}}"></message-alert>
              </a>
          </li>
          {{-- <ul class="nav navbar-nav dropdown-menu">
                                      <!-- User image -->
                                            <h4 class="text-center">Notifications</h4>

                                      <!-- Menu Footer-->

                                      <li class="user-body">
                                           <a href="{{route('markAsRead')}}" class="btn btn-sm btn-info">Mark all as Read</a><br>


                                            @foreach (auttth()->user()->unreadNotifications as $notification)
                                                <a href="{{ route('formbuilder::forms.submissions.show', [$form_id, $notification->data['id']]) }}" class="bg-warning">
                                                  {{$notification->data['data']}}tt</a>
                                            @endforeach
                                            <hr>
                                            @foreach (auth()->user()->readNotifications as $notification)
                                                <a href="#">{{$notification->data['data']}}</a>
                                            @endforeach

                                          </li>
                                    </ul> --> --}}
         <li class="nav-item">
           <a class="nav-link" href="#logout" onclick="$('#logout').submit();">
                <i class="fa fa-power-off"></i>
                <span class="title">@lang('quickadmin.qa_logout')</span>
            </a>
         </li>
        </ul>

    </nav>
</header>
