# teste14012021
<h1>TESTE 3 DE EMPRESA BRASILEIRA - Desenvolver um sistema de gerenciamento de veículos para uma locadora.</h1>
<br><hr><br>
<h2>Descrição:</h2>
<br>
1. Seu sistema deve permitir o cadastro, edição, remoção e a possibilidade de retornar
uma lista de carros disponíveis para locação.<br>
2. Seu sistema deve possibilitar que um veículo seja alugado, armazenando os dados
de contato da pessoa que o alugou. O sistema também deve permitir que o veículo
seja devolvido.<br>
<br><hr><br>
<h2>Requisitos:</h2>
<br>
1. O sistema deve ser desenvolvido em PHP puro ou usando Slim Framework.<br>
2. Desenvolva sua aplicação no formato de uma API Restful.<br>
3. A aplicação deve fazer persistência dos dados, se conectando com qualquer banco
de dados de sua preferência.<br>
4. Organize seu código da forma mais limpa possível, usando os conceitos de SOLID
que você conhece.<br>
5. Use todo o conhecimento técnico que tem em todos os pontos, use todos os
padrões que achar aplicáveis, seja padrões de projeto ou arquiteturais.<br>
6. Seu projeto deve estar versionado em um repositório no GitHub.<br>
7. Descreva no README no projeto todos os passos necessários para rodar o seu
projeto, bem como as rotas da sua aplicação. Para cada rota, descreva o caminho,
que dados recebe e quais dados retorna.<br>
<h2>Como Rodar:</h2>
1. Clonar projeto em computador com apache+php7+composer instalado.<br>
2. Rodar composer update dentro da pasta api.<br>
3. Rodar o arquivo api/sql/create.sql em um banco de dados mysql na mesma maquina.<br>
4. startar o projeto dentro da pasta api com o comando php -S localhost:'portadesejada'.<br>
<br><hr><br>
<h2>Rotas:</h2>

Existe um arquivo na raiz do projeto chamado "Insomnia_2021-01-16.json" com o exemplo de todas as rotas, ele pode ser importado para o programa Insomnia<br>

<h3>GET - \veiculo:</h3> * O sistema vai retornar a listagem de todos os veiculos cadastrados na base de dados.
<h3>POST - \veiculo:</h3> * O sistema vai tentar inserir um novo veiculo disponivel, no banco de dados.<br>
Exemplo de envio de dados em formato JSON:<br>
{<br>
	"vei_descricao":"FOCUS 1.6 16V",<br>
	"vei_marca":"FORD",<br>
	"vei_placa":"ABC-123",<br>
	"vei_chassi":"JADHGIUSAGD",<br>
	"vei_cor":"PRETO"<br>
}<br>
O sistema irá retornar a mensagem de sucesso ou os erros que o mesmo encontrou ambos, em formato em JSON.<br><br>

<h3>PUT - \veiculo:</h3> * O sistema vai tentar atualizar um veiculo existente no banco de dados através da id passada.<br>
Exemplo de envio de dados em formato JSON:<br>
{<br>
	"vei_descricao":"FOCUS 1.6 16V",<br>
	"vei_marca":"FORD",<br>
	"vei_placa":"ABC-123",<br>
	"vei_chassi":"JADHGIUSAGD",<br>
	"vei_cor":"PRETO",<br>
	"vei_id":"1"<br>
}<br>
O sistema irá retornar a mensagem de sucesso ou os erros que o mesmo encontrou ambos, em formato em JSON.<br><br>

<h3>DELETE - \veiculo:</h3> * O sistema vai tentar excluir um veiculo existente no banco de dados através da id passada.<br>
Exemplo de envio de dados em formato JSON:<br>
{<br>
	"vei_id":"1"<br>
}<br>
O sistema irá retornar a mensagem de sucesso ou os erros que o mesmo encontrou ambos, em formato JSON.<br><br>

<h3>GET - \pessoa:</h3> * O sistema vai retornar a listagem de todos as pessoas cadastradas na base de dados.
<h3>POST - \pessoa:</h3> * O sistema vai tentar inserir uma nova pessoa disponivel, no banco de dados.<br>
Exemplo de envio de dados em formato JSON:<br>
{<br>
	"per_nome":"João Silva",<br>
	"per_contato":"99999999999",<br>
	"per_cpf_cnpj":"111.111.111-11"<br>
}<br>
O sistema irá retornar a mensagem de sucesso ou os erros que o mesmo encontrou ambos, em formato em JSON.<br><br>

<h3>PUT - \pessoa:</h3> * O sistema vai tentar atualizar uma pessoa existente no banco de dados através da id passada.<br>
Exemplo de envio de dados em formato JSON:<br>
{<br>
	"per_nome":"João Silva",<br>
	"per_contato":"99999999999",<br>
	"per_cpf_cnpj":"111.111.111-11"<br>
	"per_id":"1"<br>
}<br>
O sistema irá retornar a mensagem de sucesso ou os erros que o mesmo encontrou ambos, em formato em JSON.<br><br>

<h3>DELETE - \pessoa:</h3> * O sistema vai tentar excluir uma pessoa existente no banco de dados através da id passada.<br>
Exemplo de envio de dados em formato JSON:<br>
{<br>
	"per_id":"1"<br>
}<br>
O sistema irá retornar a mensagem de sucesso ou os erros que o mesmo encontrou ambos, em formato JSON.<br><br>

<h3>POST - \aluguel:</h3> * O sistema vai tentar alugar um veiculo disponivel, no banco de dados.<br>
Exemplo de envio de dados em formato JSON:<br>
{<br>
	"per_id":"1",<br>
	"vei_id":"1"<br>
}<br>
O sistema irá retornar a mensagem de sucesso ou os erros que o mesmo encontrou ambos, em formato em JSON.<br><br>


