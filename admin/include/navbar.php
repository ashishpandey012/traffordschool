    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">School Management</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>User Registration</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="user-type.php">Add User Type</a>
                        <a class="collapse-item" href="user-form.php">User Form</a>
                </div>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Manage Education</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add-education.php">Add Education Level</a>
                        <a class="collapse-item" href="add-stream.php">Add Stream</a>
                        <a class="collapse-item" href="add-subject.php">Add Subject</a>
                </div>
            </li>
         

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Manage Class</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add-class.php">Add Class</a>
                        <a class="collapse-item" href="class-section.php">Add Section</a>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading"> Addons</div>


            <!-- Nav Item  -->
            <li class="nav-item">
                <a class="nav-link" href="add-registration.php"><i class="fas fa-fw fa-chart-area"></i><span>Add Student</span></a>
            </li>
            <!-- Nav Item  -->
            <li class="nav-item">
                <a class="nav-link" href="add-teacher.php"><i class="fas fa-fw fa-chart-area"></i><span>Add Teacher</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
                    aria-expanded="true" aria-controls="collapse3">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Forms</span>
                </a>
                <div id="collapse3" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add-form1.php">Form 1</a>
                        <a class="collapse-item" href="add-form2.php">Form 2</a>
                        <a class="collapse-item" href="add-form3.php">Form 3</a>
                        <a class="collapse-item" href="add-form4.php">Form 4</a>
                </div>
                
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">