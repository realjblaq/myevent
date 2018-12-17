

<nav class="navbar navbar-dark bg-dark sticky">

	  <a class="navbar-brand" href="#">
	  	<img src="../img/logo_min.png" width="35" height="35" alt="">
	    <img src="../img/logowhite.png" width="150" height="30" alt="">
	  </a>

	<form class="form-inline" action="search.php" method="post">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
		  </div>
		  	<input type="search" class="form-control mr-sm-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="search_value">
    		<button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit" name="search">Search</button>
		</div>

    	<!-- <input class="form-control mr-sm-2 input-sm col-sm" type="search" placeholder="Search" aria-label="Search" name="search_value"> -->
    	<!-- <button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit" name="search">Search</button> -->
 	</form>

 	<a class="btn btn-primary btn-sm my-2 my-sm-0" href="dashboard.php"><i class="fa fa-plus"></i> Create Event</a>


 	<!-- dropdown -->
 	<div class="nav-item dropdown" >
	    <a style="color: white;" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	    	<i class="fa fa-user"> </i> Hi, <?php echo ucwords($login_session); ?>
	    </a>
	    <div class="dropdown-menu">
	     	<a class="dropdown-item" href="../authentication/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
	    </div>
  	</div>
   	

     
	</nav> 
	<!-- end of nav -->