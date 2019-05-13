<template>
    <div class="box box--no-shadow ">
        <div class="box__header">
            <!--Paginator-->
            <h3 class="box__title">{{ title }}</h3>
            <div class="header-buttons__main-buttons">
                <el-tooltip class="item" effect="dark" content="Recargar Datos de La Tabla" placement="top-start">
                    <el-button @click="queryMethod()" icon="el-icon-refresh" circle></el-button>
                </el-tooltip>
            </div>
            <div class="header-buttons__secondary-buttons">
                <el-pagination
                        @size-change="queryMethod()"
                        @current-change="queryMethod()"
                        current-page.sync="currentPage"
                        :page-sizes="pageSizes"
                        :page-size="filters.pageSize"
                        layout="total, sizes, prev, pager, next, jumper"
                        :total="totalRecords">
                </el-pagination>
            </div>
        </div>
        <div class="box__body">
            <el-table
                    :data="dataArray"
                    v-loading="loading"
                    highlight-current-row
                    :height="tableHeight"
                    border>

                <!--Index-->

                <el-table-column
                        type="index"
                        :index="indexFunction"
                        width="50"/>

                <template v-for="(column,index) in config">

                    <!--Columnas Con Filtro-->

                    <el-table-column
                            v-if="column.header.filter != null"
                            :key="index"
                            :label="column.header.name"
                            :prop="column.header.prop"
                            :width="column.header.width ? column.header.width : auto"
                            :fixed="column.header.fixed">
                        <template slot="header" slot-scope="props">
                            <div class="bacab-table__header-container" style="display: grid">
                                <!--Header-->
                                <label class="bacab-table__header-container__item">{{ column.header.name }}</label>


                                <!--Filtros-->

                                    <!--Input-->
                                <el-input style="width: 100%"
                                          v-if="column.header.filter.type === 'input'"
                                          v-model.lazy="filters[column.header.prop]"
                                          @keyup.enter.native="queryMethod()"
                                          class="bacab-table__header-container__item"
                                          size="mini"
                                          clearable
                                          placeholder="Enter para buscar"/>

                                <!--Date Range-->

                                <el-date-picker
                                        style="width: 100%"
                                        class="bacab-table__header-container__item"
                                        v-if="column.header.filter.type === 'date'"
                                        v-model.lazy="filters[column.header.prop]"
                                        type="daterange"
                                        clearable
                                        :change="queryMethod()"
                                        size="mini"
                                        range-separator="To"
                                        start-placeholder="Start date"
                                        end-placeholder="End date"/>

                                <!--Select Multiple-->

                                <template v-if="column.header.filter.type === 'select'">


                                    <el-select
                                            style="width: 100%"
                                            clearable
                                            class="bacab-table__header-container__item"
                                            :change="queryMethod()"
                                            size="mini"
                                            v-model="filters[column.header.prop]"
                                            placeholder="Select">
                                            <el-option
                                                    v-if="column.header.filter.options != null"
                                                    v-for="(item, index) in column.header.filter.options"
                                                    :key="index"
                                                    :label="item.label"
                                                    :value="item.value">
                                            </el-option>
                                    </el-select>
                                </template>

                                <slot v-if="column.header.filter.type === 'slot'" v-bind="props" :name="column.header.filter.slot" />
                            </div>
                        </template>

                        <!--Body Slot-->
                        <template slot-scope="props" v-if="column.body != null && column.body.slot != null && column.body.type === 'slot'">
                                <slot v-bind="props" :name="column.body.slot "></slot>
                        </template>

                        <template slot-scope="obj" v-if="column.body != null && column.body.type === 'text'">
                            {{ obj.row[column.body.prop] }}
                        </template>
                    </el-table-column>

                    <!--Columnas sin filtro-->

                    <el-table-column
                            v-else
                            :key="index"
                            :label="column.header.name"
                            :prop="column.header.prop"
                            :width="column.header.width"
                            :fixed="column.header.fixed">

                        <!--Header Slot-->
                        <template slot="header" props>
                            <div class="bacab-table__header-container" style="display: grid">
                                <label class="bacab-table__header-container__item">{{ column.header.name }}</label>
                            </div>
                        </template>

                        <!--Body Slot-->

                        <template slot-scope="props" v-if="column.body != null && column.body.slot != null && column.body.type === 'slot'">
                            <slot v-bind="props" :name="column.body.slot "></slot>
                        </template>

                    </el-table-column>
                </template>

            </el-table>
        </div>
    </div>
