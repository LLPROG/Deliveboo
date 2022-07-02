<template>
  <div class="d-flex justify-content-center mt-2 mb-3 mx-1">

    <form @submit.prevent="$emit('passData', count)">

      <button
        @click="decreaseQuantity()"
        class="btn btn-primary text-white py-2 px-3"
      >
        -
      </button>
      <input
        type="number"
        class="form-control p-2 dish-quantity text-center"
        :value="count"
      />
      <button
        @click="increaseQuantity()"
        class="btn btn-primary text-white py-2 px-3"
      >
        +
      </button>

    </form>
  </div>
</template>

<script>
export default {
  name: "CounterComponent",

  data() {
    return {
      count: 0,
    };
  },
  methods: {
    increaseQuantity() {
      this.count++;
      // onClickCounter();
    },
    decreaseQuantity() {
      if (this.count > 0) {
        this.count--;
      }
      // onClickCounter();
    },
    onClickCounter() {
      console.log("click");
      // let newCount = this.count;
      // this.$emit('clicked', newCount);
    },
  },
};
</script>
