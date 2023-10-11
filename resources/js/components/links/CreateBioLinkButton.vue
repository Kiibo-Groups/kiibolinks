<template>
    <button
        class="bg-white p-3 rounded-3xl max-w-md w-full flex-col flex items-center justify-center"
    >
        <div class="bg-gray-100 p-4 rounded-full mb-2">
            <i class="fa-solid fa-plus text-3xl"></i>
        </div>
        <span class="text-lg font-medium mt-2"> Agregar BioLink </span>
    </button>
</template>

<script setup>
const redirectToEditLink = () => {
    window.location.href = "/dashboard/biolink/user";
};
</script>
