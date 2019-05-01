<template>
    <div class="lateral-aside">
        <div class="lateral-aside__top-bar">
            <span type="button" class="fas fa-times-circle" @click="close"></span>
            <p><b>{{ name }}</b></p>
            <hr>
        </div>
        <div class="lateral-aside_content">
            <div class="lateral-aside_content-panel">
                <div class="lateral-aside_content-panel-body">
                    <slot name="content"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "bacabSimpleAside",
        props: {
            saveButton: Boolean,
            saveButtonFunction: Function,
            name: String,
            closeFunction: Function,
        },
        created() {
            this.$store.dispatch('general/bacabSimpleAside')
        },
        mounted() {
            document.body.insertBefore(this.$el, document.body.firstChild)
        },
        methods: {
            close() {
                this.closeFunction();
                this.$store.dispatch('general/bacabSimpleAside')

            },
        }
    }
</script>

<style scoped>
    .fade-enter-active {
        animation: slide-in .3s;
    }

    .fade-leave-active {
        animation: slide-in .3s reverse;
    }

    .fade-leave-to {
        opacity: 0;
    }

    @keyframes slide-in {
        from {
            margin-left: 100%;
            width: 0%;
        }

        to {
            margin-left: 73%;
            width: 27%;
        }
    }

    .lateral-aside {
        right: 0;
        position: fixed;
        height: 100%;
        background-color: #FFFFFF;
        color: #000000;
        width: 27%;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.35), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
        z-index: 10;
        overflow-x: hidden;
        transition: 0.5s;
    }

    .lateral-aside__top-bar {
        height: 27px;
        background-color: #FFFFFF;
        color: #000000;
        width: 100%;
        position: fixed;
    }

    .lateral-aside__top-bar span {
        float: left;
        margin: 10px 10px;
    }

    .lateral-aside__top-bar span:active {
        color: #a4a7af;
    }

    .lateral-aside__top-bar p {
        display: inline-block;
        margin: 5px 5px;
    }

    .lateral-aside_content {
        width: 100%;
        height: calc(100% - 87px);
        overflow-y: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin-bottom: 10px;
        margin-top: 50px;
    }

    .lateral-aside_content-panel {
        flex: 1;
        width: 96%;
    }

    .lateral-aside_content-panel-body {
        color: #333333;
        margin-left: 0;
        margin-right: 0;
    }
</style>