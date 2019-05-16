<template>
    <div class="box">
        <div class="box__header">
            <h3 class="box__title">{{ bacabAsideText }}</h3>
        </div>
        <div class="box__body">
            <el-form :model="form" :rules="formRules" ref="brandsForm" status-icon label-width="120px" >
                <el-form-item label="Imagenes" prop="images">
                    <el-upload
                            class="avatar-uploader"
                            action="/web/fileUpload"
                            :show-file-list="false"
                            :on-success="handleAvatarSuccess"
                            :before-upload="beforeAvatarUpload">
                        <img v-if="imageUrl" :src="imageUrl" class="avatar">
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                    </el-upload>
                </el-form-item>
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
                this.$refs.brandsForm.validate((valid) => {
                    if (valid) {
                        return true;
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            }
        }
    };
</script>

<style scoped>

</style>