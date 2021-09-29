require('./bootstrap');

require('alpinejs');


window.Echo.private('orders')
    .listen('.order.created', (e) => {
        alert('Checkout Your email To see Your Invoice');
    });