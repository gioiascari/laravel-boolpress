<template>
    <div class="card m-2">
        <div class="card-body p_0">
            <div class="wrapper_image">
                <img
                    :src="'storage/' + cover"
                    :alt="title"
                    class="card-img-top h-100"
                />
            </div>
            <div class="p-2">
                <div class="card-title">
                    <h5>{{ title }}</h5>
                </div>
                <p class="card-text">
                    {{ content }}
                </p>
            </div>
        </div>
        <router-link :to="{ name: 'single-post', params: { slug } }">
            See More</router-link
        >
    </div>
</template>

<script>
export default {
    name: "PostCardComponent",
    props: ["title", "cover", "content", "slug"],
};
</script>

<style lang="scss" scoped>
// .w_g {
//     width: 250px;
// }
.wrapper_image {
    height: 400px;
}
.p_0 {
    padding: 0;
}
</style>
