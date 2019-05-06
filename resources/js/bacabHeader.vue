<template>
    <div class="header">
        <i class="fas fa-bars header__menu"></i>
        <div class="header__search">
            <input class="header__input" placeholder="Search..." />
        </div>
        <bacab-notifications/>
    </div>
</template>

<script>
    import BacabNotifications from "./components/bacabNotifications";
    export default {
        name: "bacabHeader",
        components: {BacabNotifications}
    }
</script>
