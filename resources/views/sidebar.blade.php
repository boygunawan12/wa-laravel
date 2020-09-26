

<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
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
							
								<p>Home</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url("device") }}">
							<i class="fas fa-mobile"></i> 
								<p>device</p>
							</a>
						</li>

					<li class="nav-item submenu">
							<a data-toggle="collapse" href="#forms" class="" aria-expanded="true">
								<i class="fas fa-inbox"></i>
								<p>Chat</p>
								<span class="caret"></span>
							</a>
							<div class="collapse " id="forms" style="">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ url('chat') }}">
											<span class="sub-item">Send</span>
										</a>
									</li>

									<li>
										<a href="{{ url('chat/list') }}">
										
											<span class="sub-item">List</span>
										</a>
									</li>
								</ul>
							</div>
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