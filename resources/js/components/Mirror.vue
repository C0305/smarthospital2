<template>
    <transition name="component-fade" mode="out-in">
        <keep-alive>
            <router-view :key="$route.fullPath"/>
        </keep-alive>
    </transition>
</template>

<script>
    import index from '../global/misc/index'

    export default {
        name: 'Mirror',
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
