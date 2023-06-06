<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <!-- Toggle icon for mobile view -->
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="index.html">
                <!-- Logo icon image, you can use font-icon also --><b>
                    <!--This is dark logo icon--><img src="/../plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                    <!--This is light logo icon--><img src="/../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs">
                    <!--This is dark logo text-->Aplikasi Rangking Pengadaan Buku Perpustakaan
                </span>
            </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->

        <!-- This is the message dropdown -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <!-- /.Task dropdown -->
            <!-- /.dropdown -->

            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <b class="hidden-xs"><?= session()->get('level_akses'); ?></b><span class="caret"></span> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li>
                        <div class="dw-user-box">

                        </div>
                    </li>
                    <li role="separator" class="divider"></li>


                    <li><a href="login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>

            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->
<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li><a href="/home" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Dashboard</span></a> </li>
            <!-- <li><a href="/listbuku" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Daftar Buku</span></a> </li> -->
            <?php
            if (session()->get('level_akses') == "Staff Pengadaan Buku Perpustakaan") {
            ?>
                <li><a href="/menubaru" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Pengadaan Perspektif Perpustakaan</span></a> </li>
                <li><a href="/rekomendasiperspektifperpustakaan" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Rekomendasi Pengadaan Perspektif Perpustakaan</span></a> </li>
                <li><a href="/rekomendasiakhir" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Rekomendasi Akhir </span></a> </li>
            <?php } elseif (session()->get('level_akses') == "Admin OPAC") {


            ?>
                <li><a href="/pemustaka" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Pengadaan Perspektif Pemustaka</span></a> </li>

                <li><a href="/rekomendasiperspektifpemustaka" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Rekomendasi Pengadaan Perspektif Pemustaka</span></a> </li>

            <?php } ?>

            <!-- <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Kriteria Perspektif Perpustakaan<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right">2</span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/nilaikriteriaPerpus"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Nilai Kriteria</span></a></li>
                    <li><a href="/bobotkriteria"><i class="fa-fw">S</i><span class="hide-menu">Bobot Kriteria</span></a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Kriteria Perspektif Pemustaka<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right">2</span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/nilaiKriteriaPemustaka"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Nilai Kriteria</span></a></li>
                    <li><a href="/bobotKriteriaPemustaka"><i class="fa-fw">S</i><span class="hide-menu">Bobot Kriteria</span></a></li>
                </ul>
            </li> -->

        </ul>
    </div>
</div>