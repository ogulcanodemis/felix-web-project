const searchIcon = document.getElementById('search-icon');
const searchPopup = document.getElementById('search-popup');
const closeSearch = document.getElementById('close-search');

searchIcon.addEventListener('click', () => {
    searchPopup.classList.remove('d-none');
});

closeSearch.addEventListener('click', () => {
    searchPopup.classList.add('d-none');
});