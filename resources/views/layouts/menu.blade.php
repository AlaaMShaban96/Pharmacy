<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('stores.index') }}"
       class="nav-link {{ Request::is('stores*') ? 'active' : '' }}">
        <p>Stores</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('drugDosages.index') }}"
       class="nav-link {{ Request::is('drugDosages*') ? 'active' : '' }}">
        <p>Drug Dosages</p>
    </a>
</li>


