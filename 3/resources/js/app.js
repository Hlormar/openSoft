import $ from 'jquery';
window.$ = window.jQuery = $;

//import '../scss/styles.scss';
import * as bootstrap from 'bootstrap';

// Функция Поделиться
function share() {
  window.alert(document.URL);
}

document.addEventListener('DOMContentLoaded', function() {
    
    // Находим кнопку
    const shareBtn = document.getElementById('btn-share');
    
    // Вешаем событие
    if (shareBtn) {
        shareBtn.addEventListener('click', function() {
    
            console.log('Кнопка нажата!');
            share();
        });
    }
});