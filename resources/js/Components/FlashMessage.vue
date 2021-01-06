<template>
    <div :class="`alert ${type}`">
        <h1>{{ message }}</h1>
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
