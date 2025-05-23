# Atendimento 

### 1. Pré-requisitos

- **PHP:** Versão 8.0 ou superior
- **Composer:** 
- **MySQL:** 
- **Node.js** 


### 2. Configuração do Ambiente

1. **Clone o Repositório**
    git clone https://github.com/guicastro-23/atendimento.git

2. Instale as Dependências PHP

```
composer install 
```
Instalar as dependencias do Node.Js
```
npm install
```

3. Duplicar o arquivo ".env.example" e renomear para ".env"

4. Gerar a chave 

```
php artisan key:generate
```
5. Configure o Banco de Dados

No arquivo .env, defina suas credenciais do banco de dados:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_do_banco
    DB_USERNAME=usuario
    DB_PASSWORD=senha

6. Execute as Migrações

```
php artisan migrate
```

7. Executar o seeder 

Para adicionar os status de situações criei uma seeder para a tabela 

```
php artisan db:seed       
```

8. Instalar o Vite 

```
npm install
```

9. Instalar o Bootstrap
```
npm i --save bootstrap @popperjs/core
```
Instalar o sass
```
npm i --save-dev sass
```
Iniciar o projeto criado com laravel 
```
php artisan
```
Executar as bibliotecas Node.js 
```
npm run dev
```
