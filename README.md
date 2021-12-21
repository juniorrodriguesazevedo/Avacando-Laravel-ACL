## Avançando com ACL

Projeto feito em Laravel/Framework para fins de aprendizado e treinamento usando a biblioteca Spatie Laravel Permission.

### Bibliotecas usadas:
* [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v5/introduction)
* [Laravel pt-BR Localization](https://github.com/lucascudo/laravel-pt-BR-localization)
* [Bootstrap 4 forms for Laravel 5/6/7/8](https://github.com/netojose/laravel-bootstrap-4-forms)

### Instalação: 

* Você precisará do PHP instalado em seu computador, [BAIXE AQUI](https://www.php.net/downloads). 
* Na raiz do projeto use o comando `composer install`. 
* No arquivo `.ENV` edite o campo `DB_CONNECTION` e coloque os dados do seu banco de dados.
* Use o comando `php artisan migrate:fresh --seed` para fazer as migrações e propagar o banco.
* Use o comando `php artisan storage:link` para criar um link simbólico para as imagens.
* Use o comando `php artisan serve` para rodar em seu servidor.
* Navegue para `http://127.0.0.1:8000/`. O aplicativo será carregado automaticamente.

#### Observações:
* Ao propagar o banco ele já vem com usuários cadastrados.
* Não foquei no front-end pois não foi o meu foco (por isso tá mais feio que eu esse visual ai kkkk).

Tipo   | Email | Senha
:--------- | :------ | :------
Super Admin | superadmin@gmail.com | 123
Admin | admin@gmail.com | 123
Author | author@gmail.com | 123
User | user@gmail.com | 123
