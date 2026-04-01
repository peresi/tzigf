<a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
<a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
<a href="{{ route('what-we-do') }}" class="{{ request()->routeIs('what-we-do') ? 'is-active' : '' }}">What We Do</a>
<a href="{{ route('reports.index') }}" class="{{ request()->routeIs('reports.index') ? 'is-active' : '' }}">Reports</a>
<a href="{{ route('tsig') }}" class="{{ request()->routeIs('tsig') ? 'is-active' : '' }}">TzSIG</a>
<a href="{{ route('tzmag') }}" class="{{ request()->routeIs('tzmag') ? 'is-active' : '' }}">TzMAG</a>
<details class="nav-dropdown {{ request()->routeIs('school.application') || request()->routeIs('public-input.*') || request()->routeIs('session-proposal.*') ? 'is-active' : '' }}">
    <summary>TzIGF 2026</summary>
    <div class="nav-dropdown-menu">
        <a href="{{ route('public-input.index') }}">Call for Public Input</a>
        <a href="{{ route('school.application') }}">Call for TzIGF Fellowship</a>
        <a href="{{ route('tsig') }}#application-form">Call for TzSIG Fellowship</a>
        <a href="{{ route('session-proposal.index') }}">Call for Session Proposal</a>
    </div>
</details>
<a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'is-active' : '' }}">Gallery</a>
