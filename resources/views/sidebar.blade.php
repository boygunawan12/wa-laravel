

<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ url('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{user()->name}}
									<span class="user-level">User</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="{{ url('profile') }}">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									{{-- <li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li> --}}
									<li>
										<a href="{{ url('logout') }}">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
					
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu</h4>
						</li>
		
						<li class="nav-item">
							<a href="{{ url("/") }}">
														<i class="fas fa-home"></i> 

								<p>Home</p>
							</a>
						</li>
						<li class="nav-item {{sidebarActive('device')}}">
							<a href="{{ url("device") }}">
							<i class="fas fa-mobile"></i> 
								<p>Devices</p>
							</a>
						</li>


						<li class="nav-item {{sidebarActive('chat')}}">
							<a href="{{ url("chat") }}">
							<i class="fas fa-paper-plane"></i> 
								<p>Send Chat</p>
							</a>
						</li>



						<li class="nav-item {{sidebarActive('chat-list')}}">
							<a href="{{ url("chat-list") }}">
							<i class="fas fa-inbox"></i> 
								<p>List Chat</p>
							</a>
						</li>





						@if (user()->role==1)
							{{-- expr --}}



						<li class="nav-item {{sidebarActive('users')}}">
							<a href="{{ url("users") }}">
							<i class="fas fa-users"></i> 
								<p>Users</p>
							</a>
						</li>

						@endif


						<li class="nav-item {{sidebarActive('documentation')}}">
							<a href="{{ url("documentation") }}">
							<i class="fas fa-users"></i> 
								<p>Documentation</p>
							</a>
						</li>

{{-- 
	
						<li class="nav-item">
							<a href="{{ url("chat") }}">
							<i class="fas fa-inbox"></i> 
								<p>Chat</p>
							</a>
						</li> --}}
						
						
					</ul>
				</div>
			</div>
		</div>