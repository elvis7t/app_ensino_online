# app_ensino_online
 Teste de php
Para a configuração do ambiente favor seguir os passos abaixo:

1 ° rodar o comando docker-compose up -d
2 ° rodar o comando docker-compose exec web docker-php-ext-install mysqli
3 ° reinicie os containers
4 ° acesse o phpmyadmin http://localhost:8080/ logue com Servidor mysql, user db_acesso senha db_user_pass
5 ° abra o arquivo script.sql na pasta db copie os todos os dados
6 ° volte no phpmyadmin selecione o banco app_db cole os dados em sql e click em executar 
7 ° acesse o sistema pelo link http://localhost:85/view/login.php com usuario admin@ensino.online.com senha 102030
