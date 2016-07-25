<div class="static-sidebar-wrapper sidebar-default">
    <div class="static-sidebar">
        <div class="sidebar">
            <div class="widget">
                <div class="widget-body">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="<?php echo $this->session->user_photo; ?>" class="img-responsive img-circle">
                        </div>
                        <div class="info">
                            <span class="username"><?php echo $this->session->user_fullname; ?></span>
                            <span class="useremail"><?php echo $this->session->user_email; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                    <ul class="acc-menu">
                        <li class="nav-separator"><span>Explore</span></li>

                        <li><a href="Dashboard"><i class="ti ti-home"></i><span>Dashboard</span><span class="badge badge-teal">2</span></a></li>
                        <li><a href="#"><i class="ti ti-package"></i><span>Purchasing</span></a>
                            <ul class="acc-menu">
                                <li><a href="Purchases">Purchase Order</a></li>
                                <li><a href="Deliveries">Purchase Invoice</a></li>
                                <li><a href="#">Record Payment</a></li>
                                <li><a href="#">Item Issuance</a></li>
                                <li><a href="#">Item Adjustment</a></li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="ti ti-shopping-cart"></i><span>Sales</span></a>
                            <ul class="acc-menu">
                                <li><a href="#">Standard Sales</a>

                                    <ul class="acc-menu">
                                        <li><a href="#">Sales Order</a></li>
                                        <li><a href="#">Record Invoice</a></li>
                                        <li><a href="#">Received Payment</a></li>
                                    </ul>

                                </li>


                                <li><a href="#">Special Store</a>
                                    <ul class="acc-menu">
                                        <li><a href="#">POS Convenient Store</a></li>
                                        <li><a href="#">POS Restaurant</a></li>
                                        <li><a href="tradings">POS Trading</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="ti ti-view-list-alt"></i><span>References</span></a>
                            <ul class="acc-menu">
                                <li><a href="categories">Category Management</a></li>
                                <li><a href="departments">Department Management</a></li>
                                <li><a href="units">Unit Management</a></li>
                                <li><a href="brands">Brand Management</a></li>
                                <li><a href="discounts">Discount Management</a></li>
                                <li><a href="cards">Card Management</a></li>
                                <li><a href="generics">Generic Management</a></li>
                                <li><a href="giftcards">Gift Card Management</a></li>
                                <li><a href="locations">Location Management</a></li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="ti ti-harddrive"></i><span>Masterfiles</span></a>
                            <ul class="acc-menu">
                                <li><a href="products">Product Management</a></li>
                                <li><a href="suppliers">Supplier Management</a></li>
                                <li><a href="customers">Customer Management</a></li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="ti ti-settings"></i><span>Settings</span></a>
                            <ul class="acc-menu">
                                <li><a href="tax">Tax Management</a></li>
                                <li><a href="#">Setup User Group</a></li>
                                <li><a href="users">Create User Account</a></li>
                                <li><a href="company">Setup Company Info</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

            <!--<div class="widget" id="widget-progress">
                <div class="widget-heading">
                    Progress
                </div>
                <div class="widget-body">

                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Bandwidth</div>
                            <div class="pull-right">50%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-lime" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Storage</div>
                            <div class="pull-right">25%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-info" style="width: 25%"></div>
                        </div>
                    </div>

                </div>
            </div>-->
        </div>
    </div>
</div>
