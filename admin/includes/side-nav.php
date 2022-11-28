<nav class="navbar">
    <ul class="nav-links">
        <li class="<?php if($_SESSION['active'] == "dashboard"){ echo "active"; } ?>"><a href="<?php echo BASE_URL.'admin/index.php' ?>"><i class="fa-solid fa-dashboard"></i> Dashboard</a></li>
        <li onclick="toggleNavBar('nav-item1')" class="<?php if($_SESSION['active'] == "admins"){ echo "active"; } ?>">
            <a href="javascript:void(0)" class="toggler">
                <span><i class="fa-solid fa-user-check"></i> Admin</span>
                <i class="fa-solid fa-chevron-down"></i>
            </a>
            <ul id="nav-item1">
                <li>
                    <a href="<?php echo BASE_URL.'admin/admins/add-admins.php' ?>"><i class="fa-solid fa-plus-circle"></i> Add admins</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL.'admin/admins/list-admins.php' ?>"><i class="fa-solid fa-table"></i> Manage admins</a>
                </li>
            </ul>
        </li>
        <li onclick="toggleNavBar('nav-item2')" class="<?php if($_SESSION['active'] == "users"){ echo "active"; } ?>">
            <a href="javascript:void(0)" class="toggler">
                <span><i class="fa-solid fa-users"></i> Users</span>
                <i class="fa-solid fa-chevron-down"></i>
            </a>
            <ul id="nav-item2">
                <li><a href="<?php echo BASE_URL.'admin/users/add-users.php' ?>"><i class="fa-solid fa-plus-circle"></i> Add user</a></li>
                <li><a href="<?php echo BASE_URL.'admin/users/list-users.php' ?>"><i class="fa-solid fa-table"></i> Manage users</a></li>
            </ul>
        </li>
        <li onclick="toggleNavBar('nav-item3')" class="<?php if($_SESSION['active'] == "courses"){ echo "active"; } ?>">
            <a href="javascript:void(0)" class="toggler">
                <span><i class="fa-solid fa-chalkboard-user"></i> Courses </span>
                <i class="fa-solid fa-chevron-down"></i>
            </a>
            <ul id="nav-item3">
                <li><a href="<?php echo BASE_URL.'admin/courses/add-courses.php' ?>"><i class="fa-solid fa-plus-circle"></i> Add courses</a></li>
                <li><a href="<?php echo BASE_URL.'admin/courses/list-courses.php' ?>"><i class="fa-solid fa-table"></i> Manage courses</a></li>
            </ul>
        </li>
        <li><a href="<?php echo BASE_URL.'admin/logout.php' ?>">
            <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </li>
    </ul>
</nav>