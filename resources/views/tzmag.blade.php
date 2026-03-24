@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        <div class="site-topbar">
            <div class="topbar-left">Established 2020</div>
            <div class="topbar-center">
                <div class="topbar-title">Tanzania Internet Governance Forum</div>
                <div class="topbar-subtitle">Building inclusive, multistakeholder internet policy for Tanzania</div>
            </div>
            <div class="topbar-right"><a href="mailto:info@tzigf.or.tz">info@tzigf.or.tz</a></div>
        </div>
        <div class="top-nav">
            <button class="menu-toggle" aria-label="Toggle menu" aria-expanded="false">☰</button>
            <a class="brand" href="{{ route('home') }}" aria-label="Go to home">
                <img class="brand-logo" src="{{ asset('TZIGF OFFICIAL LOGO edit (1)_page-0001.jpg') }}" alt="TzIGF logo">
                <span class="sr-only">Tanzania IGF</span>
                <span class="brand-sub">Tanzania Internet Governance Forum</span>
            </a>
            <nav class="main-nav" aria-label="Main Navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                <a href="{{ route('tsig') }}" class="{{ request()->routeIs('tsig') ? 'is-active' : '' }}">TzSIG</a>
                <a href="{{ route('tzmag') }}" class="{{ request()->routeIs('tzmag') ? 'is-active' : '' }}">TzMAG</a>
                <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'is-active' : '' }}">Gallery</a>
                <a href="{{ route('school.application') }}" class="nav-cta {{ request()->routeIs('school.application') ? 'is-active' : '' }}">Apply for Fellowship</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Admin</a>
                @else
                    <a href="{{ route('admin.login') }}" class="{{ request()->routeIs('admin.login') ? 'is-active' : '' }}">Admin Login</a>
                @endauth
            </nav>
        </div>

        <div class="hero">
            <div>
                <p class="eyebrow">Tanzania Internet Governance Forum</p>
                <h1>Tanzania Multistakeholder Organizing Committee (TzMAG)</h1>
                <p>Committee member listing and stakeholder classification.</p>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="section">
        <div class="container">
            <h2>TzMAG Committee Members</h2>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Stakeholder Name</th>
                            <th>Stakeholder Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anderson Latson Maulambo<br>RAI Technologies Co. Ltd.</td>
                            <td>Private Sector</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Zaituni Njovu<br>Zaina Foundation</td>
                            <td>Civil Society</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Fatma Haruna Songoro<br>Victory Attorneys</td>
                            <td>Civil Society</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Dr. Nazarius Nicholas<br>Internet Society Tanzania Chapter</td>
                            <td>Tanzania IGF Secretariat</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Leo Magomba<br>Ministry of Communication and Information Technology</td>
                            <td>Government Focal Point 1</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bahati Zuberi<br>Ministry of Communication and Information Technology</td>
                            <td>Government Focal Point 2</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Millennium Anthony<br>Coordinator Tanzania Youth IGF</td>
                            <td>Youth</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Prof. Cosmas Mnyanyi<br>Open University of Tanzania</td>
                            <td>Academia/Research</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Alex Ngoma<br>PSS</td>
                            <td>Technical</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@endsection
