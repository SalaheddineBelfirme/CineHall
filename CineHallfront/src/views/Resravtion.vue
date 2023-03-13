<template>
  <section class="w-100 cover  ">


  <NavBar/>   <h1>Resrvastion{{ this.$route.params.id }}</h1>
  <div class="d-flex  justify-content-around ">
  <div  class=" bg-light w-25 ">

    <div style="  margin: 0; background-color:rgb(255, 193, 7)" class="row align-center w-100">
      <div @click="show(n)" v-for="n in 40" :key="n" class="col-sm-2 ss" >
        <svg :class="{'full':this.placsResrevd.includes(n)}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
          <path
            d="M64 160C64 89.3 121.3 32 192 32H448c70.7 0 128 57.3 128 128v33.6c-36.5 7.4-64 39.7-64 78.4v48H128V272c0-38.7-27.5-71-64-78.4V160zM544 272c0-20.9 13.4-38.7 32-45.3c5-1.8 10.4-2.7 16-2.7c26.5 0 48 21.5 48 48V448c0 17.7-14.3 32-32 32H576c-17.7 0-32-14.3-32-32H96c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V272c0-26.5 21.5-48 48-48c5.6 0 11 1 16 2.7c18.6 6.6 32 24.4 32 45.3v48 32h32H512h32V320 272z"
          />
        </svg>
      </div>
    </div>

  
  </div>
  <img class="h-50 w-25" :src="this.film.image" alt="">
</div>

</section>  
</template>

<script>
import Swal from "sweetalert2";
import NavBar from "../components/NavBar.vue";
import axios from "axios";

export default {
  data(){
    return{
      name: "Resrvastion",
  place: "",
  placsResrevd: [],
  film: "",
    }

  },
  components:{
     NavBar,
  },
  created(){
      
      if(!(localStorage.getItem("user"))){
              Swal.fire("You Should Login First");
             this.$router.push('/Login')
            }
      },
  
 
  methods: {
    getPlaces() {
      var fd = new FormData();
      let id = this.$route.params.id;
      fd.append("id", id);
      axios
      // get plcese resrved from DB
        .post(`http://localhost/CineHall/BackEnd/public/Gett/getPlaces`, fd, {
          headers: {
            "Content-Type":
              "multipart/form-data; boundary=<calculated when request is sent>",
          },
        })
        .then((res) => {
          // set res in array plceResrevd
          this.placsResrevd = res.data;
        });
    },
    
    getOneFilm() {
      var fd = new FormData();
   

      let id = this.$route.params.id;
      fd.append("id", id);
      axios
        .post(`http://localhost/CineHall/BackEnd/public/Gett/getOneFilme`, fd, {
          headers: {
            "Content-Type":
              "multipart/form-data; boundary=<calculated when request is sent>",
          },
        })
        .then((res) => {
          this.film = res.data[0];
        });
    },
    show(plce) {
     
   if (this.placsResrevd.includes(plce)) {
    
 
    Swal.fire("deja resrevd")
  
 
     }
     else{
      //////////////////////////////////////////////////////////////////////////
      Swal.fire({

        title: "Do you want to resrev this place ?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          const user = JSON.parse(localStorage.getItem("user"))[0];
          let prix = 4;
          this.place = plce;
          var fd = new FormData();
          fd.append("filme", this.film.id_filme);
          fd.append("place", plce);
          fd.append("user", user.id_user);
          fd.append("prix", prix);
          try {
            axios
              .post(
                `http://localhost/CineHall/BackEnd/public/Create/addResrvation`,
                fd,
                { headers: { "Content-Type": "multipart/form-data" } }
              )
              .then((res) => {
                
                this.placsResrevd.push(plce)       
                
              
              });
          } catch (err) {
            console.error(err);
          }
          window.location.reload()
      
          Swal.fire("resrevd !", "", "success");
          
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
    }
    },
  },
  mounted() {
    console.log(this.placsResrevd);
    this.getOneFilm();

    this.getPlaces();
  },
};
</script>

<style>
.ss {
  width: 60px;
}
.full {
  fill: red;
}
.cover{
  height: 100vh;
  background-image: url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80') ;
  background-repeat: no-repeat;
  background-size:cover;
}
</style>















