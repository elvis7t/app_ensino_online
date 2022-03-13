# app_ensino_online
Teste de php

Para a configuração do ambiente favor seguir os passos abaixo:

1 ° Clone o repositorio

git clone https://github.com/elvis7t/app_ensino_online.git  

1 ° Na pasta app_enssino_online, rodar o comando docker-compose up -d

2 ° Rodar os comando: bash ./init-mysql.sh

3 ° "Mudar o ip igual da sua maquina"  Alterar os arquivos: 
nginx/conf.d/ssl.conf 
ngix/nginx.conf 
nginx/cert 127.0.0.1.crt
nginx/cert 127.0.0.1.key

4 ° Acesse o sistema pelo link https://127.0.0.1/view/login.php com usuario admin@ensino.online.com senha 102030

