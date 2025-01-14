# Простое приложение для управления задачами (Task Manager) на Laravel

Это простое приложение для управления задачами, разработанное с использованием фреймворка Laravel. Приложение позволяет создавать, читать, обновлять и удалять задачи, а также фильтровать задачи по статусу или дате.

## Установка

1. Склонируйте репозиторий на свой локальный компьютер.
2. Установите зависимости, выполнив команду `composer install`.
3. Создайте файл `.env` на основе `.env.example` и настройте соединение с базой данных.
4. Запустите миграции для создания таблицы задач: `php artisan migrate`.
5. Запустите сиды для создания тестовых данных: `php artisan db:seed`.
6. Сгенерируйте ключ приложения, выполнив команду `php artisan key:generate`.
7. Запустите веб-сервер, выполнив команду `php artisan serv`.

Приложение будет доступно по адресу `http://localhost:8000`

## Использование

### Получение списка задач

Отправьте GET-запрос на эндпоинт `/api/v1/tasks` для получения списка всех задач.

### Фильтрация задач

Для фильтрации задач по статусу или дате отправьте GET-запрос на эндпоинт `/api/v1/tasks` с соответствующими параметрами:

* `/api/v1/tasks?completed=1` - получить все завершенные задачи;
* `/api/v1/tasks?completed=0` - получить все незавершенные задачи;
* `/api/v1/tasks?due_date=2024-01-01` - получить все задачи с указанной датой завершения.

### Просмотр задачи

Отправьте GET-запрос на эндпоинт `/api/v1/tasks/{id}`, где `{id}` - идентификатор задачи, которую нужно получить.

### Создание задачи

Отправьте POST-запрос на эндпоинт `/api/v1/tasks`, передав данные о задаче в формате JSON:

```json
{
    "title": "Новая задача",
    "description": "Описание новой задачи",
    "completed": 1,
    "due_date": "2024-01-01"
}
```

### Обновление задачи

Отправьте PUT-запрос на эндпоинт `/api/v1/tasks/{id}`, где `{id}` - идентификатор задачи, которую нужно обновить. Передайте данные для обновления в формате JSON:

```json
{
    "title": "Обновленная задача",
    "description": "Описание обновленной задачи",
    "completed": 0
}
```

### Удаление задачи

Отправьте DELETE-запрос на эндпоинт `/api/v1/tasks/{id}`, где `{id}` - идентификатор задачи, которую нужно удалить.


## Использованные технологии

* Laravel
* MySQL 


## Дополнительное

1. **Использование DTO (Data Transfer Object)**: В приложении используются DTO для передачи данных между контроллерами и сервисами. Это помогает структурировать и упрощать обмен данными в приложении.

2. **Паттерн репозитория**: Для доступа к данным задач используется паттерн репозитория, что позволяет абстрагировать работу с базой данных и упростить тестирование кода.
