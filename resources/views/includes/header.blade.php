<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            Project Name
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <!-- <span class="text-primary">HOMER APP</span> -->
        </div>
       <!--  <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Search something special" class="form-control" name="search">
            </div>
        </form> -->
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="login.html">Login</a>
                    </li>
                    <li>
                        <a class="" href="login.html">Logout</a>
                    </li>
                    <li>
                        <a class="" href="profile.html">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li>
                    <div class="text-info m-t-sm text-center"></div>
                    <div class="text-success">{{ \Carbon\Carbon::now()->format('l, h:i:s A') }}</div>
                </li>
                <li class="dropdown">
                    <a onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="pe-7s-upload pe-rotate-90" data-toggle="tooltip" data-placement="left" title="" data-original-title="Logout"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>
<style>
    div.dataTables_wrapper div.dataTables_processing {
        position: fixed;
        background: #3498db;
        color: white;
    }
    .cursor_hand{
        cursor: pointer;
    }
</style>