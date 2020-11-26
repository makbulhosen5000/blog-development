
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Starter Pages
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Active Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inactive Page</p>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{route('category.view')}} " class="nav-link bg-dark active">
            <i class="nav-icon fas fa-tags"></i>

            <p>
               Category
            </p>
          </a>
      </li>
      <li>
        <a href="{{route('tag.view')}} " class="nav-link bg-dark active">
            <i class="nav-icon fas fa-tag"></i>

            <p>
               Tag
            </p>
          </a>
      </li>
      <li>
        <a href="{{route('post.view')}} " class="nav-link bg-dark active">
            <i class="nav-icon fas fa-pen-square"></i>

            <p>
               Post
            </p>
          </a>
      </li>
    </ul>
