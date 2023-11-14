import Quill from 'quill';

const quill = new Quill('#editor', {
    theme: 'snow' // Используйте тему "snow" для стандартного интерфейса
});




// При отправке формы, установите содержимое Quill редактора в поле "content"
document.querySelector('form').addEventListener('submit', function(e) {
    document.querySelector('#content').value = quill.root.innerHTML;
});
