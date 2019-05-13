import { mapState } from 'vuex'

export default {
    mounted(){

    },
    methods: {
    },
    computed: mapState({
        mexicoStates: state => state.general.mexicoStates,
        routes: state => state.general.routes,
    
    }),

}
