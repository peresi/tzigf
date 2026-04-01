<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin - TzIGF' }}</title>
    <style>
        :root {
            --bg: #0b1020;
            --panel: #101a33;
            --panel-soft: #162446;
            --text: #e2e8f0;
            --muted: #94a3b8;
            --line: rgba(148, 163, 184, .22);
            --brand: #22d3ee;
            --brand-2: #38bdf8;
            --danger: #f87171;
            --success-bg: rgba(22, 163, 74, .18);
            --success-line: rgba(74, 222, 128, .45);
            --error-bg: rgba(220, 38, 38, .16);
            --error-line: rgba(252, 165, 165, .55);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background:
                radial-gradient(1200px 600px at 95% -10%, rgba(34, 211, 238, .15), transparent 70%),
                radial-gradient(900px 480px at -8% 10%, rgba(56, 189, 248, .14), transparent 70%),
                var(--bg);
            color: var(--text);
        }

        a { color: inherit; }

        .app-shell {
            min-height: 100vh;
            display: flex;
            gap: 1.2rem;
            padding: 1.2rem;
        }

        .sidebar {
            width: 260px;
            flex-shrink: 0;
            background: linear-gradient(165deg, rgba(16, 26, 51, .95), rgba(10, 16, 34, .95));
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 1.1rem;
            box-shadow: 0 16px 44px rgba(2, 6, 23, .42);
            position: sticky;
            top: 1rem;
            height: calc(100vh - 2.4rem);
            display: flex;
            flex-direction: column;
        }

        .brand {
            padding: .4rem .35rem .8rem;
            border-bottom: 1px solid var(--line);
            margin-bottom: .9rem;
        }

        .brand-title {
            margin: 0;
            font-size: 1.05rem;
            letter-spacing: .015em;
        }

        .brand-sub {
            margin: .2rem 0 0;
            color: var(--muted);
            font-size: .84rem;
        }

        .menu {
            display: grid;
            gap: .45rem;
            margin-top: .55rem;
        }

        .menu a {
            text-decoration: none;
            color: #cbd5e1;
            padding: .62rem .72rem;
            border-radius: 12px;
            border: 1px solid transparent;
            transition: .18s ease;
            font-size: .95rem;
        }

        .menu a:hover {
            background: rgba(34, 211, 238, .08);
            border-color: rgba(34, 211, 238, .2);
        }

        .menu a.active {
            background: linear-gradient(90deg, rgba(34, 211, 238, .14), rgba(56, 189, 248, .06));
            border-color: rgba(34, 211, 238, .35);
            color: #ecfeff;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: .9rem;
            border-top: 1px solid var(--line);
            display: grid;
            gap: .6rem;
        }

        .content-area {
            min-width: 0;
            flex: 1;
            padding: .25rem .25rem 1.2rem;
        }

        .topbar {
            background: rgba(16, 26, 51, .85);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: .95rem 1rem;
            margin-bottom: 1rem;
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .topbar h1 {
            margin: 0;
            font-size: 1.06rem;
            font-weight: 700;
            color: #e0f2fe;
        }

        .topbar p {
            margin: .2rem 0 0;
            color: var(--muted);
            font-size: .85rem;
        }

        .status {
            background: var(--success-bg);
            border: 1px solid var(--success-line);
            color: #bbf7d0;
            padding: .78rem .85rem;
            border-radius: 12px;
            margin-bottom: .95rem;
            font-size: .93rem;
        }

        .errors {
            background: var(--error-bg);
            border: 1px solid var(--error-line);
            color: #fecaca;
            padding: .78rem .85rem;
            border-radius: 12px;
            margin-bottom: .95rem;
            font-size: .93rem;
        }

        .errors ul {
            margin: .1rem 0 .1rem 1rem;
            padding: 0;
        }

        .card {
            background: linear-gradient(180deg, rgba(22, 36, 70, .72), rgba(16, 26, 51, .72));
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 14px 36px rgba(2, 6, 23, .25);
        }

        .card h1,
        .card h2,
        .card h3 {
            margin-top: 0;
            color: #f8fafc;
        }

        .card p {
            color: #cbd5e1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: .93rem;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--line);
        }

        th {
            text-align: left;
            background: rgba(15, 23, 42, .75);
            color: #93c5fd;
            font-weight: 600;
            letter-spacing: .01em;
            padding: .72rem .7rem;
        }

        td {
            border-top: 1px solid var(--line);
            color: #dbeafe;
            padding: .72rem .7rem;
            vertical-align: top;
        }

        label {
            display: block;
            margin: .6rem 0 .35rem;
            font-weight: 600;
            color: #bfdbfe;
            font-size: .93rem;
        }

        input, textarea, select {
            width: 100%;
            border: 1px solid rgba(148, 163, 184, .38);
            border-radius: 12px;
            padding: .62rem .72rem;
            font: inherit;
            background: rgba(15, 23, 42, .72);
            color: #e2e8f0;
            outline: none;
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: rgba(34, 211, 238, .8);
            box-shadow: 0 0 0 3px rgba(34, 211, 238, .18);
        }

        textarea { min-height: 120px; }

        .actions { display: flex; gap: .55rem; margin-top: 1rem; flex-wrap: wrap; }

        button, .btn {
            border: 1px solid transparent;
            border-radius: 11px;
            padding: .56rem .9rem;
            text-decoration: none;
            cursor: pointer;
            font: inherit;
            display: inline-block;
            transition: .18s ease;
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--brand), var(--brand-2));
            color: #001018;
            border-color: rgba(34, 211, 238, .4);
            font-weight: 700;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(34, 211, 238, .2);
        }

        .btn-muted {
            background: rgba(148, 163, 184, .14);
            color: #e2e8f0;
            border-color: rgba(148, 163, 184, .35);
        }

        .btn-muted:hover {
            background: rgba(148, 163, 184, .24);
        }

        .btn-danger {
            background: rgba(239, 68, 68, .15);
            color: #fecaca;
            border-color: rgba(248, 113, 113, .45);
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, .25);
        }

        .btn-block {
            width: 100%;
            text-align: center;
        }

        .muted-text {
            color: var(--muted);
            font-size: .9rem;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            color: #cbd5e1;
            margin-top: .8rem;
            font-size: .92rem;
        }

        .checkbox-row input {
            width: auto;
            transform: translateY(1px);
        }

        form.inline { display: inline; }

        @media (max-width: 960px) {
            .app-shell {
                display: block;
                padding: .85rem;
            }

            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                margin-bottom: .95rem;
            }
        }
    </style>
