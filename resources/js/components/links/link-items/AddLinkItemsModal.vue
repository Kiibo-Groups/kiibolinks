<template>
    <VueFinalModal
        class="flex justify-center items-center"
        content-class="flex flex-col max-w-4xl w-full mx-4 pb-5 pt-4 px-5 bg-white dark:bg-gray-900 border dark:border-gray-700 rounded-xl space-y-2"
    >
        <div v-if="selectedSocialLink">
            <button
                @click="onBack"
                class="flex my-4 items-center justify-start gap-2 hover:text-gray-500"
            >
                <i class="fa-solid fa-arrow-left"></i>
                <span>Volver</span>
            </button>
            <form action="">
                <div>
                    <label class="font-medium" for="">{{
                        selectedSocialLink.inputTitle
                    }}</label>
                    <input
                        type="text"
                        v-model="selectedSocialLink.link"
                        :placeholder="selectedSocialLink.link"
                        class="bg-neutral-100 w-100 border-transparent focus:border-white focus:ring-0 focus-visible:border-white p-3 rounded-lg"
                    />
                </div>

                <div class="mt-2">
                    <label class="font-medium" for="">Link title</label>
                    <input
                        type="text"
                        v-model="selectedSocialLink.name"
                        :placeholder="selectedSocialLink.name"
                        class="bg-neutral-100 w-100 border-transparent focus:border-white focus:ring-0 focus-visible:border-white p-3 rounded-lg"
                    />
                </div>

                <div class="flex items-center justify-end gap-2 my-4">
                    <button
                        type="button"
                        class="border border-gray-600 bg-white text-black px-5 py-2 rounded-full"
                    >
                        <span class="text-md font-medium"> Cancel </span>
                    </button>
                    <button
                        type="button"
                        @click="onSubmit"
                        class="border border-gray-600 bg-primary-color text-white px-5 py-2 rounded-full"
                    >
                        <span class="text-md font-medium"> Add link </span>
                    </button>
                </div>
            </form>
        </div>

        <div v-else>
            <h1 class="text-xl">Social Links</h1>
            <p>Select from our wide variety of links and contact info below.</p>

            <div class="overflow-auto h-96">
                <section>
                    <h6 class="my-4">Social Media</h6>
                    <div class="grid grid-cols-2 gap-2">
                        <div
                            v-for="(socialLink, index) in SOCIAL_LINKS"
                            :key="index"
                            @click="onClickSocialLink(socialLink)"
                            class="bg-neutral-100 flex items-center justify-between px-3 py-2 rounded-xl hover:bg-gray-200 hover:cursor-pointer hover:shadow-lg hover:scale- transition-all"
                        >
                            <div class="gap-2 flex items-center justify-center">
                                <img
                                    :src="socialLink.icon"
                                    class="w-12"
                                    :alt="socialLink.title"
                                />
                                <span>{{ socialLink.title }}</span>
                            </div>
                            <div class="bg-white rounded-full px-2">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </VueFinalModal>
</template>

<script setup>
import { ref } from "vue";
import { VueFinalModal } from "vue-final-modal";

const props = defineProps(["linkId"]);

const SOCIAL_LINKS = [
    {
        id: 1,
        name: "instagram",
        title: "Instagram",
        inputTitle: "Instagram link",
        icon: "/assets/icons/instagram.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 2,
        name: "facebook",
        title: "Facebook",
        inputTitle: "Facebook link",
        icon: "/assets/icons/facebook.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 3,
        name: "twitter",
        title: "Twitter",
        inputTitle: "Twitter link",
        icon: "/assets/icons/twitter.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 4,
        name: "tiktok",
        title: "Tiktok",
        inputTitle: "Tiktok link",
        icon: "/assets/icons/tiktok.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 5,
        name: "youtube",
        title: "Youtube",
        inputTitle: "Youtube link",
        icon: "/assets/icons/youtube.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 6,
        name: "linkedin",
        title: "Linkedin",
        inputTitle: "Linkedin link",
        icon: "/assets/icons/linkedin.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 7,
        name: "snapchat",
        title: "Snapchat",
        inputTitle: "Snapchat link",
        icon: "/assets/icons/snapchat.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 8,
        name: "whatsapp",
        title: "Whatsapp",
        inputTitle: "Whatsapp link",
        icon: "/assets/icons/whatsapp.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 9,
        name: "telegram",
        title: "Telegram",
        inputTitle: "Telegram link",
        icon: "/assets/icons/telegram.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 10,
        name: "pinterest",
        title: "Pinterest",
        inputTitle: "Pinterest link",
        icon: "/assets/icons/pinterest.svg",
        category: "social_media",
        link: "",
    },
    {
        id: 11,
        name: "spotify",
        title: "Spotify",
        inputTitle: "Spotify link",
        icon: "/assets/icons/spotify.svg",
        category: "social_media",
        link: "",
    },
];

const selectedSocialLink = ref(null);
const addedSocialLinks = ref([]);

const isSubmitting = ref(false);

const onClickSocialLink = (socialLink) => {
    selectedSocialLink.value = socialLink;
};

const onBack = () => {
    selectedSocialLink.value = null;
};

const onSubmit = async () => {
    await axios.put(`/dashboard/update-link-socials/${props.linkId}`, {
        socials: JSON.stringify([selectedSocialLink.value]),
    });
    selectedSocialLink.value = null;

    window.location.reload();
};
</script>
