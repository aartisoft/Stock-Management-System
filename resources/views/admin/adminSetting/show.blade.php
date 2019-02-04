@extends('admin.layouts.master')
@section('contentBody')
    <div class="row gutter-20">
        <div class="col-lg-8">
            <!-- Panel Start -->
            <div class="panel profile-cover">
                <div class="profile-cover__img">
                    <img src="{{ asset('user_image/'.$user->id.'.jpg') }}" alt="">

                </div>

                <div class="profile-cover__action" data-bg-img="assets/img/covers/01_800x150.jpg" data-overlay="0.3">
                    <button class="btn btn-rounded btn-info">
                        <span>{{$user->name }}</span>
                    </button>

                    <button class="btn btn-rounded btn-info">
                        <span>Admin</span>
                    </button>
                </div>

            </div>


        </div>
        <div class="col-lg-4">
            <!-- Panel Start -->
            <div>

                <a href="{{ route('admin_settings') }}" class="btn btn-primary rounded mb-2"><i class="fa fa-plus"></i> Edit Profile</a>

            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">About Me</h3>
                </div>

                <div class="panel-content panel-about">

                    <table>


                        <tr>
                            <th><i class="fas fa-envelope"></i>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th><i class="fas fa-mobile-alt"></i>Contact No.</th>
                            <td>{{ $user->contactNo }}</td>
                        </tr>

                        <tr>
                            <th><i class="fas fa-map-marker-alt"></i>Address</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-globe"></i>Status</th>
                            <td>{{ $user->status }}</td>
                        </tr>
                    </table>
                </div>


            </div>



        </div>

    </div>
@endsection
