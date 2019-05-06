<template>
        <div><i class="far fa-clock"></i>&nbsp;{{ h }} : {{ m }} : {{ s }}</div>
</template>

<script>
    export default {
        name: "bacabClock",
        data: function () {
            return {
                h: String,
                m: String,
                s: String
            };
        },
        mounted: function () {
            //console.log('mounted', this.$options._componentTag);
            setInterval( this.updateClock, 100 );
        },
        methods: {
            updateClock: function () {
                var now = new Date();
                this.h = this.leftPad( '' + now.getHours() );
                this.m = this.leftPad( '' + now.getMinutes() );
                this.s = this.leftPad( '' + now.getSeconds() );
            },
            leftPad: function ( str ) {
                const leftPad = '00';
                return leftPad.substring( 0, leftPad.length - str.length ) + str;
            }
        },
    }
</script>

<style scoped>
    .h30{ height:30px }
</style>