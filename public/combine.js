document.addEventListener('DOMContentLoaded', function() {
    const loginButton = document.getElementById('login-button');
    const modal = document.getElementById('login-modal');
    const closeModal = document.getElementById('close-modal');

    loginButton.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});
