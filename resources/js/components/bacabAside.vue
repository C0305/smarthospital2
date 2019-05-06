<template>
    <transition name="fade">
        <div class="lateral-aside">
            <div class="lateral-aside__top-bar">
                <span type="button" class="fas fa-times-circle" @click="close"></span>
                <p>{{ name }}</p>
            </div>
            <div     v-loading="loading"
                     element-loading-text="Espera, los datos estan cargando..."
                     class="lateral-aside__aside-content ">
                <div class="lateral-aside__content-panel">
                    <div class="lateral-aside__content-panel-body">
                        <slot name="content"></slot>
                    </div>
                </div>
            </div>
            <div class="lateral-aside__bottom-bar">
                <template v-if="saveButton === false">
                    <slot name="buttons"></slot>
                </template>
                <template v-else-if="saveButton === true" >
                    <el-button v-if="loading === false" size="mini" icon="fas fa-save" @click="saveAndClose" round>
                        Guardar
                    </el-button>
                    <el-button v-else size="mini" icon="fas fa-save" disabled round>
                        Guardar
                    </el-button>
                </template>
            </div>
        </div>
    </transition>
</template>

<script>
    import aside from "../global/mixins/aside";
    export default {
        name: "bacabAside",
        mixins: [ aside ],
        props: {
            saveButton: Boolean,
            saveButtonFunction: Function,
            name: String,
            closeFunction: Function,
        },
        data(){
            return {
                loading: false,
            }
        },
        created(){
            this.$store.dispatch('general/bacabAsideOpenClose', true)
        },
        mounted(){
            document.body.insertBefore(this.$el, document.body.firstChild)
        },
        methods: {
            close() {
                this.$confirm('Estas a punto de cerrar el lateral ¿Desea continuar?', 'Warning', {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                }).then(() => {
                    if(this.closeFunction != null){
                        this.closeFunction();
                    }
                    this.closeAside()
                });

            },
            saveAndClose(){
                this.loading = true;
                this.saveButtonFunction().then( (resolve) => {
                    console.log('then');
                    if(this.closeFunction != null){
                        this.closeFunction();
                    }
                    this.loading = false;
                    this.closeAside()
                }).catch((reject) => {
                    console.log('Error');
                    console.log(reject);
                    this.$message.error('Ocurrio un error en el formulario: '+this.name);
                    this.loading = false;
                });

            }
        }
    }
</script>

<style scoped>
    .fade-enter-active {
        animation: slide-in .5s;
    }

    .fade-leave-active {
        animation: slide-in .5s reverse;
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
            margin-left: 30%;
            width: 70%;
        }
    }
</style>