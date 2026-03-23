@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        <div class="top-nav">
            <a class="brand" href="{{ route('home') }}" aria-label="Go to home">
                <img class="brand-logo" src="{{ asset('TZIGF OFFICIAL LOGO edit (1)_page-0001.jpg') }}" alt="TzIGF logo">
                <span class="sr-only">Tanzania IGF</span>
                <span class="brand-sub">Tanzania Internet Governance Forum</span>
            </a>
            <nav class="main-nav" aria-label="Main Navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                <a href="{{ route('home') }}#about" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">About</a>
                <a href="{{ route('home') }}#tigw" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">TIGW</a>
                <a href="{{ route('home') }}#reports" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Reports</a>
                <a href="{{ route('home') }}#media" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Media</a>
                <a href="{{ route('home') }}#contact" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Contact</a>
            </nav>
            <div class="nav-actions">
                <a class="nav-utility" href="{{ route('tsig') }}">TzSIG</a>
                <a class="nav-utility" href="{{ route('tzmag') }}">TzMAG</a>
                <a class="nav-cta" href="{{ route('school.application') }}">Apply for Fellowship</a>
                <a class="nav-utility" href="{{ route('gallery') }}">Gallery</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <a href="{{ route('admin.login') }}">Admin Login</a>
                @endauth
            </div>
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
