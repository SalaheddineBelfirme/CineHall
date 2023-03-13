<template>
<NavBar/>
<div class="wrapper">
    <div class="logo">
      <img
        src="../assets/img/logo (2).png"
        alt=""
      />
    </div>
    <div class="text-center mt-4 name">CineHall</div>
    <form @submit.prevent="login" class="p-3 mt-3">
      <div class="form-field d-flex align-items-center">
        <span class="far fa-user"></span>
        <input
          type="text"
          name="userName"
          placeholder="Username"
          v-model="token"
        />
      </div>

      <button class="btn mt-3">Login</button>
    </form>
    <div class="text-center fs-6">
      <a href="#">Forget password?</a> or <a href="#">Sign up</a>
    </div>
  </div>
<Footer/>

</template>
<script>
import NavBar from '../components/NavBar.vue';
import Footer from '../components/footer.vue';
import axios from "axios";
export default {
  name: "logine",
  components: { NavBar,Footer, },
  methods: {
    login() {
      var fd = new FormData();
      fd.append("token", this.token);
      try {
        axios
          .post(`http://localhost/CineHall/BackEnd/public/login/user`,fd,{headers:{'Content-Type':'multipart/form-data'}})
          .then((res) => {
            localStorage.setItem('user',JSON.stringify(res.data))
            this.$router.push({ path: '/' })
          });
      } catch (err) {
        console.error(err);
      }
    },
  },
  data() {
    return {
      token: "",
    };
  },
};
</script>
<style>
/* Importing fonts from Google */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

/* Reseting */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body{
    background: rgb(131,58,180);
background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(164,8,8,0.936186974789916) 50%, rgba(252,176,69,1) 100%);
        }

.wrapper {
  max-width: 350px;
  min-height: 500px;
  margin: 80px auto;
  padding: 40px 30px 30px 30px;
  background-color: #ecf0f3;
  border-radius: 15px;
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.logo {
  width: 80px;
  margin: auto;
}

.logo img {
  width: 100%;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;
  box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7,
    -8px -8px 15px #fff;
}

.wrapper .name {
  font-weight: 600;
  font-size: 1.4rem;
  letter-spacing: 1.3px;
  padding-left: 10px;
  color: #555;
}

.wrapper .form-field input {
  width: 100%;
  display: block;
  border: none;
  outline: none;
  background: none;
  font-size: 1.2rem;
  color: #666;
  padding: 10px 15px 10px 10px;
  /* border: 1px solid red; */
}

.wrapper .form-field {
  padding-left: 10px;
  margin-bottom: 20px;
  border-radius: 20px;
  box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
  color: #555;
}

.wrapper .btn {
  box-shadow: none;
  width: 100%;
  height: 40px;
  background-color: rgb(255, 193, 7);
  color: #fff;
  border-radius: 25px;
  box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
  letter-spacing: 1.3px;
}

.wrapper .btn:hover {
  background-color: #039be5;
}

.wrapper a {
  text-decoration: none;
  font-size: 0.8rem;
  color: #03a9f4;
}

.wrapper a:hover {
  color: #039be5;
}

@media (max-width: 380px) {
  .wrapper {
    margin: 30px 20px;
    padding: 40px 15px 15px 15px;
  }
}
</style>
