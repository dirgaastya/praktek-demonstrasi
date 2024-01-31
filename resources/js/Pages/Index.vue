<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { ref } from "vue";

const props = defineProps({
  data: {
    type: Object,
  },
});
const search = ref("");

onMounted(() => {
  console.log(props.data);
});

const headers = ref([
  {
    value: "kd_skema",
    text: "Kode",
  },
  {
    value: "scheme.nm_skema",
    text: "Skema Sertifikasi",
  },
  {
    value: "nm_peserta",
    text: "Nama Peserta",
  },
  {
    value: "jekel",
    text: "Jenis Kelamin",
  },
  {
    value: "alamat",
    text: "Alamat",
  },
  {
    value: "no_hp",
    text: "No HP",
  },
]);
</script>

<template>
  <Head title="Home" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Daftar Peserta
        </h2>
        <VInput
          v-model="search"
          placeholder="Search..."
          prepend-icon="ri:search-line"
        />
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <VDataTable
            v-model:search="search"
            :items="props.data"
            :headers="headers"
          />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
