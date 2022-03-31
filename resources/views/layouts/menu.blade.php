<li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Companies</span>
    </a>
</li>
<li class="nav-item {{ Request::is('drugDosages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('drugDosages.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Drug Dosages</span>
    </a>
</li>
<li class="nav-item {{ Request::is('drugs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('drugs.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Drugs</span>
    </a>
</li>
