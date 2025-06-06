const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.content');

for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', ( event ) => {
        let tabsChildren = event.target.parentElement.children;
        for (let t = 0; t < tabsChildren.length; t++) {
            tabsChildren[t].classList.remove('tab--active');
        }
        tabs[i].classList.add('tab--active');

        let tabContentChildren = event.target.parentElement.nextElementSibling.children;
        for (let c = 0; c < tabContentChildren.length; c++) {
            tabContentChildren[c].classList.remove('content--active');
        }
        contents[i].classList.add('content--active');

        $('.content:not(.content--active) .card-body').slideUp();

        if (window.innerWidth < 992) {
            setTimeout(() => {
                const offset = 80;
                const elementPosition = contents[i].getBoundingClientRect().top + window.scrollY;
                window.scrollTo({
                    top: elementPosition - offset,
                    behavior: 'smooth'
                });
            }, 100);
        }
    });
}
