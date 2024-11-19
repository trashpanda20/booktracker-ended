function disableCurrentLink() {
    const currentPath = window.location.pathname;

    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('disabled');
            link.setAttribute('aria-disabled', 'true');
            link.removeAttribute('href');
        }
    });
}

window.onload = disableCurrentLink;