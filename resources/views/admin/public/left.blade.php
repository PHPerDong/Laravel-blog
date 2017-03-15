 <div class="settings-pane">

    <a href="#" data-toggle="settings-pane" data-animate="true">
        &times;
    </a>

    <div class="settings-pane-inner">
        <div class="row">
            <div class="col-md-4">
                <div class="user-info">
                    <div class="user-image">
                        <a href="extra-profile.html">
                            <img src="{{ asset('assets/images/user-2.png')}}" class="img-responsive img-circle" />
                        </a>
                    </div>
                    <div class="user-details">
                        <h3>
                            <span class="user-status is-online"></span>
                            <a href="extra-profile.html"><?php echo Auth::guard('admin')->user()->name?></a>
                            <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->

                        </h3>
                        <p class="user-title">管理员</p>

                        <div class="user-links">
                            <a href="extra-profile.html" class="btn btn-success">密码修改</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 link-blocks-env">
                <div class="links-block left-sep">
                    <h4>
                        <span>Notifications</span>
                    </h4>
                    <ul class="list-unstyled">
                        <li>
                            <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
                            <label for="sp-chk1">Messages</label>
                        </li>

                    </ul>
                </div>
                <div class="links-block left-sep">
                    <h4>
                        <a href="#">
                            <span>Help Desk</span>
                        </a>
                    </h4>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                Support Center
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
    <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
    <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
    <div class="sidebar-menu toggle-others fixed">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="dashboard-1.html" class="logo-expanded" style="color: #f1f1f1;font-size: 30px">
                        后台管理
                    </a>

                    <a href="dashboard-1.html" class="logo-collapsed">
                        <img src="{{ asset('assets/images/user-2.png')}}" width="40" alt="" />
                    </a>
                </div>

                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                <div class="mobile-menu-toggle visible-xs">
                    <a href="#" data-toggle="user-info-menu">
                        <i class="fa-bell-o"></i>
                        <span class="badge badge-success">7</span>
                    </a>

                    <a href="#" data-toggle="mobile-menu">
                        <i class="fa-bars"></i>
                    </a>
                </div>

                <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                <div class="settings-icon">
                    <a href="#" data-toggle="settings-pane" data-animate="true">
                        <i class="linecons-cog"></i>
                    </a>
                </div>


            </header>
            <ul id="main-menu" class="main-menu">
                @foreach($menuData as $v)
                <li>
                    <a href="{{$v->url}}">
                        <i class="{{$v->icon}}"></i>
                        <span class="title">{{$v->display_name}}</span>
                        {{--<span class="label label-purple pull-right hidden-collapsed">5</span>--}}
                    </a>
                    @if(count($v->child)>0)
                    <ul>
                        @foreach($v->child as $child)
                        <li>
                            <a href="{{$child->url}}">
                                <i class="entypo-flow-line"></i>
                                <span class="title">{{$child->display_name}}</span>
                            </a>
                            @if(count($child->child)>0)
                            <ul>
                                @foreach($child->$child as $childs)
                                <li>
                                    <a href="{{$childs->url}}">
                                        <i class="entypo-flow-parallel"></i>
                                        <span class="title">{{$childs->display_name}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                       @endforeach
                    </ul>
                        @endif
                </li>
                    @endforeach

            </ul>
        </div>
    </div>
