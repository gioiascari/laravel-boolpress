<template>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    <li v-for="(navItem, i) in menu" :key="i" class="nav-item">
                        <router-link
                            :to="{ name: navItem.linkName }"
                            class="nav-link"
                            >{{ navItem.label }}</router-link
                        >
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            menu: [
                { linkName: "home", label: "Home" },
                { linkName: "blog", label: "Blog" },
                { linkName: "contacts", label: "Contacts" },
                { linkName: "aboutus", label: "About Us" },
            ],
        };
    },
};
</script>

<style></style>
