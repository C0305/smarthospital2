<template>
    <div class="header">
        <i class="fas fa-bars header__menu"></i>
        <div class="header__search">
            <input class="header__input" :placeholder="this.locale.system.searchBarPlaceHolder" />
        </div>
        <bacab-notifications/>
    </div>
</template>

<script>
    import BacabNotifications from "./components/bacabNotifications";
    import { mapState } from 'vuex';

    export default {
        name: "bacabHeader",
        components: {BacabNotifications},
        computed: {
            ...mapState('general', ['locale'])
        },
    }
</script>
