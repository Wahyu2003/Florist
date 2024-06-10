document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.password-cell').forEach(cell => {
        cell.addEventListener('click', () => {
            const password = cell.getAttribute('data-password');
            navigator.clipboard.writeText(password).then(() => {
                alert('Copied');
            }).catch(err => {
                console.error('Failed to copy password: ', err);
            });
        });
    });

    const passwordToggleBtn = document.getElementById("password-toggle-btn");
    if (passwordToggleBtn) {
        passwordToggleBtn.addEventListener("click", togglePasswordVisibility);
    }
});

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var passwordToggleBtn = document.getElementById("password-toggle-btn");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggleBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="auto"><title>Hide</title><path d="M12.81 4.36l-1.77 1.78a4 4 0 0 0-4.9 4.9l-2.76 2.75C2.06 12.79.96 11.49.2 10a11 11 0 0 1 12.6-5.64zm3.8 1.85c1.33 1 2.43 2.3 3.2 3.79a11 11 0 0 1-12.62 5.64l1.77-1.78a4 4 0 0 0 4.9-4.9l2.76-2.75zm-.25-3.99l1.42 1.42L3.64 17.78l-1.42-1.42L16.36 2.22z"/></svg>';
    } else {
        passwordInput.type = "password";
        passwordToggleBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="auto"><title>Show</title><path d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>';
    }
}



    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const modalOverlay = document.getElementById('modalOverlay');
            modalOverlay.style.display = 'flex';

            document.getElementById('confirmDelete').onclick = () => {
                window.location.href = button.getAttribute('href');
            };

            document.getElementById('cancelDelete').onclick = () => {
                modalOverlay.style.display = 'none';
            };
        });
    });

    document.querySelectorAll('.btn-confirm').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const modalOverlay = document.getElementById('modalPesanan');
            modalOverlay.style.display = 'flex';

            document.getElementById('confirmPesanan').onclick = () => {
                window.location.href = button.getAttribute('href');
            };

            document.getElementById('cancelPesanan').onclick = () => {
                modalOverlay.style.display = 'none';
            };
        });
    });

    document.querySelectorAll('.btn-logout').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const modalOverlay = document.getElementById('modalLogout');
            modalOverlay.style.display = 'flex';

            document.getElementById('confirmLogout').onclick = () => {
                document.getElementById('logout-form').submit();
            };

            document.getElementById('cancelLogout').onclick = () => {
                modalOverlay.style.display = 'none';
            };
        });
    });