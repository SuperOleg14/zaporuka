document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('#fees-toggle');
    const activeContent = document.querySelector('.current-fees__content.active');
    const completedContent = document.querySelector('.current-fees__content.completed');

    if (!toggle || !activeContent || !completedContent) return;

    toggle.addEventListener('change', function () {
        if (toggle.checked) {
            activeContent.style.display = 'flex';
            completedContent.style.display = 'none';
        } else {
            activeContent.style.display = 'none';
            completedContent.style.display = 'flex';
        }
    });

    toggle.checked = true;
    activeContent.style.display = 'flex';
    completedContent.style.display = 'none';
});
