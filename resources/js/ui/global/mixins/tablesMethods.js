export default {
    methods: {
        updatePatients() {
            this.$store.dispatch('general/bacabUpdateValue', 'patients')
        }
    }

}
