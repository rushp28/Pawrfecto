import './bootstrap';
import 'flowbite';

/* Script for the Pre-Loader on the app.blade.php */
window.addEventListener('load', function() {
    setTimeout(function() {
        document.getElementById('preloader').style.display = 'none';
        document.body.classList.add('fade-in');
    }, 1000);
});
