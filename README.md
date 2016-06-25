## Aplicação de Blog

Aplicação de Blog criada para seleção para vaga de programador no Grupo Edson Queiroz.

## Introdução

Essas instruções de instalação presumem que você possui **composer**, **bower**, **laravel** e **mysql** instalados.

### Instalação

Primeiro instale as dependências do laravel com o composer:

```
composer install
```

Em seguida certifique-se de que você tem uma base de dados chamad blog, ou crie com

```
create database blog;
```

Depois gere as tabelas com o artisan:

```
php artisan migrate
```

E os dados de teste:

```
php artisan db:seed
```

Por fim instale as dependências front-end com o bower:

```
cd public
bower install
```

## Rodando a aplicação

Para ver a aplicação em execução navegue até a pasta *public* ou sirva com o artisan:

```
php artisan serve
```
