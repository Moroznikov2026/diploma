<?php $templateFile = dirname(__DIR__) . '/View/' . $template . '.php'; ?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($title ?? 'FEON CRM') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/css/app.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary"><div class="container-fluid"><a class="navbar-brand" href="/">FEON CRM</a><div class="navbar-nav"><a class="nav-link" href="/clients">Клиенты</a><a class="nav-link" href="/requests">Заявки</a><a class="nav-link" href="/tours">Туры</a><a class="nav-link" href="/communications">Коммуникации</a><a class="nav-link" href="/reports">Отчёты</a><a class="nav-link" href="/settings">Настройки</a></div></div></nav>
<main class="container py-4"><?php include is_file($templateFile) ? $templateFile : dirname(__DIR__) . '/View/dashboard.php'; ?></main>
<script src="https://api.bitrix24.com/api/v1/"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/app.js"></script>
</body></html>
