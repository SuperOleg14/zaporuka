<div class="current-fees m-150">
    <div class="container">
        <h2 class="title">Наші проєкти</h2>
        <div class="fees-switch">
            <span class="text first">Реалізовані проєкти</span>
            <label for="fees-toggle" class="fees-switch-label">
                <input type="checkbox" id="fees-toggle" class="fees-toggle">
                <span class="switcher"></span>
            </label>
            <span class="text second">Активні проєкти</span>
        </div>
        <div class="current-fees__tab">
            <div class="current-fees__content f-wrap completed">
                <div class="d-flex --just-space --align-stretch f-wrap current-fees-more"></div>

                <a href="#"
                   class="btn btn-transparent btn-content load-more-projects"
                   data-type="completed"
                   data-page="2">
                    Показати більше
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M18 6L10 14L2 6" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="current-fees__content f-wrap active">
                <div class="d-flex --just-space --align-stretch f-wrap current-fees-more"></div>

                <a href="#"
                   class="btn btn-transparent btn-content load-more-projects"
                   data-type="active"
                   data-page="1">
                    Показати більше
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M18 6L10 14L2 6" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.load-more-projects');

        buttons.forEach(button => {
            let page = parseInt(button.dataset.page);
            const type = button.dataset.type;
            const content = button.closest('.current-fees__content');
            const container = content.querySelector('.current-fees-more');

            const loadProjects = () => {
                button.disabled = true;

                fetch(`<?php echo get_template_directory_uri(); ?>/current-fees-ajax.php?type=${type}&page=${page}&_=${Date.now()}`)
                    .then(res => res.text())
                    .then(html => {
                        const items = (html.match(/class="item --basis-3"/g) || []).length;

                        if (items > 0) {
                            container.insertAdjacentHTML('beforeend', html);
                            page++;
                            button.dataset.page = page;
                            button.disabled = false;

                            if (items < 3) {
                                button.remove();
                            }
                        } else {
                            button.remove();
                        }
                    })
                    .catch(err => {
                        console.error('AJAX Error:', err);
                        button.disabled = false;
                    });
            };

            button.addEventListener('click', (e) => {
                e.preventDefault();
                loadProjects();
            });

            loadProjects();
        });
    });
</script>

