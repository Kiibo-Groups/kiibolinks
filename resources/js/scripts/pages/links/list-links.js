import vueApp from "../../base/vue";
import BioLinkCard from "../../../components/links/BioLinkCard.vue";

// for (const [key, icon] of Object.entries(LucideIcons)) {
//     vueApp.component(key, icon);
// }

vueApp.component("bio-link-card", BioLinkCard);

vueApp.mount("#app");
