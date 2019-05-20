import { mapState } from 'vuex'

export default {
    created(){
      if(this.selectBrands.numberOfRecords === 0){
          this.$store.dispatch('cmms/GET_BRANDS_FOR_SELECT');
          console.log('sisisisi')
      }
    },
    computed: mapState({
        updateBrands: state => state.cmms.updateValues.brands,
        selectBrands: state => state.cmms.brands,
        selectCategories: state => state.cmms.categories,
        selectSubCategories: state => state.cmms.subCategories
    }),
}
