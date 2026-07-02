<div class="row g-3">
  <div class="col-md-4"><div class="card"><div class="card-body"><h5>Dashboard</h5><p>Сводка по продажам, заявкам и активности менеджеров.</p></div></div></div>
  <div class="col-md-8"><canvas id="salesChart" height="120"></canvas></div>
</div>
<form class="card mt-4" method="post" action="/notifications/send"><div class="card-body"><h5>Уведомление Bitrix24</h5><input name="user_id" class="form-control mb-2" placeholder="ID пользователя"><input name="message" class="form-control mb-2" placeholder="Сообщение"><button class="btn btn-primary">Отправить</button></div></form>
<form class="card mt-4" method="post" action="/tasks/create"><div class="card-body"><h5>Задача Bitrix24</h5><input name="title" class="form-control mb-2" placeholder="Название"><input name="responsible_id" class="form-control mb-2" placeholder="Ответственный"><textarea name="description" class="form-control mb-2" placeholder="Описание"></textarea><button class="btn btn-success">Создать задачу</button></div></form>
