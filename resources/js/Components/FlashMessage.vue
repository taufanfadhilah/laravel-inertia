<template>
    <div v-show="$page.flash.message">
        <transition
            leave-active-class="transition ease-in duration-1000"
            leave-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div :class="`alert ${$page.flash.type}`">
                <h1>{{ $page.flash.message }}</h1>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String
        },
        type: {
            type: String,
            default: "message"
        }
    }
};
</script>

<style scoped>
.alert {
    @apply w-full;
    @apply rounded;
    @apply py-1;
    @apply px-3;
    @apply font-semibold;
    @apply my-3;
}
.danger {
    @apply bg-red-600;
    @apply text-white;
}
.warning {
    @apply bg-yellow-300;
    @apply text-white;
}
.success {
    @apply bg-green-400;
    @apply text-white;
}
.message {
    @apply bg-gray-400;
    @apply text-white;
}
</style>
