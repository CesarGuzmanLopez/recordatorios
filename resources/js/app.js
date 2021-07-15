/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');


window.Vue = require('vue').default;

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


/**
 *
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        elim: {
            id_eliminar: -1,
            Nombre: "",
            Apellido: ""
        },
        edit: {
            id_editar: -1,
            Nombre: "",
            Apellido: "",
            Correo: "",
            Telefono: "",
            Passowrd: "",
            change_password: false,
        },
        elim_item: {
            id: -1,
            Serie: "",
            Motor: ""
        },
        edit_item: {
            id: "",
            Serie: "",
            Motor: "",
            placas: "",
            Descripcion: "",
            Kilometros: 0,
            Ultimo_mantenimiento: "",
        }

    },
    methods: {
        eliminarelem(id, Nombre, Apellido) {
            this.$refs['elimuser'].show();
            this.elim.id_eliminar = id;
            this.elim.Nombre = Nombre;
            this.elim.Apellido = Apellido;
        },
        eliminarcancel() {
            this.$refs['elimuser'].hide();
        },
        editarelem(id, Nombre, Apellido, Telefono, correo) {
            this.$refs['editaruser'].show();
            this.edit.id_editar = id;
            this.edit.Nombre = Nombre;
            this.edit.Apellido = Apellido;
            this.edit.Telefono = Telefono;
            this.edit.correo = correo;
            this.edit.password = "";
            this.edit.change_password = false;
        },
        editarCancel() {
            this.$refs['editaruser'].hide();
        },
        eliminaritem(id, Serie, Motor) {
            this.$refs['elimitem'].show();
            this.elim_item.id = id;
            this.elim_item.Motor = Motor;
            this.elim_item.Serie = Serie;

        },
        eliminaritemOcultar(id, Serie, Motor) {
            this.$refs['elimitem'].hide();
        },
        editaritem(
            id,
            Serie,
            Motor,
            placas,
            Descripcion,
            Kilometros,
            Ultimo_mantenimiento) {

            this.$refs['edititem'].show();
            this.edit_item.id = id;
            this.edit_item.Serie = Serie;
            this.edit_item.Motor = Motor;
            this.edit_item.placas = placas;
            this.edit_item.Descripcion = Descripcion;
            this.edit_item.Kilometros = Kilometros;
            this.edit_item.Ultimo_mantenimiento = Ultimo_mantenimiento;
        },
        editaritemOcultar(id, Serie, Motor) {
            this.$refs['edititem'].hide();
        },
    }
});
