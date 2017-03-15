@extends('admin.public.common')

@section('content')
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">权限菜单列表</h1>
					{{--<p class="description">Drag to move and sort lists between groups</p>--}}
				</div>
				
					<div class="breadcrumb-env">
						<ol class="breadcrumb bc-1">
							<li>
							     <a href="dashboard-1.html"><i class="fa-home"></i>后台</a>
						    </li>
							<li>
						         <a href="extra-gallery.html">权限</a>
							</li>
							<li class="active">
						         <strong>权限菜单列表</strong>
							</li>
						</ol>
				</div>
					
			</div>		
			<div class="panel panel-default">
				<div class="panel-heading">菜单</div>
				<div class="panel-body">
					
					<div class="row">
						<div class="col-sm-8">
					
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									$("#nestable-list-1").on('nestable-stop', function(ev)
									{
										var serialized = $(this).data('nestable').serialize(),
											str = '';
										//console.log( $(this).data('nestable').list() );
										str = iterateList(serialized, 0);
										//iterateList(serialized);
										$("#nestable-list-1-ev").val(str);
									});
								});
								
								function iterateList(items, depth)
								{
									var str = '';
									
									if( ! depth)
										depth = 0;
									
									console.log(items);
									
									jQuery.each(items, function(i, obj)
									{
										str += '[ID: ' + obj.itemId + ']\t' + repeat('—', depth+1) + ' ' + obj.item;
										str += '\n';
										
										if(obj.children)
										{
											str += iterateList(obj.children, depth+1);
										}
									});
									
									return str;
								}
								
								function repeat(s, n)
								{
									var a = [];
									while(a.length < n)
									{
										a.push(s);
									}
									return a.join('');
								}
								
							</script>
							<ul id="nestable-list-1" class="uk-nestable" data-uk-nestable>

								@foreach($permissions as $v)
								<li data-item="Item 2" data-item-id="b">
									<div class="uk-nestable-item">
									    <div class="uk-nestable-handle"></div>
									    <div data-nestable-action="toggle"></div>
									    <div class="list-label">{{$v->display_name}}</div>
									</div>
									@if(count($v['child'])>0)
									<ul>
										@foreach($v['child'] as $v2)
										<li data-item="Item 7" data-item-id="g">
											<div class="uk-nestable-item">
											    <div class="uk-nestable-handle" ></div>
											    <div data-nestable-action="toggle"></div>
												<div class="list-label">{{ $v2->display_name }}</div>
											</div>
											@if(count($v2['child'])>0)
												<ul>
													@foreach($v2['child'] as $v3)
													<li data-item="Item 8" data-item-id="h">
														<div class="uk-nestable-item">
															<div class="uk-nestable-handle"></div>
															<div data-nestable-action="toggle"></div>
															<div class="list-label">{{ $v3->display_name }}</div>
														</div>
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
						<div class="col-sm-4">
							<textarea id="nestable-list-1-ev" class="form-control" rows="17" placeholder="Nestable Events"></textarea>
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
				
				
				<div class="chat-group">
					<strong>Favorites</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
				</div>
				
				
				<div class="chat-group">
					<strong>Work</strong>
					
					<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
				</div>
				
				
				<div class="chat-group">
					<strong>Other</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Mindy A. Smith</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Herman S. Foltz</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Gregory E. Robie</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Nellie T. Foreman</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>William R. Miller</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Vivian J. Hall</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Melinda A. Anderson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Gary M. Mooneyham</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert C. Medina</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Dylan C. Bernal</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Marc P. Sanborn</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Kenneth M. Rochester</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Rachael D. Carpenter</em></a>
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
@endsection








@section('mycss')
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('assets/js/uikit/uikit.css')}}">
@endsection


@section('myjs')
	<!-- Imported scripts on this page -->
	<script src="{{ asset('assets/js/uikit/js/uikit.min.js')}}"></script>
	<script src="{{ asset('assets/js/uikit/js/addons/nestable.min.js')}}"></script>
@endsection




