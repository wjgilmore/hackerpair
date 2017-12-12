<template>
    <datepicker
        format="yyyy-MM-dd"
        :monday-first="true"
        :bootstrap-styling="true"
        :calendar-button="true"
        calendar-button-icon="fa fa-calendar"
        input-class="form-control input-lg"
        wrapper-class="form-group has-feedback"
        :placeholder=placeholder
        :name=name
        v-model="defaultvalue"
    >
    </datepicker>
</template>

<style>

div.vdp-datepicker.form-group.has-feedback div.input-group input {
  background-color: white;
}

</style>

<script>

    import Datepicker from 'vuejs-datepicker';
    export default {
        data() {
            return {}
        },
        props: ['name', 'placeholder', 'defaultvalue'],
        components: {
          'datepicker': Datepicker
        }
    }
</script>
