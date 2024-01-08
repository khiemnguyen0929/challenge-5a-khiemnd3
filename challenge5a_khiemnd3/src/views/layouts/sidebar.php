<!--**********************************
    Sidebar start
***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="/" aria-expanded="false"><i
                        class="icon icon-home"></i><span class="nav-text">Dashboard</span></a>
            </li>
            <li><a href="/exercises" aria-expanded="false"><i
                        class="icon icon-single-copy-06"></i><span class="nav-text">Exercises</span></a>
            </li>
            <li><a href="/challenges" aria-expanded="false"><i
                        class="icon icon-puzzle-10"></i><span class="nav-text">Challenges</span></a>
            </li>
            <?php if (isset($_SESSION['type']) && ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'teacher')) { ?>
            <li><a href="/students" aria-expanded="false"><i
                        class="icon icon-users-mm"></i><span class="nav-text">Students</span></a>
            </li>
            <?php } ?>
            <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin') { ?>
            <li class="nav-label">Admin</li>
            <li>
                <a href="/admin_list" aria-expanded="false">
                    <i class="icon icon-preferences-circle"></i>
                    <span class="nav-text">List</span>
                </a>
            </li>
            <li>
                <a href="/admin_messages" aria-expanded="false">
                    <i class="icon icon-send"></i>
                    <span class="nav-text">Messages</span>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
