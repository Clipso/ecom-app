<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Murtada Sabr</h1>
        <p>Web Developer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>

    <ul class="list-unstyled">
      <li class="active"><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i> Home</a></li>
      <li><a href="{{ url('view_category') }}"> <i class="icon-grid"></i> Categories</a></li>
      <li><a href="{{ url('product_list') }}"> <i class="icon-windows"></i> Products</a></li>
      <li><a href="{{ url('customer_list') }}"> <i class="icon-windows"></i>Customers</a></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> <i class="icon-magnifying-glass-browser"></i>Gallary</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Products</a></li>
              <li><a class="dropdown-item" href="#">Contact Us</a></li>
              <li><a class="dropdown-item" href="{{ url('about_us') }}">About Us</a></li>
          </ul>
      </li>
  </ul>
    {{-- <ul class="list-unstyled">
            <li class="active"><a href="{{ url('admin/dashboard')}}"> <i class="icon-home"></i>Home</a></li>
            <li><a href="{{ url('view_category')}}"> <i class="icon-grid"></i>Categories</a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="true" data-toggle="collapse"> <i class="icon-windows"></i>Content</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Tell Me</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="{{ url('about_us')}}">About Us</a></li>
              </ul>
            </li>
    </ul> --}}
  </nav>