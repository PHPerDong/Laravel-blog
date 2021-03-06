@extends('admin.public.common')

@section('content')
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">角色列表</h1>

				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="dashboard-1.html"><i class="fa-home"></i>后台</a>
						</li>
								<li>
						
										<a href="tables-basic.html">权限</a>
								</li>
							<li class="active">
						
										<strong>角色列表</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
			
			<!-- Basic Setup -->

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">角色列表</h3>
					
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
					
					<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-2").dataTable({
							dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
							aoColumns: [
								{bSortable: false},
								null,
								null,
								null,
								null
							],
						});
						
						// Replace checkboxes when they appear
						var $state = $("#example-2 thead input[type='checkbox']");
						
						$("#example-2").on('draw.dt', function()
						{
							cbr_replace();
							
							$state.trigger('change');
						});
						
						// Script to select all checkboxes
						$state.on('change', function(ev)
						{
							var $chcks = $("#example-2 tbody input[type='checkbox']");
							
							if($state.is(':checked'))
							{
								$chcks.prop('checked', true).trigger('change');
							}
							else
							{
								$chcks.prop('checked', false).trigger('change');
							}
						});
					});
					</script>
					
					<table class="table table-bordered table-striped" id="example-2">
						<thead>
							<tr>
								<th class="no-sorting">
									<input type="checkbox" class="cbr">
								</th>
								<th>ID</th>
								<th>角色名称</th>
								<th>创建时间</th>
								<th>操作</th>
							</tr>
						</thead>
						
						<tbody class="middle-align">
						@foreach($role_list as $v)
							<tr>
								<td>
									<input type="checkbox" class="cbr">
								</td>
								<td>{{$v->id}}</td>
								<td>{{$v->display_name}}</td>
								<td>{{$v->created_at}}</td>
								<td>
									<a href="{{route('role_edit',['id'=>$v->id])}}" class="btn btn-secondary btn-sm btn-icon icon-left">
										修改
									</a>
									<a href="javascript:;" class="btn btn-danger btn-sm btn-icon icon-left del" data-id="{{$v->id}}">
										删除
									</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					
				</div>
			</div>
			
@endsection


@section('footer')
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
				
				
				<div class="chat-group">
					<strong>Favorites</strong>
					<a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
				</div>

			
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

				</ul>
				
				<div class="chat-textarea">
					<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
				</div>
				
			</div>
			
		</div>
		<!-- end: Chat Section -->
			<script type="text/javascript">
				jQuery(document).ready(function($) {

					// Validation and Ajax action
					$(".del").click(function () {
						var id = $(this).attr('data-id');
						zeroModal.confirm({
							content: '确定要删除吗？',
							contentDetail: '删除后将不能进行恢复。',
							okFn: function() {
								$.ajax({
									url: "{{route('role_delete')}}",
									method: 'POST',
									dataType: 'json',
									headers: {
										'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
									},
									data: {
										id: id
									},
									success: function (resp) {
										show_loading_bar({
											delay: .5,
											pct: 100,
											finish: function () {
												if (resp.accessGranted) {
													zeroModal.success({
														content: '操作提示!',
														contentDetail: '删除成功',
														okFn: function () {
															window.location.href = '/admin/administrator_list';
														}
													});
												} else {
													zeroModal.error(resp.msg);
												}
											}
										});
									}
								});
							},
							cancelFn: function() {
								//alert('cancel');
							}
						});
					});
				});
			</script>
			<script src="{{ asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
@endsection



@section('mycss')
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('assets/js/datatables/dataTables.bootstrap.css')}}">
@endsection


@section('myjs')
		<script src="{{ asset('assets/js/datatables/js/jquery.dataTables.min.js')}}"></script>
	<!-- Imported scripts on this page -->
	<script src="{{ asset('assets/js/datatables/dataTables.bootstrap.js')}}"></script>
	<script src="{{ asset('assets/js/datatables/yadcf/jquery.dataTables.yadcf.js')}}"></script>
	<script src="{{ asset('assets/js/datatables/tabletools/dataTables.tableTools.min.js')}}"></script>
@endsection


