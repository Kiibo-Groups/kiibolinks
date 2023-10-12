import vueApp from "../../base/vue";
import BioLinkCard from "../../../components/links/BioLinkCard.vue";
import CreateBioLinkButton from "../../../components/links/CreateBioLinkButton.vue";

// for (const [key, icon] of Object.entries(LucideIcons)) {
//     vueApp.component(key, icon);
// }

vueApp.component("biolink-card", BioLinkCard);
vueApp.component("create-biolink-button", CreateBioLinkButton);

vueApp.mount("#app");
