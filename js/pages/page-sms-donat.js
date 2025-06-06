document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.copy-text-btn').forEach(button => {
        button.addEventListener('click', function () {
            const text = this.previousElementSibling.innerText.trim();
            copyToClipboard(text);
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
