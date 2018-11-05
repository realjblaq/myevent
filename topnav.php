

<nav class="navbar navbar-dark bg-dark sticky">

	  <a class="navbar-brand" href="#">
	  	<img src="../img/logo min.png" width="35" height="35" alt="">
	    <img src="../img/logowhite.png" width="150" height="30" alt="">
	  </a>

	<form class="form-inline">
    	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    	<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
 	</form>

 	<a class="btn btn-primary my-2 my-sm-0" href="dashboard.php"><i class="fa fa-plus"></i> Create Event</a>


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