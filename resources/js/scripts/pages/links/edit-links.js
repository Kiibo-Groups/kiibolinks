
import vueApp from "../../base/vue";
import AddLinkItemsButton from "../../../components/links/link-items/AddLinkItemsButton.vue";

import { createVfm } from 'vue-final-modal'

import 'vue-final-modal/style.css'

// for (const [key, icon] of Object.entries(LucideIcons)) {
//     vueApp.component(key, icon);
// }

const vfm = createVfm()

vueApp.component("add-link-items-button", AddLinkItemsButton);

vueApp.use(vfm)
    .mount("#app");
