<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTAdmin 安装完成</title>
    <meta name="description" content="PTAdmin 安装完成后的默认首页，包含平台介绍、文档地址和基础使用说明。">
    <link rel="icon" href="https://www.pangtou.com/favicon.png">
    <style>
        :root {
            --primary: #0d6efd;
            --primary-dark: #0957d0;
            --ink: #14213d;
            --muted: #607089;
            --line: #e8eef7;
            --soft: #f5f8fd;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: var(--ink);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "PingFang SC", "Microsoft YaHei", sans-serif;
            line-height: 1.7;
            background: var(--white);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 10;
            border-bottom: 1px solid rgba(232, 238, 247, .82);
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(14px);
        }

        .nav {
            display: flex;
            min-height: 72px;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 20px;
        }

        .brand-mark {
            display: block;
            width: 38px;
            height: 38px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            color: var(--muted);
            font-size: 15px;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .hero {
            overflow: hidden;
            border-bottom: 1px solid var(--line);
            background:
                radial-gradient(circle at 88% 18%, rgba(13, 110, 253, .12), transparent 30%),
                linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
        }

        .hero-inner {
            display: grid;
            grid-template-columns: minmax(0, 1.06fr) minmax(360px, .94fr);
            gap: 56px;
            align-items: center;
            min-height: 590px;
            padding: 72px 0 84px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            padding: 7px 12px;
            border: 1px solid #d9e8ff;
            border-radius: 999px;
            color: var(--primary-dark);
            font-size: 14px;
            font-weight: 600;
            background: #eef6ff;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #18b66a;
            box-shadow: 0 0 0 4px rgba(24, 182, 106, .14);
        }

        h1 {
            margin: 0;
            max-width: 680px;
            font-size: clamp(38px, 5vw, 64px);
            line-height: 1.14;
            letter-spacing: 0;
        }

        .hero-copy {
            max-width: 660px;
            margin: 24px 0 0;
            color: var(--muted);
            font-size: 18px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 34px;
        }

        .button {
            display: inline-flex;
            min-height: 46px;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            border: 1px solid var(--line);
            border-radius: 8px;
            font-weight: 600;
            background: var(--white);
        }

        .button.primary {
            border-color: var(--primary);
            color: var(--white);
            background: var(--primary);
            box-shadow: 0 14px 30px rgba(13, 110, 253, .26);
        }

        .button:hover {
            transform: translateY(-1px);
        }

        .hero-panel {
            position: relative;
            padding: 28px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: rgba(255, 255, 255, .9);
            box-shadow: 0 24px 70px rgba(30, 84, 160, .12);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-bottom: 18px;
            border-bottom: 1px solid var(--line);
        }

        .panel-title {
            font-size: 18px;
            font-weight: 700;
        }

        .panel-tag {
            padding: 4px 10px;
            border-radius: 999px;
            color: #0b7b47;
            font-size: 13px;
            font-weight: 700;
            background: #e9f8f0;
        }

        .metric-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 18px;
        }

        .metric {
            min-height: 112px;
            padding: 18px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fbfdff;
        }

        .metric strong {
            display: block;
            margin-bottom: 8px;
            font-size: 22px;
        }

        .metric span {
            color: var(--muted);
            font-size: 14px;
        }

        .terminal {
            margin-top: 18px;
            padding: 18px;
            border-radius: 8px;
            color: #c7defc;
            font: 13px/1.7 ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            background: #10223f;
            overflow-x: auto;
        }

        .section {
            padding: 78px 0;
        }

        .section.soft {
            background: var(--soft);
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 28px;
            margin-bottom: 30px;
        }

        .section-heading h2 {
            margin: 0;
            font-size: 32px;
            line-height: 1.25;
        }

        .section-heading p {
            max-width: 560px;
            margin: 0;
            color: var(--muted);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .feature,
        .doc-card,
        .step {
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--white);
        }

        .feature {
            min-height: 210px;
            padding: 28px;
        }

        .icon {
            display: grid;
            width: 46px;
            height: 46px;
            place-items: center;
            margin-bottom: 22px;
            border-radius: 8px;
            color: var(--primary);
            font-weight: 800;
            background: #eef6ff;
        }

        .feature h3,
        .doc-card h3,
        .step h3 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .feature p,
        .doc-card p,
        .step p {
            margin: 0;
            color: var(--muted);
        }

        .docs {
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            gap: 22px;
            align-items: stretch;
        }

        .doc-card {
            display: flex;
            min-height: 168px;
            flex-direction: column;
            justify-content: space-between;
            padding: 28px;
        }

        .doc-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 22px;
            color: var(--primary);
            font-weight: 700;
        }

        .steps {
            display: grid;
            gap: 16px;
            counter-reset: step;
        }

        .step {
            position: relative;
            padding: 24px 24px 24px 82px;
        }

        .step::before {
            counter-increment: step;
            content: counter(step, decimal-leading-zero);
            position: absolute;
            left: 24px;
            top: 25px;
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 8px;
            color: var(--white);
            font-weight: 800;
            background: var(--primary);
        }

        code {
            display: inline-block;
            max-width: 100%;
            padding: 2px 6px;
            border-radius: 6px;
            color: #174ea6;
            font-size: .92em;
            background: #eef6ff;
            overflow-wrap: anywhere;
        }

        .footer {
            padding: 28px 0;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 14px;
            background: #101b31;
        }

        .footer .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .footer a {
            color: #c7defc;
        }

        @media (max-width: 900px) {
            .nav {
                min-height: 64px;
            }

            .nav-links {
                display: none;
            }

            .hero-inner,
            .docs {
                grid-template-columns: 1fr;
            }

            .hero-inner {
                min-height: auto;
                padding: 54px 0 62px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .section-heading {
                display: block;
            }

            .section-heading p {
                margin-top: 12px;
            }
        }

        @media (max-width: 560px) {
            .container {
                width: min(100% - 24px, 1180px);
            }

            .hero-panel {
                padding: 18px;
            }

            .metric-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 54px 0;
            }

            .step {
                padding: 74px 20px 22px;
            }

            .step::before {
                left: 20px;
                top: 22px;
            }
        }
    </style>
