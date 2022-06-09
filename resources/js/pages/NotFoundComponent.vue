<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">404 - NOT FOUND</div>
            <router-link :to="{ name: 'home' }">Back to home</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "NotFoundComponent",
};
</script>

<style></style>
