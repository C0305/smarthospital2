<template>
    <section>
        <bacab-aside  :name="bacabAsideText">
            <template slot="content">
                <model-inventory-form/>
            </template>
        </bacab-aside>
        <div class="header-buttons">
            <div class="header-buttons__main-buttons">
                <el-button
                    size="small"
                    round
                    @click="openAside()"
                    icon="glyphicon glyphicon-floppy-open">
                    <b>Nuevo Modelo</b>
                </el-button>
            </div>
        </div>
    </section>
</template>
<script>
 import modelInventoryForm from './modelInventoryForm';
 import aside from "../../../global/mixins/aside";
 import BacabAside from '../../../components/bacabAside';
 export default {
     name: "index",
     mixins: [ aside ],
     components: {BacabAside, modelInventoryForm},
     data() {
         return {
             bacabAsideText: 'Formulario del Modelo'
         }
     },
     methods: {

     }
 }
</script>