@extends('admin.public.common')

    <!----右侧内容----------------------------------------------------------------------------------------------------->

    {{--<div class="main-content">--}}

    <!---------------------------------------------------------------------------------------------------------->

    <!-------展示内容---------------------------------------------------------------------------------------------->
@section('content')
    <div class="page-title">

            <div class="title-env">
                <h1 class="title">修改管理员</h1>
                {{--<p class="description">Plain text boxes, select dropdowns and other basic form elements</p>--}}
            </div>

            <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1">
                    <li>
                        <a href="dashboard-1.html"><i class="fa-home"></i>后台</a>
                    </li>
                    <li>

                        <a href="forms-native.html">权限</a>
                    </li>
                    <li class="active">

                        <strong>修改管理员</strong>
                    </li>
                </ol>

            </div>

        </div>




        <div class="row">

            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">修改管理员</h3>
                        <div class="panel-options">
                            <a href="#" data-toggle="panel">
                                <span class="collapse-icon">&ndash;</span>
                                <span class="expand-icon">+</span>
                            </a>
                            <a href="#" data-toggle="remove">
                                &times;
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">

                        <form role="form" id="reg">

                            <div class="form-group">
                                <label for="email-1">管理员账号:</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Enter your email&hellip;" value="{{$admin_user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="password-1">密码:</label>
                                <input type="password" class="form-control" name="password" id="password-1" placeholder="Enter your password">
                            </div>


                            <div class="form-group">
                                <label for="password-2">状态:</label>
                                <input type="radio" name="status" id="status" class="cbr cbr-primary" value="0" @if($admin_user->status==1) checked @endif>
                                启用&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="status"  class="cbr cbr-primary" value="1" @if($admin_user->status==0) checked @endif>
                                关闭
                            </div>

                            <div class="form-group">
                                <label for="password-3">是否为超级管理员:</label>
                                <input type="radio" name="is_super"  class="cbr cbr-primary" value="1" @if($admin_user->is_super==1) checked @endif>
                                是&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="is_super"  class="cbr cbr-primary" value="0" @if($admin_user->is_super==0) checked @endif>
                                否
                            </div>

                            <div class="form-group">
                                <label for="password-3">所属角色组:</label>
                                @foreach($role->chunk(3) as $v)
                                    @foreach($v as $v2)
                                        <div class="checkbox block">
                                            <label class="checkbox">
                                                <input type="checkbox" name="roles" value="{{$v2->id}}" @if(in_array($v2->id,$role_ids)) checked="checked" @endif>
                                                <i></i>{{$v2->display_name}}</label>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-single pull-right">添加</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection

       @section('footer')
               <!-- Main Footer -->
        <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
        <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
        <!-- Or class "fixed" to  always fix the footer to the end of page -->
        <footer class="main-footer sticky footer-type-1">

            <div class="footer-inner">

                <!-- Add your copyright text here -->
                <div class="footer-text">
                    &copy; 2014
                    <strong>Xenon</strong>
                    theme by <a href="http://laborator.co" target="_blank">Laborator</a>
                </div>


                <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                <div class="go-up">

                    <a href="#" rel="go-top">
                        <i class="fa-angle-up"></i>
                    </a>

                </div>

            </div>

        </footer>
        @endsection

        @section('chat')
    <!-- start: Chat Section -->
    <div id="chat" class="fixed">

        <div class="chat-inner">


            <h2 class="chat-header">
                <a href="#" class="chat-close" data-toggle="chat">
                    <i class="fa-plus-circle rotate-45deg"></i>
                </a>

                Chat
                <span class="badge badge-success is-hidden">0</span>
            </h2>

            <script type="text/javascript">
                // Here is just a sample how to open chat conversation box
                jQuery(document).ready(function($)
                {
                    var $chat_conversation = $(".chat-conversation");

                    $(".chat-group a").on('click', function(ev)
                    {
                        ev.preventDefault();

                        $chat_conversation.toggleClass('is-open');

                        $(".chat-conversation textarea").trigger('autosize.resize').focus();
                    });

                    $(".conversation-close").on('click', function(ev)
                    {
                        ev.preventDefault();
                        $chat_conversation.removeClass('is-open');
                    });
                });
            </script>

        </div>

        <!-- conversation template -->
        <div class="chat-conversation">

            <div class="conversation-header">
                <a href="#" class="conversation-close">
                    &times;
                </a>

                <span class="user-status is-online"></span>
                <span class="display-name">Arlind Nushi</span>
                <small>Online</small>
            </div>

            <ul class="conversation-body">
                <li>
                    <span class="user">Arlind Nushi</span>
                    <span class="time">09:00</span>
                    <p>Are you here?</p>
                </li>
                <li class="odd">
                    <span class="user">Brandon S. Young</span>
                    <span class="time">09:25</span>
                    <p>This message is pre-queued.</p>
                </li>
                <li>
                    <span class="user">Brandon S. Young</span>
                    <span class="time">09:26</span>
                    <p>Whohoo!</p>
                </li>
                <li class="odd">
                    <span class="user">Arlind Nushi</span>
                    <span class="time">09:27</span>
                    <p>Do you like it?</p>
                </li>
            </ul>

            <div class="chat-textarea">
                <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
            </div>

        </div>

    </div>
    <!-- end: Chat Section -->

    <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            // Reveal Login form
            setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
            // Validation and Ajax action
            $("form#reg").validate({
                rules: {
                    name: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: 'Please enter your username.'
                    },
                    password: {
                        required: 'Please enter your password.'
                    }
                },
                // Form Processing via AJAX
                submitHandler: function(form)
                {
                    show_loading_bar(100); // Fill progress bar to 70% (just a given value)
                    var opts = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-full-width",
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    var id_array=new Array();
                    $('input[name="roles"]:checked').each(function(){
                        id_array.push($(this).val());//向数组中添加元素
                    });
                    //var idstr=id_array.join(',');//将数组元素连接起来以构建一个字符串
                    $.ajax({
                        url: "{{route('administrator_update',['id'=>$admin_user->id])}}",
                        method: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        data: {
                            name: $(form).find('#name').val(),
                            password: $(form).find('#password-1').val(),
                            status: $("input[name='status']:checked").val(),
                            is_super:$("input[name='is_super']:checked").val(),
                            roles:id_array
                        },
                        success: function(resp)
                        {
                            show_loading_bar({
                                delay: .5,
                                pct: 100,
                                finish: function(){
                                    if(resp.accessGranted)
                                    {
                                        zeroModal.success({
                                            content: '操作提示!',
                                            contentDetail: '修改成功',
                                            okFn: function() {
                                                window.location.href = '/admin/administrator';
                                            }
                                        });
                                    }else{
                                        zeroModal.error('修改失败!');
                                    }
                                }
                            });
                        }
                    });
                }
            });
            // Set Form focus
            $("form#reg .form-group:has(.form-control):first .form-control").focus();
        });
    </script>
    <script src="{{ asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
</div>

@endsection




