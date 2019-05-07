<template>
    <ul class="navList">
        <li class="navList__heading">MENU<i class="fas fa-compass"></i></li>
        <li>
            <div class="navList__subheading-no-after row row--align-v-center" @click="open('/home','Home')">
                <span class="navList__subheading-icon"><i class="fas fa-home"></i></span>
                <span class="navList__subheading-title" >Home</span>
            </div>
        </li>
        <li v-for="(item) in menuArray">
            <template v-if="typeof item.route === undefined">
                <div class="navList__subheading-no-after row row--align-v-center"
                     @click="open(item.route,item.name)">
                    <span class="navList__subheading-icon"><i :class="item.icon"></i></span>
                    <span class="navList__subheading-title" >{{ item.name }}</span>
                </div>
            </template>
            <template v-else>
                <div class="navList__subheading row row--align-v-center">
                    <span class="navList__subheading-icon"><i :class="item.icon"></i></span>
                    <span class="navList__subheading-title">{{ item.name }}</span>
                </div>
                <ul  class="subList subList--hidden" >
                    <li v-for="(itemm) in item.childs" :key="itemm.id" @click="open(itemm.route,itemm.name)"class="subList__item"><span class="far fa-dot-circle"></span>{{' '+itemm.name }}</li>
                </ul>
            </template>

        </li>
    </ul>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "bacabSideBarMenu",
        methods:{
            open(route, name){
                if(this.bacabAsideStatus === false){
                    this.$parent.open(route, name)
                }
            }
        },
        computed:mapState({
            menuArray: state => state.general.menu,
            bacabAsideStatus: state => state.general.bacabUIEvents.bacabAsideOpen
        })

    }
</script>

<style scoped>

</style>