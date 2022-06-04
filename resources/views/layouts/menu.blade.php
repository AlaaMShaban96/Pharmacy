
<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="nav-icon icon-layers "></i>
        <span>Dashboard</span>
    </a>
</li>

@can('Health')
    <li class="nav-item {{ (Request::is('currencies*') || Request::is('companies*') ||Request::is('drugDosages*') ||Request::is('packages*') ||Request::is('countries*') || Request::is('strata*') || Request::is('routes*') || Request::is('laboratories*')|| Request::is('drugs*'))? 'active' : ''}}" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <a class="nav-link" href="#">
            <i class="nav-icon icon-heart"></i>
            <span> Health  </span>
        </a>
    </li>
@endcan


  <div style="background-color: #070d13;" class="collapse {{ (request()->type == 'pharmacy' ||Request::is('drugDosages*') ||Request::is('packages*') ||Request::is('countries*') || Request::is('specialties*') || Request::is('forms*') || Request::is('suppliers*')|| Request::is('drugs*'))? 'show' : ''}}" id="collapseExample">

    @can('drugs.index')
        <li class="nav-item {{ Request::is('drugs*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('drugs.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Drugs</span>
            </a>
        </li>
    @endcan
    @can('companies.index')
        <li class="nav-item {{ request()->type == 'pharmacy' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('companies.index',['type'=>'pharmacy']) }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Agents</span>
            </a>
        </li>
    @endcan
    @can('drugDosages.index')
        <li class="nav-item {{ Request::is('drugDosages*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('drugDosages.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Dosages</span>
            </a>
        </li>
    @endcan
    @can('packages.index')
        <li class="nav-item {{ Request::is('packages*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('packages.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Packages</span>
            </a>
        </li>
    @endcan
    @can('countries.index')
        <li class="nav-item {{ Request::is('countries*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('countries.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Countries</span>
            </a>
        </li>
    @endcan
    @can('specialties.index')
        <li class="nav-item {{ Request::is('strata*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('specialties.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Specialty</span>
            </a>
        </li>
    @endcan
    @can('forms.index')
        <li class="nav-item {{ Request::is('forms*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('forms.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Forms</span>
            </a>
        </li>
    @endcan
    @can('suppliers.index')
        <li class="nav-item {{ Request::is('laboratories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('suppliers.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Suppliers</span>
            </a>
        </li>
    @endcan
  </div>
@can('PocketMoney')
    <li class="nav-item {{ (Request::is('financialCovenantTypes*') || Request::is('clauses*') ||Request::is('departments*') ||Request::is('financialCovenants*') || Request::is('outlays*'))? 'active' : ''}}" type="button" data-toggle="collapse" data-target="#collapsePocket" aria-expanded="false" aria-controls="collapseExample">
        <a class="nav-link" href="#">
            <i class="nav-icon icon-wallet "></i>
            <span> Pocket money  </span>
        </a>
    </li>
@endcan
  <div style="background-color: #070d13;" class="collapse {{ (Request::is('financialCovenantTypes*') ||Request::is('clauses*') ||Request::is('departments*') ||Request::is('financialCovenants*') || Request::is('outlays*'))? 'show' : ''}}" id="collapsePocket">

    @can('financialCovenants.index')
        <li class="nav-item {{ Request::is('financialCovenants*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('financialCovenants.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Financial</span>
            </a>
        </li>
    @endcan
    {{-- <li class="nav-item {{ Request::is('outlays*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('outlays.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Outlays</span>
        </a>
    </li> --}}
    @can('departments.index')
        <li class="nav-item {{ Request::is('departments*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('departments.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Departments</span>
            </a>
        </li>
    @endcan

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


@can('Events')
    <li class="nav-item{{ (request()->type == 'event'||Request::is('speakers*') ||Request::is('eventSpecialties*') ||Request::is('events*') ||Request::is('eventLocations*') ||Request::is('eventMaterials*') ||Request::is('eventTypes*'))? 'active ' : ''}}" type="button" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="false" aria-controls="collapseExample">
        <a class="nav-link" href="#">
            <i class="nav-icon icon-badge  "></i>
            <span> Events</span>
        </a>
    </li>
