<template>
    <div class="container">
        <div class="popup">
            <h1>
                IL TUO ORDINE È STATO REGISTRATO CON SUCCESSO
            </h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "CheckoutSuccess",
    data() {
        return {
            lastOrder: null
        }
    },
    created() {
        Axios.get()
    }
};
</script>

<style lang="scss" scoped>

.container {
    margin: 0 auto;
    .popup {
        padding: 5rem;
        background-color: green;
    }
}
</style>
