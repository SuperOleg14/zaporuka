document.addEventListener('DOMContentLoaded', function () {
    handlerDonationSwitch();
    handlerDonationForm();
    handlerUnsubscribeForm();
});

function handlerDonationSwitch() {
    const toggles = document.querySelectorAll('.donation-toggle');

    if (!toggles.length) return;

    toggles.forEach((toggle, index) => {
        const donationContainer = toggle.closest('.donation-container');

        if (!donationContainer) return;

        const storageKey = `donationType-${index}`;

        if (localStorage.getItem(storageKey) === 'subscribe') {
            toggle.checked = true;
            donationContainer.classList.add('subscribe');
            toggleInputsGrid(donationContainer, true);

        } else {
            donationContainer.classList.add('one-time');
            toggleInputsGrid(donationContainer);
        }

        toggle.addEventListener('change', function () {
            if (toggle.checked) {
                donationContainer.classList.remove('one-time');
                donationContainer.classList.add('subscribe');
                localStorage.setItem(storageKey, 'subscribe');
                toggleInputsGrid(donationContainer, true);
            } else {
                donationContainer.classList.remove('subscribe');
                donationContainer.classList.add('one-time');
                localStorage.setItem(storageKey, 'one-time');
                toggleInputsGrid(donationContainer);
            }
        });
    });
}

function toggleInputsGrid(container, show = false) {
    if (!container) return;

    const isShortForm = container.classList.contains('short-form');
    const inputsGrid = container.querySelector('.inputs-grid.column-1');

    if (inputsGrid) {
        if (isShortForm && show) {
            inputsGrid.classList.remove('hide');
            const emailInput = inputsGrid.querySelector('.input-email');
            emailInput.required = true;
            emailInput.disabled = false;
        } else {
            const emailInput = inputsGrid.querySelector('.input-email');
            emailInput.required = false;
            emailInput.disabled = true;
            inputsGrid.classList.add('hide');
        }
    }
}