@endcan
<div style="background-color: #070d13;" class="collapse {{ (request()->type == 'event'|| Request::is('speakers*') ||Request::is('eventSpecialties*') ||Request::is('events*') ||Request::is('eventLocations*') ||Request::is('eventMaterials*') ||Request::is('eventTypes*'))? 'show ' : ''}}" id="collapseEvent">
    @can('events.index')
        <li class="nav-item {{ Request::is('events*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('events.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Events</span>
            </a>
        </li>
    @endcan
    @can('eventSpecialties.index')
        <li class="nav-item {{ Request::is('eventSpecialties*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('eventSpecialties.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Event Specialties</span>
            </a>
        </li>
    @endcan
    @can('eventTypes.index')
        <li class="nav-item {{ Request::is('eventTypes*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('eventTypes.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Event Types</span>
            </a>
        </li>
    @endcan
    @can('eventLocations.index')
        <li class="nav-item {{ Request::is('eventLocations*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('eventLocations.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Event Locations</span>
            </a>
        </li>
    @endcan
    @can('companies.index')
        <li class="nav-item {{request()->type == 'event' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('companies.index',['type'=>'event']) }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Companies</span>
            </a>
        </li>
    @endcan
    @can('speakers.index')
        <li class="nav-item {{ Request::is('speakers*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('speakers.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Speakers</span>
            </a>
        </li>
    @endcan
    @can('eventMaterials.index')
        <li class="nav-item {{ Request::is('eventMaterials*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('eventMaterials.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Event Materials</span>
            </a>
        </li>
    @endcan

</div>


@can('Repository')
    <li class="nav-item{{ (request()->type == 'event'||Request::is('stores*')||Request::is('receives*'))? 'active ' : ''}}" type="button" data-toggle="collapse" data-target="#collapseRepository" aria-expanded="false" aria-controls="collapseExample">
        <a class="nav-link" href="#">
            <i class="nav-icon icon-social-dropbox "></i>
            <span> Repository </span>
        </a>
    </li>
@endcan
<div style="background-color: #070d13;" class="collapse {{ (request()->type == 'store'||Request::is('stores*')||Request::is('receives*') )? 'show ' : ''}}" id="collapseRepository">

    @can('receives.index')
        <li class="nav-item {{ Request::is('receives*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('receives.index',['type'=>'receive']) }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Receives</span>
            </a>
        </li>
    @endcan
    @can('receives.index')
        <li class="nav-item {{ Request::is('receives*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('receives.index',['type'=>'inventory']) }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Inventory</span>
            </a>
        </li>
    @endcan
    @can('stores.index')
        <li class="nav-item {{ Request::is('stores*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('stores.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Stores</span>
            </a>
        </li>
    @endcan
    @can('companies.index')
        <li class="nav-item {{request()->type == 'store'? 'active' : '' }}">
            <a class="nav-link" href="{{ route('companies.index',['type'=>'store']) }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Companies</span>
            </a>
        </li>
    @endcan
</div>


@can('Samples')
    <li class="nav-item{{ (Request::is('sampleReceiveds*')||Request::is('doctors*')||Request::is('orders*'))? 'active ' : ''}}" type="button" data-toggle="collapse" data-target="#collapseSamples" aria-expanded="false" aria-controls="collapseExample">
        <a class="nav-link" href="#">
            <i class="nav-icon icon-chemistry"></i>
            <span> Samples </span>
        </a>
    </li>
@endcan

<div style="background-color: #070d13;" class="collapse {{ (Request::is('sampleReceiveds*')||Request::is('doctors*')||Request::is('orders*'))? 'show ' : ''}}" id="collapseSamples">
    @can('sampleReceiveds.index')
        <li class="nav-item {{ Request::is('sampleReceiveds*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('sampleReceiveds.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Receiveds</span>
            </a>
        </li>
    @endcan
    @can('doctors.index')
        <li class="nav-item {{ Request::is('doctors*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('doctors.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Doctors</span>
            </a>
        </li>
    @endcan
    @can('orders.index')
        <li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('orders.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Orders</span>
            </a>
        </li>
    @endcan
</div>

@can('Settings')
    <li class="nav-item{{ (Request::is('sampleReceiveds*')||Request::is('doctors*')||Request::is('orders*'))? 'active ' : ''}}" type="button" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="false" aria-controls="collapseExample">
        <a class="nav-link" href="#">
            <i class="nav-icon icon-settings "></i>
            <span> Settings </span>
        </a>
    </li>
@endcan

<div style="background-color: #070d13;" class="collapse {{ (Request::is('users*')||Request::is('currencies*')||Request::is('roles*'))? 'show ' : ''}}" id="collapseSettings">

    @can('users.index')
        <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="nav-icon icon-cursor "></i>
                <span>Users</span>
            </a>
        </li>
    @endcan
    @can('currencies.index')
        <li class="nav-item {{ Request::is('currencies*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('currencies.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Currencies</span>
            </a>
        </li>
    @endcan
    @can('roles.index')
        <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Roles</span>
            </a>
        </li>
    @endcan
</div>



