<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div v-if="category">
                    <h2>{{ category.name }}</h2>
                    <PostListComponent :posts="category.posts" />
                    <div>
                        <!-- {{ category.posts.id }} -->
                    </div>
                </div>
                <div v-else>Loading</div>
            </div>
        </div>
    </div>
</template>

<script>
import PostListComponent from "../components/PostListComponent";

export default {
    name: "PostCategoriesComponent",
    components: {
        PostListComponent,
    },
    data() {
        return {
            category: undefined,
        };
    },
    mounted() {
        const id = this.$route.params.id;
        // console.log("mounted id", id);

        window.axios
            .get("/api/categories/" + id)
            .then((res) => {
                // console.log(res);

                if (res.status === 200 && res.data.success) {
                    this.category = res.data.result;
                    console.log(this.category, "ciao");
                }
            })
            .catch((e) => {
                console.log(e);
            });
    },
};
</script>

<style></style>
