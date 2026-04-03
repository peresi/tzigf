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

        html,
        body {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.65;
        }

        body.nav-open {
            overflow: hidden;
        }

        a { color: inherit; }

        .site-header,
        main,
        footer {
            width: 100%;
            max-width: 100%;
        }

        .container {
            width: 100%;
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 1rem;
        }

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
            flex: 0 0 auto;
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
            font-size: .98rem;
            color: #f8fafc;
            line-height: 1;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
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
            background: rgba(2, 6, 23, .58);
            backdrop-filter: blur(2px);
            z-index: 9998;
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
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 10px;
            color: #f8fafc;
            font-size: 1.4rem;
            cursor: pointer;
            min-width: 42px;
            min-height: 42px;
            padding: .2rem .45rem;
            z-index: 101;
        }

        .menu-close {
            display: none;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.16);
            color: #f8fafc;
            border-radius: 10px;
            min-width: 42px;
            min-height: 42px;
            cursor: pointer;
            font-size: 1rem;
        }

        .mobile-nav-head {
            display: none;
        }

        .mobile-nav-brand {
            display: flex;
            align-items: center;
            gap: .7rem;
        }

        .mobile-nav-brand-copy {
            display: grid;
            gap: .05rem;
            line-height: 1.1;
        }

        .mobile-nav-brand-copy strong {
            font-size: .98rem;
            color: #ecfeff;
        }

        .mobile-nav-brand-copy span {
            font-size: .72rem;
            color: rgba(226, 232, 240, .88);
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .desktop-nav {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
            gap: .45rem;
            margin: 0 0 0 auto;
            min-height: 46px;
        }

        .desktop-nav a {
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

        .desktop-nav a:hover {
            background: rgba(255,255,255,.20);
            color: #ffffff;
            border-color: rgba(255,255,255,.45);
        }

        .desktop-nav a.is-active,
        .desktop-nav a[aria-current="page"] {
            background: rgba(255,255,255,.28);
            color: #ffffff;
            font-weight: 700;
            border-color: rgba(255,255,255,.60);
        }

        .desktop-nav a.nav-cta {
            background: #fff;
            color: #0f172a;
            border: 1px solid #fff;
            font-weight: 700;
            padding: .48rem .78rem;
            border-radius: 999px;
        }

        .desktop-nav a.nav-cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(3, 7, 33, .22);
        }

        .mobile-nav-drawer {
            display: none;
        }

        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown summary {
            list-style: none;
            color: #eceff3;
            padding: .42rem .68rem;
            border-radius: 999px;
            font-size: .86rem;
            font-weight: 700;
            letter-spacing: .02em;
            transition: .15s ease;
            border: 1px solid rgba(255,255,255,.55);
            background: #fff;
            color: #0f172a;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            white-space: nowrap;
        }

        .nav-dropdown summary::-webkit-details-marker {
            display: none;
        }

        .nav-dropdown summary::after {
            content: "";
            width: .5rem;
            height: .5rem;
            border-right: 2px solid currentColor;
            border-bottom: 2px solid currentColor;
            transform: rotate(45deg) translateY(-1px);
            transition: transform .15s ease;
        }

        .nav-dropdown[open] summary::after {
            transform: rotate(-135deg) translateY(-1px);
        }

        .nav-dropdown summary:hover,
        .nav-dropdown[open] summary,
        .nav-dropdown.is-active summary {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(3, 7, 33, .22);
        }

        .nav-dropdown.is-active summary {
            background: rgba(255,255,255,.28);
            color: #ffffff;
            border-color: rgba(255,255,255,.60);
        }

        .nav-dropdown-menu {
            position: absolute;
            top: calc(100% + .45rem);
            left: 50%;
            transform: translateX(-50%);
            min-width: 260px;
            padding: .5rem;
            border-radius: 14px;
            background: rgba(8, 15, 30, .96);
            border: 1px solid rgba(255,255,255,.18);
            box-shadow: 0 20px 40px rgba(2, 6, 23, .28);
            backdrop-filter: blur(10px);
            display: grid;
            gap: .25rem;
            z-index: 120;
        }

        .nav-dropdown-menu a,
        .nav-dropdown-menu span {
            display: block;
            width: 100%;
            text-decoration: none;
            color: #f8fafc;
            padding: .68rem .8rem;
            border-radius: 10px;
            border: 1px solid transparent;
            font-size: .84rem;
            font-weight: 600;
            line-height: 1.35;
            background: transparent;
        }

        .nav-dropdown-menu a:hover {
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.18);
        }

        .nav-dropdown-menu .is-disabled {
            color: #cbd5e1;
            opacity: .78;
            cursor: not-allowed;
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

        .btn-submit-input {
            background: linear-gradient(135deg, #0b8a7f, #0f766e);
            color: #ffffff;
            border-color: #0b8a7f;
            font-weight: 700;
            padding: .72rem 1.25rem;
            box-shadow: 0 10px 18px rgba(11, 138, 127, .24);
        }

        .btn-submit-session {
            background: linear-gradient(135deg, #0b8a7f, #0f766e);
            color: #ffffff;
            border-color: #0b8a7f;
            font-weight: 700;
            padding: .72rem 1.25rem;
            box-shadow: 0 10px 18px rgba(11, 138, 127, .24);
        }

        .btn-submit-input:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 20px rgba(11, 138, 127, .30);
        }

        .btn-submit-session:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 20px rgba(11, 138, 127, .30);
        }

        .btn-submit-input:focus-visible {
            outline: 3px solid rgba(15, 118, 110, .32);
            outline-offset: 2px;
        }

        .btn-submit-session:focus-visible {
            outline: 3px solid rgba(15, 118, 110, .32);
            outline-offset: 2px;
        }

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
            .site-header {
                overflow: visible;
                isolation: isolate;
            }
            .hero { grid-template-columns: 1fr; }
            .grid-2 { grid-template-columns: 1fr; }
            .top-nav {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: .6rem;
                position: relative;
                overflow: visible;
                backdrop-filter: none;
                z-index: auto;
            }
            .brand {
                flex: 1;
                min-width: 0;
            }
            .desktop-nav {
                display: none;
            }
            .mobile-nav-drawer { 
                display: flex;
                position: fixed;
                inset: 0 auto 0 0;
                width: min(82vw, 320px);
                max-width: calc(100vw - 3rem);
                height: 100dvh;
                background:
                    linear-gradient(180deg, rgba(9, 23, 45, .98), rgba(11, 95, 87, .98) 42%, rgba(20, 83, 45, .98)),
                    radial-gradient(circle at top right, rgba(153, 246, 228, .12), transparent 34%);
                flex-direction: column;
                gap: 0;
                align-items: stretch;
                justify-content: flex-start;
                padding: .85rem 0 1.2rem !important;
                margin: 0 !important;
                border-radius: 0;
                border: none;
                z-index: 9999;
                overflow-y: auto;
                overscroll-behavior: contain;
                backdrop-filter: blur(10px);
                visibility: hidden;
                pointer-events: none;
                transform: translate3d(-104%, 0, 0);
                transition: transform .28s ease;
                box-shadow: 18px 0 48px rgba(2, 6, 23, .34);
                will-change: transform;
            }
            .mobile-nav-drawer.active {
                visibility: visible;
                pointer-events: auto;
                transform: translate3d(0, 0, 0);
            }
            .mobile-nav-head {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: .8rem;
                padding: 0 1rem .9rem;
                margin: 0 0 .25rem;
                border-bottom: 1px solid rgba(255,255,255,.12);
                position: sticky;
                top: 0;
                z-index: 2;
                background: linear-gradient(180deg, rgba(9, 23, 45, .98), rgba(11, 95, 87, .96));
            }
            .menu-close {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: rgba(255,255,255,.10);
                border-color: rgba(255,255,255,.18);
                color: #f8fafc;
            }
            .mobile-nav-links {
                display: grid;
            }
            .mobile-nav-drawer a {
                padding: .92rem 1.1rem;
                border-radius: 0;
                text-align: left;
                font-size: 1rem;
                width: 100%;
                border-bottom: 1px solid rgba(255,255,255,.10);
                color: #ecfeff;
                text-decoration: none;
                position: relative;
                z-index: 1;
            }
            .mobile-nav-drawer a:hover {
                background: rgba(255,255,255,.08);
                color: #ffffff;
            }
            .mobile-nav-drawer a.is-active,
            .mobile-nav-drawer a[aria-current="page"] {
                background: rgba(255,255,255,.16);
                color: #ffffff;
                border-color: rgba(255,255,255,.2);
            }
            .mobile-nav-drawer .nav-dropdown {
                width: 100%;
            }
            .mobile-nav-drawer .nav-dropdown summary {
                width: 100%;
                justify-content: space-between;
                border-radius: 0;
                padding: .92rem 1.1rem;
                font-size: 1rem;
                border: 0;
                border-bottom: 1px solid rgba(255,255,255,.10);
                background: transparent;
                color: #ecfeff;
                box-shadow: none;
                position: relative;
                z-index: 1;
            }
            .mobile-nav-drawer .nav-dropdown.is-active summary,
            .mobile-nav-drawer .nav-dropdown[open] summary,
            .mobile-nav-drawer .nav-dropdown summary:hover {
                transform: none;
                box-shadow: none;
                background: rgba(255,255,255,.08);
                color: #ffffff;
            }
            .mobile-nav-drawer .nav-dropdown-menu {
                position: static;
                transform: none;
                min-width: 100%;
                padding: .2rem 0 .5rem;
                border: 0;
                border-radius: 0;
                background: rgba(255,255,255,.04);
                box-shadow: none;
            }
            .mobile-nav-drawer .nav-dropdown-menu a,
            .mobile-nav-drawer .nav-dropdown-menu span {
                padding: .8rem 1.7rem;
                border-radius: 0;
                font-size: .9rem;
                border-bottom: 1px solid rgba(255,255,255,.08);
                color: #dbeafe;
                text-decoration: none;
            }
            .menu-toggle {
                display: block;
                font-size: 1.5rem;
                padding: .2rem .4rem;
                flex: 0 0 auto;
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
                gap: .45rem;
                padding: .45rem .55rem;
                border-radius: 10px;
                margin-bottom: 1.2rem;
                position: relative;
                z-index: auto;
            }

            .brand {
                gap: .35rem;
                min-height: 40px;
            }

            .brand-logo {
                max-height: 32px;
            }

            .brand-mark { font-size: 0.88rem; }
            .brand-sub { font-size: .78rem; }

            .menu-toggle {
                font-size: 1.3rem;
                min-width: 40px;
                min-height: 40px;
                padding: .15rem .3rem;
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

            .btn-submit-input {
                width: 100%;
                text-align: center;
                padding: .65rem .95rem;
            }

            .btn-submit-session {
                width: 100%;
                text-align: center;
                padding: .65rem .95rem;
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
            
            .mobile-nav-drawer {
                width: min(84vw, 310px);
                padding: .75rem 0 1rem !important;
            }

            .mobile-nav-drawer a {
                padding: .82rem 1rem;
                font-size: .9rem;
            }
            .mobile-nav-drawer .nav-dropdown summary {
                padding: .82rem 1rem;
                font-size: .9rem;
            }
            .mobile-nav-drawer .nav-dropdown-menu a,
            .mobile-nav-drawer .nav-dropdown-menu span {
                padding: .68rem 1.5rem;
                font-size: .84rem;
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
                gap: .35rem;
                padding: .35rem .45rem;
                border-radius: 8px;
                margin-bottom: 1rem;
                position: relative;
                z-index: auto;
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
                min-width: 38px;
                min-height: 38px;
                padding: .1rem .25rem;
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

            .btn-submit-input {
                width: 100%;
                text-align: center;
            }

            .btn-submit-session {
                width: 100%;
                text-align: center;
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

            .mobile-nav-drawer {
                width: min(86vw, 292px);
                padding-top: .65rem !important;
            }

            .mobile-nav-drawer a {
                padding: .72rem .9rem;
                font-size: .80rem;
                border-bottom: 1px solid rgba(255,255,255,.1);
            }
            .mobile-nav-drawer .nav-dropdown summary {
                padding: .72rem .9rem;
                font-size: .80rem;
            }
            .mobile-nav-drawer .nav-dropdown-menu a,
            .mobile-nav-drawer .nav-dropdown-menu span {
                padding: .62rem 1.2rem;
                font-size: .78rem;
            }
            .mobile-nav-head {
                padding: 0 .9rem .8rem;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const menuClose = document.querySelector('.menu-close');
            const mobileDrawer = document.querySelector('.mobile-nav-drawer');
            let overlay = document.querySelector('.menu-overlay');
            
            // Create overlay if it doesn't exist
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.className = 'menu-overlay';
                document.body.appendChild(overlay);
            }
            
            if (menuToggle && mobileDrawer) {
                if (mobileDrawer.parentElement !== document.body) {
                    document.body.appendChild(mobileDrawer);
                }

                const setMenuState = function(isOpen) {
                    mobileDrawer.classList.toggle('active', isOpen);
                    overlay.classList.toggle('active', isOpen);
                    document.body.classList.toggle('nav-open', isOpen);
                    menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                };

                const closeMenu = function() {
                    setMenuState(false);
                    closeDropdowns();
                };

                const dropdowns = mobileDrawer.querySelectorAll('.nav-dropdown');
                const navLinks = mobileDrawer.querySelectorAll('a');
                const closeDropdowns = function(except) {
                    dropdowns.forEach(dropdown => {
                        if (dropdown !== except) {
                            dropdown.removeAttribute('open');
                        }
                    });
                };

                dropdowns.forEach(dropdown => {
                    dropdown.addEventListener('toggle', function() {
                        if (dropdown.open) {
                            closeDropdowns(dropdown);
                        }
                    });
                });

                menuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isOpen = !mobileDrawer.classList.contains('active');
                    setMenuState(isOpen);

                    if (!isOpen) {
                        closeDropdowns();
                    }
                });

                if (menuClose) {
                    menuClose.addEventListener('click', function() {
                        closeMenu();
                    });
                }

                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth <= 920) {
                            closeMenu();
                        }
                    });
                });

                // Close menu when clicking overlay
                overlay.addEventListener('click', function() {
                    closeMenu();
                });

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape' && mobileDrawer.classList.contains('active')) {
                        closeMenu();
                    }
                });

                window.addEventListener('resize', function() {
                    if (window.innerWidth > 920 && mobileDrawer.classList.contains('active')) {
                        closeMenu();
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
