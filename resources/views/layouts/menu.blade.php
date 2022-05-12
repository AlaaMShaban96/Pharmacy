
<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="nav-icon icon-layers "></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="nav-icon icon-user "></i>
        <span>Users</span>
    </a>
</li>
<li class="nav-item {{ (Request::is('currencies*') || Request::is('companies*') ||Request::is('drugDosages*') ||Request::is('packages*') ||Request::is('countries*') || Request::is('strata*') || Request::is('routes*') || Request::is('laboratories*')|| Request::is('drugs*'))? 'active' : ''}}" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <a class="nav-link" href="#">
        <i class="nav-icon icon-heart"></i>
        <span> Health  </span>
    </a>
</li>

  <div class="collapse {{ (Request::is('currencies*') || Request::is('companies*') ||Request::is('drugDosages*') ||Request::is('packages*') ||Request::is('countries*') || Request::is('strata*') || Request::is('routes*') || Request::is('laboratories*')|| Request::is('drugs*'))? 'show' : ''}}" id="collapseExample">
    <li class="nav-item {{ Request::is('drugs*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('drugs.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Drugs</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('currencies*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('currencies.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Currencies</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('companies.index',['type'=>'pharmacy']) }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Agents</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('drugDosages*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('drugDosages.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Dosages</span>
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
            <span>Specialty</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('routes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('routes.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Forms</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('laboratories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laboratories.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Suppliers</span>
        </a>
    </li>

  </div>
<li class="nav-item {{ (Request::is('financialCovenantTypes*') || Request::is('clauses*') ||Request::is('departments*') ||Request::is('financialCovenants*') || Request::is('outlays*'))? 'active' : ''}}" type="button" data-toggle="collapse" data-target="#collapsePocket" aria-expanded="false" aria-controls="collapseExample">
    <a class="nav-link" href="#">
        <i class="nav-icon icon-wallet "></i>
        <span> Pocket money  </span>
    </a>
</li>

  <div class="collapse {{ (Request::is('financialCovenantTypes*') ||Request::is('clauses*') ||Request::is('departments*') ||Request::is('financialCovenants*') || Request::is('outlays*'))? 'show' : ''}}" id="collapsePocket">
    <li class="nav-item {{ Request::is('financialCovenants*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('financialCovenants.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Financial Covenants</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('outlays*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('outlays.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Outlays</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('departments*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('departments.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Departments</span>
        </a>
    </li>
    {{-- <li class="nav-item {{ Request::is('financialCovenantTypes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('financialCovenantTypes.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Types</span>
        </a>
    </li> --}}

    {{-- <li class="nav-item {{ Request::is('clauses*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('clauses.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Clauses</span>
        </a>
    </li> --}}
  </div>



<li class="nav-item{{ (Request::is('speakers*') ||Request::is('eventSpecialties*') ||Request::is('events*') ||Request::is('eventLocations*') ||Request::is('eventMaterials*') ||Request::is('eventTypes*'))? 'active ' : ''}}" type="button" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="false" aria-controls="collapseExample">
    <a class="nav-link" href="#">
        <i class="nav-icon icon-badge  "></i>
        <span> Events</span>
    </a>
</li>
<div class="collapse {{ (Request::is('speakers*') ||Request::is('eventSpecialties*') ||Request::is('events*') ||Request::is('eventLocations*') ||Request::is('eventMaterials*') ||Request::is('eventTypes*'))? 'show ' : ''}}" id="collapseEvent">

    <li class="nav-item {{ Request::is('events*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('events.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Events</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('eventSpecialties*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('eventSpecialties.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Event Specialties</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('eventTypes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('eventTypes.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Event Types</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('eventLocations*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('eventLocations.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Event Locations</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('companies.index',['type'=>'event']) }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Companies</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('speakers*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('speakers.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Speakers</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('eventMaterials*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('eventMaterials.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Event Materials</span>
        </a>
    </li>
</div>



<li class="nav-item {{ Request::is('invoices*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('invoices.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Invoices</span>
    </a>
</li>



