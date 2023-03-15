<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';                   // optional

defineProps({
    users: Object,
});
</script>

<template>

    <Head title="Liste Utilisateurs" />

    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <ApplicationLogo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Liste Utilisateurs
            </div>

            <div class="card">
                <DataTable :value="users" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" sortMode="multiple" removableSort
                           tableStyle="min-width: 50rem">
                    <template #empty> No customers found. </template>
                    <template #loading> Loading customers data. Please wait. </template>
                    <Column field="id" sortable header="Code"></Column>
                    <Column field="name" sortable header="Name"></Column>
                    <Column field="email" sortable header="Category"></Column>
                    <Column field="created_at" sortable header="Quantity"></Column>
                </DataTable>
            </div>



        </div>


    </div>



</template>
