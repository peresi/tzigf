<div class="site-topbar">
    <div class="topbar-left">Established 2020</div>
    <div class="topbar-center">
        <div class="topbar-title">Tanzania Internet Governance Forum</div>
        <div class="topbar-subtitle">Building inclusive, multistakeholder internet policy for Tanzania</div>
    </div>
    <div class="topbar-right"><a href="mailto:info@tzigf.or.tz">info@tzigf.or.tz</a></div>
</div>
<div class="top-nav">
    <a class="brand" href="{{ route('home') }}" aria-label="Go to home">
        <img class="brand-logo" src="{{ asset('TZIGF OFFICIAL LOGO edit (1)_page-0001.jpg') }}" alt="TzIGF logo">
        <span class="sr-only">Tanzania IGF</span>
        <span class="brand-sub">TZIGF</span>
    </a>
    <nav class="main-nav desktop-nav" aria-label="Main Navigation">
        @include('partials.site-navigation-links')
    </nav>
    <button class="menu-toggle" type="button" aria-label="Open menu" aria-controls="mobile-navigation" aria-expanded="false">☰</button>
</div>
<nav class="mobile-nav-drawer" id="mobile-navigation" aria-label="Mobile Navigation">
    <div class="mobile-nav-head">
        <div class="mobile-nav-brand">
            <img class="brand-logo" src="{{ asset('TZIGF OFFICIAL LOGO edit (1)_page-0001.jpg') }}" alt="TzIGF logo">
            <div class="mobile-nav-brand-copy">
                <strong>TZIGF</strong>
            </div>
        </div>
        <button class="menu-close" type="button" aria-label="Close menu">Close</button>
    </div>
    <div class="mobile-nav-links">
        @include('partials.site-navigation-links')
    </div>
</nav>
