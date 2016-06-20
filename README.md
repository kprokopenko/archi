Задание
=======

Необходимо реализовать на Yii2 приложение, которое представляет собой библиотеку, где есть пользователи (User) и книги (Book).
Список действий, которые должны быть доступны при помощи REST API:
- добавление новой книги в библиотеку
- отметка, о взятии книги пользователем (TEST)
- список книг, взятых пользователем
- статистика самых читающих пользователей (TEST)
Отмеченные знаком “(TEST)” действия необходимо покрыть при помощи тестов.

Ресурсы
-------


- POST /lib/books {name}
- PUT /lib/books/<id> {reader_id} (PutReaderIdCept)
- GET /lib/books?reader_id=<id>
- GET /lib/users/stat (GetUsersStatCept)