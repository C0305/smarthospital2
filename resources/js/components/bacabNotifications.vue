<template>
    <div class="header__notifications">
        <span @click="openAside" class="fas fa-bell"></span>
        <bacab-plain-aside :close-function="closeAside" :name="'Texto de prueba'" v-if="newElementAside === true">
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
        </bacab-plain-aside>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import bacabPlainAside from './bacabPlainAside'
    export default {
        name: "bacabNotifications",
        components: {bacabPlainAside},
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