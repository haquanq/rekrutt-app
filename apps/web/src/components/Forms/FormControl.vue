<script setup lang="ts" generic="T extends object">
import { computed, ref } from "vue";
import { ZodType, type ZodObject } from "zod";

const props = defineProps<{ initialValues: T; onSubmit?: (data: T) => void; validator?: ZodObject<any> }>();

type Field = {
  name: string;
};

const state = ref<T>(props.initialValues);
const errors = ref<Record<keyof T, string>>(
  Object.keys(props.initialValues).reduce(
    (a, v) => {
      a[v as keyof T] = "";
      return a;
    },
    {} as Record<keyof T, string>,
  ),
);

const fields = Object.keys(props.initialValues).reduce(
  (a, v) => {
    a[v as keyof T] = {
      name: v,
    } satisfies Field;
    return a;
  },
  {} as Record<keyof T, Field>,
);

const isError = computed(() => Object.values(errors.value).some((v) => v !== ""));

const handleSubmit = () => {
  if (props.validator) {
    Object.keys(props.initialValues).forEach((v) => {
      const key = v as keyof T;
      const schema = props.validator?.shape[key];
      if (!schema || !(schema instanceof ZodType)) return;
      const parseResult = schema.safeParse(state.value[key]);
      if (parseResult.success === false) {
        errors.value[key] = parseResult.error.issues[0]?.message;
      } else {
        errors.value[key] = "";
      }
    });
  }

  if (!isError.value) {
    props.onSubmit?.(state.value);
  }
};
</script>

<template>
  <form class="w-full" novalidate @submit.prevent="handleSubmit">
    <slot v-bind="{ fields, state, errors }"></slot>
  </form>
</template>
