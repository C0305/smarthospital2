<template>
    <div class="box">
        <div class="box__header">
            <h3 class="box__title">{{ bacabAsideText }}</h3>
        </div>
        <div class="box__body">
            <el-form :model="form" :rules="formRules" ref="brandsForm" status-icon label-width="120px" >
                <el-form-item label="Marca" prop="name">
                    <el-input size="small" type="text" v-model="form.name" autocomplete="on"></el-input>
                </el-form-item>
                <el-form-item label="Website" prop="website">
                    <el-input type="text" size="small" v-model="form.website" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="Notas" prop="note">
                    <el-input size="small" type="textarea" v-model="form.note" autocomplete="on"></el-input>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>
    import formRules from './formRules';

    export default {
        name: 'brandsInventoryForm',
        data() {
            return {
                bacabAsideText: 'Formulario de Marcas',
                form: this.$parent.$parent.dataForm,
                formRules

            }
        },
        methods: {
            submitForm()
            {
                let $returnData;
                this.$refs.brandsForm.validate((valid) => {
                    if (valid) {
                        $returnData = true;
                    } else {
                        console.log('error submit!!');
                        $returnData = false;
                    }
                });
                return $returnData;
            }
        }
    };
</script>

<style scoped>

</style>