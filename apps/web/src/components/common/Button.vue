<script setup lang="ts">
import { cn } from "@/utils/cn";
import { LoaderCircleIcon } from "lucide-vue-next";
import { computed } from "vue";

const props = defineProps<{ class?: string; isLoading?: boolean }>();

const baseClass =
  "h-10 w-full rounded-md flex items-center justify-center text-sm font-medium bg-purple-500 text-gray-100 transition-colors hover:bg-purple-300";

const mergedClass = computed(() => cn(baseClass, props.class));
</script>

<template>
  <button :class="mergedClass" type="submit">
    <slot v-if="!isLoading"></slot>
    <LoaderCircleIcon class="size-5 animate-spin" v-if="isLoading" />
  </button>
</template>
