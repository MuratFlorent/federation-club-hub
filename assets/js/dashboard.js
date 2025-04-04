document.addEventListener('DOMContentLoaded', function () {
    console.log('📦 Dashboard JS chargé');

    function toggleSidebar() {
        const body = document.body;
        if (body.classList.contains('sidebar-open')) {
            body.classList.remove('sidebar-open');
            body.classList.add('sidebar-collapse');
        } else {
            body.classList.add('sidebar-open');
            body.classList.remove('sidebar-collapse');
        }
    }

    // 🔁 Supprime tous les gestionnaires existants (s'il y en a)
    const oldBurger = document.querySelector('[data-widget="pushmenu"]');
    const newBurger = oldBurger.cloneNode(true);
    oldBurger.parentNode.replaceChild(newBurger, oldBurger);

    // 🟢 Gestionnaire fiable, sans conflits
    newBurger.addEventListener('click', function (e) {
        e.preventDefault();
        toggleSidebar();
    });

    // 📱 Ouverture automatique sur mobile
    if (window.innerWidth <= 768) {
        document.body.classList.add('sidebar-open');
        document.body.classList.remove('sidebar-collapse');
    }
});
