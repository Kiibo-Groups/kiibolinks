<template>
    <article class="bg-white p-3 rounded-3xl max-w-md w-full">
        <div class="relative">
            <img
                src="assets/themes/theme-demo/desert.png"
                alt="Banner Profile"
                class="w-full rounded-t-lg"
            />
            <img
                alt="Profile Picture"
                class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white"
            />
        </div>

        <div class="flex items-center justify-center mt-14 mb-2">
            <h2 class="text-xl font-bold text-gray-800">{{ name }}</h2>
        </div>

        <div class="flex items-center my-2 justify-center space-x-4">
            <a
                :href="`/dashboard/biolink/analytics/${id}/overview`"
                class="text-gray-900"
            >
                <i class="fa-solid fa-chart-line"></i>
                {{ visitedCount }} Visitas
            </a>
            <a
                :href="urlName"
                :id="`visitLink-${id}`"
                class="text-blue-500 no-underline hover:underline"
            >
                Visitar link
            </a>
        </div>

        <div class="flex justify-center gap-2 text-gray-600 mx-2">
            <div class="text-center">
                <button
                    @click="redirectToEditLink"
                    class="border border-gray-600 bg-white px-3 py-1 rounded-full"
                >
                    <span class="text-xs font-semibold">Editar tarjeta</span>
                </button>
            </div>
            <div class="text-center">
                <button
                    class="border border-gray-600 bg-white px-3 py-1 rounded-full"
                >
                    <span class="text-xs font-semibold">Copiar link</span>
                </button>
            </div>
            <div class="text-center">
                <button
                    class="border border-gray-600 bg-primary-color text-white px-3 py-1 rounded-full"
                >
                    <span class="text-xs font-semibold">Compartir tarjeta</span>
                </button>
            </div>
        </div>
    </article>
</template>

<script setup>
const props = defineProps(["id", "name", "urlName", "visitedCount"]);

console.log(props);

const redirectToEditLink = () => {
    window.location.href = "/dashboard/biolink/" + props.urlName;
};

const visitLink = () => {
    window.location.href = "/dashboard/biolink/" + props.urlName;
};
</script>
