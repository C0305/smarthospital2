<template>
    <div class="box">
        <div class="box__header">
            <h3 class="box__title">{{ bacabAsideText }}</h3>
        </div>
        <div class="box__body">
            <el-form :model="form" status-icon label-width="120px" >
                <el-form-item label="Nombre">
                    <el-input size="small" type="text" v-model="form.name" autocomplete="on"></el-input>
                </el-form-item>
                <el-form-item label="Modelo">
                    <el-input type="text" size="small" v-model="form.model" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="Voltaje">
                    <el-input size="small" type="numbers" v-model="form.voltage" autocomplete="on"></el-input>
                </el-form-item>
                <el-form-item label="Sitio Web">
                    <el-input size="small" type="text" v-model="form.website" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="Descripción">
                    <el-input type="textarea" show-word-limit maxlength="280" v-model="form.description" autocomplete="off"></el-input>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'modelInventoryForm',
        data() {
            return {
                bacabAsideText: 'Modelo',
                form: {
                    id: '0',
                    name: '',
                    model: '',
                    brands_id: null,
                    category_id: null,
                    subcategory_id: null,
                    rfaac: null,
                    // mrequirements: null,
                    // background: '',
                    voltage: '',
                    website: '',
                    description: '',
                }
            }
        }
    };
</script>

<style scoped>

</style>