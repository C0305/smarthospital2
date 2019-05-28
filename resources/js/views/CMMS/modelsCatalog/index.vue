<template>
    <section>
        <bacab-aside v-if="formStatus"
                     :name="bacabAsideText"
                     close-prop="formStatus"
                     save-button
                     :save-button-function="saveForm">
            <template slot="content">
                <models-inventory-form ref="formComponentModel"/>
            </template>
        </bacab-aside>
        <div class="header-buttons">
            <div class="header-buttons__main-buttons">
                <el-button
                    size="small"
                    round
                    @click="newBrand()"
                    icon="glyphicon glyphicon-floppy-open">
                    <b>Nuevo Modelo</b>
                </el-button>
            </div>
        </div>
        <div class="main-panel">
            <bacab-tables title="Listado de Marcas"
                          :update-value="updateModels"
                          :remote-url="routes.cmms.models"
                          :table-config="tableConfig">
                <template slot="actionSlot"  slot-scope="obj">
                    <div style="right: 0">
                        <el-button
                                size="small"
                                round
                                type="info"
                                @click="editRow(obj.row)"
                                icon="fas fa-edit">
                            <b>Editar</b>
                        </el-button>
                        <el-button
                                size="small"
                                round
                                type="danger"
                                @click="deleteRow(obj.row)"
                                icon="fas fa-trash-alt">
                            <b>Borrar</b>
                        </el-button>
                    </div>
                </template>
            </bacab-tables>
        </div>
    </section>
</template>
<script>
 import modelsInventoryForm from './modelsInventoryForm';
 import BacabAside from '../../../components/bacabAside';
 import BacabTables from '../../../components/bacabTables'
 import general from '../../../global/mixins/general';
 import tableConfig from './tableConfig'
 import dataForm from './form'
 import {BacabAjax} from '../../../global/misc/bacabAjax';
 import cmmsMixin from '../../../global/mixins/cmms'
 export default {
     name: "index",
     mixins: [ general, cmmsMixin],
     components: {BacabTables, BacabAside, modelsInventoryForm},
     data() {
         return {
             formStatus: false,
             bacabAsideText: 'Formulario del Modelo',
             tableConfig,
             dataForm: Object.assign({},dataForm)
         }
     },
     mounted() {
         console.log(this.dataForm)
     },
     methods: {
         togleMainForm() {
             this.formStatus = !this.formStatus
         },
         deleteRow(row){
             let ajax = new BacabAjax(`${this.routes.cmms.brands}/${row.id}`, this.dataForm, this);
             ajax.delete('cmms/UPDATE_BRANDS')
         },
         newBrand(){
             this.dataForm = Object.assign({},dataForm);
             this.togleMainForm()
         },
         editRow(row){
             this.dataForm = Object.assign({},row);
             this.togleMainForm();
         },
         saveForm() {
             return new Promise((resolve,reject) => {
                 let result = this.$refs.formComponentModel.submitForm();
                 console.log(result);
                 if(result){
                     let form = Object.assign({},this.dataForm);
                     for(let i = 0; i < form.files.length; i++){
                         delete form.files[i].raw
                         delete form.files[i].status
                         delete form.files[i].percentage
                     }
                     if(form.id !== 0){
                         let ajax = new BacabAjax(this.routes.cmms.models, form,this);
                         ajax.store('cmms/UPDATE_MODELS');
                         resolve()
                     } else {
                         let ajax = new BacabAjax(`${this.routes.cmms.brands}/${form.id}`, form, this);
                         ajax.update('cmms/UPDATE_MODELS');
                         resolve()
                     }
                 } else {
                     reject(result);
                 }
             })
         }
     }
 }
</script>