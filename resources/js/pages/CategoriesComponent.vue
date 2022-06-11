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

                <div v-else class="text-center">
                    <h1>
                        <span class="let1">l</span>
                        <span class="let2">o</span>
                        <span class="let3">a</span>
                        <span class="let4">d</span>
                        <span class="let5">i</span>
                        <span class="let6">n</span>
                        <span class="let7">g</span>
                    </h1>
                </div>
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

<style lang="scss" scoped>
h1 {
    margin: 0;
    padding: 0;
    font-family: ‘Arial Narrow’, sans-serif;
    font-weight: 100;
    font-size: 1.1em;
    color: black;
}

span {
    position: relative;
    top: 0.63em;
    display: inline-block;
    text-transform: uppercase;
    opacity: 0;
    transform: rotateX(-90deg);
}

.let1 {
    animation: drop 1.2s ease-in-out infinite;
    animation-delay: 1.2s;
}

.let2 {
    animation: drop 1.2s ease-in-out infinite;
    animation-delay: 1.3s;
}

.let3 {
    animation: drop 1.2s ease-in-out infinite;
    animation-delay: 1.4s;
}

.let4 {
    animation: drop 1.2s ease-in-out infinite;
    animation-delay: 1.5s;
}

.let5 {
    animation: drop 1.2s ease-in-out infinite;
    animation-delay: 1.6s;
}

.let6 {
    animation: drop 1.2s ease-in-out infinite;
    animation-delay: 1.7s;
}

.let7 {
    animation: drop 1.2s ease-in-out infinite;
    animation-delay: 1.8s;
}

@keyframes drop {
    10% {
        opacity: 0.5;
    }
    20% {
        opacity: 1;
        top: 3.78em;
        transform: rotateX(-360deg);
    }
    80% {
        opacity: 1;
        top: 3.78em;
        transform: rotateX(-360deg);
    }
    90% {
        opacity: 0.5;
    }
    100% {
        opacity: 0;
        top: 6.94em;
    }
}
</style>
