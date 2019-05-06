 <template>
    <div>
        <bacab-aside :close-function="closeProject" :name="bacabAsideText" v-if="asideOpenClose === true">
            <template slot="content">
                <div class="box">
                    <div class="box__header">
                        <h3 class="box__title">{{ bacabAsideText }}</h3>
                    </div>
                    <div class="box__body">
                        <el-form ref="form" :model="project" label-width="120px">
                            <el-form-item label="Name">
                                <el-input v-model="project.name">
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Description">
                                <el-input type="textarea"
                                          v-model="project.description">
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Hour Value">
                                <el-input type="number"
                                          v-model="project.hour_value">
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Investment">
                                <el-input type="number"
                                          v-model="project.investment">
                                </el-input>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>
            </template>
            <template slot="buttons">
                <el-button
                        size="mini"
                        icon="fas fa-save"
                        @click="save"
                        round>
                    Save
                </el-button>
            </template>
        </bacab-aside>

        <div class="header-buttons">
            <div class="header-buttons__main-buttons">
                <el-button
                        size="mini"
                        icon="fas fa-save"
                        @click="newProject"
                        round>
                    New Project
                </el-button>
            </div>
        </div>
        <div class="main-panel">
            <div class="box">
                <div class="box__header">
                    <h3 class="box__title">Projects List</h3>
                </div>
                <div class="box__body">
                    <el-table
                            :data="tableData"
                            border>
                        <el-table-column type="expand">
                            <template slot-scope="props">
                                <el-table
                                        :data="props.row.childs"
                                        border>
                                    <el-table-column
                                            prop="name"
                                            label="Name"
                                            width="300px">
                                    </el-table-column>
                                    <el-table-column
                                            prop="description"
                                            label="Description"
                                            width="300px">
                                    </el-table-column>
                                    <el-table-column
                                            label="Time Tracking"
                                            width="200px">
                                        <template slot-scope="scope">
                                            <template  v-if="scope.row.start_time_tracking === false">
                                                <el-button circle
                                                           size="small"
                                                           type="success"
                                                           @click="stopwatchStart(scope.row.id)"
                                                           icon="far fa-play-circle">
                                                </el-button>
                                                {{ scope.row.time_tracking_h }}:{{ scope.row.time_tracking_m }}:{{ scope.row.time_tracking_s }}
                                            </template>
                                            <template v-if="scope.row.start_time_tracking === true">
                                                <el-button round
                                                           size="small"
                                                           type="danger"
                                                           @click="stopwatchStop(scope.row.id)"
                                                           icon="fas fa-pause-circle">
                                                    {{ scope.row.time_tracking_h }}:{{ scope.row.time_tracking_m }}:{{ scope.row.time_tracking_s }}
                                                </el-button>
                                            </template>
                                        </template>
                                    </el-table-column>
                                    <el-table-column
                                            label="Time/Money Investment"
                                            width="200px">
                                        <template slot-scope="scope">
                                            <p style="margin-left: 10px">${{ timeMoneyInvesment(scope.row.id) }}</p>
                                        </template>
                                    </el-table-column>
                                    <el-table-column
                                            prop="investment"
                                            label="Investment"
                                            width="120px">
                                        <template slot-scope="scope">
                                            ${{ scope.row.investment }}
                                        </template>
                                    </el-table-column>
                                    <el-table-column
                                            prop="goal"
                                            label="Goal"
                                            width="200px">
                                        <template slot-scope="scope">
                                            <el-tag type="info">{{ scope.row.goal }}</el-tag>
                                        </template>
                                    </el-table-column>
                                    <el-table-column
                                            prop="notes"
                                            label="Notes"
                                            width="100px">
                                        <template slot-scope="scope">
                                            <el-badge style="margin-left: 10px" :value="3" class="item">

                                            </el-badge>
                                        </template>
                                    </el-table-column>
                                    <el-table-column
                                            label="Acciones"
                                            width="180">
                                        <template slot-scope="scope">
                                            <el-button size="mini" @click="editProject(scope.row)" round>Edit</el-button>
                                            <el-button size="mini" type="danger" @click="deleteProject(scope.row.id)" round>Delete</el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </template>
                        </el-table-column>
                        <el-table-column
                                type="index"
                                width="50">
                        </el-table-column>
                        <el-table-column
                                prop="name"
                                label="Name"
                                width="300px">
                        </el-table-column>
                        <el-table-column
                                prop="description"
                                label="Description"
                                width="300px">
                        </el-table-column>
                        <el-table-column
                                label="Time Tracking"
                                width="200px">
                            <template slot-scope="scope">
                                <template  v-if="scope.row.start_time_tracking === false">
                                    <el-button circle
                                               size="small"
                                               type="success"
                                               @click="stopwatchStart(scope.row.id)"
                                               icon="far fa-play-circle">
                                    </el-button>
                                        {{ scope.row.time_tracking_h }}:{{ scope.row.time_tracking_m }}:{{ scope.row.time_tracking_s }}
                                </template>
                                <template v-if="scope.row.start_time_tracking === true">
                                    <el-button round
                                               size="small"
                                               type="danger"
                                               @click="stopwatchStop(scope.row.id)"
                                               icon="fas fa-pause-circle">
                                        {{ scope.row.time_tracking_h }}:{{ scope.row.time_tracking_m }}:{{ scope.row.time_tracking_s }}
                                    </el-button>

                                </template>
                            </template>
                        </el-table-column>
                        <el-table-column
                                label="Time/Money Investment"
                                width="200px">
                            <template slot-scope="scope">
                                <p style="margin-left: 10px">${{ timeMoneyInvesment(scope.row.id) }}</p>
                            </template>
                        </el-table-column>
                        <el-table-column
                                prop="investment"
                                label="Investment"
                                width="120px">
                            <template slot-scope="scope">
                                ${{ scope.row.investment }}
                            </template>
                        </el-table-column>
                        <el-table-column
                                prop="goal"
                                label="Goal"
                                width="200px">
                            <template slot-scope="scope">
                                <el-tag type="info">{{ scope.row.goal }}</el-tag>
                            </template>
                        </el-table-column>
                        <el-table-column
                                prop="notes"
                                label="Notes"
                                width="100px">
                            <template slot-scope="scope">
                                <el-badge style="margin-left: 10px" :value="3" class="item">

                                </el-badge>
                            </template>
                        </el-table-column>
                        <el-table-column
                                label="Acciones"
                                width="180">
                            <template slot-scope="scope">
                                <el-button size="mini" @click="editProject(scope.row)" round>Edit</el-button>
                                <el-button size="mini" type="danger" @click="deleteProject(scope.row.id)" round>Delete</el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import BacabAside from "../../components/bacabAside";
    import aside from "../../global/mixins/aside";
    export default {
        name: "index",
        mixins: [ aside ],
        components: {BacabAside},
        data() {
            return {
                project: {
                    id: '',
                    name: '',
                    description: '',
                    time_tracking_h: 0,
                    time_tracking_m: 0,
                    time_tracking_s: 0,
                    start_time_tracking: false,
                    hour_value: 0,
                    investment: 0,
                    goal: null,
                    notes: [],
                    childs: [

                    ]
                },
                tableData: [
                    {
                        id: '',
                        name: 'project',
                        description: '',
                        time_tracking_h: 2,
                        time_tracking_m: 30,
                        time_tracking_s: 0,
                        start_time_tracking: false,
                        hour_value: 100,
                        investment: 300.25,
                        goal: '100K',
                        notes: [],
                        childs: [
                            {
                                id: '',
                                name: 'project',
                                description: '',
                                time_tracking_h: 2,
                                time_tracking_m: 30,
                                time_tracking_s: 0,
                                start_time_tracking: false,
                                hour_value: 100,
                                investment: 300.25,
                                goal: '100K',
                                notes: [],
                                childs: [

                                ]
                            }
                        ]
                    }
                ],
                newElementAside: false,
                bacabAsideText: 'New Project'
            }
        },
        mounted(){
            this.init()
        },
        methods: {
            init(){
                axios.get('/project/show/').then((response)=>{
                    this.tableData = response.data;
                    let data =  response.data;
                    for(let i = 0; i < data.length; i++){
                        data[i].investment = Number(data[i].investment);
                        data[i].hour_value = Number(data[i].hour_value);
                        data[i].start_time_tracking = data[i].start_time_tracking === 0 ? false : true;
                    }
                });
            },
            editProject(item){
                this.newElementAside = true;
                this.bacabAsideText = 'Edit Project';
                this.project = item;
            },
            newProject(){
                this.newElementAside = true;
                this.bacabAsideText = 'New Project';
                this.project = {
                    id: '',
                    name: '',
                    description: '',
                    time_tracking_h: 0,
                    time_tracking_m: 0,
                    time_tracking_s: 0,
                    start_time_tracking: false,
                    hour_value: 0,
                    investment: 0,
                    goal: null,
                    notes: [],
                    childs: [

                    ]
                }
            },
            save(){
                let data = this.project;
                axios.post('/project', data).then( response => {
                    this.$message({
                        message: 'Successful operation.',
                        type: 'success'
                    });
                    this.init();
                    this.closeAside();
                });
            },
            deleteProject(id){
                this.$confirm('This will permanently delete the goal. Continue?', 'Warning', {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                }).then(() => {
                    axios.delete('/project/'+id).then( response => {
                        this.$message({
                            message: 'Successful operation.',
                            type: 'success'
                        });
                        this.init();
                        this.project = {
                            id: '',
                            name: '',
                            description: '',
                            time_tracking_h: 0,
                            time_tracking_m: 0,
                            time_tracking_s: 0,
                            start_time_tracking: false,
                            hour_value: 0,
                            investment: 0,
                            goal: null,
                            notes: [],
                            childs: [

                            ]
                        }
                    }).catch(() => {
                        this.$message.error('Can not save the data.');
                    });
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: 'Delete canceled'
                    });
                });
            },
            closeProject(value){
                this.newElementAside = false;
            },
            timeMoneyInvesment(id){
                let index = this.tableData.findIndex( element => {
                    return element.id === id
                });

                let seconds = this.tableData[index].time_tracking_s;
                let minutes = this.tableData[index].time_tracking_m;
                let hours = this.tableData[index].time_tracking_h;
                let hour_value = this.tableData[index].hour_value;

                let money = (hours*hour_value) + ((hour_value/60)*minutes) + ((hour_value/3600)*seconds);
                return money.toFixed(2);
            },
            stopwatchStop(id){
                let index = this.tableData.findIndex( element => {
                    return element.id === id
                });

                this.tableData[index].start_time_tracking = false;
                this.project =  this.tableData[index];
                this.save();
            },
            stopwatchStart(id) {
                let index = this.tableData.findIndex( element => {
                    return element.id === id
                });
                this.tableData[index].start_time_tracking = true;
                setInterval(function () {
                    this.updateTimer(id);
                }.bind(this), 1000);
            },

            updateTimer(id) {
                let index = this.tableData.findIndex( element => {
                    return element.id === id
                });

                if(this.tableData[index].start_time_tracking === true){

                    let seconds = this.tableData[index].time_tracking_s;
                    let minutes = this.tableData[index].time_tracking_m;
                    let hours = this.tableData[index].time_tracking_h;

                    seconds++;
                    if (seconds >= 60) {
                        seconds = 0;
                        minutes++;
                        if (minutes >= 60) {
                            minutes = 0;
                            hours++;
                        }
                    }

                    this.tableData[index].time_tracking_s = seconds;
                    this.tableData[index].time_tracking_m = minutes;git
                    this.tableData[index].time_tracking_h = hours;
                }
            },
        },
    }
</script>

<style scoped>

</style>