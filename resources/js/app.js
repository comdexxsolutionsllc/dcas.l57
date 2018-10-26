/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//  "vue-awesome", "vue-router", "vuex"

require('./bootstrap');

window.Vue = require('vue');

import Multiselect from 'vue-multiselect';
import Notifications from 'vue-notification';
import PortalVue from 'portal-vue';
import VModal from 'vue-js-modal';
import VueI18n from 'vue-i18n';
import VueLazyload from 'vue-lazyload';
import VueMoment from 'vue-moment';
import VueProgressBar from 'vue-progressbar';

import Login from './components/Login.vue';
import store from './store.js';

Vue.use(Multiselect);
Vue.use(Notifications);
Vue.use(PortalVue);
Vue.use(VModal, {dialog: true});
Vue.use(VueI18n);
Vue.use(VueLazyload);
Vue.use(VueMoment);
Vue.use(VueProgressBar,
  {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
  }
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
  'tiptap-editor',
  require('./components/TiptapEditor.vue').default
);

Vue.component(
  'cart',
  require('./components/Cart.vue').default
);

const app = new Vue({
  el: '#app',
  store,
  components: {
    Login
  }
});
