<template>
    <div class="age-container">
        <i class="fas fa-calendar-day"></i>{{ getAge() }}
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        name: "bacabTableAge",
        props: {
            birthdate: String
        },
        created(){
            moment.locale('es');
        },
        methods: {
            getAge(){
                let birth = moment(this.birthdate);
                return '   '+Math.abs(birth.diff(moment(new Date),'years'))+' años';
            }
        }
    }
</script>

<style scoped>
    .age-container{
        width: 100%;
        text-align: center;
    }
</style>