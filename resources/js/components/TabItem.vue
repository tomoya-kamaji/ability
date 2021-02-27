<template>
  <li
    class="nav-item nav-link"
    @click="$emit('input', id)"
    :class="active"
  >
    <div>
        <i :class= icon>
            {{ label }}
        </i>
    </div>
  </li>

</template>

<script>
export default {
  props: {
    id: Number, //
    label: String,
    value: Number,
    icon: String,
  },
  computed: {
    active() {
      return this.value === this.id ? "active bg-primary text-white" : false;
    },
  },
};
</script>
