document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.js-hamburger');
    const body = document.body;
    const html = document.documentElement;
    const header = document.querySelector('.header');
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    hamburger.addEventListener('click', function () {
        body.classList.toggle('is-open');
        html.classList.toggle('no-scroll');

        const menuItems = document.querySelectorAll('.menu-item-has-children');

        if (body.classList.contains('is-open')) {
            if (menuItems.length > 0) {
                menuItems[0].classList.add('menu-is-open');
            }
        } else {
            menuItems.forEach(item => {
                item.classList.remove('menu-is-open');
            });
        }
    });

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            header.classList.add('scroll');
        } else {
            header.classList.remove('scroll');
        }
    });

    document.querySelectorAll('.menu-item-has-children').forEach(item => {
        item.addEventListener('click', function (event) {
            if (window.innerWidth < 992) {
                event.preventDefault();

                if (this.classList.contains('menu-is-open')) {
                    this.classList.remove('menu-is-open');
                    return;
                }

                document.querySelectorAll('.menu-item-has-children').forEach(el => {
                    el.classList.remove('menu-is-open');
                });

                this.classList.add('menu-is-open');
            }
        });
    });

    const subMenuLinks = document.querySelectorAll('.sub-menu .menu-item a');
    subMenuLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });


    anchorLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });

                body.classList.remove('is-open');
                html.classList.remove('no-scroll');
            }
        });
    });
});

