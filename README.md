# app_ensino_online
 Teste de php
Para a configuração do ambiente favor seguir os passos abaixo:

1 ° Rodar o comando docker-compose up -d

2 ° Rodar os comandos 
    docker-compose exec app docker-php-ext-install mysqli
    docker-compose exec app2 docker-php-ext-install mysqli
    
3 ° Reinicie os containers

4 ° Acesse o phpmyadmin http://localhost:8080/ logue com 
    Servidor:      mysql,
    Utilizador :   db_acesso
    Palavra-passe: db_user_pass
    
5 ° Abra o arquivo script.sql na pasta db copie todos os dados

6 ° Volte no phpmyadmin selecione o banco app_db cole os dados em sql e click em executar 

7 ° Acesse o sistema pelo link https://127.0.0.1/view/login.php com usuario admin@ensino.online.com senha 102030
