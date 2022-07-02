require("./bootstrap");

window.Vue = require("vue").default;
window.Axios = require("axios");

import App from "./components/App.vue";

import PageHome from "./components/pages/PageHome.vue";
import RestaurantMenu from "./components/pages/RestaurantMenu.vue";
import VueBrainTree from "vue-braintree";
import PaymentPage from "./components/pages/PaymentPage.vue";
import CheckoutSuccess from "./components/pages/CheckoutSuccess.vue";

import VueRouter from "vue-router";

Vue.use(VueBrainTree);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "PageHome",
            component: PageHome,
        },
        {
            path: "/restaurantmenu/:slug",
            name: "RestaurantMenu",
            component: RestaurantMenu,
            props: true,
        },
        {
            path: "/payment",
            name: "PaymentPage",
            component: PaymentPage,
            props: true,
        },
        {
            path: "/checkout",
            name: "CheckoutSuccess",
            component: CheckoutSuccess,
            props: true,
        },
    ],
});

const app = new Vue({
    el: "#app",
    render: (h) => h(App),
    router,
});

// let addToCartBtnArray = document.querySelectorAll(".add-to-cart");
// let decreaseBtnArray = document.querySelectorAll(".decrease");
// let increaseBtnArray = document.querySelectorAll(".increase");
// let inputQutyFieldArray = document.querySelectorAll(".dish-quantity");

// let cartItem = [];
// let dishQuantity = 0; //Qui va legato al campo quantità del piatto
// let localStorageIndex = 0;
// let localStorageKey = 'cart'+localStorageIndex;

// function addToCart(dish, quantity) {
//     cartItem = [dish.id, dish.price, quantity]
//     cart.push(cartItem);
//     return cart
// }

//Trasformare l'oggetto nel carrello da array a stringa con separatore di dati |
//cartItem.join('|')

//Funzioni per localStorage
// localStorage.setItem(key, 'string')
// localStorage.getItem(key, 'string')
// Svuotare carrello
// localStorage.clear()
