Склонировать проект на локальную машину, войти в папку проекта
    git clone https://github.com/Roman441/PhoneBook.git
    cd PhoneBook/

установить все зависимости приложения через Composer
    composer install

Настроить подключение к MySQL базе данных в файле .env и  app/config/database.php

Создать базу данных приложения, выполнив SQL-запрос в MySQL
    CREATE DATABASE `phone_books`

Запустить скрипт генерации таблиц БД
    php artisan migrate

Запустить приложение 
    php artisan serve
