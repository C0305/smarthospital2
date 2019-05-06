<template>
    <section>
        <!--Formulario-->
        <bacab-aside  save-button :save-button-function="saveForm" :name="bacabAsideText" v-if="asideOpenClose === true">
            <template slot="content">
                <div class="box">
                    <div class="box__header">
                        <h3 class="box__title">{{ bacabAsideText }}</h3>
                    </div>
                    <div class="box__body box--box-aside-hight">
                        <el-form ref="patientForm"
                                 size="mini"
                                 status-icon
                                 :label-position="labelPosition"
                                 :model="form"
                                 :rules="rules"
                                 label-width="120px">
                            <el-tabs type="border-card">
                                <el-tab-pane>
                                    <span slot="label"><i class="el-icon-info"></i> Información Básica</span>
                                        <el-row>
                                            <el-col :span="24">
                                                <el-form-item label="Nombre" prop="name">
                                                    <el-input
                                                            v-model="form.name"
                                                            type="text"
                                                            placeholder="Escribe el nombre del paciente"
                                                            prefix-icon="el-icon-edit">
                                                    </el-input>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>
                                        <el-row>
                                            <el-col :span="12">
                                                <el-form-item label="Apellido Paterno" prop="last_name">
                                                    <el-input
                                                            v-model="form.last_name"
                                                            type="text"
                                                            placeholder="Escribe el nombre del paciente"
                                                            prefix-icon="el-icon-edit">
                                                    </el-input>
                                                </el-form-item>
                                            </el-col>
                                            <el-col :span="12">
                                                <el-form-item label="Apellido Materno" >
                                                    <el-input
                                                            v-model="form.mother_last_name"
                                                            type="text"
                                                            placeholder="Escribe el nombre del paciente"
                                                            prefix-icon="el-icon-edit">
                                                    </el-input>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>
                                        <el-row>
                                            <el-col :span="6">
                                                <el-form-item label="Sexo" prop="gender">
                                                    <el-select filterable v-model="form.gender" placeholder="Seleciona el sexo">
                                                        <el-option
                                                                v-for="item in tableConfig[1].header.filter.options"
                                                                :key="item.value"
                                                                :label="item.label"
                                                                :value="item.value">
                                                        </el-option>
                                                    </el-select>
                                                </el-form-item>
                                            </el-col>
                                            <el-col :span="6">
                                                <el-form-item label="Fecha de nacimiento" prop="birthday">
                                                    <div class="block">
                                                        <el-date-picker
                                                                v-model="form.birthday"
                                                                type="date"
                                                                prefix-icon="el-icon-date"
                                                                placeholder="Toma un día">
                                                        </el-date-picker>
                                                    </div>
                                                </el-form-item>
                                            </el-col>
                                            <el-col :span="6">
                                                <el-form-item label="Tipo de sangre" prop="blood_group">
                                                    <el-select filterable v-model="form.blood_group" placeholder="Selecciona el tipo de sangre">
                                                        <el-option
                                                                v-for="item in tableConfig[3].header.filter.options"
                                                                :key="item.value"
                                                                :label="item.label"
                                                                :value="item.value">
                                                        </el-option>
                                                    </el-select>
                                                </el-form-item>
                                            </el-col>
                                            <el-col :span="6">
                                                <el-form-item label="Estado civil">
                                                    <el-select filterable v-model="form.marital_status" placeholder="Selecciona un estado civil">
                                                        <el-option
                                                                v-for="item in maritalStatus"
                                                                :key="item.value"
                                                                :label="item.label"
                                                                :value="item.value">
                                                        </el-option>
                                                    </el-select>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>
                                        <el-row>
                                            <el-col :span="24">
                                                <el-form-item label="Alergías">
                                                    <el-input v-model="form.allergies"
                                                              type="textarea"
                                                              :rows="3"
                                                              placeholder="Alergías del paciente"
                                                              prefix-icon="el-icon-edit">

                                                    </el-input>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>
                                </el-tab-pane>
                                <el-tab-pane>
                                    <span slot="label"><i class="fas fa-envelope-square"></i> Información de Contacto</span>
                                    <el-row>
                                        <el-col :span="12">
                                            <el-form-item label="Telefono" prop="mobile">
                                                <template>
                                                    <el-input v-model="form.mobile"
                                                              type="text"
                                                              placeholder="Escribe el telefono celular"
                                                              prefix-icon="fas fa-mobile-alt">

                                                    </el-input>
                                                </template>
                                            </el-form-item>
                                        </el-col>
                                        <el-col :span="12">
                                            <el-form-item label="E-Mail" prop="email">
                                                <template>
                                                    <el-input v-model="form.email"
                                                              type="text"
                                                              placeholder="Escribe el correo del paciente"
                                                              prefix-icon="fas fa-at">

                                                    </el-input>
                                                </template>
                                            </el-form-item>
                                        </el-col>
                                    </el-row>
                                </el-tab-pane>
                                <el-tab-pane>
                                    <span slot="label"><i class="fas fa-map-marked-alt"></i> Dirección</span>
                                    <el-row>
                                        <el-col :span="12">
                                            <el-form-item label="Calle" prop="street">
                                                <el-input v-model="form.address.street"
                                                          type="text"
                                                          placeholder="Escribe el correo del paciente"
                                                          prefix-icon="fas fa-road">

                                                </el-input>
                                            </el-form-item>
                                        </el-col>
                                        <el-col :span="6">
                                            <el-form-item label="Numero"
                                                          >
                                                <el-input v-model="form.address.number"
                                                          type="text"
                                                          placeholder="Escribe el correo del paciente"
                                                          prefix-icon="fas fa-hashtag">

                                                </el-input>
                                            </el-form-item>
                                        </el-col>
                                        <el-col :span="6">
                                            <el-form-item label="Numero Interior">
                                                <el-input v-model="form.address.apartment_number"
                                                          type="text"
                                                          placeholder="Escribe el correo del paciente"
                                                          prefix-icon="fas fa-hashtag">

                                                </el-input>
                                            </el-form-item>
                                        </el-col>
                                    </el-row>

                                    <el-row>
                                        <el-col :span="12">
                                            <el-form-item label="Colonia"
                                                          >
                                                <el-input v-model="form.address.neighbourhood"
                                                          type="text"
                                                          placeholder="Escribe el correo del paciente"
                                                          prefix-icon="fas fa-home">

                                                </el-input>
                                            </el-form-item>
                                        </el-col>
                                        <el-col :span="6">
                                            <el-form-item label="Ciudad"
                                                          >
                                                <el-input v-model="form.address.city"
                                                          type="text"
                                                          placeholder="Escribe el correo del paciente"
                                                          prefix-icon="fas fa-city">

                                                </el-input>
                                            </el-form-item>
                                        </el-col>

                                        <el-col :span="6">
                                            <el-form-item label="Codigo Postal">
                                                <el-input v-model="form.address.zip_code"
                                                          type="text"
                                                          placeholder="Escribe el correo del paciente"
                                                          prefix-icon="fas fa-hashtag">
                                                </el-input>
                                            </el-form-item>
                                        </el-col>
                                    </el-row>

                                    <el-row>
                                        <el-col :span="6">
                                            <el-form-item label="Estado" >
                                                <el-select filterable v-model="form.address.state" placeholder="Seleciona el sexo">
                                                    <el-option
                                                            v-for="item in mexicoStates"
                                                            :key="item.id"
                                                            :label="item.label"
                                                            :value="item.id">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
                                        </el-col>
                                    </el-row>
                                </el-tab-pane>
                        </el-tabs>
                        </el-form>
                    </div>
                </div>
            </template>
        </bacab-aside>



        <div class="header-buttons">
            <div class="header-buttons__main-buttons">
                <el-button
                    size="small"
                    round
                    @click="newPatient()"
                    icon="glyphicon glyphicon-floppy-open">
                    <b>Ingresar Paciente</b>
                </el-button>
            </div>
        </div>

        <div class="main-panel">
            <bacab-tables title="Listado de Pacientes" :update-value="patients" remote-url="/ehr/patients/index/" :table-config="tableConfig">
                <template slot="actionSlot"  slot-scope="obj">
                    <div style="rigth: 0">
                        <el-button
                                size="small"
                                round
                                type="info"
                                @click="editPatient(obj.row)"
                                icon="fas fa-edit">
                            <b>Editar</b>
                        </el-button>
                        <el-button
                                size="small"
                                round
                                type="danger"
                                @click="deletePatient(obj.row)"
                                icon="fas fa-trash-alt">
                            <b>Borrar</b>
                        </el-button>
                    </div>
                </template>
                <template slot="nameSlot"  slot-scope="obj">
                    {{ obj.row.name+' '+obj.row.last_name+' '+(obj.row.mother_last_name?  obj.row.mother_last_name : '')}}
                </template>
                <template slot="ageSlot"  slot-scope="obj">
                    <bacab-table-age :birthdate="obj.row.birthday"/>
                </template>
                <template slot="sexSlot"  slot-scope="obj">
                    <bacab-table-sex :sex="obj.row.gender"/>
                </template>
                <template slot="bloodSlot"  slot-scope="obj">
                    {{ obj.row.blood_group }}
                </template>
            </bacab-tables>
        </div>

    </section>
