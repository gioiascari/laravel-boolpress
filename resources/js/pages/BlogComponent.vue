<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">Blog</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogComponent",
    mounted() {
        window.axios
            .get("/api/posts")
            .then((res) => {
                console.log(res);
            })
            .catch((e) => {
                console.log(e);
            });
    },
};
</script>

<style></style>
