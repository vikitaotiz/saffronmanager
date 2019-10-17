@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
                <div class="user-panel">
                        <div class="pull-left image">
                          <img src="{{asset('images/user.png')}}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                          <p>{{auth()->user()->name}}</p>
                          <a href="#">
                                {{App\Department::find(auth()->user()->department_id)->name ?? 'No Department'}}
                          </a>
                        </div>
                      </div>

            <li style="color: #A9A9A9; background: #27292A; text-align:center; padding:2%;
             margin-top:1%; margin-bottom:1%;">
                NAVIGATION MENU</li>


            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'client' ? 'active' : '' }}">
                 <a href="{{ action('ClientsController@index') }}">
                        <i class="fa fa-users"></i>
                        <span class="title">Clients</span>
                    </a>
            </li>

            <li class="{{ $request->segment(1) == 'appointment' ? 'active' : '' }}">
                 <a href="{{ action('AppointmentsController@fullCalendar') }}">
                        <i class="fa fa-calendar"></i>
                        <span class="title">Bookings</span>
                    </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comments" style="color:yellow;"></i>
                    <span>Message Board</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a href="{{ action('MessagesController@index') }}">
                            <i class="fa fa-users" style="color:blue;"></i>
                            <span>Public Messages</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{action('ContactsController@chats')}}">
                            <i class="fa fa-users" style="color:green;"></i>
                            <span>Private Messages</span>
                        </a>
                    </li>
                </ul>
            </li>

            @if(auth()->user()->name === 'Admin')

              <li class="{{ $request->segment(1) == 'department' ? 'active' : '' }}">
                  <a href="{{ action('DepartmentsController@index') }}">
                      <i class="fa fa-building"></i>
                      <span class="title">Department</span>
                  </a>
              </li>
            @endif

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Foms</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a href="{{ action('TasksController@index') }}">
                            <i class="fa fa-book"></i>
                            <span>Card View</span>
                        </a>
                    </li>

                    @can('user_access')
                    <li>
                        <a href="{{ route('formbuilder::forms.index') }}">
                            <i class="fa fa-gear"></i>
                            <span>List View</span>
                        </a>
                    </li>@endcan

                </ul>

            </li>
            <li style="color: #A9A9A9; background: #27292A; text-align:center; padding:2%;
            margin-top:2%; margin-bottom:1%;">
                    ACCOUNT</li>
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_access')
                        <li>
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fa fa-user"></i>
                                <span>@lang('quickadmin.users.title')</span>
                            </a>
                        </li>
                        @endcan
                    </ul>

                </li>@endcan

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            @can('user_management_access')
                <li style="color: #A9A9A9; background: #27292A; text-align:center; padding:2%;
                margin-top:2%; margin-bottom:1%;">
                        SETTINGS</li>
                <li class="{{ $request->segment(1) == 'reports' ? 'active' : '' }}">
                    <a href="{{ action('ReportsController@index') }}">
                        <i class="fa fa-file"></i>
                        <span class="title">System Reports</span>
                    </a>
                </li>

                <li class="{{ $request->segment(1) == 'reports' ? 'active' : '' }}">
                    <a href="{{ action('SettingsController@index') }}">
                        <i class="fa fa-gear"></i>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#logout" onclick="$('#logout').submit();">
                        <i class="fa fa-power-off" style="color:red;"></i>
                        <span class="title">@lang('quickadmin.qa_logout')</span>
                    </a>
                </li>
            @endcan

        </ul>
    </section>
</aside>
