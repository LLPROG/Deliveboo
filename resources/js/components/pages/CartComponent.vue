<template>
  <div>
    <div class="card w-100">
      <div class="card-header">Carrello</div>
      <ul class="list-group list-group-flush">
        <li
          v-for="itemInCartLs in cart"
          :key="itemInCartLs.id"
          class="list-group-item"
        >
          <div>{{ itemInCartLs[2] }}</div>
          <div>{{ itemInCartLs[3] }}</div>
          <div>
            {{
              parseFloat(itemInCartLs[4] / 100)
                .toFixed(2)
                .toString()
                .replace(".", ",")
            }}
          </div>
        </li>
        <li class="list-group-item text-end">
          Totale: €
          {{
            parseFloat(amount / 100)
              .toFixed(2)
              .toString()
              .replace(".", ",")
          }}
        </li>
      </ul>

      <h3 v-if="differentUser === 1" class="m-2 text-center alert alert-danger">
        Prima di procedere con l'aggiunta dei piatti al carrello si prega di
        svuotarne il contenuto.
      </h3>

      <button
        v-if="differentUser === 0"
        @click="refreshCart()"
        class="btn btn-primary text-white d-block m-2"
      >
        Aggiorna Carrello
      </button>
      <button class="btn btn-danger text-white d-block m-2" @click="clearCart()">
        Svuota il carrello
      </button>
      <router-link
        v-if="differentUser === 0"
        :to="{
          name: 'PaymentPage',
          params: { amount: amount }
        }"
        class="btn btn-primary text-white d-block m-2"
      >
        Paga
      </router-link>
    </div>
    <!-- {{ tokenApi }} -->
    <!-- <payment-page :authorization="tokenApi"></payment-page> -->
  </div>
</template>

<script>
import PaymentPage from "./PaymentPage.vue";
export default {
  components: { PaymentPage },
  name: "CartComponent",
  props: ["userId", "amount"],
  data() {
    return {
      url: "http://127.0.0.1:8000/api/generate",
      // url: "http://aletucci.dynv6.net:9000/api/generate",
      tokenApi: "",
      cartItemLs: "",
      cart: [],
      cartItemsLsArray: [],
      cartItemLs: "",
      differentUser: 1,
    };
  },
  methods: {
    GetData(url) {
      Axios.get(url).then((response) => {
        this.tokenApi = response.data.token;
        // console.log(response);
      });
    },
    refreshCart() {
      this.cart = [];
      for (let key in localStorage) {
        if (key.indexOf("user" + this.userId) > -1) {
          this.cartItemLs = localStorage.getItem(key);
          this.cartItemsLsArray = this.cartItemLs.split("|");
          this.cart.push(this.cartItemsLsArray);
        }
      }
      // console.log(
      //   "Quantity: " + parseInt(this.cart[0].match(/(?<=[|])\d+(?=[|])/))
      // );
      // console.log("Price: " + parseInt(this.cart[0].match(/(?<=[|])\d+$/)));
      // console.log(
      //   parseInt(this.cart[0].match(/(?<=[|])\d+(?=[|])/)) *
      //     parseInt(this.cart[0].match(/(?<=[|])\d+$/))
      // );
      // let singleAmountArray = this.cart.map(
      //   (el) =>
      //     parseInt(el.match(/(?<=[|])\d+(?=[|])/)) *
      //     parseInt(el.match(/(?<=[|])\d+$/))
      // );
      // console.log(singleAmountArray);
      // for (let index = 0; index < singleAmountArray.length; index++) {
      //   this.amount += singleAmountArray[index];
      // }
      // console.log("Totale: " + this.amount);
      // this.getKeyLS();
    },
    clearCart() {
      localStorage.clear();
      this.amount = 0;
      this.refreshCart();
      this.checkUser();
    },
    getKeyLS() {
      for (let key in localStorage) {
        if (key.indexOf("user" + this.userId) > -1) {
          // console.log(key);
        }
      }
    },
    checkUser() {
      let keysArray;
      keysArray = Object.keys(localStorage);
      if (keysArray.length > 0) {
        if (keysArray[0].startsWith("user" + this.userId + "cartItem")) {
          this.differentUser = 0;
        } else {
          this.differentUser = 1;
        }
      }
    },
  },
  beforeUpdate() {
    this.refreshCart();
    this.checkUser();
  },
  mounted() {
    // const response = await this.$axios.get("api/generate");
    // this.tokenApi = response;
    this.GetData(this.url);
  },
};
</script>

<style></style>
