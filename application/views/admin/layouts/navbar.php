<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                                                      data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span
                    class="text"><?php echo $this->session->userdata('user')['name']; ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>admin/login/logout"><i class="icon-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages"
                                                   class="dropdown-toggle"><i class="icon icon-envelope"></i> <span
                    class="text">Thông báo</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="<?php echo base_url(); ?>admin/login/logout"><i class="icon icon-share-alt"></i>
                <span class="text">Đăng xuất</span></a></li>
    </ul>
</div>

<div id="search">
    <form action="">
    <input type="text" name="find" placeholder="Tìm kiếm..." value="<?php echo isset($find)?$find:'';?>"/>
    <button type="submit" class="tip-bottom" title="Tìm kiếm"><i class="icon-search icon-white"></i></button>
    </form>
</div>