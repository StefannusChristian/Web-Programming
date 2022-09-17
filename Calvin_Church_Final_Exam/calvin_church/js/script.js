let navbar = document.querySelector('.header .navbar');




document.querySelector('#close-edit').onclick = () => {
    document.querySelector('.edit-form-container').style.display = 'none';
    window.location.href = 'add_picture_admin.php';
};

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}