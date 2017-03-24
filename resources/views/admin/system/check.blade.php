@extends('admin.public.common')

@section('content')
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">签到</h1>

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
										<strong>签到</strong>
								</li>
								</ol>
				</div>
					
			</div>
			
			<!-- Basic Setup -->

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">签到</h3>
					
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

					<div id='calendar'></div>
					
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
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				locale:'zh-cn',
				buttonText: {
					today: '本月',
					month: '月',
					agendaWeek: '周',
					agendaDay: '日'
				},
				monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
				monthNamesShort: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
				dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],
				dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
				defaultDate: '2017-03-12',
				//editable: true,//可以移动
				navLinks: true, // can click day/week names to navigate views
				eventLimit: true, // allow "more" link when too many events
				events: [
					//url: '',
					//error: function() {
					//$('#script-warning').show();
					//}
					{
						title: 'All Day Event',
						start: '2017-03-01'
					},
					{
						title: 'Long Event',
						start: '2017-03-07',
						end: '2017-03-10'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2017-03-09T16:00:00'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2017-03-16T16:00:00'
					},
					{
						title: 'Conference',
						start: '2017-03-11',
						end: '2017-03-13'
					},
					{
						title: 'Meeting',
						start: '2017-03-12T10:30:00',
						end: '2017-03-12T12:30:00'
					},
					{
						title: 'Lunch',
						start: '2017-03-12T12:00:00'
					},
					{
						title: 'Meeting',
						start: '2017-03-12T14:30:00'
					},
					{
						title: 'Happy Hour',
						start: '2017-03-12T17:30:00'
					},
					{
						title: 'Dinner',
						start: '2017-03-12T20:00:00'
					},
					{
						title: 'Birthday Party',
						start: '2017-03-13T07:00:00'
					},
					{
						title: 'Click for Google',
						url: 'http://google.com/',
						start: '2017-03-28'
					}
				],
				dayClick: function(date, jsEvent, view) {
					$('.day').html(date.format());
					alert('Clicked on: ' + date.format());

					//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

					// alert('Current view: ' + view.name);

					// // change the day's background color just for fun
					// $(this).css('background-color', 'red');
					// $('#rule').modal('show');
					//$('input[name=day]').val(date.format());
					var loading=null;
				},
				eventClick: function(calEvent, jsEvent, view) {

					alert('Event: ' + calEvent.title);
					alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
					alert('View: ' + view.name);

					// change the border color just for fun
					$(this).css('border-color', 'red');

				},
				loading: function(bool) {
					$('#loading').toggle(bool);
				}
			});
		});
	</script>
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
					<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
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
@endsection



@section('mycss')
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('assets/js/datatables/dataTables.bootstrap.css')}}">
@endsection


@section('myjs')

	<script src='{{ asset('fullcalendar-3.3.0/lib/moment.min.js')}}'></script>
	<script src='{{ asset('fullcalendar-3.3.0/fullcalendar.min.js')}}'></script>
		<script src="{{ asset('assets/js/datatables/js/jquery.dataTables.min.js')}}"></script>
	<!-- Imported scripts on this page -->
	<script src="{{ asset('assets/js/datatables/dataTables.bootstrap.js')}}"></script>
	<script src="{{ asset('assets/js/datatables/yadcf/jquery.dataTables.yadcf.js')}}"></script>
	<script src="{{ asset('assets/js/datatables/tabletools/dataTables.tableTools.min.js')}}"></script>
@endsection


