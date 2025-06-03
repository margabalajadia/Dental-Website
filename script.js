
document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM loaded');
    const services = document.querySelectorAll('.service');
    console.log('Services:', services);

    const scrollToTopButton = document.createElement('button');
    scrollToTopButton.textContent = '↑';
    scrollToTopButton.classList.add('scroll-to-top');
    document.body.appendChild(scrollToTopButton);

    function checkScroll() {
        const scrollPosition = window.scrollY + window.innerHeight;
        console.log('Scroll Position:', scrollPosition);

        services.forEach(service => {
            const servicePosition = service.getBoundingClientRect().top + window.scrollY;
            console.log('Service Position:', servicePosition);
            
            if (scrollPosition > servicePosition + 100) {
                service.classList.add('in-view');
            }
        });

        if (window.scrollY > 200) {
            scrollToTopButton.style.display = 'block';
        } else {
            scrollToTopButton.style.display = 'none';
        }
    }

    scrollToTopButton.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    window.addEventListener('scroll', checkScroll);
    checkScroll();


    function hideModal() {
        document.querySelector(".modal").style.display = "none";
    }

    window.hideModal = hideModal;
});
