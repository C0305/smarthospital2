import Vue from 'vue';
import Vuex from 'vuex';
import general from './modules/general/index';
import cmms from './modules/cmms'

Vue.use(Vuex);


export default new Vuex.Store({
    modules: {
        general,
        cmms
    }
});