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
@if(request()->is('admin/account/manager'))
    <li class="breadcrumb-item">Management Account</li>
    <li class="breadcrumb-item">Manager Account</li>
@endif
@if(request()->is('admin/category'))
    <li class="breadcrumb-item">Category</li>
@endif
@if(request()->is('admin/room'))
    <li class="breadcrumb-item">Room</li>
@endif
@if(request()->is('admin/customer'))
    <li class="breadcrumb-item">Customer</li>
@endif
@if(request()->is('admin/booking') || request()->is('admin/already_paid') || request()->is('admin/not_yet_paid'))
    <li class="breadcrumb-item">Booking</li>
@endif
@if(request()->is('admin/payment'))
    <li class="breadcrumb-item">Payment</li>
@endif
@if(request()->is('admin/report/finance'))
    <li class="breadcrumb-item">Report</li>
    <li class="breadcrumb-item">Finance</li>
@endif
@if(request()->is('customer/survey/room'))
    <li class="breadcrumb-item">Room Survey</li>
@endif
                    