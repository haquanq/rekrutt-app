<script setup lang="ts">
import { CheckIcon } from "lucide-vue-next";

defineProps<{ label: string; name: string }>();
const model = defineModel();
</script>

<template>
  <label class="group flex w-fit cursor-pointer items-center gap-3">
    <input class="peer sr-only" type="checkbox" v-model="model" />
    <span
      class="size-5 cursor-pointer rounded-sm inset-ring inset-ring-gray-300 transition-shadow group-hover:inset-ring-purple-500 peer-checked:*:opacity-100 peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-gray-900"
    >
      <span
        class="flex h-full w-full items-center justify-center rounded-[inherit] bg-purple-500 opacity-0 transition-opacity"
      >
        <CheckIcon class="size-4 text-white" />
      </span>
    </span>
    <span class="text-sm text-gray-900">{{ label }}</span>
  </label>
</template>
