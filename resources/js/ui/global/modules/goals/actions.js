export default {
    loadGoals(context){
        let data = null;
        axios.get('/goals/show/').then((response)=>{
            data = response.data;
        });
        context.commit('loadGoals', data);
    }
}