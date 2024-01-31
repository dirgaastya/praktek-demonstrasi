<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { onMounted, watch, watchEffect } from "vue";
import { ref } from "vue";

const props = defineProps({
  skemaData: {
    type: Object,
  },
});

onMounted(() => {
  console.log(props.skemaData);
});

const jenisKelamin = ref([
  {
    value: "laki-laki",
    text: "Laki - Laki",
  },
  {
    value: "perempuan",
    text: "Perempuan",
  },
]);
const form = useForm({
  kd_skema: "",
  nama_peserta: "",
  jenis_kelamin: "",
  alamat: "",
  no_hp: "",
});

const submit = () => {
  form.post(route("peserta.store"), {
    onFinish: () => form.reset(),
  });
};
</script>

<template>
  <Head title="Home" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Form Pendaftaran Sertifikasi
        </h2>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
          <form
            @submit.prevent="submit"
            class="grid grid-cols-2 gap-x-4 gap-y-6"
          >
            <VSelect
              label="Skema Sertifikasi"
              wrapper-class="col-span-2"
              input-class="w-full"
              :items="props.skemaData"
              item-text="nm_skema"
              item-value="kd_skema"
              v-model="form.kd_skema"
            />
            <VInput
              label="Nama"
              placeholder="Masukan Nama Peserta"
              v-model="form.nama_peserta"
            />
            <VSelect
              :items="jenisKelamin"
              label="Jenis Kelamin"
              v-model="form.jenis_kelamin"
            />
            <VInput
              label="Alamat"
              placeholder="Masukan Alamat Peserta"
              v-model="form.alamat"
            />
            <VInput
              label="No Hp"
              placeholder="Masukan No Hp"
              v-model="form.no_hp"
            />

            <div
              class="col-span-2 place-content-end place-items-end place-self-end"
            >
              <VBtn type="submit" color="primary">Daftar</VBtn>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
