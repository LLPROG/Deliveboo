<template>
  <div class="container">
    <form id="payment-form" @submit.prevent="getData()" method="POST">

      <div class="form-group">
        <label for="name">Nome</label>
        <input
          type="text"
          v-model="name"
          maxlength="100"
          class="form-control"
          name="name"
          id="name"
          placeholder="Inserisci il tuo nome"
          required
        />
      </div>

      <div class="form-group">
        <label for="surname">Cognome</label>
        <input
          type="text"
          v-model="surname"
          maxlength="100"
          class="form-control"
          name="surname"
          id="surname"
          placeholder="Inserisci il tuo cognome"
          required
        />
      </div>

      <div class="form-group">
        <label for="street">Via</label>
        <input
          type="text"
          v-model="street"
          maxlength="100"
          class="form-control"
          name="street"
          id="street"
          placeholder="Inserisci la via"
          required
        />
      </div>

      <div class="form-group">
        <label for="cap">CAP</label>
        <input
          type="text"
          v-model="cap"
          maxlength="100"
          class="form-control"
          name="cap"
          id="cap"
          placeholder="Inserisci il cap"
          required
        />
      </div>

      <div class="form-group">
        <label for="city">Città</label>
        <input
          type="text"
          v-model="city"
          maxlength="100"
          class="form-control"
          name="city"
          id="city"
          placeholder="Inserisci la città"
          required
        />
      </div>

      <div class="form-group">
        <label for="number">Numero</label>
        <input
          type="text"
          v-model="number"
          maxlength="100"
          class="form-control"
          name="number"
          id="number"
          placeholder="Inserisci in numero di telefono"
          required
        />
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input
          type="email"
          v-model="email"
          maxlength="100"
          class="form-control"
          name="email"
          id="email"
          placeholder="Inserisci la tua email"
          required
        />
      </div>

      <button class="btn btn-primary mt-4 mb-4">Prosegui</button>
    </form>
    <v-braintree
      v-if="aut"
      v-show="showPayment"
      :authorization="aut"
      @success="onSuccess"
      locale="it_IT"
      @error="onError"
    ></v-braintree>
  </div>
</template>

<script>
export default {
  name: "PaymentPage",
  props: ["userId", "amount"],
  data() {
    return {
      url: "http://127.0.0.1:8000/api/make/payment",
      errors: [],
      error: "",
      name: null,
      surname: null,
      street: null,
      cap: null,
      city: null,
      email: null,
      number: null,
      showPayment: false,
      aut: null,
      cart: [],
      successPayment: false,
      params: {}
    };
  },
  methods: {
    onSuccess(payload) {
      let nonce = payload.nonce;
      // Do something great with the nonce...
      //console.log(nonce);
      //console.log(this.amount / 100);
      let self = this;

      this.getCartData();
      console.log(this.cart);
      this.createOrder();
      console.log(this.params);
      
      Axios.post(this.url, {
        amount: this.amount,
        token: nonce,
        options: {
          submitForSettlement: true,
        },
      }).then((response) => {
        if (response.data.success) {
          self.successPayment = true;
          self.$router.push({ name: 'CheckoutSuccess' });
          console.log(response.data.message);
        }
      });
      // if (this.successPayment) {

      // }
    },
    onError(error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
      console.log(message);
    },
    active() {
      this.showPayment = true;
    },
    getData() {
      this.active();
      let self = this;
      Axios.get("http://127.0.0.1:8000/api/generate").then(function (response) {
        // handle success
        self.aut = response.data.token;
      });
      //this.createOrder();
    },
    createOrder() {
      this.params = {
        name: this.name,
        surname: this.surname,
        email: this.email,
        street: this.street,
        cap: this.cap,
        city: this.city,
        number: this.number,
        amount: this.amount,
        cart: this.cart,
      }
      Axios.post("http://127.0.0.1:8000/api/create/order", this.params).then(function (response) {
        console.log(response.data.message);
      });
    },
    getCartData() {
      let element;
      let cartItem;
      let id;
      let qty;
      for (let key in localStorage) {
        element = localStorage.getItem(key);
        if (element) {
          id = parseInt(element.match(/(?<=[D])\d+(?=[|])/));
          qty = parseInt(element.match(/(?<=[|])\d+(?=[|])/));

          cartItem = {
            id: id,
            qty: qty,
          };


          this.cart.push(cartItem);
        }
        
        localStorage.clear();
      }

      // console.log(this.cart)
    },
  },
  //   created() {},
};
</script>

<style></style>
