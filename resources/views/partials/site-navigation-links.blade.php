<a href="{{ Route::has('home') ? route('home') : '#' }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
<a href="{{ Route::has('history') ? route('history') : '#' }}" class="{{ request()->routeIs('history') ? 'is-active' : '' }}">Our History</a>
<a href="{{ Route::has('what-we-do') ? route('what-we-do') : '#' }}" class="{{ request()->routeIs('what-we-do') ? 'is-active' : '' }}">What We Do</a>
<a href="{{ Route::has('engagement-platforms') ? route('engagement-platforms') : '#' }}" class="{{ request()->routeIs('engagement-platforms') ? 'is-active' : '' }}">Engagement Platforms</a>
<a href="{{ Route::has('reports.index') ? route('reports.index') : '#' }}" class="{{ request()->routeIs('reports.index') ? 'is-active' : '' }}">Reports</a>
<a href="{{ Route::has('tsig') ? route('tsig') : '#' }}" class="{{ request()->routeIs('tsig') ? 'is-active' : '' }}">TzSIG</a>
<a href="{{ Route::has('tzmag') ? route('tzmag') : '#' }}" class="{{ request()->routeIs('tzmag') ? 'is-active' : '' }}">TzMAG</a>
<details class="nav-dropdown {{ request()->routeIs('school.application') || request()->routeIs('public-input.*') || request()->routeIs('session-proposal.*') ? 'is-active' : '' }}">
    <summary>TzIGF 2026</summary>
    <div class="nav-dropdown-menu">
        <a href="{{ Route::has('public-input.index') ? route('public-input.index') : '#' }}">Call for Public Input</a>
        <a href="{{ Route::has('school.application') ? route('school.application') : '#' }}">Call for TzIGF Fellowship</a>
        <a href="{{ Route::has('tsig') ? route('tsig').'#application-form' : '#' }}">Call for TzSIG Fellowship</a>
        <a href="{{ Route::has('session-proposal.index') ? route('session-proposal.index') : '#' }}">Call for Session Proposal</a>
    </div>
</details>
<a href="{{ Route::has('gallery') ? route('gallery') : '#' }}" class="{{ request()->routeIs('gallery') ? 'is-active' : '' }}">Gallery</a>
