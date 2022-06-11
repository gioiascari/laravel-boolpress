<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-2">Detail</div>
            <div v-if="post" class="card m-2">
                <div class="card-body p_0">
                    <div class="wrapper_image">
                        <img
                            :src="'/storage/' + post.cover"
                            :alt="post.title"
                        />
                    </div>
                    <div class="p-2">
                        <div class="card-title">
                            <h4>
                                {{ post.title }}
                            </h4>
                        </div>
                        <div class="card-text">
                            <p>
                                {{ post.content }}
                            </p>

                            <h5>Categories:</h5>
                            <p>{{ post.category.name }}</p>

                            <div v-for="tag in post.tag" :key="tag.id">
                                <h5>Tags:</h5>
                                <p>{{ tag.name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="text-center">
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
    name: "SinglePostComponent",
    data() {
        return {
            post: undefined,
        };
    },
    mounted() {
        const slug = this.$route.params.slug;
        console.log("mounted slug", slug);

        window.axios
            .get("/api/posts/" + slug)
            .then((res) => {
                console.log(res);

                if (res.status === 200 && res.data.success) {
                    this.post = res.data.results;
                    console.log(this.post);
                }
            })
            .catch((e) => {
                console.log(e);
            });
    },
};
</script>

<style lang="scss" scoped>
// @import "/loader";
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
