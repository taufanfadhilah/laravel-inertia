<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
                >
                    <div class="flex justify-between">
                        <h1>Inventory List</h1>
                        <a
                            :href="route('inventory.create')"
                            class="btn bg-blue-600"
                            >Add New Inventory</a
                        >
                    </div>
                    <hr class="mt-3 mb-5" />
                    <table class="border-collapse w-full">
                        <thead>
                            <tr>
                                <th class="border border-grey-200">No</th>
                                <th class="border border-grey-200">User</th>
                                <th class="border border-grey-200">Name</th>
                                <th class="border border-grey-200">Amount</th>
                                <th class="border border-grey-200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="inventories.length">
                                <tr
                                    v-for="(inventory, index) in inventories"
                                    :key="inventory.id"
                                >
                                    <td class="border border-grey-200 pl-3">
                                        {{ ++index }}.
                                    </td>
                                    <td class="border border-grey-200 pl-3">
                                        {{ inventory.name }}
                                    </td>
                                    <td class="border border-grey-200 pl-3">
                                        {{ inventory.user.name }}
                                    </td>
                                    <td class="border border-grey-200 pl-3">
                                        {{ inventory.amount }}
                                    </td>
                                    <td class="border border-grey-200 pl-3">
                                        <div class="flex flex-row">
                                            <a
                                                :href="
                                                    route(
                                                        'inventory.edit',
                                                        inventory.id
                                                    )
                                                "
                                                class="btn bg-orange-400 mr-2"
                                            >
                                                Edit
                                            </a>
                                            <button
                                                class="btn bg-red-600"
                                                @click="onDelete(inventory.id)"
                                            >
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <tr v-else>
                                <td
                                    colspan="5"
                                    class="border border-grey-200 text-center font-semibold"
                                >
                                    No data for inventory
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    components: { AppLayout },
    props: {
        inventories: {
            type: Array,
            default: []
        }
    },
    methods: {
        onDelete(id) {
            this.$inertia.delete(route("inventory.destroy", id));
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
    @apply text-white;
    @apply rounded;
    @apply font-semibold;
}
</style>
