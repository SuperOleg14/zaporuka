document.addEventListener('DOMContentLoaded', function () {
    const select = document.querySelector('#reports-select');
    const selected = select.querySelector('.selected');
    const options = select.querySelector('.options');
    const optionItems = options.querySelectorAll('.option');
    const listItems = document.querySelectorAll('.list-item');

    function getYearFromURL() {
        const match = window.location.search.match(/[?&](\d{4})(?!\d)/);

        if (match) {
            const year = match[1];
            const validYears = [...options.querySelectorAll('.option[data-year]')].map(option => option.dataset.year);

            if (validYears.includes(year)) {
                return year;
            }
        }
        return 'all';
    }

    function filterItems(year) {
        listItems.forEach(item => {
            item.classList.toggle('active', year === 'all' || item.dataset.year === year);
        });
    }

    const urlYear = getYearFromURL();
    if (urlYear) {
        optionItems.forEach(option => {
            if (option.dataset.year === urlYear) {
                selected.innerHTML = `${option.textContent} <span class="select-arrow"></span>`;
            }
        });
        filterItems(urlYear);
    }

    selected.addEventListener('click', () => {
        select.classList.toggle('active');
    });

    optionItems.forEach(option => {
        option.addEventListener('click', () => {
            selected.innerHTML = `${option.textContent} <span class="select-arrow"></span>`;
            select.classList.remove('active');

            const selectedYear = option.dataset.year;
            filterItems(selectedYear);
        });
    });

    document.addEventListener('click', (e) => {
        if (!select.contains(e.target)) {
            select.classList.remove('active');
        }
    });
});
