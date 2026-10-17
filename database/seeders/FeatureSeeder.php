<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            ['Informações clínicas', 'Cadastro e consulta de informações clínicas das pessoas idosas.'],
            ['Medicamentos', 'Cadastro de prescrições e consulta do plano de medicamentos.'],
            ['Consultas', 'Agendamento e consulta das consultas médicas.'],
            ['Indicadores de saúde', 'Registro e consulta de indicadores e sinais vitais.'],
            ['Coleta automática de dados', 'Coleta de dados pela Xiaomi Mi Band, sincronizados por Mi Fitness ou Zepp Life e Health Connect.'],
            ['Inserção manual de dados', 'Registro manual de informações por cuidadores e profissionais de saúde.'],
            ['Evolução do paciente', 'Visualização gráfica da evolução dos indicadores de cada paciente.'],
            ['Notificações e alertas', 'Envio de notificações e alertas sobre a situação de saúde.'],
            ['Histórico de saúde', 'Linha do tempo com os registros de saúde da pessoa idosa.'],
            ['Gestão de usuários e vínculos', 'Cadastro de usuários e vínculo entre cuidadores, profissionais e idosos.'],
            ['Gestão institucional da clínica', 'Gerenciamento das informações da clínica ou instituição.'],
        ];

        foreach ($features as [$title, $description]) {
            Feature::updateOrCreate(
                ['title' => $title],
                ['description' => $description, 'status' => 'Prevista']
            );
        }
    }
}