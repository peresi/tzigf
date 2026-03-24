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

        .site-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .8rem;
            margin-bottom: .85rem;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 12px;
            padding: .42rem .85rem;
            color: #f8fafc;
            font-size: .82rem;
            line-height: 1.2;
            backdrop-filter: blur(4px);
            flex-wrap: wrap;
        }

        .site-topbar .topbar-left {
            flex: 0 0 auto;
            font-size: .75rem;
        }

        .site-topbar .topbar-center {
            text-align: center;
            flex: 1;
            min-width: 200px;
        }

        .site-topbar .topbar-title {
            font-weight: 700;
            letter-spacing: .03em;
            text-transform: uppercase;
            font-size: .82rem;
            margin: 0;
        }

        .site-topbar .topbar-subtitle {
            font-size: .74rem;
            margin: .05rem 0 0;
        }

        .site-topbar .topbar-right {
            flex: 0 0 auto;
            font-size: .75rem;
            white-space: nowrap;
        }

        .site-topbar a {
            color: #fff;
            text-decoration: none;
            border-bottom: 1px dashed rgba(255,255,255,.65);
        }

        .top-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .65rem;
            margin-bottom: 1.6rem;
            position: relative;
            z-index: 20;
            background: rgba(5, 15, 30, .55);
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 999px;
            padding: .52rem .9rem;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 18px rgba(0,0,0,.16);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: .56rem;
            text-decoration: none;
            color: #f8fafc;
            white-space: nowrap;
            min-height: 46px;
        }

        .brand-text {
            display: inline-flex;
            flex-direction: column;
            line-height: 1.08;
        }

        .brand-mark{
            font-weight: 800;
            letter-spacing: .02em;
            font-size: 1.05rem;
        }

        .brand-sub {
            font-size: .74rem;
            color: #cbd5e1;
            line-height: 1.2;
        }

        .brand-logo {
            max-height: 38px;
            width: auto;
            display: block;
            border-radius: 8px;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 99;
        }

        .menu-overlay.active {
            display: block;
        }

        .brand-mark {
            font-weight: 800;
            letter-spacing: .02em;
            line-height: 1;
            font-size: 1.03rem;
        }

        .brand-sub {
            font-size: .72rem;
            color: #cbd5e1;
            line-height: 1.2;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #f8fafc;
            font-size: 1.4rem;
            cursor: pointer;
            padding: .3rem .5rem;
            z-index: 101;
        }

        .main-nav {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: .45rem;
            margin: 0 .65rem;
            min-height: 46px;
        }

        .main-nav a {
            color: #eceff3;
            text-decoration: none;
            padding: .42rem .68rem;
            border-radius: 10px;
            font-size: .86rem;
            font-weight: 600;
            letter-spacing: .02em;
            transition: .15s ease;
            border: 1px solid transparent;
        }

        .main-nav a:hover {
            background: rgba(255,255,255,.20);
            color: #ffffff;
            border-color: rgba(255,255,255,.45);
        }

        .main-nav a.is-active,
        .main-nav a[aria-current="page"] {
            background: rgba(255,255,255,.28);
            color: #ffffff;
            font-weight: 700;
            border-color: rgba(255,255,255,.60);
        }

        .main-nav a.nav-cta {
            background: #fff;
            color: #0f172a;
            border: 1px solid #fff;
            font-weight: 700;
            padding: .48rem .78rem;
            border-radius: 999px;
        }

        .main-nav a.nav-cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(3, 7, 33, .22);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: .45rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .nav-actions a {
            text-decoration: none;
            border-radius: 999px;
            font-size: .8rem;
            transition: .18s ease;
        }

        .nav-actions .nav-utility {
            color: #e2e8f0;
            border: 1px solid rgba(255,255,255,.26);
            background: rgba(255,255,255,.06);
            padding: .38rem .6rem;
        }

        .nav-actions .nav-utility:hover {
            background: rgba(255,255,255,.14);
            border-color: rgba(255,255,255,.45);
        }

        .nav-actions a.nav-cta {
            background: #fff;
            color: #0f172a;
            border-color: #fff;
            font-weight: 700;
            border: 1px solid #fff;
            padding: .45rem .72rem;
        }

        .nav-actions a.nav-cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(2, 6, 23, .25);
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

        .table-wrapper {
            overflow-x: auto;
            margin-top: 1.5rem;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(15, 23, 42, .06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 640px;
        }

        th, td {
            padding: 0.72rem 0.8rem;
            border-bottom: 1px solid var(--line);
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #f1f5f9;
            color: #0f172a;
            font-weight: 700;
        }

        tbody tr:hover {
            background: rgba(15, 23, 42, .03);
        }

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
            .top-nav {
                grid-template-columns: auto 1fr auto;
                align-items: center;
                gap: .6rem;
            }
            .main-nav { 
                display: none;
                position: fixed;
                left: 0;
                top: 0;
                width: 75%;
                max-width: 320px;
                height: 100vh;
                background: linear-gradient(180deg, #0f766e, #0b5f57);
                flex-direction: column;
                gap: 0;
                padding: 0 !important;
                margin: 0 !important;
                border-radius: 0;
                border: none;
                z-index: 100;
                overflow-y: auto;
                backdrop-filter: blur(10px);
                transform: translateX(-100%);
                transition: transform .3s ease;
            }
            .main-nav.active {
                display: flex;
                transform: translateX(0);
            }
            .main-nav a {
                padding: .75rem 1.2rem;
                border-radius: 0;
                text-align: left;
                font-size: .95rem;
                width: 100%;
                border-bottom: 1px solid rgba(255,255,255,.1);
                color: #f8fafc;
            }
            .main-nav a:hover {
                background: rgba(255,255,255,.08);
            }
            .menu-toggle {
                display: block;
                font-size: 1.5rem;
                padding: .2rem .4rem;
            }
            .nav-actions {
                display: none;
            }
            .section { padding: 2.2rem 0; }
        }

        @media (max-width: 768px) {
            .container { padding: 0 0.875rem; }
            
            .site-header {
                padding: .7rem 0 2.5rem;
            }

            .site-topbar {
                gap: .4rem;
                margin-bottom: .7rem;
                padding: .35rem .6rem;
                font-size: .70rem;
                flex-wrap: wrap;
                justify-content: center;
                text-align: center;
            }

            .site-topbar .topbar-left,
            .site-topbar .topbar-right {
                display: none;
            }

            .site-topbar .topbar-center {
                flex: 1;
                min-width: 100%;
            }

            .site-topbar .topbar-title {
                font-size: .70rem;
                letter-spacing: 0;
                margin: 0;
            }

            .site-topbar .topbar-subtitle {
                font-size: .62rem;
                margin: .02rem 0 0;
            }

            .top-nav {
                grid-template-columns: auto 1fr auto;
                gap: .35rem;
                padding: .4rem .5rem;
                border-radius: 10px;
                margin-bottom: 1.2rem;
                position: relative;
                z-index: 50;
            }

            .brand {
                gap: .35rem;
                min-height: 40px;
            }

            .brand-logo {
                max-height: 32px;
            }

            .brand-mark { font-size: 0.88rem; }
            .brand-sub { font-size: .60rem; }

            .menu-toggle {
                font-size: 1.3rem;
                padding: .2rem .35rem;
            }

            .hero {
                gap: 0.7rem;
            }

            .hero h1 {
                font-size: clamp(1.3rem, 5vw, 1.9rem);
            }

            .hero p {
                font-size: .87rem;
            }

            .hero-highlight {
                padding: .75rem;
            }

            .hero-highlight h3 { 
                font-size: 0.92rem; 
                margin: 0 0 .35rem; 
            }
            .hero-highlight p { 
                font-size: .78rem;
            }

            .section { padding: 1.8rem 0; }

            .section-head h2 {
                font-size: clamp(1.05rem, 4vw, 1.55rem);
            }

            .surface {
                padding: .80rem;
            }

            .grid-2 { gap: .70rem; }
            .grid { gap: .65rem; }
            
            .card {
                padding: .75rem;
            }

            .card h3, .card h4 { 
                margin: 0 0 .30rem;
                font-size: .97rem;
            }

            .btn {
                padding: .5rem .75rem;
                font-size: .82rem;
            }

            .nav-actions {
                display: none;
            }

            .nav-actions a {
                font-size: .70rem;
                padding: .30rem .40rem;
            }

            .nav-actions a.nav-cta {
                padding: .35rem .55rem;
                font-size: .70rem;
            }
            
            .main-nav {
                width: 70%;
                max-width: 280px;
                padding-top: 0 !important;
                padding: 0 !important;
                margin: 0 !important;
                top: 0 !important;
            }
            
            .main-nav.active {
                padding-top: 0 !important;
                padding: 0 !important;
                margin: 0 !important;
                top: 0 !important;
            }

            .main-nav a {
                padding: .65rem 1rem;
                font-size: .88rem;
            }
        }

        @media (max-width: 480px) {
            .container { padding: 0 0.70rem; }

            .site-header {
                padding: .5rem 0 2rem;
            }

            .site-topbar {
                gap: .3rem;
                margin-bottom: .55rem;
                padding: .30rem .5rem;
                font-size: .65rem;
                flex-wrap: wrap;
            }

            .site-topbar .topbar-center {
                flex: 1;
                min-width: 100%;
            }

            .site-topbar .topbar-title {
                font-size: .65rem;
                letter-spacing: 0;
                margin: 0;
            }

            .site-topbar .topbar-subtitle {
                font-size: .58rem;
                margin: 0;
            }

            .top-nav {
                grid-template-columns: auto 1fr auto;
                gap: .3rem;
                padding: .35rem .45rem;
                border-radius: 8px;
                margin-bottom: 1rem;
                position: relative;
                z-index: 50;
            }

            .brand {
                gap: .25rem;
                min-height: 36px;
            }

            .brand-logo { 
                max-height: 28px; 
            }

            .brand-mark { font-size: 0.82rem; }
            .brand-sub { display: none; }

            .menu-toggle {
                font-size: 1.1rem;
                padding: .15rem .3rem;
            }

            .hero {
                gap: 0.5rem;
            }

            .hero h1 {
                margin: .4rem 0 .5rem;
                font-size: clamp(1.15rem, 5.5vw, 1.6rem);
            }

            .hero p {
                font-size: .80rem;
                color: #dbeafe;
            }

            .hero-actions {
                margin-top: .65rem;
                gap: .3rem;
            }

            .hero-highlight {
                padding: .55rem;
            }

            .hero-highlight h3 { 
                font-size: 0.80rem; 
                margin: 0 0 .20rem; 
            }
            
            .hero-highlight p { 
                font-size: .70rem; 
                margin: .10rem 0;
            }

            .btn {
                padding: .40rem .60rem;
                font-size: .75rem;
            }

            .section { 
                padding: 1.3rem 0; 
            }

            .section-head {
                margin-bottom: .65rem;
            }

            .section-head h2 {
                font-size: clamp(.95rem, 5vw, 1.3rem);
                margin: 0;
            }

            .section-head p {
                font-size: .75rem;
            }

            .section-head .pill {
                font-size: .65rem;
                padding: .15rem .35rem;
            }

            .surface {
                padding: .60rem;
                border-radius: 10px;
            }

            .grid-2, .grid { 
                gap: .50rem; 
                grid-template-columns: 1fr !important;
            }

            .card {
                padding: .60rem;
            }

            .card h3, .card h4 { 
                margin: 0 0 .25rem;
                font-size: .88rem;
            }

            .card p {
                font-size: .78rem;
            }

            .list-clean { padding-left: .90rem; }
            .list-clean li { margin: .25rem 0; font-size: .78rem; }
            .ticks li { padding-left: 1rem; }

            .eyebrow {
                font-size: .65rem;
            }

            .nav-actions {
                display: none;
            }

            .nav-actions a {
                font-size: .62rem;
                padding: .25rem .30rem;
            }

            .nav-actions a.nav-utility {
                padding: .25rem .32rem;
            }

            .nav-actions a.nav-cta {
                padding: .28rem .40rem;
                font-size: .62rem;
            }

            footer {
                padding: 1.2rem 0;
            }

            footer h2 {
                font-size: 1.2rem;
                margin-bottom: .5rem;
            }

            footer p {
                font-size: .78rem;
                margin: .3rem 0;
            }

            .main-nav {
                width: 80%;
                max-width: 260px;
                padding-top: 0 !important;
                top: 0;
            }

            .main-nav a {
                padding: .50rem .85rem;
                font-size: .80rem;
                border-bottom: 1px solid rgba(255,255,255,.1);
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNav = document.querySelector('.main-nav');
            let overlay = document.querySelector('.menu-overlay');
            
            // Create overlay if it doesn't exist
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.className = 'menu-overlay';
                document.body.appendChild(overlay);
            }
            
            if (menuToggle && mainNav) {
                menuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    mainNav.classList.toggle('active');
                    overlay.classList.toggle('active');
                    menuToggle.setAttribute('aria-expanded', mainNav.classList.contains('active'));
                });

                // Close menu when a link is clicked
                const navLinks = mainNav.querySelectorAll('a');
                navLinks.forEach(link => {
                    link.addEventListener('click', function(event) {
                        // for in-page anchor navigation (e.g., #section), leave menu open
                        if (link.hash && link.pathname === window.location.pathname) {
                            return;
                        }

                        // for route changes, do not immediately close because the page will reload
                        // this avoids jarring behavior in some browsers where closing interrupts navigation
                    });
                });

                // Close menu when clicking overlay
                overlay.addEventListener('click', function() {
                    mainNav.classList.remove('active');
                    overlay.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                });

                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!event.target.closest('.top-nav') && !event.target.closest('.main-nav') && mainNav.classList.contains('active')) {
                        mainNav.classList.remove('active');
                        overlay.classList.remove('active');
                        menuToggle.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>
</head>
<body>
    @yield('content')
</body>
</html>
