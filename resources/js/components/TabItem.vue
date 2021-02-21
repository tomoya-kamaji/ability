<template>
  <li
    class="nav-item nav-link border-primary"
    @click="$emit('input', id)"
    :class="active"
  >
    <div>
        {{ label }}
    </div>
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
      return this.value === this.id ? "active bg-primary text-white" : false;
    },
  },
};
</script>
