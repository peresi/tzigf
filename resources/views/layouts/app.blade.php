<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'TzIGF' }}</title>
    <style>
        :root {
            --bg: #f5f7fb;
            --surface: #ffffff;
            --text: #0f172a;
            --muted: #475569;
            --primary: #0b8a7f;
            --primary-2: #107e74;
            --dark: #09172d;
            --line: #e2e8f0;
            --hero-grad-1: #0f766e;
            --hero-grad-2: #14532d;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.65;
        }

        a { color: inherit; }

        .container { width: min(1140px, 100%); margin: 0 auto; padding: 0 1rem; }

        .site-header {
            background: linear-gradient(130deg, var(--hero-grad-1), #0b5f57 55%, var(--hero-grad-2));
            color: #fff;
            padding: 1.1rem 0 4rem;
            position: relative;
            overflow: hidden;
        }

        .site-header::before,
        .site-header::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            opacity: .22;
            pointer-events: none;
        }

        .site-header::before {
            width: 520px;
            height: 520px;
            background: #99f6e4;
            top: -290px;
            right: -170px;
        }

        .site-header::after {
            width: 380px;
            height: 380px;
            background: #bfdbfe;
            bottom: -210px;
            left: -110px;
        }

        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2.4rem;
            position: relative;
            z-index: 1;
        }

        .brand {
            font-weight: 800;
            letter-spacing: .015em;
        }

        .main-nav {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            justify-content: flex-end;
        }

        .main-nav a {
            color: #f8fafc;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,.3);
            padding: .42rem .68rem;
            border-radius: 999px;
            font-size: .82rem;
            transition: .18s ease;
        }

        .main-nav a:hover {
            background: rgba(255,255,255,.15);
            border-color: rgba(255,255,255,.55);
        }

        .main-nav a.nav-cta {
            background: #fff;
            color: #0f172a;
            border-color: #fff;
            font-weight: 700;
        }

        .hero {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            gap: 1rem;
            align-items: center;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: .08em;
            margin: 0;
            font-size: .78rem;
            opacity: .92;
            font-weight: 600;
        }

        .hero h1 {
            margin: .7rem 0 .85rem;
            font-size: clamp(1.75rem, 3.15vw, 2.95rem);
            line-height: 1.2;
        }

        .hero p {
            margin: 0;
            color: #dbeafe;
            max-width: 680px;
        }

        .hero-actions {
            margin-top: 1.15rem;
            display: flex;
            gap: .6rem;
            flex-wrap: wrap;
        }

        .btn {
            text-decoration: none;
            display: inline-block;
            border-radius: 12px;
            padding: .6rem .95rem;
            font-size: .9rem;
            border: 1px solid transparent;
            transition: .18s ease;
        }

        .btn-primary {
            background: #fff;
            color: #0f172a;
            font-weight: 700;
        }

        .btn-primary:hover { transform: translateY(-1px); }

        .btn-secondary {
            color: #ecfeff;
            border-color: rgba(255,255,255,.45);
            background: rgba(255,255,255,.08);
        }

        .hero-highlight {
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 16px;
            padding: 1rem;
            backdrop-filter: blur(4px);
        }

        .hero-highlight h3 { margin: 0 0 .5rem; }
        .hero-highlight p { margin: .25rem 0; color: #f1f5f9; }

        .section { padding: 3rem 0; }

        .section-head {
            margin-bottom: 1rem;
        }

        .section-head h2 {
            margin: 0;
            font-size: clamp(1.35rem, 2vw, 2rem);
            line-height: 1.25;
        }

        .section-head p {
            margin: .45rem 0 0;
            color: var(--muted);
            max-width: 760px;
        }

        .surface {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 1.1rem;
            box-shadow: 0 10px 26px rgba(2, 6, 23, .04);
        }

        .alt {
            background: linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .grid {
            display: grid;
            gap: .95rem;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .grid-2 {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 1rem;
        }

        .card h3,
        .card h4 {
            margin: 0 0 .45rem;
            line-height: 1.35;
        }

        .card p { margin: 0; color: var(--muted); }

        .list-clean {
            margin: 0;
            padding-left: 1.2rem;
        }

        .list-clean li { margin: .35rem 0; }

        .ticks {
            list-style: none;
            padding-left: 0;
            margin: .4rem 0 0;
        }

        .ticks li {
            margin: .4rem 0;
            padding-left: 1.4rem;
            position: relative;
        }

        .ticks li::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: var(--primary);
        }

        .reports {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: .75rem;
            padding: 0;
            margin: .6rem 0 0;
            list-style: none;
        }

        .reports a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .reports a:hover { text-decoration: underline; }

        .media-list {
            display: grid;
            gap: .95rem;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .media-item {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 1rem;
        }

        .media-item h3 { margin: 0 0 .35rem; }
        .media-item p { margin: .35rem 0; color: var(--muted); }

        .media-item img {
            max-width: 100%;
            border-radius: 10px;
            margin-top: .65rem;
            border: 1px solid var(--line);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            font-size: .76rem;
            letter-spacing: .04em;
            text-transform: uppercase;
            border-radius: 999px;
            padding: .22rem .52rem;
            background: #ecfeff;
            border: 1px solid #a5f3fc;
            color: #155e75;
            font-weight: 700;
        }

        footer {
            background: linear-gradient(130deg, var(--dark), #111827);
            color: #e2e8f0;
            padding: 2.4rem 0;
        }

        footer h2 { margin-top: 0; }
        footer p { color: #cbd5e1; }
        footer a { color: #93c5fd; }

        @media (max-width: 920px) {
            .hero { grid-template-columns: 1fr; }
            .grid-2 { grid-template-columns: 1fr; }
            .top-nav { align-items: flex-start; flex-direction: column; }
            .main-nav { justify-content: flex-start; }
            .section { padding: 2.45rem 0; }
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
