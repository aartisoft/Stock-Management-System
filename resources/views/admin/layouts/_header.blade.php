<div class="navbar--header">
    <!-- Logo Start -->

       <a href="#" class="logo">
           <img src="{{ asset($logo->value) }}" alt="">

       </a>

    <!-- Logo End -->

    <!-- Sidebar Toggle Button Start -->
    <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
        <i class="fa fa-bars"></i>
    </a>
    <!-- Sidebar Toggle Button End -->
</div>
<!-- Navbar Header End -->

<!-- Sidebar Toggle Button Start -->
<a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
    <i class="fa fa-bars"></i>
</a>
<!-- Sidebar Toggle Button End -->

<div class="navbar--nav ml-auto">
    <ul class="nav">


        <!-- Nav User Start -->
        <li class="nav-item dropdown nav--user online">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <img src = "{{asset('user_image/'.auth()->id().'.jpg') }}" alt="" class="rounded-circle">
                <span>{{ auth()->user()->name }}</span>
                <i class="fa fa-angle-down"></i>
            </a>

            <ul class="dropdown-menu">
                <li><a href="{{ route('admin_settings.show') }}"><i class="far fa-user"></i>Profile</a></li>
                <li class="dropdown-divider"></li>
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" value="Logout">
                    </form>
                </li>
            </ul>
        </li>
        <!-- Nav User End -->
    </ul>
</div>
