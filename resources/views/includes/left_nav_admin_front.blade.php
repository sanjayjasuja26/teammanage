
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="#" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                            </span> <span class="text-muted text-xs block">{{Auth::user()->role->role}} <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              <li><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </li>
                @if(Auth::user()->role_id==2)
                @if(Session::has('superadminrollId') || Auth::user()->roll_id == '2')
                  <li>
                    <a href="/admin/manage/user/accessaccount/{{Session::get('superadminId')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Back</span></a>
                  </li>

                @endif
                <li>

                    <a href="/admin/manage"><i class="fa fa-th-large"></i> <span class="nav-label">Manage User</span></a>
                </li>
                @elseif(Auth::user()->role_id==3)
                @if(Session::has('superadminrollId') || Auth::user()->roll_id == '2')
                  <li>
                    <a href="/admin/manage/user/accessaccount/{{Session::get('superadminId')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Back</span></a>
                  </li>
                    @endif
                  <li>
                      <a href="/employee"><i class="fa fa-th-large"></i> <span class="nav-label">Manage Employee</span></a>
                  </li>

                @else
                  @if(Session::has('superadminrollId') || Auth::user()->roll_id == '2')
                    <li>
                      <a href="/admin/manage/user/accessaccount/{{Session::get('superadminId')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Back</span></a>
                    </li>

                  @endif

                @endif
            </ul>
        </div>
    </nav>
