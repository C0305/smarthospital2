export default {
    methods: {
        closeAside(){
            this.$store.dispatch('general/bacabAside', false)
        },
        openAside(){
            this.$store.dispatch('general/bacabAside', true)
        }
    },
    computed: {
        asideOpenClose(){
            return this.$store.state.general.bacabUIEvents.bacabAsideOpen
        }
    }

}
