

## IMPORTAÇÃO DE CSV
Importação de dados de um arquivo csv de dados de rotas de frete de clientes para um aplicação laravel. 

## INSTALAÇÃO
Criar estrutura do banco de dados
```
php artisan migrate
```

Habilitar a fila de processamento
```
php artisan queue:work --tries=10 --timeout=3000 --memory=4096
```

## DOCUMETAÇÃO POSTMAN
- https://documenter.getpostman.com/view/13570709/UzQvtQen

## BANCO DE DADOS
![alt text](https://github.com/salescairo/php-csv-importation/storage/app/others/db.png?raw=true)