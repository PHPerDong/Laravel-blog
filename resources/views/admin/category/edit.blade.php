@extends('admin.public.common')

    <!----右侧内容----------------------------------------------------------------------------------------------------->

    {{--<div class="main-content">--}}

    <!---------------------------------------------------------------------------------------------------------->

    <!-------展示内容---------------------------------------------------------------------------------------------->
@section('content')
    <div class="page-title">

            <div class="title-env">
                <h1 class="title">分类修改</h1>
                {{--<p class="description">Plain text boxes, select dropdowns and other basic form elements</p>--}}
            </div>

            <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1">
                    <li>
                        <a href="dashboard-1.html"><i class="fa-home"></i>后台</a>
                    </li>
                    <li>

                        <a href="forms-native.html">菜单</a>
                    </li>
                    <li class="active">

                        <strong>分类修改</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">分类修改</h3>
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
                                <label for="email-1">名称:</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="请输入" value="{{$category->name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">所属上级菜单</label>

                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#sboxit-1").selectBoxIt().on('open', function()
                                        {
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>
                                @inject('categoryPresenter','App\Http\Controllers\Admin\CategoryController')

                                {!! $categoryPresenter->topCategorySelect() !!}

                            </div>

                           {{-- <div class="form-group">
                                <label for="password-1">是否显示:</label>
                                <input type="radio" name="is_menu" id="is_menu" class="cbr cbr-primary" value="1" checked>
                                是&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="is_menu" id="is_menu" class="cbr cbr-primary" value="0">
                                否
                            </div>--}}

                            <div class="form-group">
                                <label for="password-1">排序:</label>
                                <input type="text" class="form-control" name="sort" id="sort" placeholder="排序" value="{{$category->sort}}">
                            </div>


                            {{csrf_field()}}
                            <div class="form-group">
                                {{--<button type="submit" class="btn btn-gray btn-single">添加</button>--}}
                                <button type="submit" class="btn btn-info btn-single pull-right">修改</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endsection

       @section('footer')
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
                    pid: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: '请输入名称.'
                    },
                    pid: {
                        required: '请选择.'
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
                        url: "/admin/edit/class",
                        method: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        data: {
                            name: $(form).find('#name').val(),
                            pid:$(form).find('#sboxit-1').val(),
                            sort:$(form).find('#sort').val(),
                            id:'<?php echo $_GET['pid']?>'
                        },
                        success: function(resp)
                        {
                            show_loading_bar({
                                delay: .5,
                                pct: 100,
                                finish: function(){
                                    // Redirect after successful login page (when progress bar reaches 100%)
                                    if(resp.accessGranted)
                                    {
                                        zeroModal.success({
                                            content: '操作提示!',
                                            contentDetail: '修改成功',
                                            okFn: function() {
                                                window.location.href = '/admin/classification';
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
@section('mycss')
<link rel="stylesheet" href="{{ asset('assets/js/daterangepicker/daterangepicker-bs3.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/multiselect/css/multi-select.css')}}">
@endsection

@section('myjs')
<script src="{{ asset('assets/js/moment.min.js')}}"></script>


<!-- Imported scripts on this page -->
<script src="{{ asset('assets/js/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/js/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('assets/js/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('assets/js/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/js/selectboxit/jquery.selectBoxIt.min.js')}}"></script>
<script src="{{ asset('assets/js/tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('assets/js/typeahead.bundle.js')}}"></script>
<script src="{{ asset('assets/js/handlebars.min.js')}}"></script>
<script src="{{ asset('assets/js/multiselect/js/jquery.multi-select.js')}}"></script>
@endsection


