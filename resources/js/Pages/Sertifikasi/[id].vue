<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
  data: {
    type: Object,
  },
});
const search = ref("");
const isModalOpen = ref(false);
const deleteConfirmationModalOpen = ref(false);

const headers = ref([
  {
    value: "kd_skema",
    text: "Kode",
  },
  {
    value: "nm_skema",
    text: "Nama Peserta",
  },
  {
    value: "jenis",
    text: "Jenis",
  },
  {
    value: "jml_unit",
    text: "Jumlah Unit",
  },
  {
    value: "action",
    text: "Aksi",
  },
]);

const jenis = ref([
  {
    value: "KKNI",
    text: "KKNI",
  },
  {
    value: "Klaster",
    text: "Klaster",
  },
]);
const form = useForm({
  nama_skema: props.data.nm_skema,
  jenis: props.data.jenis,
  jumlah_unit: props.data.jml_unit,
});

const submit = () => {
  form.put(route("sertifikasi.update", props.data.kd_skema), {
    onFinish: () => {
      form.reset();
    },
  });
};
</script>

<template>
  <Head title="Home" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Edit Skema Sertifikasi ({{ props.data.nm_skema }})
        </h2>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-3 py-6">
          <form
            @submit.prevent="submit"
            class="grid grid-cols-2 gap-x-4 gap-y-6"
          >
            <VInput
              label="Nama Skema Sertifikasi"
              placeholder="Masukan Nama Skema Sertifikasi"
              v-model="form.nama_skema"
              wrapper-class="!col-span-2 "
            />
            <VSelect
              :items="jenis"
              label="Jenis"
              v-model="form.jenis"
              placeholder="Pilih Jenis Sertifikasi"
              wrapper-class="!col-span-2 "
            />
            <VInput
              label="Jumlah Unit"
              placeholder="Masukan Jumlah Unit"
              v-model="form.jumlah_unit"
              wrapper-class="!col-span-2 "
              type="number"
            />

            <div
              class="col-span-2 place-content-end place-items-end place-self-end"
            >
              <VBtn type="submit" color="primary">Simpan</VBtn>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
