<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div v-if="posts.length > 0">
                    <PostListComponent :posts="posts" />
                </div>
                <div v-else>Loading</div>
            </div>
        </div>
    </div>
</template>

<script>
import PostListComponent from "../components/PostListComponent.vue";

export default {
    name: "BlogComponent",
    components: {
        PostListComponent,
    },
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
