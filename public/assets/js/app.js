document.addEventListener('DOMContentLoaded', () => {
  if (window.BX24) {
    BX24.init(() => BX24.fitWindow());
  }
  const sales = document.getElementById('salesChart');
  if (sales) new Chart(sales, {type: 'line', data: {labels: ['Янв','Фев','Мар','Апр'], datasets: [{label: 'Продажи', data: [12, 19, 8, 25], borderColor: '#0d6efd'}]}});
  const reports = document.getElementById('reportsChart');
  if (reports) new Chart(reports, {type: 'bar', data: {labels: ['Клиенты','Заявки','Туры'], datasets: [{label: 'Количество', data: [30, 18, 12], backgroundColor: '#198754'}]}});
});
