<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Dashboard</span>
    </a>
</li>
    <button class="btn nav-link {{ (Request::is('currencies*') || Request::is('companies*') ||Request::is('drugDosages*') ||Request::is('packages*') ||Request::is('countries*') || Request::is('strata*') || Request::is('routes*') || Request::is('laboratories*')|| Request::is('drugs*'))? 'active' : ''}}" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Health Management
    </button>

  <div class="collapse" id="collapseExample">
    <li class="nav-item {{ Request::is('currencies*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('currencies.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Currencies</span>
        </a>
    </li>
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
    <li class="nav-item {{ Request::is('packages*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('packages.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Packages</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('countries*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('countries.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Countries</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('strata*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('strata.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Strata</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('routes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('routes.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Routes</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('laboratories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laboratories.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Laboratories</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('drugs*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('drugs.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Drugs</span>
        </a>
    </li>
  </div>


