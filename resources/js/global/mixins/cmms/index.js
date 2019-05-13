import { mapState } from 'vuex'

export default {
    computed: mapState({
        updateBrands: state => state.cmms.updateValues.brands
    }),
}
