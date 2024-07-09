<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
    <div class="w3-container w3-padding-16 w3-center">
        <img src="{{ asset('profil/' . $user->foto) }}" alt="Profile" class="w3-circle" style="width:80px;height:80px;">
        <h4>{{ $user->name }}</h4>
    </div>
    <a href="{{ route('dashboard') }}" class="w3-bar-item w3-button">Dashboard</a>
    <a href="{{ route('myticket') }}" class="w3-bar-item w3-button">My Tickets</a>
    <a href="{{ route('myorder') }}" class="w3-bar-item w3-button">My Orders</a>
    <a href="{{ route('myaccount') }}" class="w3-bar-item w3-button">Account</a>
    <a href="{{ route('login') }}" class="w3-bar-item w3-button">Logout</a>
</div>