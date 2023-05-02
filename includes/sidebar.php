
<ul class="nav-links">
    <li>
        <a href="../dashboard/dashboard.php" class ="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links-name">Dashboard</span>
        </a>
    </li>
    <li>
        <a href="../apply/application-new.php">
        <i class='bx bxs-edit'></i>
            <span class="links-name">Application</span>
        </a>
    </li>
    <?php if($_SESSION['user_type'] == 'admin') { ?>
    <li>
        <a href="../apply/admin-application.php">
        <i class='bx bxs-edit'></i>
            <span class="links-name">Admin application</span>
        </a>
    </li>
    <?php } ?>   
    <li>
        <a href="../listers/listers.php">
        <i class='bx bx-list-check'></i>
            <span class="links-name">Dean's Listers</span>
        </a>
    </li>
    <li>
        <a href="../faculty/faculty.php">
            <i class='bx bx-group' ></i>
            <span class="links-name">Faculty</span>
        </a>
    </li>
    <li>
        <a href="../programs/programs.php">
        <i class='bx bx-book-reader'></i>
            <span class="links-name">Programs</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class='bx bx-cog'></i>
            <span class="links-name">Settings</span>
        </a>
    </li>
    <hr class="line">
    <li id="logout-link">
        <a class="logout-link" href="../login/logout.php" title="Logout">
            <i class='bx bx-log-out-circle'></i>
            <span class="links-name">Logout</span>
        </a>
    </li>
</ul>