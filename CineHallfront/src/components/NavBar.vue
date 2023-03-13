<template>

  <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
    <div class="d-flex w-100 justify-content-between">
      <RouterLink class="nav-link text-light fw-bold" to="/"
        ><img
          style="height: 91px; padding: 0px; width: 100px; margin: 0px"
          src="../assets/img/logo (2).png"
          alt=""
      /></RouterLink>
      <button
        data-toggle="collapse"
        class="navbar-toggler"
        data-target="#navcol-1"
      >
        <span class="sr-only">Toggle navigation</span
        ><span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse p-4 w-50"
        style="flex-grow: 0"
        id="navcol-1"
      >
        <ul class="nav d-flex justify-content-around w-100 navbar-nav">
          <li class="nav-item" role="presentation">
            <RouterLink class="nav-link text-light fw-bold" to="/"
              >Home</RouterLink
            >
          </li>
          <li class="nav-item" role="presentation">
            <RouterLink
            v-if="state"
              class="nav-link text-light fw-bold"
              :to="/myResrvation/+user.id_user"
            >
              my Resravtion
            </RouterLink>
          </li>
          <RouterLink  v-if="!state" class="nav-link text-light fw-bold" to="/login">
            Login
          </RouterLink>
          <RouterLink @click="logout()"  v-if="state" class="nav-link text-light fw-bold" to="/">
            log out
          </RouterLink>
          <RouterLink class="nav-link text-light fw-bold" to="/register"
            >Register</RouterLink
          >
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "navbar",
  data() {
    return {
      user:'',
      state:''
    }
  },
  created(){
    if(!localStorage.getItem("user")){
      this.state=false
    }
    else{
      this.user=JSON.parse(localStorage.getItem("user"))[0] 
      this.state=true

    }
  },
  methods:{
    logout(){
    localStorage.clear()
  }
  }
  
}
</script>
