<template>
    <div class="footer__panel">
        <div class="footer__panel__container">
            <div class="footer__panel__item">

            </div>
            <div class="footer__panel__item">
                <bacab-clock/>
            </div>
        </div>
    </div>
</template>

<script>
    import BacabClock from "./components/bacabClock";
    import { mapState } from 'vuex';

    export default {
        name: "bacabPanel",
        components: {BacabClock},
        computed: {
            ...mapState('general', ['locale'])
        },
    }
</script>
