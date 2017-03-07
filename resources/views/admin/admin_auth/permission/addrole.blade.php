@extends('admin.public.common')

    <!----右侧内容----------------------------------------------------------------------------------------------------->

    {{--<div class="main-content">--}}

    <!---------------------------------------------------------------------------------------------------------->

    <!-------展示内容---------------------------------------------------------------------------------------------->
@section('content')
    <div class="page-title">

            <div class="title-env">
                <h1 class="title">添加权限组(角色)</h1>
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

                        <strong>添加权限组</strong>
                    </li>
                </ol>

            </div>

        </div>




        <div class="row">

            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">添加权限组</h3>
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
                                <label for="display_name">权限组名称:</label>
                                <input type="text" class="form-control"  name="display_name" id="display_name" placeholder="权限组名称&hellip;">
                            </div>

                            <div class="form-group">
                                <label for="name">标识:</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="标识&hellip;">
                            </div>

                            <div class="form-group">
                                <label for="description">说明(描述):</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="说明(描述)">
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                {{--<button type="submit" class="btn btn-gray btn-single">添加</button>--}}
                                <button type="submit" class="btn btn-info btn-single pull-right">添加</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
       {{-- <div class="row">

        </div>--}}
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
                    display_name: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: '请输入标识.'
                    },
                    display_name: {
                        required: '请输入权限名.'
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
                    $.ajax({
                        url: "{{route('roleadd')}}",
                        method: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        data: {
                            name: $(form).find('#name').val(),
                            description: $(form).find('#description').val(),
                            display_name: $(form).find('#display_name').val(),
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
                                            contentDetail: '添加成功',
                                            okFn: function() {
                                                window.location.href = '/admin/admin_auth_role/add';
                                            }
                                        });
                                    }else{
                                        zeroModal.error('添加失败!');
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




