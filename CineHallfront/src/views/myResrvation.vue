<template>
     <NavBar/>
<h1 class="text-center">Your Resrvation </h1>
<div class='container-fluid'>
    <div class="container  "  >
        <div class="row gap-2 ">
        <div style="width: 24%;" class="card   cl-2  mt-5 pt-4" v-for="res in resrvation" key="res">
            <div class="d-flex sale ">
                <div  class="btn" :class=" {'disple':outResrvastion.includes(res.id_film)}" v-on:click="deleteResrvstion(res.id_res)" >delete</div>
            </div>
            <img class='mx-auto img-thumbnail h-100 w-100'
               :src="res.image"
                 alt=""/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">{{ res.name  }}</h5>
                <p class="card-text">{{res.num_place }}</p>
            </div>
        </div>
    </div>
 </div>

</div>
<div>
<Footer class="mt-5" />
</div>

</template>


<script>
import axios from 'axios';
import NavBar from '../components/NavBar.vue';
import Footer from '../components/footer.vue';

export default {
    name: "myResrvation",
    data() {
        return {
            resrvation: [],
            outResrvastion:[],

        };
    },
    methods: {
        getResrvastion() {
            var fd = new FormData();
            JSON.parse(localStorage.getItem("user"))[0]
            var id = this.$route.params.idR;
            fd.append("id", id);
            try {
                axios
                    .post(`http://localhost/CineHall/BackEnd/Gett/Getresrvation`, fd, { headers: { "Content-Type": "multipart/form-data" } })
                    .then((res) => {
                    this.resrvation = res.data;
                    if (res.data == "0") {
                        this.resrvation = [];
                    }
                    console.log("resrvstion est :" + res.data);
                });
            }
            catch (err) {
                console.log(err);
            }
        },
        deleteResrvstion(id) {
            var fd = new FormData();
            fd.append("id", id);
            try {
                axios
                    .post(`http://localhost/CineHall/BackEnd/Delete/DeleteResrvastion`, fd, { headers: { "Content-Type": "multipart/form-data" } })
                    .then((res) => {
                    alert("dane");
                    window.location.reload();
                });
            }
            catch (err) {
                console.log(err);
            }
        },
         
        getoutresrvastion(){

            try {
                axios
                    .post(`http://localhost/CineHall/BackEnd/public/Gett/ GetresrvationLastday`)
                    .then((res) => {
                    this.outResrvastion = res.data;
        
                    console.log("out est :" + res.data);
                });
            }
            catch (err) {
                console.log(err);
            }
        },
        

    },
    mounted() {
      
        this.getResrvastion();
        this.getoutresrvastion();
    },
    created(){
      
    if(!(localStorage.getItem("user"))){
            Swal.fire("You Should Login First");
           this.$router.push('/Login')
          }
    },

    components: { NavBar,Footer, }
}


</script>

<style>

.disple{
    display: none;
}

body{
    background: rgb(131,58,180);
background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(164,8,8,0.936186974789916) 50%, rgba(252,176,69,1) 100%);
        }
        .sale {
            flex-direction: row-reverse;
        }

        .card {
            width: fit-content;
        }

        .card-body {
            width: fit-content;
        }

        .btn {
            border-radius: 0;
            width: fit-content;
            background-color: #69F0AE;
            box-shadow: 0px 10px 10px #E0E0E0;
            z-index: 1;
            color: white;
            width: 100px;
            font-size: 14px;
            font-weight: 900;
        }

        .img-thumbnail {
            border: none;
        }

        .card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
            border-radius: 5px;
            padding-bottom: 10px;
        }

        .card-title {
            font-size: 14px;
            font-weight: 900;
        }

        .card-text {
            font-size: 14px;
            font-family: sans-serif;
            font-weight: 500;
        }

</style>