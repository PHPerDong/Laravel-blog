@extends('admin.public.common')

@section('content')
			<div class="row">
				<div class="col-sm-3">
					
					<div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
						<div class="xe-icon">
							<i class="linecons-cloud"></i>
						</div>
						<div class="xe-label">
							<strong class="num">0.0%</strong>
							<span>Server uptime</span>
						</div>
					</div>
					
					<div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="1" data-to="117" data-suffix="k" data-duration="3" data-easing="false">
						<div class="xe-icon">
							<i class="linecons-user"></i>
						</div>
						<div class="xe-label">
							<strong class="num">1k</strong>
							<span>Users Total</span>
						</div>
					</div>
					
					<div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="1000" data-to="2470" data-duration="4" data-easing="true">
						<div class="xe-icon">
							<i class="linecons-camera"></i>
						</div>
						<div class="xe-label">
							<strong class="num">1000</strong>
							<span>New Daily Photos</span>
						</div>
					</div>
					
				</div>
				<!-- <div class="col-sm-6">
					
					<div class="chart-item-bg">
						<div class="chart-label">
							<div class="h3 text-secondary text-bold" data-count="this" data-from="0.00" data-to="14.85" data-suffix="%" data-duration="1">0.00%</div>
							<span class="text-medium text-muted">More visitors</span>
						</div>
						<div id="pageviews-visitors-chart" style="height: 298px;"></div>
					</div>
					
				</div> -->
				<!-- <div class="col-sm-3">
					
					<div class="chart-item-bg">
						<div class="chart-label chart-label-small">
							<div class="h4 text-purple text-bold" data-count="this" data-from="0.00" data-to="95.8" data-suffix="%" data-duration="1.5">0.00%</div>
							<span class="text-small text-upper text-muted">Current Server Uptime</span>
						</div>
						<div id="server-uptime-chart" style="height: 134px;"></div>
					</div>
					
					<div class="chart-item-bg">
						<div class="chart-label chart-label-small">
							<div class="h4 text-secondary text-bold" data-count="this" data-from="0.00" data-to="320.45" data-decimal="," data-duration="2">0</div>
							<span class="text-small text-upper text-muted">Avg. of Sales</span>
						</div>
						<div id="sales-avg-chart" style="height: 134px; position: relative;">
							<div style="position: absolute; top: 25px; right: 0; left: 40%; bottom: 0"></div>
						</div>
					</div>
					
				</div> -->
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
		
		
	</div>
@endsection
	@section('myjs')

		<!-- Imported scripts on this page -->
			<script src="{{ asset('assets/js/xenon-widgets.js')}}"></script>
			<script src="{{ asset('assets/js/devexpress-web-14.1/js/globalize.min.js')}}"></script>
			<script src="{{ asset('assets/js/devexpress-web-14.1/js/dx.chartjs.js')}}"></script>
			<script src="{{ asset('assets/js/toastr/toastr.min.js')}}"></script>

		@endsection
