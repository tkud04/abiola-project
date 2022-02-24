<nav class="top-nav">
								<ul class="nav sf-menu">


									<li class="active">
										<a href="{{url('/')}}">Home</a>								
									</li>
									<li>
										<a href="{{url('about')}}">About</a>
									</li>
									<li>
										<a href="{{url('services')}}">Services</a>
									</li>
									<li>
										<a href="{{url('pricing')}}">Pricing</a>										
									</li>
									<!-- gallery -->
									<li>
										<a href="#">Account</a>
										<ul>
										@if(isset($user) && $user != null)
											<!-- Gallery image only -->
											<li>
												<a href="{{url('dashboard')}}">Dashboard</a>
											</li>
											<!-- eof Gallery image only -->
											<!-- Gallery image only -->
											<li>
												<a href="{{url('logout')}}">Sign out</a>
											</li>
											<!-- eof Gallery image only -->
                                        @else
											<!-- Gallery image only -->
											<li>
												<a href="{{url('signup')}}">Sign up</a>
											</li>
											<!-- eof Gallery image only -->
											<!-- Gallery image only -->
											<li>
												<a href="{{url('login')}}">Sign in</a>
											</li>
											<!-- eof Gallery image only -->
										@endif
										</ul>
									</li>
									<!-- eof Gallery -->
									<li>
										<a href="{{url('faq')}}">FAQ</a>										
									</li>
									<!-- blog -->


								</ul>


							</nav>