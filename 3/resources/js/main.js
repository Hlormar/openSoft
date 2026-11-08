
import * as bootstrap from 'bootstrap';

// Функция Toast
function showToast() {
    const toastEl = document.getElementById('liveToast');

    if (!toastEl) return;

    const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
    toast.show();
}

window.showToast = showToast;


document.addEventListener('DOMContentLoaded', () => {

    // Получаем все карточки
    const cards = [
        ...document.querySelectorAll('#cards-container .card-view[data-url]')
    ];

    // Получаем единственный Modal
    const modal = document.getElementById('fractionModal');

    if (!modal || cards.length === 0) return;

    // Текущий индекс выбранной карточки
    let currentCardIndex = -1;

    // Защита от ситуации, когда несколько AJAX-запросов
    // завершаются не в том порядке, в котором были отправлены
    let requestId = 0;


    // ==========================================
    // Загрузка данных фракции
    // ==========================================

    async function loadFraction(index) {

        const card = cards[index];

        if (!card) return;

        currentCardIndex = index;

        const currentRequest = ++requestId;

        try {
            const response = await fetch(card.dataset.url);

            if (!response.ok) {
                throw new Error(`HTTP error: ${response.status}`);
            }

            const fraction = await response.json();

            // Если за время запроса пользователь выбрал другую карточку,
            // не применяем устаревший ответ
            if (currentRequest !== requestId) return;


            // Заголовок
            document.getElementById('modalLabel').textContent =
                fraction.name;


            // Изображение
            const image = document.getElementById('modalImg');

            image.src = fraction.image;
            image.alt = fraction.name;


            // Popover
            const popover = document.getElementById('modalPopover');

            // Удаляем предыдущий экземпляр Popover
            bootstrap.Popover.getInstance(popover)?.dispose();

            // Обновляем данные
            popover.textContent = fraction.name;

            popover.setAttribute(
                'data-bs-content',
                fraction.subtitle ?? ''
            );

            // Создаём новый Popover с обновлёнными данными
            new bootstrap.Popover(popover);


            // Описание
            document.getElementById('modalDescr').textContent =
                fraction.description;


        } catch (error) {

            if (currentRequest !== requestId) return;

            console.error('Ошибка загрузки фракции:', error);

            document.getElementById('modalLabel').textContent =
                'Не удалось загрузить информацию';
        }
    }


    // ==========================================
    // Первоначальное открытие Modal
    // ==========================================

    modal.addEventListener('show.bs.modal', (event) => {

        const card = event.relatedTarget;

        if (!card) return;

        const index = cards.indexOf(card);

        if (index !== -1) {
            loadFraction(index);
        }
    });


    // ==========================================
    // Перелистывание карточек стрелками
    // ==========================================

    document.addEventListener('keydown', (event) => {

        // Modal должен быть открыт
        if (!modal.classList.contains('show')) return;

        // Не перехватываем стрелки при работе с полями ввода
        if (event.target.closest('input, textarea, select, [contenteditable="true"]')) {
            return;
        }

        if (event.key === 'ArrowRight') {

            event.preventDefault();

            // Следующая карточка, с переходом к первой после последней
            const nextIndex = (currentCardIndex + 1) % cards.length;

            loadFraction(nextIndex);
        }

        else if (event.key === 'ArrowLeft') {

            event.preventDefault();

            // Предыдущая карточка, с переходом к последней перед первой
            const prevIndex =
                (currentCardIndex - 1 + cards.length) % cards.length;

            loadFraction(prevIndex);
        }
    });

});
