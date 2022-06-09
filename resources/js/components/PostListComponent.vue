<template>
    <div class="d-flex">
        <div v-for="(post, i) in posts" :key="i">
            <div>
                <PostCardComponent
                    :title="post.title"
                    :cover="post.cover"
                    :content="post.content"
                    :tag="post.tag"
                />
            </div>
        </div>
    </div>
</template>

<script>
import PostCardComponent from "../components/PostCardComponent.vue";

export default {
    name: "PostListComponent",
    components: {
        PostCardComponent,
    },
    props: ["posts"],
};
</script>

<style></style>
