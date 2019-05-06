<template>
    <div class="tabs">
        <div
                v-for="(tab, key) in tabs"
                :key="`title-${key}`"
                class="tab"
                :class="{'tab active': selected === tab.name}"
                @click="select(tab)"
        >
            <div class="tab-box">
                {{ tab.label }}
                <span class="tab-closer" @click="close(tab, $event)">&times;</span>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    export default {
        name: "bacabTabsControl",
        methods: {
            select(tab) {
                if(this.bacabAsideStatus === false){
                    this.$parent.select(tab);
                }
            },
            close(tab, event){
                this.$parent.close(tab, event)
            }
        },
        computed: {
            tabs(){
                return this.$parent.tabs;
            },
            selected(){
                return this.$parent.selected
            },
            bacabAsideStatus(){
                return this.$store.state.general.bacabUIEvents.bacabAsideOpen
            }

        }
    }
</script>

<style scoped>
    .tabs {
        height:45px;
        padding: 0 0 0 0;
        overflow:visible;
        width: 100%;
        border-bottom: solid #FFFFFF;

    }
    .tab {
        width:auto;
        height:32px;
        overflow:hidden;
        float:left;
        margin:0 0 0 0;
        min-width: 100px;
    }


    .tab-box {
        height:15px;
        background: #eee;
        border-radius: 4px;
        border:1px solid #ccc;
        margin:0 5px 0;
        box-shadow: 0 0 2px  #eee inset;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 5px;
        padding-bottom: 15px;
    }

    .tab-closer {
        float: inline-end;
    }

    .tab.active {
        z-index:1;
        position:relative;
        padding-bottom:0px;
    }
    .tab.active .tab-box{
        background-color: #FFFFFF;
    @include background-image(linear-gradient(top, #ccc , #ddd 3%, rgba(#eee, 0.5)  ));
        box-shadow: 0 0 2px 0 #fff inset;
    }

    .content {
        z-index:1;
        padding:100px;
        border:1px solid #ccc;
        background:#eee;
        position:relative;

    }

    .clear {
        clear:both;
    }
</style>