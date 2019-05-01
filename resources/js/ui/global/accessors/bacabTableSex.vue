<template>
    <div class="sex-container">
        <template v-if="sex === 'Femenino'">
            <i class="fas fa-female"> </i>{{ ' '+sex }}
        </template>
        <template v-if="sex === 'Masculino'">
            <i class="fas fa-male"></i>{{ ' '+sex }}
        </template>
        <template v-if="sex === 'Otro'">
            <i class="fas fa-genderless"></i>{{ ' '+sex }}
        </template>

    </div>
</template>

<script>
    export default {
        name: "bacabTableSex",
        props: {
            sex: String,
        },
    }
</script>

<style scoped>

</style>