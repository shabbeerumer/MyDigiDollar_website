<nav class="navbar">
    <a href="{{ route('webpage') }}" class="navbar-brand" style="color: #05b620;">ℳ𝓎𝒟𝒾ℊ𝒾𝒟ℴ𝓁𝓁𝒶𝓇</a>

    <ul class="nav-links">
        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.cards') }}" style="color: white;">Admin Dashboard</a>
            </li>
        @endif
        <li><a href="{{ route('webpage') }}" class="active">Home</a></li>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
        <li><a href="{{ route('withdraw') }}">Withdraw</a></li>
        <li><a href="{{ route('depositeone') }}">Deposit</a></li>
        <li><a href="{{ route('refarrel') }}">Invite</a></li>


    </ul>

    <div class="nav-buttons">
        @if (Auth::user())
            <a href="{{ route('logout') }}">
                <button class="btn btn-login" style="color: white">logout</button>
            </a>
        @else
            <a href="{{ route('login') }}">
                <button class="btn btn-login" style="color: white">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button class="btn btn-register" style="color: white">Register</button>
            </a>
        @endif

    </div>
</nav>
<div class="" style="text-align: center; background-color: #05b620; padding: 10px; color: white" >
    @if (Auth::user())
        <h4>
          <a href="{{route('account')}}" style="color: white ; text-decoration: none">  Hi, Welcome {{ Auth::user()->name }} </a></h4>
        
    @else
    <h4>
       <a href="{{route('login')}}" style="color: white ; text-decoration: none"> login / register </a>
    </h4>
        
    @endif
</div>
