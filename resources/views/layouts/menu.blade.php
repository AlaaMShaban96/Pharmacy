<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('stores.index') }}"
       class="nav-link {{ Request::is('stores*') ? 'active' : '' }}">
       <i class=" fas fa-building"></i><span>Stores</span>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('drugDosages.index') }}"
       class="nav-link {{ Request::is('drugDosages*') ? 'active' : '' }}">
        <i class=" fas fa-building"></i><span>Drug Dosages</span>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('companies.index') }}"
       class="nav-link {{ Request::is('companies*') ? 'active' : '' }}">
        <i class=" fas fa-building"></i><span>Comspananies</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('drugs.index') }}"
       class="nav-link {{ Request::is('drugs*') ? 'active' : '' }}">
        <i class=" fas fa-building"></i><span>Drugs</span>
    </a>
</li>


