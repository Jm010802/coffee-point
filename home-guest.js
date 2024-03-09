const toggleBtn = document.querySelector('.toggle-btn');
const toggleBtnIcon = document.querySelector('.toggle-btn i');
const dropDownMenu = document.querySelector('.dropdown-menu');

toggleBtn.onclick = function() {
    dropDownMenu.classList.toggle('open');
    const isOpen = dropDownMenu.classList.contains('open');
    toggleBtnIcon.classList = isOpen
    ? 'fa-solid fa-xmark'
    : 'fa-solid fa-bars';
    
    // Prevent scrolling when the hamburger menu is open
    if (isOpen) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
};

// Close the hamburger menu when clicking a link or outside of it
document.addEventListener('click', function(event) {
    const target = event.target;
    const isLink = target.tagName === 'A';
    const isInsideMenu = dropDownMenu.contains(target);
    const isToggleButton = target === toggleBtn || toggleBtn.contains(target);

    if ((isLink || (!isInsideMenu && dropDownMenu.classList.contains('open'))) && !isToggleButton) {
        dropDownMenu.classList.remove('open');
        toggleBtnIcon.classList = 'fa-solid fa-bars';
        document.body.style.overflow = '';
    }
});
