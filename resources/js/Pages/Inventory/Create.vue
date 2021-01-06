<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col bg-white shadow-xl sm:rounded-lg p-5">
                    <h1>Add Inventory</h1>
                    <hr class="mt-3 mb-5" />
                    <form @submit.prevent="onSubmit" method="POST">
                        <div class="flex flex-col mb-3">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                id="name"
                                placeholder="Insert item name here ..."
                                v-model="inventory.name"
                                :class="$page.errors.name && 'input-error'"
                                required
                            />
                            <p class="text-error" v-show="$page.errors.name">
                                {{ $page.errors.name }}
                            </p>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="amount">Amount</label>
                            <input
                                type="number"
                                min="1"
                                id="amount"
                                placeholder="Insert item amount here ..."
                                v-model="inventory.amount"
                                :class="$page.errors.amount && 'input-error'"
                                required
                            />
                            <p class="text-error" v-show="$page.errors.amount">
                                {{ $page.errors.amount }}
                            </p>
                        </div>
                        <button class="btn">Submit</button>
                    </form>
                    <a
                        :href="route('inventory.index')"
                        class="mt-4 text-gray-900 font-semibold underline"
                        >Back</a
                    >
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    components: { AppLayout },
    data() {
        return {
            inventory: {
                name: "",
                amount: 1
            }
        };
    },
    methods: {
        onSubmit() {
            this.inventory.user_id = this.$page.user.id;
            this.$inertia.post(route("inventory.store"), this.inventory);
        }
    }
};
</script>

<style scoped>
h1 {
    @apply font-bold;
    @apply text-2xl;
}
.btn {
    @apply px-5;
    @apply py-3;
    @apply bg-yellow-400;
    @apply text-white;
    @apply rounded;
    @apply font-semibold;
}
label {
    @apply font-semibold;
    @apply text-lg;
    @apply mb-1;
}
input {
    @apply rounded;
    @apply border;
    @apply px-3;
    @apply py-2;
}
</style>