</template>

<script>
    import BacabTables from "../../../components/bacabTables";
    import BacabAside from "../../../components/bacabAside";
    import aside from "../../../global/mixins/aside";
    import general from "../../../global/mixins/general";
    import tables from "../../../global/mixins/tables";
    import tablesMethod from "../../../global/mixins/tablesMethods";
    import BacabTableAge from "../../../global/accessors/bacabTableAge";
    import BacabTableSex from "../../../global/accessors/bacabTableSex";
    export default {
        name: "index",
        mixins: [ aside, general, tables, tablesMethod],
        components: {BacabTableSex, BacabTableAge, BacabAside, BacabTables },
        data() {
            return {
                form: {
                    id: 'nc17',
                    name: '',
                    last_name: '',
                    mother_last_name: '',
                    gender: '',
                    birthday: '',
                    blood_group: '',
                    marital_status: '',
                    allergies: '',
                    mobile: '',
                    email: '',
                    address: {
                        id: 'nc17',
                        street: '',
                        number: '',
                        apartment_number: '',
                        neighbourhood: '',
                        city: '',
                        zip_code: '',
                        state: '',
                    }
                },
                rules: {
                    name: [
                        { required: true, message: 'El nombre es requerido', trigger: ['blur', 'change']  },
                    ],
                    last_name: [
                        { required: true, message: 'El nombre es requerido', trigger: ['blur', 'change']  },
                    ],
                    gender: [
                        { required: true, message: 'Es requerido saber el sexo del paciente', trigger: ['blur', 'change']  }
                    ],
                    blood_group: [
                        { required: true, message: 'Se requiere el tipo de sangre para continuar',trigger: ['blur', 'change']  }
                    ],
                    birthday: [
                        { type: 'date', required: true, message: 'Por favor ingrese la fecha de nacimiento del paciente', trigger: 'change' }
                    ],
                    mobile: [
                        { required: true, message: 'Nececitamos un numero de telefono', trigger: ['blur', 'change']  },
                    ],
                    email: [
                        { type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change'] }
                    ],
                },
                labelPosition: 'top',

                maritalStatus: [
                    {
                        value: 'Soltero',
                        label: 'Soltero'
                    },
                    {
                        value: 'Casado',
                        label: 'Casado'
                    },
                    {
                        value: 'Separado',
                        label: 'Separado'
                    },
                    {
                        value: 'Divorciado',
                        label: 'Divorciado'
                    },


                ],

                bacabAsideText: 'Nuevo Paciente',
                modalOpen: false,
                tableConfig: [
                    {
                        header: {
                            name: 'Nombre',
                            prop: 'fullname',
                            width: '350px',
                            filter: {
                                type: 'input'
                            }
                        },
                        body:{
                            type: 'slot',
                            slot: 'nameSlot'
                        }


                    },
                    {
                        header: {
                            name: 'Sexo',
                            prop: 'gender',
                            width: '200px',
                            filter: {
                                type: 'select',
                                options: [
                                    {
                                        value: 'Masculino',
                                        label: 'Masculino',
                                    },
                                    {
                                        value: 'Femenino',
                                        label: 'Femenino',
                                    },
                                    {
                                        value: 'Sin especificar',
                                        label: 'Sin especificar',
                                    },
                                    {
                                        value: 'Otro',
                                        label: 'Otro',
                                    },

                                ]
                            }
                        },
                        body:{
                            type: 'slot',
                            slot: 'sexSlot'
                        }
                    },
                    {
                        header: {
                            name: 'Edad',
                            prop: 'getAge',
                            width: '300px',
                            filter: {
                                type: 'input'
                            }
                        },
                        body:{
                            type: 'slot',
                            slot: 'ageSlot'
                        }
                    },
                    {
                        header: {
                            name: 'Grupo sanguíneo',
                            prop: 'blood_group',
                            width: '200px',
                            filter: {
                                type: 'select',
                                options: [
                                    {
                                        value: 'O-',
                                        label: 'O-',
                                    },
                                    {
                                        value: 'O+',
                                        label: 'O+',
                                    },
                                    {
                                        value: 'A−',
                                        label: 'A−',
                                    },
                                    {
                                        value: 'A+',
                                        label: 'A+',
                                    },
                                    {
                                        value: 'B-',
                                        label: 'B-',
                                    },
                                    {
                                        value: 'B+',
                                        label: 'B+',
                                    },
                                    {
                                        value: 'AB',
                                        label: 'AB-',
                                    },
                                    {
                                        value: 'AB+',
                                        label: 'AB+',
                                    },


                                ]
                            }
                        },
                        body:{
                            type: 'slot',
                            slot: 'bloodSlot'
                        }
                    },
                    {
                        header: {
                            name: 'Acciones',
                            width: '200px',
                        },
                        body:{
                            type: 'slot',
                            slot: 'actionSlot'
                        }

                    }
                ]
            }
        },
        methods: {
            newPatient() {
                this.form = {
                    id: 'nc17',
                    name: '',
                    last_name: '',
                    mother_last_name: '',
                    gender: '',
                    birthday: '',
                    blood_group: '',
                    marital_status: '',
                    allergies: '',
                    mobile: '',
                    email: '',
                    address: {
                        id: 'nc17',
                        street: '',
                        number: '',
                        apartment_number: '',
                        neighbourhood: '',
                        city: '',
                        zip_code: '',
                    }
                }
                this.openAside()
            },
            editPatient(patient){
                this.form = JSON.parse(JSON.stringify(patient));
                this.form.birthday = new Date(this.form.birthday);
                this.openAside();
            },
            deletePatient(patient){

            },


            openModal(){
                this.modalOpen ?
                    this.modalOpen = false :
                    this.modalOpen = true;
            },
            saveForm(){
                return new Promise((resolve, reject) => {
                    let url = null;
                    if(typeof(this.form.birthday) == 'object'){
                        this.form.birthday = this.form.birthday.toISOString().slice(0, 19).replace('T', ' ');
                    } else if (typeof(this.form.birthday) === 'string') {
                        this.form.birthday = new Date(this.form.birthday).toISOString().slice(0, 19).replace('T', ' ');

                    }

                    if(this.form.id === 'nc17'){
                        url = '/ehr/patients';
                        axios.post(url, this.form).then((response) => {
                            resolve(response);
                            this.updatePatients();
                        }).catch((response) => {
                            reject(response);
                        })
                    } else {
                        url = '/ehr/patients/'+this.form.id;
                        axios.put(url, this.form).then((response) => {
                            resolve(response);
                            this.updatePatients();
                        }).catch((response) => {
                            reject(response);
                        })
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>