<template>
    <label class="flex cursor-pointer select-none items-center">
        <div class="relative">
            <input
                type="checkbox"
                :checked="checkedValue"
                @change="onCheckboxChange"
                class="sr-only"
            />
            <div
                class="box block h-8 w-14 rounded-full"
                :style="{ backgroundColor: checkedValue ? '#0d6efd' : '#d1d1d1' }"
            ></div>
            <div
                class="absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition"
                :class="{ 'translate-x-full': checkedValue }"
            ></div>
        </div>
    </label>
</template>

<script setup>
import { ref, defineEmits } from "vue";

const props = defineProps({
    checked: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(["change"]);

const checkedValue = ref(props.checked);

const onCheckboxChange = () => {
    checkedValue.value = !checkedValue.value;
    emit("change", checkedValue.value);
};
</script>
