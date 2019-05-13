export default {
    UPDATE_BRANDS(context){
        console.log('Executed Action');
        let val = context.state.updateValues.brands;
        val = val + 1;
        console.log(val);
        context.commit('updateBrands',val);
    }
}