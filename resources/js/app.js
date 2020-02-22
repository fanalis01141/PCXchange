/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#formSell').on('submit', function(e){

        e.preventDefault();
        $.ajax({
            url: "/products",
            method: "POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
                console.log("SUCCESS", data);
                Swal.fire({
                    title: 'Product posted',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Cool!',
                }).then((data) => {
                    $("#formSell")[0].reset();
                    $("#blah").src = "/public/180.png"
                })
            },
            error:function(error){
                var errorString = "";
                $.each(error.responseJSON.errors, function(key, value){
                    console.log(value);
                    errorString =+ value.toString;
                });
                Swal.fire({
                    title: 'Error!',
                    text: errorString,
                    icon: 'error',
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonColor: '#d9534f',
                    cancelButtonText: 'Yikes'
                })
                
            }
        })
    });

    $("#prod_image").change(function(){
        const file = this.files[0];
        const  fileType = file['type'];
        const validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
        if (!validImageTypes.includes(fileType)) {
            Swal.fire({
                title: 'Oops!',
                text: 'You uploaded a file that is not an image file.',
                icon: 'error',
                cancelButton: 'cancel-button-class',
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonColor: '#d9534f',
                cancelButtonText: 'Yikes'
            })
        }
    });

});
