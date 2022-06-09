<template>
    <div class="container">
        <HeaderComponent />
        <div class="row">
            <div class="col-12 text-center">Home</div>
        </div>
    </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";
export default {
    name: "HomeComponent",
    components: {
        HeaderComponent,
    },
};
</script>

<style></style>
