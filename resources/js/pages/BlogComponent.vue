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
    data() {
        return {
            posts: [],
        };
    },
    mounted() {
        window.axios
            .get("/api/posts")
            .then((res) => {
                if (res.status === 200 && res.data.success) {
                    this.posts = res.data.res;
                }
                console.log(res);
            })
            .catch((e) => {
                console.log(e);
            });
    },
};
</script>

<style></style>
