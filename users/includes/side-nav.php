<nav class="navbar">
    <ul class="nav-links">
        <li class="<?php if($_SESSION['active'] == "dashboard"){ echo "active"; } ?>"><a href="<?php echo BASE_URL.'users/index.php' ?>"><i class="fa-solid fa-house"></i> Home</a></li>
        <li onclick="toggleNavBar('nav-item3')" class="<?php if($_SESSION['active'] == "courses"){ echo "active"; } ?>">
            <a href="javascript:void(0)" class="toggler">
                <span><i class="fa-solid fa-chalkboard-user"></i> Courses </span>
                <i class="fa-solid fa-chevron-down"></i>
            </a>
            <ul id="nav-item3">
                <li><a href="<?php echo BASE_URL.'users/courses/my-courses.php' ?>"><i class="fa-solid fa-plus-circle"></i> My courses</a></li>
                <li><a href="<?php echo BASE_URL.'users/courses/list-courses.php' ?>"><i class="fa-solid fa-table"></i> All courses</a></li>
            </ul>
        </li>
        <li><a href="<?php echo BASE_URL.'users/logout.php' ?>">
            <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </li>
    </ul>
</nav>