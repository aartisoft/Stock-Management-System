
<aside class="sidebar" data-trigger="scrollbar">
    <!-- Sidebar Profile Start -->
    <div class="sidebar--profile">
        <div class="profile--img">
            <a href="{{ route('admin_settings.show') }}">
                <img src="{{asset('user_image/'.auth()->id().'.jpg') }}" alt="" class="rounded-circle">
            </a>
        </div>

        <div class="profile--name">
            <a href="{{ route('admin_settings.show') }}" class="btn-link">{{ auth()->user()->name }}</a>
        </div>

        <div class="profile--nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{ route('admin_settings.show') }}" class="nav-link" title="User Profile">
                        <i class="fa fa-user"></i>
                    </a>
                </li>

                <li class="nav-item">

                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar Profile End -->

    <div class="sidebar--nav">
        <ul>
            <li>
                <ul>
                    <li class="active">
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin_settings')}}">
                            <i class="fa fa-user"></i>
                            <span>Admin Settings</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('stockOut.index')}}">
                            <i class="fa fa-list"></i>
                            <span>Stock Out</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Settings</span>
                        </a>

                        <ul>
                            <li><a href="{{ route('company.index') }}">Companies</a></li>
                            <li><a href="{{ route('category.index') }}">Categories</a></li>
                            <li><a href="{{ route('item.index') }}">Items</a></li>
                            <li><a href="{{ route('application_settings') }}">Application Settings</a></li>
                        </ul>
                    </li>


                </ul>
            </li>

            <li>

            </li>

            <li>

            </li>

            <li>

                <ul>
                    <li>

                    </li>
                    <li>

                    </li>
                    <li>

                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
