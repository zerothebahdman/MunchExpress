// src/plugins/vuetify.js

// import "material-design-icons-iconfont/dist/material-design-icons.css"; // Ensure you are using css-loader
// import Vue from "vue";
// import Vuetify from "vuetify";
// import 'vuetify/dist/vuetify.min.css';

// Vue.use(Vuetify);

// export default new Vuetify({
//     icons: {
//         iconfont: "md"
//     }
// });
import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader
import '@mdi/font/css/materialdesignicons.css'; // Ensure you are using css-loader
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

const opts = {};

export default new Vuetify(opts, {
    icons: {
        iconfont: 'md', // default - only for display purposes
    },
});
