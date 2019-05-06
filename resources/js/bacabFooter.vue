<template>
    <footer class="footer">
        <p><span class="footer__copyright">&copy;</span> 2019 SmartHospital</p>
        <bacab-panel/>
    </footer>
</template>

<script>
    import BacabClock from "./components/bacabClock";
    import BacabPanel from "./bacabPanel";
    export default {
        name: "bacabFooter",
        components: {BacabPanel, BacabClock}
    }
</script>

<style scoped>

</style>