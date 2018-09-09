<?php
define('DOMAIN', 'http://localhost');
define('ROOT', '/webmasters');
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_DSN', 'mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME);
define('DB_USER', 'root');
define('DB_PWD', '');
define('LANGUAGES', 'ru,en');
define('LANGUAGE_DEFAULT', 'ru');

define('ITEMS_PER_PAGE', 3);
define('TASKS_SORT_COLS', 'id,user_name,e_mail,status');
define('SORT_TYPES', 'asc,desc');
define('AUTH_COLS_NAME_CHECK', 'p_email,p_pwd');
#define('AUTH_COLS_NAME_CHECK_RUSSIAN', 'Email,Пароль');
define('AUTH_COLS_NAME_CHECK_ENGLISH', 'Email,Password');

define('USER_COLS_NAME_CHECK', 'p_name,p_email,p_pwd,p_pwd_again,p_description');
#define('USER_COLS_NAME_CHECK_RUSSIAN', 'Имя,Email,Пароль,Пароль еще раз,Описание');
define('USER_COLS_NAME_CHECK_ENGLISH', 'Firstname,Email,Password,Password again,Description');
