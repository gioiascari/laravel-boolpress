<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-2">Detail</div>
            <div v-if="post" class="card m-2">
                <div class="card-body p_0">
                    <h4>
                        {{ post.title }}
                    </h4>
                    <img :src="'/storage/' + post.cover" :alt="post.title" />
                    <p>
                        {{ post.content }}
                    </p>

                    <div v-for="tag in post.tag" :key="tag.id">
                        {{ tag.name }}
                    </div>
                </div>
            </div>
            <div v-else>Loading</div>
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
        const id = this.$route.params.id;
        console.log("mounted id", id);

        window.axios
            .get("/api/posts/" + id)
            .then((res) => {
                console.log(res);
                if (res.status === 200 && res.data.success) {
                    this.post = res.data.results;
                }
            })
            .catch((e) => {
                console.log(e);
            });
    },
};
</script>

<style lang="scss" scoped></style>
