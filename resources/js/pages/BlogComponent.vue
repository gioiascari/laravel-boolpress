<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div v-if="posts.length > 0">
                    <PostListComponent :posts="posts" />
                    <button @click="goPrevPage()">Prev</button>
                    <button @click="goNextPage()">Next</button>
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
            currentPage: 1,
            previousPage: "",
            nextPage: "",
        };
    },
    mounted() {
        console.log("mounted");
        this.loadPage("/api/posts");
    },
    methods: {
        loadPage(url) {
            window.axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    if (res.status === 200 && res.data.success) {
                        this.posts = res.data.results.data;
                        this.currentPage = res.data.results.current_page;
                        this.previousPage = res.data.results.prev_page_url;
                        this.nextPage = res.data.results.next_page_url;
                    }
                })
                .catch((e) => {
                    console.log(e);
                });
        },

        goPrevPage() {
            this.loadPage(this.previousPage);
        },
        goNextPage() {
            this.loadPage(this.nextPage);
        },
    },
};
</script>

<style></style>
