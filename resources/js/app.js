require('./bootstrap');

require('alpinejs');


window.Echo.private('orders')
    .listen('.order.created', (e) => {
        alert('Your Order Was Created Succesfuly');
    });