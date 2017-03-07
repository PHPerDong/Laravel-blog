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
                            <img src="assets/images/user-2.png" class="img-responsive img-circle" />
                        </a>
                    </div>

                    <div class="user-details">

                        <h3>
                            <a href="extra-profile.html">John Smith</a>

                            <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                            <span class="user-status is-online"></span>
                        </h3>

                        <p class="user-title">Web Developer</p>

                        <div class="user-links">
                            <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
                            <a href="extra-profile.html" class="btn btn-success">Upgrade</a>
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
                    <a href="dashboard-1.html" class="logo-expanded">
                        <img src="assets/images/logo@2x.png" width="80" alt="" />
                    </a>

                    <a href="dashboard-1.html" class="logo-collapsed">
                        <img src="assets/images/logo-collapsed@2x.png" width="40" alt="" />
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
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li>
                    <a href="dashboard-1.html">
                        <i class="fa-gears"></i>
                        <span class="title">网站管理</span>
                    </a>
                    <ul>

                        <li>
                            <a href="skin-generator.html">
                                <span class="title">Skin Generator</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="layout-variants.html">
                        <i class="linecons-desktop"></i>
                        <span class="title">Layouts</span>
                    </a>
                    <ul>
                        <li>
                            <a href="layout-variants.html">
                                <span class="title">Layout Variants &amp; API</span>
                            </a>
                        </li>

                        <li>
                            <a href="layout-boxed.html">
                                <span class="title">Boxed Layout</span>
                            </a>
                        </li>
                        <li>
                            <a href="layout-boxed-horizontal-menu.html">
                                <span class="title">Boxed &amp; Horizontal Menu</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="ui-panels.html">
                        <i class="linecons-note"></i>
                        <span class="title">UI Elements</span>
                    </a>
                    <ul>

                        <li>
                            <a href="ui-typography.html">
                                <span class="title">Typography</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui-other-elements.html">
                                <span class="title">Other Elements</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="extra-gallery.html">
                        <i class="fa-newspaper-o"></i>
                        <span class="title">文章管理</span>
                        <span class="label label-purple pull-right hidden-collapsed">5</span>
                    </a>
                    <ul>
                        <li>
                            <a href="extra-icons-fontawesome.html">
                                <span class="title">标签管理</span>
                                <span class="label label-warning pull-right">4</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="extra-icons-fontawesome.html">
                                        <span class="title">Font Awesome</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="extra-icons-linecons.html">
                                        <span class="title">Linecons</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="{{route('article_list')}}">
                                <span class="title">文章列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-gallery.html">
                                <span class="title">添加文章</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-group"></i>
                        <span class="title">后台权限管理</span>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="entypo-flow-line"></i>
                                <span class="title">测试使用</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="entypo-flow-parallel"></i>
                                        <span class="title">Menu Level 2.1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="entypo-flow-parallel"></i>
                                        <span class="title">Menu Level 2.2</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="entypo-flow-cascade"></i>
                                                <span class="title">Menu Level 3.1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="entypo-flow-cascade"></i>
                                                <span class="title">Menu Level 3.2</span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="entypo-flow-branch"></i>
                                                        <span class="title">Menu Level 4.1</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="entypo-flow-parallel"></i>
                                        <span class="title">Menu Level 2.3</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/administrator">
                                <i class="entypo-flow-line"></i>
                                <span class="title">添加管理员</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/admin_auth_role">
                                <i class="entypo-flow-line"></i>
                                <span class="title">权限组(角色)</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/admin_auth_role/add">
                                <i class="entypo-flow-line"></i>
                                <span class="title">添加权限组(角色)</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/admin_auth_permission">
                                <i class="entypo-flow-line"></i>
                                <span class="title">菜单权限列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/administrator_list">
                                <i class="entypo-flow-line"></i>
                                <span class="title">管理员列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/admin_auth_permission/add">
                                <i class="entypo-flow-line"></i>
                                <span class="title">添加菜单</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>
