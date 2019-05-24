export default {
    UPDATE_BRANDS(context){
        console.log('Executed Action');
        let val = context.state.updateValues.brands;
        val = val + 1;
        console.log(val);
        context.commit('updateBrands',val);
    },
    GET_BRANDS_FOR_SELECT(context){
        axios.get(context.rootState.general.routes.cmms.brands+'/select').then(response => {
            context.commit('updateBrandsSelect',response.data);
        })
    },
    UPDATE_MODELS(context){
        console.log('Executed Action');
        let val = context.state.updateValues.models;
        val = val + 1;
        console.log(val);
        context.commit('updateModels', val);
    }
}