function handlerDonationForm() {
    const forms = document.querySelectorAll('.donation-form');
    if (!forms.length) return;

    forms.forEach((form) => {
        const amountInput = form.querySelector('.input-amount');
        if (!amountInput) return;

        const presetButtons = form.querySelectorAll('.preset-amount');
        const customSelect = form.querySelector('.donation-form-select');
        const selectSelected = customSelect && customSelect.querySelector('.select-selected');
        const selectOptions = customSelect && customSelect.querySelector('.select-options');
        const selectOptionsItems = selectOptions ? selectOptions.querySelectorAll('div') : [];

        const nameInput = form.querySelector('.input-name');
        const anonymousCheckbox = form.querySelector('.input-anonymous');
        const emailInput = form.querySelector('.input-email');

        presetButtons.forEach(button => {
            button.addEventListener('click', () => {
                amountInput.value = button.getAttribute('data-value');
            });
        });

        if (selectSelected && selectOptions) {
            selectSelected.addEventListener('click', () => {
                customSelect.classList.toggle('active');
            });

            selectOptionsItems.forEach(option => {
                option.addEventListener('click', () => {
                    const currencySymbol = option.getAttribute('data-symbol');
                    selectSelected.innerHTML = `${option.textContent} <span class="select-arrow"></span>`;
                    customSelect.classList.remove('active');
                    selectSelected.setAttribute('data-selected', option.getAttribute('data-value'));
                    updatePresetButtons(currencySymbol);
                });
            });

            document.addEventListener('click', (e) => {
                if (!form.contains(e.target)) {
                    customSelect.classList.remove('active');
                }
            });
        }

        if (anonymousCheckbox) {
            if (nameInput) {
                anonymousCheckbox.addEventListener('change', () => {
                    const isAnonymous = anonymousCheckbox.checked;
                    nameInput.disabled = isAnonymous;
                    nameInput.required = !isAnonymous;
                    if (isAnonymous) {
                        nameInput.value = '';
                    }
                });

                const isAnonymous = anonymousCheckbox.checked;
                nameInput.disabled = isAnonymous;
                nameInput.required = !isAnonymous;
            }

            // const typeCheckbox = form.closest('.donation-container').querySelector('.donation-toggle');
            // if (emailInput && typeCheckbox) {
            //     const updateEmailInputState = () => {
            //         const isAnonymous = anonymousCheckbox.checked;
            //         const isTypeChecked = typeCheckbox.checked;
            //
            //         if (isTypeChecked) {
            //             // type subscribe — email завжди активний і required
            //             emailInput.disabled = false;
            //             emailInput.required = true;
            //         } else if (isAnonymous) {
            //             // anonymous — поле email блокується
            //             emailInput.disabled = true;
            //             emailInput.required = false;
            //             emailInput.value = '';
            //         } else {
            //             emailInput.disabled = false;
            //             emailInput.required = true;
            //         }
            //     };
            //
            //     // anonymousCheckbox.addEventListener('change', updateEmailInputState);
            //     typeCheckbox.addEventListener('change', updateEmailInputState);
            //
            //     updateEmailInputState();
            // }
        }

        // form.addEventListener('submit', function (event) {
        //     event.preventDefault();
        //     window.location.href = '/thank-you/';
        // });

        //SUBMIT
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const errorBlock = form.querySelector('.error-message');
            const pageIdInput = form.querySelector('input[name="page_id"]');
            const amountInput = form.querySelector('.input-amount');
            const typeCheckbox = form.closest('.donation-container').querySelector('.donation-toggle');
            const selectSelected = form.querySelector('.donation-form-select .select-selected');
            // const submitFormButton = form.querySelector('.submit-donate');

            if (errorBlock) {
                errorBlock.classList.add('hide');
                errorBlock.textContent = '';
            }

            const projectId = pageIdInput ? pageIdInput.value : '';
            const amount = amountInput ? amountInput.value.trim() : '';
            const type = typeCheckbox && typeCheckbox.checked ? 'subscribe' : 'pay';
            const currency = selectSelected ? selectSelected.getAttribute('data-selected') : '';

            if (!projectId || !amount || !currency || !type) {
                console.warn('Всі поля мають бути заповнені: project_id, amount, currency, type');
                if (!projectId) {
                    console.warn('Поле project_id є обов\'язковим і не заповнене.');
                }
                if (!amount) {
                    console.warn('Поле amount є обов\'язковим і не заповнене.');
                }
                if (!currency) {
                    console.warn('Поле currency є обов\'язковим і не заповнене.');
                }
                if (!type) {
                    console.warn('Поле type є обов\'язковим і не заповнене.');
                }
                return;
            }

            const payload = {
                project_id: projectId,
                currency: currency,
                locale: 'uk',
                amount: amount,
                type: type,
                email: emailInput.value.trim(),
            };

            // if (typeCheckbox.checked) {
            //     const emailInput = form.querySelector('.input-email');
            //     if (emailInput && emailInput.value.trim()) {
            //         payload.email = emailInput.value.trim();
            //     }
            // }

            fetch(`${window.location.origin}/wp-json/liqpay/v1/pay`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload),
            })
                .then(response => {
                    return response.json().then(data => {
                        if (!response.ok) {
                            const errorMessageBlock = form.querySelector('.error-message');
                            if (errorMessageBlock && data.error) {
                                errorMessageBlock.textContent = data.error;
                                errorMessageBlock.classList.remove('hide');
                            }
                            throw new Error(data.error || 'Сервер повернув помилку');
                        }

                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = data;

                        const liqform = wrapper.querySelector('form');

                        if (liqform) {
                            document.body.appendChild(liqform);
                            liqform.submit();
                        } else {
                            console.error('Форма від LiqPay не знайдена у відповіді.');
                        }
                    });
                })
                .catch(error => {
                    console.error('Помилка запиту:', error);
                    // const errorMessageBlock = form.querySelector('.error-message');
                    // if (errorMessageBlock && !errorMessageBlock.textContent) {
                    //     errorMessageBlock.textContent = error;
                    //     errorMessageBlock.classList.remove('hide');
                    // }
                });
        });

        updatePresetButtons('₴');

        function updatePresetButtons(currencySymbol) {
            presetButtons.forEach(button => {
                const baseValue = button.getAttribute('data-value');
                button.innerHTML = `+ ${baseValue} <span>${currencySymbol}</span>`;
            });
        }
    });
}

function handlerUnsubscribeForm() {
    const form = document.querySelector('.unsubscribe-form');
    if (!form) return;

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const errorBlock = form.querySelector('.error-message');
        const emailField = form.querySelector('#unsubscribe-email');

        if (errorBlock) {
            errorBlock.classList.add('hide');
            errorBlock.textContent = '';
        }

        const payload = {
            email: emailField.value.trim(),
        };

        fetch(`${window.location.origin}/wp-json/liqpay/v1/unsubscribe`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
        })
            .then(response => {
                return response.json().then(data => {
                    if (!response.ok) {
                        const errorMessageBlock = form.querySelector('.error-message');
                        if (errorMessageBlock && data) {
                            errorMessageBlock.textContent = data;
                            errorMessageBlock.classList.remove('hide');
                        }
                        throw new Error(data || 'Сервер повернув помилку');
                    }

                    const thankYouBlock = document.querySelector('.thank-you');
                    if (thankYouBlock) {
                        thankYouBlock.classList.add('hide');
                    }
                    const thankYouSecond = document.querySelector('.thank-you.thank--sec');
                    if (thankYouSecond) {
                        thankYouSecond.classList.remove('hide');
                    }
                });
            })
            .catch(error => {
                console.error('Помилка запиту:', error);
            });
    });
}
