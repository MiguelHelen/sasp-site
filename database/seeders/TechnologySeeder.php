<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = [
            ['Node.js', 'Backend', 'Ambiente de execução JavaScript usado no servidor da aplicação.'],
            ['NestJS', 'Backend', 'Framework Node.js para estruturar a API do sistema.'],
            ['TypeScript', 'Backend', 'Superconjunto tipado do JavaScript, usado no desenvolvimento do backend.'],
            ['Prisma', 'Backend', 'ORM para acesso e modelagem do banco de dados.'],
            ['PostgreSQL', 'Banco de dados', 'Banco de dados relacional planejado para armazenar as informações do sistema.'],
            ['Supabase', 'Banco de dados', 'Plataforma que hospeda o PostgreSQL do projeto.'],
            ['React Native', 'Aplicativo móvel', 'Biblioteca para desenvolver o aplicativo móvel do sistema.'],
            ['Expo', 'Aplicativo móvel', 'Conjunto de ferramentas que facilita o desenvolvimento com React Native.'],
            ['Next.js', 'Aplicação web', 'Framework React planejado para a interface web.'],
            ['Recharts', 'Aplicação web', 'Biblioteca de gráficos para visualizar a evolução dos indicadores de saúde.'],
            ['Socket.IO', 'Tempo real', 'Comunicação em tempo real para notificações e alertas.'],
            ['Redis (Upstash)', 'Tempo real', 'Armazenamento em memória, via Upstash, de apoio à comunicação em tempo real.'],
            ['JWT', 'Autenticação', 'Tokens para autenticar os usuários do sistema.'],
            ['Vercel', 'Implantação', 'Plataforma planejada para a implantação da aplicação web.'],
            ['Railway', 'Implantação', 'Plataforma planejada para a implantação do backend.'],
            ['Health Connect', 'Integração de dados', 'Serviço usado para sincronizar os dados de saúde coletados no celular.'],
            ['Mi Fitness / Zepp Life', 'Integração de dados', 'Aplicativos da Xiaomi Mi Band que coletam os dados e os repassam ao Health Connect.'],
        ];

        foreach ($technologies as [$name, $category, $description]) {
            Technology::updateOrCreate(
                ['name' => $name],
                ['category' => $category, 'description' => $description]
            );
        }
    }
}