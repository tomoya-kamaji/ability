<template>
  <li
    class="nav-item nav-link text-muted"
    @click="$emit('input', id)"
    :class="active"
  >
    {{ label }}
  </li>

</template>

<script>
export default {
  props: {
    id: Number, //
    label: String,
    value: Number,
  },
  computed: {
    active() {
      return this.value === this.id ? "active" : false;
    },
  },
};
</script>
