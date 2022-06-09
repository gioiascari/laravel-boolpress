<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div v-if="posts.length > 0">Ciao</div>
                <div v-else>Caricamento</div>
            </div>
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
        console.log("mounted");
        window.axios
            .get("/api/posts")
            .then((res) => {
                if (res.status === 200 && res.data.success) {
                    this.posts = res.data.results;
                }
            })
            .catch((e) => {
                console.log(e);
            });
    },
};
</script>

<style></style>
