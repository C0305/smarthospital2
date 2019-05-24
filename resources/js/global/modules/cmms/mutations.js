export default {
    updateBrands(state,payload) {
        console.log('mutation')
        state.updateValues.brands = payload;
        console.log(state.updateValues.brands)
    },
    updateBrandsSelect(state,payload){
        state.brands = payload;
    },
    updateModels(state,payload){
        state.updateValues.models = payload;
    }
}