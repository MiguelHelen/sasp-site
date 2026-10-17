<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Sistema de Acompanhamento de Saúde para Pessoas Idosas</title>
    <meta name="description" content="Site de apresentação do TCC S.A.S.P.I. - Sistema de Acompanhamento de Saúde para Pessoas Idosas.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-800">

    {{-- Cabeçalho --}}
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-teal-600 text-white font-bold">S</span>
                <span class="text-lg font-bold tracking-tight text-slate-900">S.A.S.P.I.</span>
            </a>

            <nav class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm font-medium">
                <a href="#sobre" class="text-slate-600 hover:text-teal-700">Sobre</a>
                <a href="#funcionalidades" class="text-slate-600 hover:text-teal-700">Funcionalidades</a>
                <a href="#tecnologias" class="text-slate-600 hover:text-teal-700">Tecnologias</a>

                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-lg bg-teal-600 px-4 py-2 text-white hover:bg-teal-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-700 hover:text-teal-700">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-lg bg-teal-600 px-4 py-2 text-white hover:bg-teal-700">Cadastrar</a>
                    @endif
                @endauth
            </nav>
        </div>
    </header>

    {{-- Destaque --}}
    <section class="bg-gradient-to-br from-teal-700 via-teal-600 to-sky-700 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-16 sm:py-24">
            <p class="inline-block rounded-full bg-white/15 px-3 py-1 text-xs font-semibold uppercase tracking-wider">
                Trabalho de Conclusão de Curso
            </p>
            <h1 class="mt-4 text-4xl sm:text-5xl font-bold tracking-tight">S.A.S.P.I.</h1>
            <p class="mt-3 text-xl sm:text-2xl font-medium text-teal-50">
                Sistema de Acompanhamento de Saúde para Pessoas Idosas
            </p>
            <p class="mt-5 max-w-2xl text-teal-50/90 leading-relaxed">
                Uma plataforma para auxiliar no monitoramento e no acompanhamento preventivo da saúde
                de pessoas idosas, com aplicação web e aplicativo móvel.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-lg bg-white px-5 py-3 font-semibold text-teal-800 hover:bg-teal-50">
                        Ver protótipos no dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg bg-white px-5 py-3 font-semibold text-teal-800 hover:bg-teal-50">
                        Entrar para ver os protótipos
                    </a>
                @endauth
                <a href="#sobre" class="rounded-lg border border-white/40 px-5 py-3 font-semibold text-white hover:bg-white/10">
                    Conhecer o projeto
                </a>
            </div>
        </div>
    </section>

    {{-- Sobre --}}
    <section id="sobre" class="max-w-6xl mx-auto px-4 sm:px-6 py-14">
        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900">Sobre o projeto</h2>
        <div class="mt-5 grid gap-8 lg:grid-cols-2">
            <div class="space-y-4 leading-relaxed text-slate-700">
                <p>
                    O S.A.S.P.I. é um sistema desenvolvido para auxiliar no monitoramento e no acompanhamento
                    preventivo da saúde de pessoas idosas. A plataforma integra uma aplicação web e um aplicativo
                    móvel, permitindo o cadastro e a consulta de informações clínicas, medicamentos, consultas e
                    indicadores de saúde.
                </p>
                <p>
                    O sistema também prevê a coleta automática de dados por meio da Xiaomi Mi Band, utilizando o
                    aplicativo Mi Fitness ou Zepp Life e o Health Connect para a sincronização das informações.
                    Além disso, permite a inserção manual de dados por cuidadores e profissionais de saúde,
                    oferecendo visualização da evolução dos pacientes, notificações e alertas.
                </p>
                <p>
                    Dessa forma, o S.A.S.P.I. busca centralizar informações, facilitar o acompanhamento dos idosos
                    e contribuir para cuidados de saúde mais organizados, acessíveis e preventivos.
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3 content-start">
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <p class="text-sm font-semibold text-teal-700">Aplicação web</p>
                    <p class="mt-2 text-sm text-slate-600">Cadastro, consulta e acompanhamento das informações de saúde.</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <p class="text-sm font-semibold text-teal-700">Aplicativo móvel</p>
                    <p class="mt-2 text-sm text-slate-600">Acesso às informações pelo celular, junto com a sincronização dos dados.</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <p class="text-sm font-semibold text-teal-700">Coleta de dados</p>
                    <p class="mt-2 text-sm text-slate-600">Automática, pela Xiaomi Mi Band, ou manual, por cuidadores e profissionais.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Funcionalidades (vindas do banco) --}}
    <section id="funcionalidades" class="bg-white border-y border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-14">
            <h2 class="text-2xl sm:text-3xl font-bold text-slate-900">Funcionalidades previstas</h2>
            <p class="mt-2 text-slate-600">
                Conteúdo carregado da tabela <code class="rounded bg-slate-100 px-1.5 py-0.5 text-sm">features</code>
                do banco MySQL.
            </p>

            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($features as $feature)
                    <article class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                        <div class="flex items-start justify-between gap-3">
                            <h3 class="font-semibold text-slate-900">{{ $feature->title }}</h3>
                            <span class="shrink-0 rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-medium text-amber-800">
                                {{ $feature->status }}
                            </span>
                        </div>
                        <p class="mt-2 text-sm text-slate-600">{{ $feature->description }}</p>
                    </article>
                @empty
                    <p class="text-slate-500">Nenhuma funcionalidade cadastrada. Rode <code>php artisan db:seed</code>.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Tecnologias (vindas do banco) --}}
    <section id="tecnologias" class="max-w-6xl mx-auto px-4 sm:px-6 py-14">
        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900">Arquitetura tecnológica planejada</h2>
        <p class="mt-2 text-slate-600">
            Tecnologias definidas para o sistema S.A.S.P.I. (tabela
            <code class="rounded bg-slate-100 px-1.5 py-0.5 text-sm">technologies</code>).
        </p>

        <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($technologies as $category => $items)
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-teal-700">{{ $category }}</h3>
                    <ul class="mt-3 space-y-2">
                        @foreach ($items as $tech)
                            <li>
                                <p class="font-medium text-slate-900">{{ $tech->name }}</p>
                                <p class="text-sm text-slate-600">{{ $tech->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @empty
                <p class="text-slate-500">Nenhuma tecnologia cadastrada. Rode <code>php artisan db:seed</code>.</p>
            @endforelse
        </div>
    </section>

    {{-- Sobre este site --}}
    <section class="bg-slate-900 text-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
            <h2 class="text-xl font-bold text-white">Sobre este site</h2>
            <p class="mt-3 max-w-3xl text-sm leading-relaxed text-slate-300">
                Este site foi desenvolvido para a atividade de Programação Web 3 (PW3), com PHP, Laravel Breeze,
                Blade, Tailwind CSS, Eloquent ORM e MySQL. Ele serve apenas para apresentar e documentar o TCC.
                O S.A.S.P.I. definitivo segue a arquitetura própria descrita acima e não é desenvolvido em Laravel.
            </p>
        </div>
    </section>

    <footer class="bg-slate-950 text-slate-400 text-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 flex flex-wrap items-center justify-between gap-2">
            <p>&copy; {{ date('Y') }} S.A.S.P.I. - Projeto de TCC</p>
            <p>Site de apresentação desenvolvido para a atividade de PW3</p>
        </div>
    </footer>

</body>
</html>