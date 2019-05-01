<template>
       <section>
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
            <bacab-tables title="Listado de Pacientes" :update-value="patients" remote-url="/ehr/patients/index/" >
                <template slot="actionSlot"  slot-scope="obj">
                    <div style="rigth: 0">
                        <el-button
                                size="small"
                                round
                                type="info"
                                icon="fas fa-edit">
                            <b>Editar</b>
                        </el-button>
                        <el-button
                                size="small"
                                round
                                type="danger"
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
 export default {
        name: "index",
 }
</script>