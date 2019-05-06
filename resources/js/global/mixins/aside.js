export default {
    methods: {
        closeAside(){
            this.$store.dispatch('general/bacabAsideOpenClose',false)
        },
        openAside(){
            this.$store.dispatch('general/bacabAsideOpenClose',true)
        }
    },
    computed: {
        asideOpenClose(){
            return this.$store.state.general.bacabUIEvents.bacabAsideOpen
        }
    }

}
