<template>
    <div>
        <transition name="component-fade" mode="out-in">
            <keep-alive>
                <router-view :key="uuid"/>
            </keep-alive>
        </transition>
    <!-- this options is just for debug -->
        <!--<hr>
        <small>Container</small>
        <pre>{{ $props }}</pre>-->
    </div>
</template>

<script>
    import index  from '../global/misc'

    export default {

        name: "bacabContainer",
        props: {
            name: String,
            label: String
        },
        data: () => ({
            uuid: index()
        })
    }
</script>

<style scoped>
    .component-fade-enter-active, .component-fade-leave-active {
        transition: opacity .3s ease;
    }
    .component-fade-enter, .component-fade-leave-to
        /* .component-fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>