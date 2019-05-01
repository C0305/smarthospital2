<template>
    <div  @click="openAside()" class="sidenav__profile">
        <bacab-aside :close-function="closeAside" :name="bacabAsideText" v-if="newElementAside === true">
            <template slot="content">
                <div class="box">
                    <div class="box__header">
                        <h3 class="box__title">{{ bacabAsideText }}</h3>
                    </div>
                    <div class="box__body">
                    </div>
                </div>
            </template>
            <template slot="buttons">
                <el-button
                        size="mini"
                        icon="fas fa-save"
                        round>
                    Save
                </el-button>
            </template>
        </bacab-aside>

        <avatar class="sidenav__profile-avatar" :username="userData.name"
                :size="60">
        </avatar>
        <div class="sidenav__profile-title text-light">{{ userData.name }}</div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import Avatar from 'vue-avatar';
    import BacabAside from "./bacabAside";
    export default {
        name: "bacabSidebarProfile",
        components:{BacabAside, Avatar},
        computed:mapState({
            userData: state => state.general.user,
        }),
        data(){
            return {
                bacabAsideText: "asdasd",
                newElementAside: false,
            }
        },
        methods: {
            openAside(){
                this.newElementAside = true;
            },
            closeAside(){
                this.newElementAside = false;
            }
        }
    }
</script>

<style scoped>

</style>