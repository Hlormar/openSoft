import $ from 'jquery';
window.$ = window.jQuery = $;

import '../scss/styles.scss';
import * as bootstrap from 'bootstrap';

// Функция Поделиться
function share() {
  window.alert(document.URL);
}
//window.share = share;
document.addEventListener('DOMContentLoaded', function() {
    
    // Находим кнопку
    const shareBtn = document.getElementById('btn-share');
    
    // Вешаем событие
    if (shareBtn) {
        shareBtn.addEventListener('click', function() {
            // Ваш код функции share()
            console.log('Кнопка нажата!');
            // ... логика шаринга ...
            share();
        });
    }
});

// Функция Toast
function showToast() {
  const toastEl = document.getElementById('liveToast');
  const toast = new bootstrap.Toast(toastEl);
  toast.show();
}
window.showToast = showToast;

// Инициализация Popover после загрузки DOM
document.addEventListener('DOMContentLoaded', function() {
  // Инициализация всех popover
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => 
    new bootstrap.Popover(popoverTriggerEl)
  );

  // Переключение модальных окон стрелками (расширенный уровень)
  const modals = document.querySelectorAll('.modal');
  let currentModalIndex = 0;

  modals.forEach((modal, index) => {
    modal.addEventListener('shown.bs.modal', function() {
      currentModalIndex = index;
    });
  });

  document.addEventListener('keydown', function(e) {
    const activeModal = document.querySelector('.modal.show');
    if (!activeModal) return;

    if (e.key === 'ArrowRight') {
      e.preventDefault();
      const nextIndex = (currentModalIndex + 1) % modals.length;
      bootstrap.Modal.getInstance(activeModal).hide();
      setTimeout(() => {
        new bootstrap.Modal(modals[nextIndex]).show();
      }, 300);
    } else if (e.key === 'ArrowLeft') {
      e.preventDefault();
      const prevIndex = (currentModalIndex - 1 + modals.length) % modals.length;
      bootstrap.Modal.getInstance(activeModal).hide();
      setTimeout(() => {
        new bootstrap.Modal(modals[prevIndex]).show();
      }, 300);
    }
  });
});