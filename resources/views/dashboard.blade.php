<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Painel do projeto S.A.S.P.I.
        </h2>
    </x-slot>

    <div class="py-8" x-data="{ filter: null, open: false, src: '', title: '' }" @keydown.escape.window="open = false">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Boas-vindas --}}
            <div class="rounded-xl bg-gradient-to-br from-teal-700 via-teal-600 to-sky-700 p-6 sm:p-8 text-white shadow-sm">
                <p class="text-sm font-medium text-teal-100">Olá, {{ Auth::user()->name }}</p>
                <h3 class="mt-1 text-2xl font-bold">S.A.S.P.I. - Sistema de Acompanhamento de Saúde para Pessoas Idosas</h3>
                <p class="mt-3 max-w-3xl text-sm leading-relaxed text-teal-50">
                    Este painel aprofunda a apresentação do TCC: mostra os protótipos das telas, a arquitetura
                    tecnológica planejada e demonstrações técnicas feitas com os dados do banco MySQL deste site.
                </p>
            </div>

            {{-- Demonstração técnica: dados do banco --}}
            <section>
                <h3 class="text-lg font-semibold text-gray-900">Demonstração técnica: banco de dados</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Contagens consultadas ao vivo no MySQL com Eloquent. Os registros foram inseridos por Seeders.
                </p>
                <div class="mt-4 grid grid-cols-2 gap-4 lg:grid-cols-4">
                    <div class="rounded-xl bg-white p-5 shadow-sm border border-gray-100">
                        <p class="text-3xl font-bold text-teal-700">{{ $counts['technologies'] }}</p>
                        <p class="mt-1 text-sm text-gray-600">Tecnologias <span class="text-gray-400">(technologies)</span></p>
                    </div>
                    <div class="rounded-xl bg-white p-5 shadow-sm border border-gray-100">
                        <p class="text-3xl font-bold text-teal-700">{{ $counts['features'] }}</p>
                        <p class="mt-1 text-sm text-gray-600">Funcionalidades <span class="text-gray-400">(features)</span></p>
                    </div>
                    <div class="rounded-xl bg-white p-5 shadow-sm border border-gray-100">
                        <p class="text-3xl font-bold text-teal-700">{{ $counts['screens'] }}</p>
                        <p class="mt-1 text-sm text-gray-600">Telas do protótipo <span class="text-gray-400">(prototype_screens)</span></p>
                    </div>
                    <div class="rounded-xl bg-white p-5 shadow-sm border border-gray-100">
                        <p class="text-3xl font-bold text-teal-700">{{ $counts['links'] }}</p>
                        <p class="mt-1 text-sm text-gray-600">Ligações tela-funcionalidade <span class="text-gray-400">(tabela pivô)</span></p>
                    </div>
                </div>
            </section>

            {{-- Protótipos --}}
            <section>
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Protótipos das telas (Figma)</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $screens->count() }} telas lidas da tabela <code class="rounded bg-gray-100 px-1">prototype_screens</code>.
                            Clique em uma tela para ampliar.
                        </p>
                    </div>

                    @if (config('app.figma_url'))
                        <a href="{{ config('app.figma_url') }}" target="_blank" rel="noopener noreferrer"
                           class="rounded-lg bg-teal-600 px-4 py-2 text-sm font-semibold text-white hover:bg-teal-700">
                            Abrir protótipo no Figma
                        </a>
                    @else
                        <span class="rounded-lg border border-dashed border-gray-300 px-4 py-2 text-sm text-gray-500">
                            Link do Figma ainda não informado
                        </span>
                    @endif
                </div>

                {{-- Filtro por funcionalidade (relacionamento muitos-para-muitos) --}}
                <div class="mt-4 flex flex-wrap gap-2">
                    <button type="button" @click="filter = null"
                            :class="filter === null ? 'bg-teal-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'"
                            class="rounded-full px-3 py-1 text-xs font-medium">
                        Todas as telas
                    </button>
                    @foreach ($features as $feature)
                        <button type="button" @click="filter = {{ $feature->id }}"
                                :class="filter === {{ $feature->id }} ? 'bg-teal-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'"
                                class="rounded-full px-3 py-1 text-xs font-medium">
                            {{ $feature->title }}
                        </button>
                    @endforeach
                </div>

                <div class="mt-5 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($screens as $screen)
                        <article x-show="filter === null || @js($screen->features->pluck('id')).includes(filter)"
                                 class="overflow-hidden rounded-xl border border-gray-100 bg-white shadow-sm">
                            <button type="button" class="block w-full bg-gray-100"
                                    @click="open = true; src = @js($screen->image_url); title = @js($screen->title)">
                                <img src="{{ $screen->image_url }}" alt="Protótipo da tela {{ $screen->title }}"
                                     loading="lazy" class="h-44 w-full object-cover object-top">
                            </button>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900">{{ $screen->title }}</h4>
                                @if ($screen->route)
                                    <p class="mt-0.5 text-xs text-gray-400">Rota: <code>{{ $screen->route }}</code></p>
                                @endif
                                <p class="mt-2 text-sm text-gray-600">{{ $screen->description }}</p>

                                @if ($screen->features->isNotEmpty())
                                    <div class="mt-3 flex flex-wrap gap-1.5">
                                        @foreach ($screen->features as $feature)
                                            <span class="rounded-full bg-teal-50 px-2 py-0.5 text-xs text-teal-800">{{ $feature->title }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Ampliação da imagem --}}
                <div x-show="open" x-cloak x-transition.opacity
                     class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4"
                     @click.self="open = false">
                    <div class="max-h-full w-full max-w-5xl overflow-hidden rounded-xl bg-white">
                        <div class="flex items-center justify-between border-b px-4 py-3">
                            <p class="font-semibold text-gray-900" x-text="title"></p>
                            <button type="button" @click="open = false" class="rounded px-2 py-1 text-sm text-gray-600 hover:bg-gray-100">
                                Fechar (Esc)
                            </button>
                        </div>
                        <div class="max-h-[80vh] overflow-auto bg-gray-100">
                            <img :src="src" :alt="title" class="mx-auto w-full">
                        </div>
                    </div>
                </div>
            </section>

            {{-- Arquitetura planejada --}}
            <section>
                <h3 class="text-lg font-semibold text-gray-900">Arquitetura planejada do S.A.S.P.I.</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Arquitetura definida para o sistema definitivo do TCC. Este site em Laravel não faz parte dela:
                    serve apenas para apresentá-la.
                </p>

                <div class="mt-4 grid gap-4 lg:grid-cols-3">
                    <div class="rounded-xl border border-sky-200 bg-sky-50 p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-sky-800">Clientes</p>
                        <ul class="mt-3 space-y-2 text-sm text-gray-700">
                            <li><span class="font-medium">Aplicação web:</span> Next.js e Recharts</li>
                            <li><span class="font-medium">Aplicativo móvel:</span> React Native e Expo</li>
                        </ul>
                    </div>
                    <div class="rounded-xl border border-teal-200 bg-teal-50 p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-teal-800">Backend</p>
                        <ul class="mt-3 space-y-2 text-sm text-gray-700">
                            <li><span class="font-medium">API:</span> Node.js, NestJS e TypeScript</li>
                            <li><span class="font-medium">Acesso a dados:</span> Prisma</li>
                            <li><span class="font-medium">Autenticação:</span> JWT</li>
                            <li><span class="font-medium">Tempo real:</span> Socket.IO e Redis (Upstash)</li>
                        </ul>
                    </div>
                    <div class="rounded-xl border border-amber-200 bg-amber-50 p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-amber-800">Dados e implantação</p>
                        <ul class="mt-3 space-y-2 text-sm text-gray-700">
                            <li><span class="font-medium">Banco de dados:</span> PostgreSQL via Supabase</li>
                            <li><span class="font-medium">Implantação:</span> Vercel, Railway e Supabase</li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- Fluxo de coleta planejado --}}
            <section>
                <h3 class="text-lg font-semibold text-gray-900">Fluxo planejado de coleta de dados</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Fluxo previsto no projeto. Esta é uma demonstração conceitual, não uma integração concluída.
                </p>

                <ol class="mt-4 grid gap-3 md:grid-cols-5">
                    @foreach ([
                        ['Xiaomi Mi Band', 'Mede os dados de saúde da pessoa idosa.'],
                        ['Mi Fitness ou Zepp Life', 'Aplicativo que recebe os dados da pulseira.'],
                        ['Health Connect', 'Sincroniza as informações no celular.'],
                        ['Aplicativo S.A.S.P.I.', 'Envia os dados para o backend.'],
                        ['Web e alertas', 'Evolução do paciente, notificações e alertas.'],
                    ] as $i => [$name, $text])
                        <li class="rounded-xl border border-gray-100 bg-white p-4 shadow-sm">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-teal-600 text-xs font-bold text-white">{{ $i + 1 }}</span>
                            <p class="mt-2 text-sm font-semibold text-gray-900">{{ $name }}</p>
                            <p class="mt-1 text-xs text-gray-600">{{ $text }}</p>
                        </li>
                    @endforeach
                </ol>
            </section>

            {{-- Como o site foi feito --}}
            <section class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900">Como este site foi construído (atividade PW3)</h3>
                <div class="mt-4 grid gap-6 md:grid-cols-2">
                    <div>
                        <p class="text-sm font-semibold text-teal-700">Tecnologias</p>
                        <p class="mt-2 text-sm text-gray-700">
                            PHP, Laravel, Laravel Breeze (autenticação), Blade, Tailwind CSS, Eloquent ORM,
                            migrations, Seeders, MySQL do XAMPP, Git e GitHub.
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-teal-700">Banco de dados do site</p>
                        <ul class="mt-2 space-y-1 text-sm text-gray-700">
                            <li><code>users</code>: autenticação do Breeze</li>
                            <li><code>technologies</code>: tecnologias da arquitetura planejada</li>
                            <li><code>features</code>: funcionalidades previstas</li>
                            <li><code>prototype_screens</code>: telas do protótipo</li>
                            <li><code>feature_prototype_screen</code>: relação muitos-para-muitos entre telas e funcionalidades</li>
                        </ul>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>