</template>

<script>
    import { cloneDeep } from 'lodash';
    import qs from 'qs';
    export default {
        props: {
            title: String,
            tableConfig: Array,
            remoteUrl: String,
            dataManipulationMethod: Function,
            updateValue: Number
        },
        data(){
            return {
                config: [],
                tableHeight: 0,
                error: null,
                lastSearch: 0,
                filters: {
                    pageSize: 25,
                },
                dataArray: [],
                currentPage: 1,
                pageSizes: [25, 50, 75, 100],
                totalRecords: null,
                from: 1,
                loading: false
            }
        },
        created(){
            this.init();
        },
        mounted(){
            this.queryMethod();
        },
        watch: {
            updateValue(){
                this.queryMethod();
            }
        },
        /*errorCaptured (err, vm, info) {
            this.error = `${err.stack}\n\nfound in ${info} of component`
            return false
        },*/
        methods: {
            init(){
                this.setFilters();
                this.responsiveConfig();
                this.setHeight();
            },
            responsiveConfig(){
                let arrayList = this.createList();
                this.config = cloneDeep(this.tableConfig);
                if(arrayList.tableWidth<(arrayList.windowWidth - 20)){
                    arrayList.includeList.forEach(item => {
                        if(this.config[item].header.name !== 'Acciones' || this.config[item].header.name !== 'Actions'){
                            this.config[item].header.width = 'auto'
                        }
                    })
                }
            },
            createList(){
                let arrayList = {excludeList:[], includeList: [], tableWidth: 0, windowWidth: 0};
                this.tableConfig.forEach( (item, index) => {
                    if(item.header.width != null){
                        if(item.header.fixedWidth === true || item.header.width >= '350px'){
                          arrayList.excludeList.push(index);
                        } else {
                          arrayList.includeList.push(index);
                        }

                        arrayList.tableWidth += Number((item.header.width.split('px'))[0])
                    }
                });

                arrayList.windowWidth =  $(window).width()

                return arrayList;
            },
            setHeight(){
                this.tableHeight =  ($(window).height())-290;
                console.log(this.tableHeight)
            },
            indexFunction(index){
                return index * this.from;
            },
            setFilters(){
                this.tableConfig.forEach( item => {
                   if(item.header.filters !== null){
                       if(item.header.prop !== null || typeof item.header.prop !== undefined){
                           this.$set(this.filters, item.header.prop, null );
                       }
                   }
                });
            },
            async queryMethod() {
                let now = new Date();

                return new Promise(async (resolve, reject) => {
                    if (now - this.lastSearch > 900) {
                        this.lastSearch = now;
                        this.loading = true;
                        let filters = cloneDeep(this.filters);
                        filters = qs.stringify(filters);
                        let url = this.remoteUrl + '?page=' + this.currentPage;
                        await axios.get(url + '&' + filters).then((response) => {
                            if (this.dataManipulationMethod) {
                                this.from = response.data.from;
                                this.totalRecords = response.data.total;
                                this.dataArray = this.dataManipulationMethod(response.data.data);
                                this.loading = false;
                            } else {
                                this.from = response.data.from;
                                this.totalRecords = response.data.total;
                                this.dataArray = response.data.data;
                                this.loading = false;
                            }
                            console.log('load');
                        }).catch(response => {
                            this.$message.error('Error al cargar los datos');
                            this.loading = false;
                            console.error('ERROR ' + response);
                        });
                    }
                })
            }
        },
        name: "bacabTables"
    }
</script>
