const phoneInput = document.getElementById('phone');

const phoneMaskOptions = {
    mask: '+7 (000) 000-0000',
    lazy: true,
};
const phoneMask = IMask(phoneInput, phoneMaskOptions);

const form = document.getElementById('myForm');
form.onsubmit = function (event) {
    event.preventDefault();


    const isValidPhone = phoneMask.unmaskedValue.length === 10;
    if (!isValidPhone) {
        alert('Пожалуйста, введите корректный номер телефона.');
        return;
    }

    const email = document.getElementById('email').value;
    const phone = "+7" + phoneMask.unmaskedValue;


    const data = {
        email: email,
        phone: phone
    };

    $.ajax({
        url: 'https://freerade.ru/testTask/php/index.php',
        method: 'POST',
        dataType: 'json',
        data: { data }
    });

    alert('Данные отправлены')

    form.reset();




};


