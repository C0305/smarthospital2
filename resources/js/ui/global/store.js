import Vue from 'vue';
import Vuex from 'vuex';
import general from './modules/general/index';
import goals from './modules/goals/index'

Vue.use(Vuex);


export default new Vuex.Store({
    modules: {
        general,
        goals
    }
});