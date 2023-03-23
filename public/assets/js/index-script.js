const menu = document.getElementById('target');
const sidebar = document.getElementsByClassName('sidebar')[0];
const descriptionHeader = document.getElementsByClassName('description-header')[0];
const illustration = document.getElementsByClassName('img')[0];

function menuSidebar() {
    (sidebar.classList.contains('hide')) ?
    sidebar.classList.remove('hide') : sidebar.classList.add('hide');
    (descriptionHeader.classList.contains('hideside')) ?
    descriptionHeader.classList.remove('hideside') : descriptionHeader.classList.add('hideside');
    (illustration.classList.contains('hideside')) ?
    illustration.classList.remove('hideside') : illustration.classList.add('hideside');
}

menu.addEventListener('click', function(e) {
    e.preventDefault();
    for(var i = 0; i < document.getElementsByClassName('description-main-sidebar').length; i++) {
        (document.getElementsByClassName('description-main-sidebar')[i].classList.contains('hideside')) ?
        (document.getElementsByClassName('description-main-sidebar')[i].classList.remove('hideside')) :
        (document.getElementsByClassName('description-main-sidebar')[i].classList.add('hideside'));
    };
    menuSidebar();
});