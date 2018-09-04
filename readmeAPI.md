Инструкция по запуску проекта:
1)Клонировать проект git clone https://github.com/An1201/homestead
2) Перейти в папку проекта
3) composer install
4) Выполнить миграции для создания таблиц (используем чистую БД homestead) php artisan migrate
5) Заполнить БД php artisan db:seed
6) Документация по использованию API: https://web.postman.co/collections/5255925-afbd694e-d145-4cbc-bd03-5d0babe8ec29?workspace=f29a151b-7ef9-4c03-8088-2adf51812a4a#8bb7c469-cf3c-427a-800b-feed4aa9eb67