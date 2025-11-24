<script setup lang="ts" generic="T extends Object">
import { cn } from "@/utils/cn";
import { computed, useId } from "vue";

const { type = "text", errorMessage } = defineProps<{
  label: string;
  name: string;
  type?: "text" | "email" | "password";
  disabled?: boolean;
  errorMessage?: string;
}>();

const model = defineModel();
const inputId = useId();
const inputHintId = useId();

const isError = computed(() => (errorMessage && errorMessage !== "") || false);
</script>

<template>
  <div class="flex w-full flex-col items-start gap-2">
    <label class="text-sm tracking-wide text-gray-900" :for="inputId">{{ label }}</label>
    <input
      :class="
        cn(
          'h-10 w-full rounded-md px-4 text-gray-900 inset-ring inset-ring-gray-300 transition-shadow aria-invalid:inset-ring-red-500',
          'hover:inset-ring-purple-500',
        )
      "
      :id="inputId"
      :name="name"
      :type="type"
      :disabled="disabled"
      v-model="model"
      :aria-invalid="isError"
      :aria-describedby="inputHintId"
    />
    <p class="text-sm tracking-tight text-red-500" :id="inputHintId" v-show="isError">{{ errorMessage }}</p>
  </div>
</template>
