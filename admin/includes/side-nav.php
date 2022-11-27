<nav class="navbar">
    <ul class="nav-links">
        <li><a href="<?php echo BASE_URL.'admin/index.php' ?>"><i class="fa-solid fa-dashboard"></i> Dashboard</a></li>
        <li>
            <a href="javascript:void(0)"><i class="fa-solid fa-user-check"></i> Admin</a>
            <ul>
                <li>
                    <a href="<?php echo BASE_URL.'admin/admins/add-admins.php' ?>"><i class="fa-solid fa-plus-circle"></i> Add admins</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL.'admin/admins/list-admins.php' ?>"><i class="fa-solid fa-table"></i> Manage admins</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa-solid fa-users"></i> Users</a>
            <ul>
                <li><a href="<?php echo BASE_URL.'admin/users/add-users.php' ?>"><i class="fa-solid fa-plus-circle"></i> Add user</a></li>
                <li><a href="<?php echo BASE_URL.'admin/users/list-users.php' ?>"><i class="fa-solid fa-table"></i> Manage users</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)"><i class="fa-solid fa-users"></i> Courses</a>
            <ul>
                <li><a href="<?php echo BASE_URL.'admin/courses/add-courses.php' ?>"><i class="fa-solid fa-plus-circle"></i> Add courses</a></li>
                <li><a href="<?php echo BASE_URL.'admin/courses/list-courses.php' ?>"><i class="fa-solid fa-table"></i> Manage courses</a></li>
            </ul>
        </li>
    </ul>
</nav>