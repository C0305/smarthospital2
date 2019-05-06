export default {

    computed: {
        patients(){
            return this.$store.state.general.bacabUIEvents.reloadValue.patients
        }
    }

}
