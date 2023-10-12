<template>
    <ToggleSwitch
        :checked="isActive === 'true' || isActive === true || isActive === '1'"
        @change="onChangeToggleSwitchActivation"
    ></ToggleSwitch>
</template>

<script setup>
import ToggleSwitch from "../../global/ToggleSwitch.vue";

const props = defineProps({
    linkItemId: {
        type: Number,
        required: true,
    },
    isActive: {
        type: Boolean,
        default: false,
    },
});

console.log(props, 'props???')

const onChangeToggleSwitchActivation = async (value) => {
    await axios.put(`/dashboard/biolink/edit-item/${props.linkItemId}/activation`, {
        active: value,
    });
};
</script>
