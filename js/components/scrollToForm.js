const buttons = document.querySelectorAll('.js-btn-to-form');
const form = document.querySelector('.main-form');

if (form && buttons) {
    buttons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const formPosition = form.getBoundingClientRect().top + window.scrollY;
            const offset = 120;

            window.scrollTo({
                top: formPosition - offset,
                behavior: 'smooth'
            });
        });
    });
}
