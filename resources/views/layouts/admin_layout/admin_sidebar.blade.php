<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- <div class="iamge brand-link mb-2"> -->
        <img src="{{url ('images/logo_2.png')}}" class=" ml-4" width="170" height="47" alt="User Image">
        <!-- </div> -->
    </a>
    <!-- Sidebar -->
    <br>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center mr-2">
            <div class="image">
                <img src="{{url ('images/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            &nbsp;
            <div class="info">
                <h4><a href="#" class="d-block">{{ Auth::user()->name }}</a></h4>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    @if(Session::get('page') == 'dashoard')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/home')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'user')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/user')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'payment')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/payment')}}" class="nav-link {{$active}}">
                        <i class=" nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            Payments
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'verifications')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/verification')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>
                            Verifications
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'liveStream')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/liveStream')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-wifi"></i>
                        <p>
                            Live Stream
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'gift')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/gift')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>
                            Gift
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'interest')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/interest')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Interests
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'subscription')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/subscription')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-hand-point-up"></i>
                        <p>
                            SubscriptionPlan
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'notification')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/notification')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Notifications
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'report')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/report')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>
                            Reports
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'support')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/support')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>
                            Supports
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'gallery')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/gallery')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <!--  -->

                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'settings')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/settings')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Admin Settings
                        </p>
                    </a>
                </li>
                <!--  -->
                <li class="nav-item">
                    @if(Session::get('page') == 'adminSettings')
                    <?php $active = 'active'; ?>
                    @else
                    <?php $active = ''; ?>
                    @endif
                    <a href="{{url('/change-password')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>

                <!-- -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class=" nav-icon fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                <!-- -->
                <br>
            </ul>
        </nav>
    </div>
</aside>