<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <img src="{{ asset('depan/img/Logo Hangout.png') }}" width="150px" alt="">
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <img src="{{ asset('depan/img/Logo.png') }}" width="30px" alt="">
    </div>
    <ul class="sidebar-menu">
      @if(auth()->user()->level == 'superadmin')
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('superadmin.dashboard') }}"><span>Dashboard</span></a></li>
      @endif
      @if(auth()->user()->level == 'admin')
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><span>Dashboard</span></a></li>
      @endif
    </ul>
  </aside>
</div>