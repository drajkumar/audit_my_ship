
<!-- header area start -->
				<div class="header-area">
					<div class="row align-items-center">
						<!-- nav and search button -->
						<div class="col-md-6 col-sm-8 clearfix">
							<div class="nav-btn pull-left">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<div class="search-box pull-left">
							<form action="search.php" method="post">
									<input type="text" name="search" placeholder="Search Your Ship..." required>
									<i class="ti-search"></i>
								</form>
							</div>


						</div>
						<!-- profile info & task notification -->
						<div class="col-md-6 col-sm-4 clearfix">
							<ul class="notification-area pull-right">
								<li id="full-view"><i class="ti-fullscreen"></i></li>
								<li id="full-view-exit"><i class="ti-zoom-out"></i></li>

							<!-- <li><i class="fa fa-users" aria-hidden="true"></i></li> -->

								<li class="dropdown">
									<i class="ti-user dropdown-toggle" data-toggle="dropdown" id="tiuser">
										
										<span id="counter"></span>
									</i>
									<div id="tog" class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have new notifications <a href="user-all-table-view.php">view all</a></span>
										<div id="popnoti" class="nofity-list">
											
										</div>
									</div>
								</li>

								<li class="dropdown">
									<i id="timess" class="ti-email dropdown-toggle" data-toggle="dropdown">
										<span id="counter2"></span>
									</i>
									<div class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have new notifications <a href="message.php">view all</a></span>
										<div id="popnoti2" class="nofity-list">
											
										</div>
									</div>
								</li>

								<li class="dropdown">
									<i id="tiinqu" class="ti-bell dropdown-toggle" data-toggle="dropdown">
										<span id="counter3"></span>
									</i>
									<div class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have new notifications <a href="view-inquiry.php">view all</a></span>
										<div id="popnoti3" class="nofity-list">
											
										</div>
									</div>
								</li>

								<li>
									<button onclick="window.location.href='add-ship.php'" class="btn btn-success"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>&nbsp; &nbsp;ADD SHIP</button>
								</li>


							</ul>
						</div>
					</div>
				</div>
				<!-- header area end -->


				<div class="page-title-area">
					<div class="row align-items-center">
						<div class="col-sm-6">
							<div class="breadcrumbs-area clearfix">
								<h4 class="page-title pull-left">Dashboard</h4>
								<ul class="breadcrumbs pull-left">
									<li><a href="index.php">Home</a></li>
									<li><span>Admin</span></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 clearfix">
							<div class="user-profile pull-right">
								<img class="avatar user-thumb" src="../assets/img/author/avatar.png" alt="avatar">
								<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo escape($admin->data()->username) ;?> <i class="fa fa-angle-down"></i></h4>
								<div class="dropdown-menu">
									
									<a class="dropdown-item" href="message.php">Message</a>
									<a class="dropdown-item" href="change_password.php">Setting</a>
									<a class="dropdown-item" href="logout.php">Log Out</a>
								</div>
							</div>
						</div>
					</div>
				</div>