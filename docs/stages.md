# Поэтапная разработка Bitrix24 Embedded App

## 1. Структура проекта
Создан MVC-каркас: `public/` — web-root, `src/Controller` — HTTP-сценарии, `src/Service` — интеграции Bitrix24, `src/Repository` — MySQL-доступ, `src/View` — Bootstrap-интерфейс. Composer включает PSR-4 автозагрузку.

## 2. Настройка Embedded Application
`public/install.php` принимает install callback Bitrix24, а `public/placement.php` загружает BX24 JavaScript SDK. В кабинете Bitrix24 указываются URL установки и обработчик встраивания.

## 3. Авторизация через BX24
`BitrixAuthService` сохраняет `AUTH_ID`, `REFRESH_ID`, `DOMAIN`, `member_id`, `client_endpoint`. Эти данные передаются Bitrix24 при установке приложения.

## 4. Подключение REST API
`BitrixApiClient::call()` отправляет POST на `client_endpoint/{method}.json` и добавляет `auth`. Используются методы `profile`, `im.notify.system.add`, `tasks.task.add`.

## 5. Главная страница приложения
`DashboardController` и `dashboard.php` показывают сводку, формы уведомлений и задач, а Chart.js строит график продаж.

## 6. Меню приложения
Навигация в `layout.php` связывает разделы клиентов, заявок, туров, коммуникаций, отчётов и настроек.

## 7. Модуль клиентов
`ClientController` сохраняет клиентов в MySQL (`clients`) и отображает список. Данные: ФИО, телефон, email.

## 8. Модуль туристических заявок
`TravelRequestController` работает с `travel_requests`: клиент, направление, бюджет, статус.

## 9. Каталог туров
`TourController` ведёт таблицу `tours`: название, страна, цена.

## 10. История коммуникаций
`CommunicationController` сохраняет канал и текст коммуникации в `communications`.

## 11. Dashboard
Dashboard агрегирует коммерческие метрики и может расширяться REST-вызовами CRM Bitrix24 (`crm.deal.list`, `crm.contact.list`).

## 12. Отчёты
`ReportController` отдаёт страницу для аналитики; Chart.js визуализирует локальные и REST-данные.

## 13. Система уведомлений
`NotificationService` вызывает REST `im.notify.system.add` и передаёт `USER_ID`, `MESSAGE`.

## 14. Интеграция с задачами Bitrix24
`TaskService` вызывает REST `tasks.task.add` и передаёт `fields[TITLE]`, `fields[RESPONSIBLE_ID]`, `fields[DESCRIPTION]`.

## 15. Настройки приложения
`SettingsController` сохраняет настройки в `storage/settings.json`; в production их можно перенести в MySQL.

## 16. Логирование
Monolog пишет в `storage/logs/app.log`, путь задаётся `LOG_PATH`.

## 17. Обработка ошибок
Глобальный `ExceptionHandler` возвращает безопасную страницу ошибки и пишет сообщение в системный лог.

## 18. Тестирование
`composer test` запускает smoke-тест автозагрузки и ключевых классов.

## 19. Подготовка приложения к установке
Настроить HTTPS-домен, заполнить `.env`, выполнить SQL-миграцию, установить Composer-зависимости, указать URL `/install.php` и `/placement.php` в Bitrix24.
