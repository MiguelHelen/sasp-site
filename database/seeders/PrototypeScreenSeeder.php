<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\PrototypeScreen;
use Illuminate\Database\Seeder;

class PrototypeScreenSeeder extends Seeder
{
    public function run(): void
    {
        // Limpa as telas antigas (a tabela pivô é limpa junto, por cascade),
        // para que o Seeder possa ser repetido sem deixar registros velhos.
        PrototypeScreen::query()->delete();

        // Formato de cada linha:
        // [título, rota, descrição, nome do arquivo da imagem, funcionalidades ligadas]
        $screens = [
            ['Tela inicial', '/', 'Landing page pública de apresentação do sistema.', '1-Tela Inicial.png', []],
            ['Login', '/login', 'Tela de acesso ao sistema.', '2- Login.png', []],
            ['Cadastro', '/cadastro', 'Tela de cadastro restrito, de caráter institucional.', '3- Cadastro.png', []],

            ['Dashboard Administrador', null, 'Painel de visão geral voltado ao administrador do sistema.', 'Dashboard Administrador.png',
                ['Gestão de usuários e vínculos', 'Gestão institucional da clínica']],
            ['Dashboard Médico', null, 'Painel de visão geral voltado ao profissional de saúde.', 'Dashboard Médico.png',
                ['Informações clínicas', 'Consultas', 'Indicadores de saúde', 'Evolução do paciente']],
            ['Dashboard Familiar', null, 'Painel de visão geral voltado ao familiar ou cuidador da pessoa idosa.', 'Dashboard Familiar.png',
                ['Indicadores de saúde', 'Medicamentos', 'Consultas', 'Notificações e alertas']],

            ['Sinais Vitais', '/dashboard/saude', 'Telemetria e acompanhamento dos sinais vitais.', 'Sinais Vitiais.png',
                ['Indicadores de saúde', 'Coleta automática de dados', 'Evolução do paciente']],

            ['Medicamentos', '/dashboard/medicamentos', 'Plano com os medicamentos em uso.', 'Medicamentos.png',
                ['Medicamentos']],
            ['Nova Prescrição', '/dashboard/medicamentos/novo', 'Formulário de cadastro de nova prescrição.', 'Nova Prescrição.png',
                ['Medicamentos']],

            ['Consultas', '/dashboard/consultas', 'Agenda com as consultas marcadas.', 'Consultas.png',
                ['Consultas']],
            ['Nova consulta', '/dashboard/consultas/nova', 'Formulário de cadastro de nova consulta.', 'Nova consulta.png',
                ['Consultas']],

            ['Histórico de Saúde', '/dashboard/historico', 'Linha do tempo do histórico de saúde.', 'Histórico de Saúde.png',
                ['Histórico de saúde', 'Evolução do paciente']],
            ['Novo registro de saúde', '/dashboard/historico/novo', 'Formulário de novo registro de saúde.', 'Novo registro de saúde.png',
                ['Inserção manual de dados', 'Histórico de saúde']],

            ['Dados da Clínica', '/dashboard/clinica', 'Gestão institucional da clínica.', 'Dados da Clínica.png',
                ['Gestão institucional da clínica']],
            ['Novo Usuário', '/dashboard/usuarios/novo', 'Formulário de cadastro de novo usuário.', 'Novo Usuário.png',
                ['Gestão de usuários e vínculos']],
            ['Novo Idoso', '/dashboard/idosos/novo', 'Formulário de cadastro de nova pessoa idosa.', 'Novo Idoso.png',
                ['Informações clínicas']],
            ['Atribuir Idoso a Profissional', '/dashboard/vinculos/novo', 'Formulário para vincular uma pessoa idosa a um profissional.', 'Atribuir Idoso a Profissional.png',
                ['Gestão de usuários e vínculos']],
            ['Listar Vínculos', '/dashboard/vinculos', 'Lista dos vínculos cadastrados.', 'Listar Vínculos.png',
                ['Gestão de usuários e vínculos']],
        ];

        foreach ($screens as $index => [$title, $route, $description, $file, $featureTitles]) {
            $screen = PrototypeScreen::create([
                'title' => $title,
                'route' => $route,
                'description' => $description,
                'image_path' => 'images/prototipos/' . $file,
                'display_order' => $index + 1,
            ]);

            $featureIds = Feature::whereIn('title', $featureTitles)->pluck('id');
            $screen->features()->attach($featureIds);
        }
    }
}