</head>
<body>
    @auth
        <div class="app-shell">
            <aside class="sidebar">
                <div class="brand">
                    <h2 class="brand-title">TzIGF Admin</h2>
                    <p class="brand-sub">Content Management Panel</p>
                </div>

                <nav class="menu">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.reports.index') }}" class="{{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">Reports</a>
                    <a href="{{ route('admin.media-news.index') }}" class="{{ request()->routeIs('admin.media-news.*') ? 'active' : '' }}">Media & News</a>
                    <a href="{{ route('admin.tigw-items.index') }}" class="{{ request()->routeIs('admin.tigw-items.*') ? 'active' : '' }}">TIGW Items</a>
                    <a href="{{ route('admin.school-applicants.index') }}" class="{{ request()->routeIs('admin.school-applicants.*') ? 'active' : '' }}">School Applicants</a>
                    <a href="{{ route('admin.tsig-applications.index') }}" class="{{ request()->routeIs('admin.tsig-applications.*') ? 'active' : '' }}">TzSIG Applicants</a>
                    <a href="{{ route('admin.public-input-submissions.index') }}" class="{{ request()->routeIs('admin.public-input-submissions.*') ? 'active' : '' }}">Public Input</a>
                    <a href="{{ route('admin.session-proposals.index') }}" class="{{ request()->routeIs('admin.session-proposals.*') ? 'active' : '' }}">Session Proposals</a>
                </nav>

                <div class="sidebar-footer">
                    <a class="btn btn-muted btn-block" href="{{ route('home') }}" target="_blank" rel="noopener">View Public Site</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Logout</button>
                    </form>
                </div>
            </aside>

            <main class="content-area">
                <header class="topbar">
                    <div>
                        <h1>{{ $title ?? 'TzIGF Admin Dashboard' }}</h1>
                        <p>Manage reports, media updates, TIGW content, fellowship applications, public input, and session proposals.</p>
                    </div>
                </header>

                @if(session('status'))
                    <div class="status">{{ session('status') }}</div>
                @endif

                @if($errors->any())
                    <div class="errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    @else
        <main class="content-area" style="max-width: 560px; margin: 2.25rem auto; padding: 0 1rem;">
            <header class="topbar" style="margin-bottom: 1.15rem;">
                <div>
                    <h1>TzIGF Admin Login</h1>
                    <p>Secure access for authorized administrators.</p>
                </div>
            </header>

            @if(session('status'))
                <div class="status">{{ session('status') }}</div>
            @endif

            @if($errors->any())
                <div class="errors">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    @endauth
</body>
</html>
