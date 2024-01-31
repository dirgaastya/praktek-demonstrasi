<script setup></script>

<template>
  <form @submit.prevent="submit" class="grid grid-cols-2 gap-x-4 gap-y-6">
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
    <VInput label="No Hp" placeholder="Masukan No Hp" v-model="form.no_hp" />

    <div class="col-span-2 place-content-end place-items-end place-self-end">
      <VBtn type="submit" color="primary">Daftar</VBtn>
    </div>
  </form>
</template>
