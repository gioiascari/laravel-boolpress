<template>
    <header>
        <nav
            class="navbar navbar-expand-md navbar-dark bg-dark flex-md-nowrap p-0"
        >
            <ul class="navbar-nav px-3 ml-auto">
                <li v-for="(navItem, i) in menu" :key="i" class="nav-item">
                    <router-link :to="{ name: navItem.linkName }">{{
                        navItem.label
                    }}</router-link>
                </li>
            </ul>
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
