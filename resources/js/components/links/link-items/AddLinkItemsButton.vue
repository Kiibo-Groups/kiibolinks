<template>
    <button @click="() => openModal()" class="border border-gray-200 px-5 py-2 rounded-full flex items-center justify-center gap-2 hover:bg-gray-100">
        Social Links
        <i style="font-size: 20px" class="fa-regular fa-plus"></i>
    </button>
    <ModalsContainer />
</template>

<script setup>
import { ModalsContainer, useModal } from "vue-final-modal";
import AddLinkItemsModal from "./AddLinkItemsModal.vue";

const props = defineProps(["linkId"]);

console.log(props.linkId, "linkid");

const { open, close } = useModal({
    component: AddLinkItemsModal,
    attrs: {
        linkId: props.linkId,
    },
});

const openModal = () => {
    open();
};
</script>
