<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= ROOT_URL;?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Kamarul Hadi</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="<?= ROOT_URL;?>manager"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            
            <li id='media' class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id='media-kategori'><a href="<?= ROOT_URL;?>manager/media-kategori">Kategori</a></li>
                    <li id='media-file'><a href="<?= ROOT_URL;?>manager/media-file">File</a></li>
                    <li id='media-upload'><a href="<?= ROOT_URL;?>manager/media-upload">Muat Naik Imej</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>