</head>
<body>
<header class="site-header">
    <div class="container nav">
        <a class="brand" href="https://www.pangtou.com/" target="_blank" rel="noreferrer">
            <img class="brand-mark" src="{{ asset('logo.svg') }}" alt="PTAdmin">
            <span>PTAdmin</span>
        </a>
        <nav class="nav-links" aria-label="主要导航">
            <a href="#platform">平台介绍</a>
            <a href="#docs">文档地址</a>
            <a href="#usage">使用说明</a>
            <a href="https://www.pangtou.com/" target="_blank" rel="noreferrer">访问官网</a>
        </nav>
    </div>
</header>

<main>
    <section class="hero">
        <div class="container hero-inner">
            <div>
                <div class="eyebrow"><span class="status-dot"></span>安装已完成</div>
                <h1>欢迎使用 PTAdmin，开始搭建你的后台管理系统</h1>
                <p class="hero-copy">
                    PTAdmin 基于 Laravel 生态构建，提供后台认证、权限、资源管理、插件扩展和模板能力。当前项目已经完成基础安装，你可以继续初始化账号、配置数据库，并按业务需要扩展后台功能。
                </p>
                <div class="actions">
                    <a class="button" href="https://www.pangtou.com/" target="_blank" rel="noreferrer">查看官网</a>
                    <a class="button" href="https://www.pangtou.com/forum.html" target="_blank" rel="noreferrer">社区问答</a>
                </div>
            </div>

            <aside class="hero-panel" aria-label="安装状态">
                <div class="panel-header">
                    <div class="panel-title">项目状态</div>
                    <div class="panel-tag">Ready</div>
                </div>
                <div class="metric-grid">
                    <div class="metric">
                        <strong>Laravel</strong>
                        <span>保留基础宿主结构，便于接入现有业务。</span>
                    </div>
                    <div class="metric">
                        <strong>PTAdmin</strong>
                        <span>后台能力由 <code>ptadmin/admin</code> 提供。</span>
                    </div>
                    <div class="metric">
                        <strong>插件市场</strong>
                        <span>按需安装应用、插件和业务模块。</span>
                    </div>
                    <div class="metric">
                        <strong>模板市场</strong>
                        <span>快速组合前台页面和展示站点。</span>
                    </div>
                </div>
                <div class="terminal">
                    composer install<br>
                    php artisan key:generate<br>
                    php artisan migrate<br>
                    php artisan admin:init
                </div>
            </aside>
        </div>
    </section>

    <section class="section" id="platform">
        <div class="container">
            <div class="section-heading">
                <h2>平台介绍</h2>
                <p></p>
            </div>
            <div class="grid">
                <article class="feature">
                    <div class="icon">01</div>
                    <h3>后台基础能力</h3>
                    <p>内置后台认证、授权、角色资源等能力，适合作为企业级后台管理系统的基础工程。</p>
                </article>
                <article class="feature">
                    <div class="icon">02</div>
                    <h3>灵活扩展</h3>
                    <p>通过插件和应用扩展业务功能，减少重复开发，让项目可以按模块持续演进。</p>
                </article>
                <article class="feature">
                    <div class="icon">03</div>
                    <h3>模板支持</h3>
                    <p>可结合模板市场快速搭建展示站点，也可以在当前 Laravel 项目中继续定制页面。</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section soft" id="docs">
        <div class="container">
            <div class="section-heading">
                <h2>文档地址</h2>
                <p></p>
            </div>
            <div class="docs">
                <article class="doc-card">
                    <div>
                        <h3>官方首页</h3>
                        <p>了解 PTAdmin 产品能力、应用市场、模板市场和服务支持。</p>
                    </div>
                    <a class="doc-link" href="https://www.pangtou.com/" target="_blank" rel="noreferrer">https://www.pangtou.com/</a>
                </article>
                <article class="doc-card">
                    <div>
                        <h3>社区问答</h3>
                        <p>安装、配置、插件开发和使用问题可在社区中检索或提问。</p>
                    </div>
                    <a class="doc-link" href="https://www.pangtou.com/forum.html" target="_blank" rel="noreferrer">打开问答社区</a>
                </article>
                <article class="doc-card">
                    <div>
                        <h3>应用市场</h3>
                        <p>选择经过平台整理的插件与应用，扩展后台功能。</p>
                    </div>
                    <a class="doc-link" href="https://www.pangtou.com/addon.html" target="_blank" rel="noreferrer">查看应用市场</a>
                </article>
                <article class="doc-card">
                    <div>
                        <h3>模板市场</h3>
                        <p>查找适合品牌和业务需求的前台模板，快速完成站点搭建。</p>
                    </div>
                    <a class="doc-link" href="https://www.pangtou.com/templates.html" target="_blank" rel="noreferrer">查看模板市场</a>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="usage">
        <div class="container">
            <div class="section-heading">
                <h2>简单使用说明</h2>
                <p>完成基础命令后即可进入后台。下面步骤与当前项目 README 保持一致。</p>
            </div>
            <div class="steps">
                <article class="step">
                    <h3>安装依赖并生成密钥</h3>
                    <p>在项目目录执行 <code>composer install</code> 和 <code>php artisan key:generate</code>，确保 Laravel 基础环境可用。</p>
                </article>
                <article class="step">
                    <h3>发布 PTAdmin 配置和迁移</h3>
                    <p>执行 <code>php artisan vendor:publish</code> 发布 <code>ptadmin-config</code> 与 <code>ptadmin-migrations</code>，再按环境调整数据库配置。</p>
                </article>
                <article class="step">
                    <h3>初始化数据和管理员</h3>
                    <p>执行 <code>php artisan migrate</code> 创建数据表。如需创建创始人账户，继续执行 <code>php artisan admin:init</code>。</p>
                </article>
                <article class="step">
                    <h3>进入后台并开始开发</h3>
                    <p>默认后台入口使用 <code>config('app.prefix', 'system')</code>。你可以从菜单、权限、资源和插件开始配置业务功能。</p>
                </article>
            </div>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="container">
        <span>Copyright © PTAdmin. 专业的后台管理系统</span>
        <a href="https://www.pangtou.com/" target="_blank" rel="noreferrer">www.pangtou.com</a>
    </div>
</footer>
</body>
</html>
