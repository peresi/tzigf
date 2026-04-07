<div class="site-topbar">
    <div class="topbar-left">
        <span id="tz-clock">Dar es Salaam Time: -- --- ----, --:--:-- EAT</span>
    </div>
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
<script>
    (function () {
        const clockEl = document.getElementById('tz-clock');
        if (!clockEl) return;

        const formatter = new Intl.DateTimeFormat('en-GB', {
            timeZone: 'Africa/Dar_es_Salaam',
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        });

        function updateClock() {
            const parts = formatter.formatToParts(new Date());
            const map = {};
            for (const part of parts) {
                map[part.type] = part.value;
            }

            clockEl.textContent = `Dar es Salaam Time: ${map.day} ${map.month} ${map.year}, ${map.hour}:${map.minute}:${map.second} EAT`;
        }

        updateClock();
        setInterval(updateClock, 1000);
    })();
</script>
