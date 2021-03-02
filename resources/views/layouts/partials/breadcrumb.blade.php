<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3 class="text-secondary"><u>Menu</u></h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                    </li>
                    @if(request()->is('dashboard'))
                        <li class="breadcrumb-item">Dashboard</li>
                    @endif
                    @if(request()->is('profile/setting'))
                        <li class="breadcrumb-item">My Profile</li>
                    @endif
                    @if(request()->is('account/password'))
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item">Change Password</li>
                    @endif
                    @if(request()->is('admin/account/register') || request()->is('admin/account/latest') || request()->is('admin/account/ascending') || request()->is('admin/account/descending'))
                        <li class="breadcrumb-item">Management Account</li>
                        <li class="breadcrumb-item">Register Account</li>
                    @endif
                    @if(request()->is('admin/account/admin'))
                        <li class="breadcrumb-item">Management Account</li>
                        <li class="breadcrumb-item">Admin Account</li>
                    @endif
                    @if(request()->is('admin/account/customer'))
                        <li class="breadcrumb-item">Management Account</li>
                        <li class="breadcrumb-item">Customer Account</li>
                    @endif
                    @if(request()->is('admin/account/boss'))
                        <li class="breadcrumb-item">Management Account</li>
                        <li class="breadcrumb-item">Boss Account</li>
                    @endif
                    @if(request()->is('admin/category'))
                        <li class="breadcrumb-item">Category</li>
                    @endif
                    @if(request()->is('admin/room'))
                        <li class="breadcrumb-item">Room</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>