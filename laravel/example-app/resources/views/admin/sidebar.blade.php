<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href=""> <i class="icon-home"></i>Home </a></li>
                <li>
                  <a href="{{url('view_category')}}"> 
                    <i class="icon-grid"></i>Category </a>
                </li>
                <li>
                  <a href="{{url('view_league')}}"> 
                    <i class="icon-grid"></i>League </a>
                </li>
                <li>
                  <a href="{{url('view_club')}}"> 
                    <i class="icon-grid"></i>Club </a>
                </li>
                <li>
                  <a href="{{url('view_player')}}"> 
                    <i class="icon-grid"></i>Player </a>
                </li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>News </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_news')}}">Add News</a></li>
                    <li><a href="{{url('view_news')}}">View News</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>
                <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
        </ul><span class="heading">Extras</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul>
      </nav>