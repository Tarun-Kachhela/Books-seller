<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="<?php echo $active=="index"?"active":""?>"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li class="<?php echo $active=="NULL"?"active":""?>"><a href="books.php"><em class="fa fa-table">&nbsp;</em>View Books </a></li>
        <li class="<?php echo $active=="add_book"?"active":""?>"><a href="books.php?source=add_book"><em class="fa fa-database">&nbsp;</em> Add Books </a></li>

        <li class="<?php echo $active=="view_orders"?"active":""?>"><a href="books.php?source=view_orders"><em class="fa fa-calendar">&nbsp;&nbsp;</em> View Orders</a></li>
        <li class="<?php echo $active=="placed_orders"?"active":""?>"><a href="books.php?source=placed_orders"><em class="fa fa-calendar">&nbsp;&nbsp;</em> Placed Orders </a></li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
                    </a></li>
                <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
                    </a></li>
                <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
                    </a></li>
            </ul>
        </li>
        <li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->