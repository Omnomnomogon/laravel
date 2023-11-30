import './bootstrap';
import tinymce from 'tinymce/tinymce';
import '../css/app.css';

import Alpine from 'alpinejs';
import 'tinymce/themes/silver';
import 'tinymce/plugins/code';
import 'quill';
window.Alpine = Alpine;

Alpine.start();
document.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '#content' // Укажите селектор вашего текстового поля
    });
});
