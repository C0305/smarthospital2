<template>
    <div class="header__notifications">
        <span @click="openAside" class="fas fa-bell"></span>
        <bacab-simple-aside :close-function="closeAside" :name="this.$parent.locale.system.NotificationsAsideName"
                            v-if="newElementAside === true">
            <template slot="content">
                <div class="box">
                    <div class="box__header">
                        <h3 class="box__title">sisiis</h3>
                    </div>
                    <div class="box__body">
                        <el-table>

                        </el-table>
                    </div>
                </div>
            </template>
        </bacab-simple-aside>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import BacabSimpleAside from "./bacabSimpleAside";
    export default {
        name: "bacabNotifications",
        components: {BacabSimpleAside},
        data() {
            return {
                newElementAside: false
            }
        },
        methods:{
            openAside(){
                this.newElementAside = true;
            },

            closeAside(value){
                this.newElementAside = false;
            }

        },
        computed:mapState({
            newNotification: state => state.general.bacabUIEvents.bacabNewNotification
        })
    }
</script>

<style scoped>

</style>