document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.copy-text-btn').forEach(button => {
        button.addEventListener('click', function () {
            const text = this.previousElementSibling.innerText.trim();
            copyToClipboard(text);
            showNotification();
        });
    });

    document.querySelectorAll('.copy-all').forEach(button => {
        button.addEventListener('click', function () {
            let parentBlock = this.closest('.donation-container__item');

            let textToCopy = Array.from(parentBlock.querySelectorAll('.copy-text'))
                .map(el => el.textContent.trim())
                .join('\n');

            navigator.clipboard.writeText(textToCopy);
            showNotification();
        });
    });


    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
    }

    function showNotification() {
        const notification = document.querySelector('.notification');
        notification.classList.add('show');

        setTimeout(() => {
            notification.classList.remove('show');
        }, 2000);
    }
});
