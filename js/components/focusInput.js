const inputs = document.querySelectorAll('.wpcf7-form .input-wrap input');

inputs.forEach(input => {
    const parentSpan = input.closest('span');
    const label = parentSpan.nextElementSibling;

    function toggleLabel() {
        if (input.value.trim() !== '' || input === document.activeElement) {
            label.classList.add('focused');
        } else {
            label.classList.remove('focused');
        }
    }

    toggleLabel();

    input.addEventListener('focus', toggleLabel);
    input.addEventListener('blur', toggleLabel);
    input.addEventListener('input', toggleLabel);
});
