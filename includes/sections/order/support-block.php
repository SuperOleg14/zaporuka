<div class="support-main">
    <div class="container">
        <h1 class="main-title">Підтримати</h1>
        <div class="support-block d-flex">
            <div class="donation-container grey-block">
                <div class="donation-switch">
                    <span class="text first">Разова допомога</span>
                    <label for="donation-toggle-support" class="donation-switch-label">
                        <input type="checkbox" id="donation-toggle-support" class="donation-toggle">
                        <span class="switcher"></span>
                    </label>
                    <span class="text second">Щомісячна підтримка</span>
                </div>
                <div class="block-onetime block-donation-text">
                    <div class="title">
                        Оберіть суму разового внеску
                    </div>
                </div>
                <div class="block-subscribe block-donation-text">
                    <div class="title">
                        Оберіть суму щомісячного внеску
                    </div>
                    <div class="hint">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M10 18.5C12.1217 18.5 14.1566 17.6571 15.6569 16.1569C17.1571 14.6566 18 12.6217 18 10.5C18 8.37827 17.1571 6.34344 15.6569 4.84315C14.1566 3.34285 12.1217 2.5 10 2.5C7.87827 2.5 5.84344 3.34285 4.34315 4.84315C2.84285 6.34344 2 8.37827 2 10.5C2 12.6217 2.84285 14.6566 4.34315 16.1569C5.84344 17.6571 7.87827 18.5 10 18.5ZM8.75 13H9.5V11H8.75C8.33437 11 8 10.6656 8 10.25C8 9.83437 8.33437 9.5 8.75 9.5H10.25C10.6656 9.5 11 9.83437 11 10.25V13H11.25C11.6656 13 12 13.3344 12 13.75C12 14.1656 11.6656 14.5 11.25 14.5H8.75C8.33437 14.5 8 14.1656 8 13.75C8 13.3344 8.33437 13 8.75 13ZM10 6.5C10.2652 6.5 10.5196 6.60536 10.7071 6.79289C10.8946 6.98043 11 7.23478 11 7.5C11 7.76522 10.8946 8.01957 10.7071 8.20711C10.5196 8.39464 10.2652 8.5 10 8.5C9.73478 8.5 9.48043 8.39464 9.29289 8.20711C9.10536 8.01957 9 7.76522 9 7.5C9 7.23478 9.10536 6.98043 9.29289 6.79289C9.48043 6.60536 9.73478 6.5 10 6.5Z" fill="#F6B738"/>
                        </svg>
                        <span class="text">Списання коштів відбувається <strong>щомісяця</strong> у день оформлення підписки</span>
                    </div>
                </div>
                <form id="donation-form-support-page" class="donation-form">
                    <div class="block-input">
                        <label for="amount-support">
                            <input type="number" id="amount-support" placeholder="Ваш внесок" class="input-amount" required>
                        </label>

                        <div class="custom-select donation-form-select">
                            <div class="select-selected" data-selected="UAH">
                                UAH ₴
                                <span class="select-arrow"></span>
                            </div>
                            <div class="select-options">
                                <div data-value="USD" data-symbol="$">USD ($)</div>
                                <div data-value="UAH" data-symbol="₴">UAH (₴)</div>
                            </div>
                        </div>
                    </div>

                    <div class="amount-buttons">
                        <button type="button" class="preset-amount" data-value="100">+ 100 <span>₴</span></button>
                        <button type="button" class="preset-amount" data-value="500">+ 500 <span>₴</span></button>
                        <button type="button" class="preset-amount" data-value="1000">+ 1000 <span>₴</span></button>
                    </div>

                    <div class="checkbox-container">
                        <label class="custom-checkbox" for="anonymous-support">
                            <input type="checkbox" id="anonymous-support" class="input-anonymous">
                            <span class="checkmark"></span> Допомогти анонімно
                        </label>
                    </div>

                    <div class="inputs-grid">
                        <label for="name-support">
                            <input type="text" id="name-support" name="name-support" class="input-name" placeholder="Імя та прізвище*" required>
                        </label>

                        <label for="email-support">
                            <input type="email" id="email-support" name="email-support" class="input-email" placeholder="Email" required>
                        </label>
                    </div>

                    <div class="checkbox-container">
                        <label class="custom-checkbox">
                            <input type="checkbox" id="agree" required>
                            <span class="checkmark"></span> Я погоджуюся з офертою
                        </label>
                    </div>

                    <button type="submit" class="form-btn btn submit-donate">
                        Підтримати
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                        </svg>
                    </button>
                    <div class="error-message hide"></div>
                    <a href="#" class="form-bot-link">Не проходить оплата</a>
                </form>
            </div>
            <?php get_template_part('includes/modules/bank-options'); ?>
        </div>
    </div>
</div>
