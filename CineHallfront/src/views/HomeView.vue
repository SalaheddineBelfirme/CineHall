<script setup>
import NavBar from '../components/NavBar.vue';
import Footer from '../components/footer.vue';
import cards from '../components/cards.vue';
import txtanmtion from '../components/txtanmtion.vue';
</script>



<template>
<div>
        <div class="header-blue">
          <NavBar> </NavBar>
          <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1>We Have Best Movies</h1>
                        <p>Qu'il soit effrayant, comique, dramatique, romantique ou autre, le cinéma sait éveiller nos sens. Et avec autant de titres disponibles, il y a tellement de choses à découvrir .<br></p>
                        <button
                            class="btn btn-light btn-lg action-button" type="button">See More<i class="fa fa-long-arrow-right ml-2"></i></button>
                    </div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup">
						<img class="device" src="../assets/img/[removal.ai]_2f5f54f6-a1b9-44ba-9565-4b5927503b73.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <cards></cards>
    <txtanmtion ></txtanmtion>

    <Footer></Footer>
</template>


<style>
.header-blue {
  background: linear-gradient(135deg, #fe2929, #980527);
  background-color: #184e8e;
  padding-bottom: 80px;
  font-family: 'Source Sans Pro', sans-serif;
}

@media (min-width:768px) {
  .header-blue {
    padding-bottom: 120px;
  }
}

.header-blue .navbar {
  background: transparent;
  padding-top: .75rem;
  padding-bottom: .75rem;
  color: #fff;
  border-radius: 0;
  box-shadow: none;
  border: none;
}

@media (min-width:768px) {
  .header-blue .navbar {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
}

.header-blue .navbar .navbar-brand {
  font-weight: bold;
  color: inherit;
}

.header-blue .navbar .navbar-brand:hover {
  color: #f0f0f0;
}

.header-blue .navbar .navbar-collapse {
  border-top: 1px solid rgba(255,255,255,0.3);
  margin-top: .5rem;
}

@media (min-width:768px) {
  .header-blue .navbar .navbar-collapse {
    border-color: transparent;
    margin: 0;
  }
}

.header-blue .navbar .navbar-collapse span .login {
  color: #fff;
  margin-right: .5rem;
  text-decoration: none;
}

.header-blue .navbar .navbar-collapse span .login:hover {
  color: #fff;
}

.header-blue .navbar .navbar-toggler {
  border-color: rgba(255,255,255,0.3);
}

.header-blue .navbar .navbar-toggler:hover, .header-blue .navbar-toggler:focus {
  background: none;
}

@media (min-width: 768px) {
  .header-blue .navbar-nav .nav-link {
    padding-left: .7rem;
    padding-right: .7rem;
  }
}

@media (min-width: 992px) {
  .header-blue .navbar-nav .nav-link {
    padding-left: 1.2rem;
    padding-right: 1.2rem;
  }
}

.header-blue .navbar.navbar-light .navbar-nav .nav-link {
  color: #fff;
}

.header-blue .navbar.navbar-light .navbar-nav .nav-link:focus, .header-blue .navbar.navbar-light .navbar-nav .nav-link:hover {
  color: #fcfeff !important;
  background-color: transparent;
}

.header-blue .navbar .navbar-nav > li > .dropdown-menu {
  margin-top: -5px;
  box-shadow: 0 4px 8px rgba(0,0,0,.1);
  background-color: #fff;
  border-radius: 2px;
}

.header-blue .navbar .dropdown-menu .dropdown-item:focus, .header-blue .navbar .dropdown-menu .dropdown-item {
  line-height: 2;
  color: #37434d;
}

.header-blue .navbar .dropdown-menu .dropdown-item:focus, .header-blue .navbar .dropdown-menu .dropdown-item:hover {
  background: #ebeff1;
}

.header-blue .action-button, .header-blue .action-button:not(.disabled):active {
  border: 1px solid rgb(255,255,255);
  border-radius: 40px;
  color: #fff;
  box-shadow: none;
  text-shadow: none;
  padding: .3rem .8rem;
  background: transparent;
  transition: background-color 0.25s;
  outline: none;
}

.header-blue .action-button:hover {
  color: #fff;
}

.header-blue .navbar .form-inline label {
  color: #d9d9d9;
}

.header-blue .navbar .form-inline .search-field {
  display: inline-block;
  width: 80%;
  background: none;
  border: none;
  border-bottom: 1px solid transparent;
  border-radius: 0;
  color: #fff;
  box-shadow: none;
  color: inherit;
  transition: border-bottom-color 0.3s;
}

.header-blue .navbar .form-inline .search-field:focus {
  border-bottom: 1px solid #ccc;
}

.header-blue .hero {
  margin-top: 20px;
  text-align: center;
}

@media (min-width:768px) {
  .header-blue .hero {
    margin-top: 60px;
    text-align: left;
  }
}

.header-blue .hero h1 {

  color: #fff;
  font-size: 40px;
  margin-top: 90px;
  margin-bottom: 15px;
  font-weight: 300;
  line-height: 1.4;
}

@media (min-width:992px) {
  .header-blue .hero h1 {

    margin-bottom: 24px;
    line-height: 1.2;
  }

}

.header-blue .hero p {
  color: rgba(255,255,255,0.8);
  font-size: 20px;
  margin-bottom: 30px;
  font-weight: 300;
}

.header-blue .phone-holder {
  text-align: right;
}

.header-blue div.iphone-mockup {
 position: relative;
    max-width: 300px;
    display: inline-block;
}

.header-blue .iphone-mockup img.device {
  margin-top: 105px;
  width: 100%;
  height: 250px;
}

.header-blue .iphone-mockup .screen {
  position: absolute;
  width: 88%;
  height: 77%;
  top: 10%;
  border-radius: 2px;
  left: 6%;
  border: 1px solid #444;
  background-color: #aaa;
  overflow: hidden;
  background: url(../../assets/img/screen-content-iphone-6.jpg);
  background-size: cover;
  background-position: center;
}

.header-blue .iphone-mockup .screen:before {
  content: '';
  background-color: #fff;
  position: absolute;
  width: 70%;
  height: 140%;
  top: -12%;
  right: -60%;
  transform: rotate(-19deg);
  opacity: 0.2;
}
</style>