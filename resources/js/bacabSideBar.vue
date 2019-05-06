<template>
    <aside class="sidenav">
        <bacab-sidebar-brand/>
        <bacab-sidebar-profile/>
        <div class="row row--align-v-center row--align-h-center">
            <bacab-side-bar-menu/>
        </div>
    </aside>
</template>

<script>
    import BacabSidebarBrand from "./components/bacabSidebarBrand";
    import BacabSidebarProfile from "./components/bacabSidebarProfile";
    import BacabSideBarMenu from "./components/bacabSideBarMenu";
    export default {
        name: "bacabSideBar",
        components: {BacabSideBarMenu, BacabSidebarProfile, BacabSidebarBrand},
        methods: {
            open(route, name){
                this.$parent.open(route, name)
            }
        }
    }
</script>