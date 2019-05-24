<template>
    <div class="box">
        <div class="box__header">
            <h3 class="box__title">{{ bacabAsideText }}</h3>
        </div>
        <div class="box__body">
            <el-form label-position="top" :model="form" :rules="formRules" ref="brandsForm" status-icon label-width="120px" >
                <el-tabs type="border-card">
                    <el-tab-pane>
                        <span slot="label"><i class="el-icon-grape"></i> General</span>
                        <el-row :gutter="20">
                            <el-col :span="8">
                                <el-upload
                                        class="avatar-uploader"
                                        :action="routes.system.upload"
                                        :show-file-list="false"
                                        :headers="headerObject"
                                        :on-success="handleAvatarModelSuccess">
                                    <img v-if="imgSrc" :src="imgSrc" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="Marca" prop="brand_id">
                                    <el-select style="width: 100%" v-model="form.brand_id" placeholder="Marca">
                                        <el-option
                                                v-for="item in selectBrands.brandsArray"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Nombre/Modelo" prop="name">
                                    <el-input type="text" size="small" v-model="form.name" autocomplete="off"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col>
                                <el-form-item label="Categoría" prop="category_id">
                                    <el-select style="width: 100%" v-model="form.category_id" placeholder="Categoría">
                                        <el-option
                                                v-for="item in selectCategories"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col>
                                <el-form-item label="Subcategoría" prop="subcategory_id">
                                    <el-select style="width: 100%" v-model="form.subcategory_id" placeholder="Subcategoría">
                                        <el-option
                                                v-for="item in selectSubCategories"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col>
                                <el-form-item label="RFAAC" prop="rfaac">
                                    <el-select style="width: 100%" v-model="form.rfaac" placeholder="RFAAC">
                                        <el-option
                                                v-for="item in selectRfaac"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col>
                                <el-form-item label="Website" prop="website">
                                    <el-input size="small" type="text" v-model="form.website" autocomplete="on"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col>
                                <el-form-item label="voltage" prop="voltage">
                                    <el-input size="small" type="text" v-model="form.voltage" autocomplete="on"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row :gutter="20">
                            <el-col>
                                <el-form-item label="Notas" prop="note">
                                    <el-input size="small" type="textarea" v-model="form.note" autocomplete="on"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                    </el-tab-pane>
                    <el-tab-pane>
                        <span slot="label"><i class="el-icon-files"></i> File</span>
                        <el-upload
                                class="upload-demo"
                                :action="routes.system.upload"
                                :on-success="fileSuccess"
                                multiple
                                :on-preview="onPreview"
                                :on-remove="fileRemoved"
                                :headers="headerObject"
                                :file-list="fileList">
                            <el-button size="small" type="primary">Click to upload</el-button>
                            <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
                        </el-upload>
                    </el-tab-pane>
                </el-tabs>
            </el-form>
        </div>
    </div>
</template>
<style>
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }
    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }
    .avatar {
        width: 178px;
        height: 178px;
        display: block;
    }
</style>

<script>
    import formRules from './formRules';
    import cmmsMixin from '../../../global/mixins/cmms'
    import general from '../../../global/mixins/general'
    export default {
        mixins: [ cmmsMixin, general ],
        name: 'brandsInventoryForm',
        data() {
            return {
                hheader:{'X-CSRF-TOKEN': tokenfrsc.content},
                bacabAsideText: 'Formulario de Marcas',
                form: this.$parent.$parent.dataForm,
                headerObject: {'X-CSRF-TOKEN': window.tokenfrsc.content},
                formRules,
                imgSrc: '',
                fileList: []
            }
        },
        methods: {
            fileRemoved(file, fileList){
                this.form.files = Object.assign({},fileList);
            },
            handleAvatarModelSuccess(response,file) {
                this.imgSrc = this.CDN+ response.replace('//','/');
            },
            fileSuccess(response, file, fileList){
                this.form.files = Object.assign({},fileList);
            },
            onPreview(a,){
                 window.open(this.CDN + a.response);
            },
            submitForm()
            {
                let $returnData = null;
                this.$refs.brandsForm.validate((valid) => {
                    if (valid) {
                        $returnData = true;
                    } else {
                        console.log('error submit!!');
                        $returnData = false;
                    }
                });
                return $returnData
            }
        }
    };
</script>

<style scoped>

</style>