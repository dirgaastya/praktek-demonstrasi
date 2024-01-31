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
  nama_skema: "",
  jenis: "",
  jumlah_unit: "",
});

const submit = () => {
  form.post(route("sertifikasi.store"), {
    onFinish: () => {
      form.reset();
      isModalOpen.value = false;
    },
  });
};

const handleDelete = (id) => {
  form.delete(route("sertifikasi.destroy", id));
};
</script>

<template>
  <Head title="Home" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Daftar Skema Sertifikasi
        </h2>
        <VModal v-model="isModalOpen" hide-footer>
          <template #header>
            <VText font-weight="semibold" variant="xl"
              >Form Tambah Skema Sertifikasi</VText
            >
          </template>
          <template #activator="{open}">
            <VBtn @click="open" color="success">
              <VText>Tambah</VText>
              <VIcon name="ic:baseline-plus" class="text-white" />
            </VBtn>
          </template>
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
        </VModal>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-3">
          <VInput
            v-model="search"
            placeholder="Search..."
            prepend-icon="ri:search-line"
            wrapper-class="!my-6"
          />
          <VDataTable
            v-model:search="search"
            :items="props.data"
            :headers="headers"
          >
            <template #item.action="{item}">
              <div class="flex items-center gap-x-3">
                <Link :href="route('sertifikasi.edit', item.kd_skema)">
                  <VIcon name="raphael:edit" class="text-cyan-500" />
                </Link>
                <VModal v-model="deleteConfirmationModalOpen">
                  <template #header>
                    <VText font-weight="semibold" variant="xl"
                      >Konfirmasi Hapus Skema</VText
                    >
                  </template>
                  <template #activator="{open}">
                    <VBtn @click="open" icon fab text>
                      <VIcon name="tabler:trash" class="text-red-500" />
                    </VBtn>
                  </template>
                  <div class="text-center my-4">
                    Apakah Anda yakin ingin menghapus skema ini?
                  </div>
                  <template #footer="{close}">
                    <VBtn @click="close" color="primary">Tidak</VBtn>
                    <VBtn @click="handleDelete(item.kd_skema)" color="error"
                      >Yakin</VBtn
                    >
                  </template>
                </VModal>
              </div>
            </template>
          </VDataTable>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
