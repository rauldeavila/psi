PSI CEFUS

O que foi feito:
================================
Criação da tabela através do Power Shell: New-Item -ItemType File -Path .\database\database.sqlite

edição do arquivo .env para utilizar o sqlite
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite (apontando para o caminho da tabela)

Tem que habilitar a extensão SQLITE no php.ini antes de rodar o comando:
Comando PS>php/php.exe artisan migrate

php/php.exe artisan make:migration criar_tabela_dados_base

php artisan make:command ImportarDadosBase

editar o app/Commands/ImportarDadosBase.php para importar o csv
php/php.exe artisan make:model DadosBase

Testar se os dados foram importados corretamente
php/php.exe artisan tinker
App\Models\DadosBase::all();
listou corretamente!

Agora temos a tabela e os dados importados. ✅

Requisitos: 3 telas
	1 - Tela de cadastro: 
		Formulário para inserir novos registros
	2 - Tela de Pesquisa e Consulta:
		Formulário de pesquisa e consulta com um filtro
		Tabela para exibir os resultados
	3 - Tela de Edição Individual
		Formulário para editar registros existentes com base
		no número de contrato
		
Controlador:
php artisan make:controller DadosBaseController

Criação das views e funcionalidades básicas
Formatação de valores para BRL e CPF pra 123.456.789-00
usando jquery (mask plugin)
criação de layout com arquivos locais para o jquery e o jquerymask
extendendo esse arquivo para as views que usam máscaras

Edição do controlador para remover a pontuacao das mascaras
antes de salvar no banco