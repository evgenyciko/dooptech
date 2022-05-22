
  <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{asset('material-dashboard/assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Creative Tim
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item active  ">
          <a class="nav-link" href="{{route('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('users')}}">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('postingan')}}">
            <i class="material-icons">article</i>
            <p>Postingan</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('category')}}">
            <i class="material-icons">description</i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('tags')}}">
            <i class="material-icons">tag</i>
            <p>Tags</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('hapus_sementara')}}">
            <i class="material-icons">restore_from_trash</i>
            <p>Post Bin</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
