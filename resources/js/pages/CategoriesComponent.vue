<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Categories:</h2>
                <div v-if="categories.length > 0">
                    <div v-for="category in categories" :key="category.id">
                        <router-link
                            :to="{
                                name: 'post-per-categories',
                                params: { id: category.id },
                            }"
                            >{{ category.name }}</router-link
                        >
                    </div>
                </div>

                <div v-else>Loading</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CategoriesComponent",
    data() {
        return {
            categories: [],
        };
    },
    mounted() {
        // console.log("mounted");
        this.loadPage("/api/categories");
    },
    methods: {
        loadPage(url) {
            window.axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    if (res.status === 200 && res.data.success) {
                        this.categories = res.data.results;
                        console.log(this.categories);
                    }
                })
                .catch((e) => {
                    console.log(e);
                });
        },
    },
};
</script>

<style></style>
