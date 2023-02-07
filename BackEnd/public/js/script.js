// const menubtn = document.querySelector("#menu-btn");
// const navbar = document.querySelector(".header .navbar");

// function deletee(id) {
//   //  var bol  ="are u want delet prodect "
//   if (!confirm("are u want delet prodect ")) {
//     return false;
//   } else {
//     $.ajax({
//       url: `http://localhost/CureCoj/traversymvc/product/deleteproudct/${id}`,
//       type: "POST",
//       success:function () {
//         window.location='http://localhost/CureCoj/traversymvc/pages/dashboard'
//       }
//     });
//   }
// }

function deletee(){
 
  form=document.getElementById('frmdelte');
  if (!confirm("are u want delet prodect ")) {
    return false;
  } else {
  form.submit();
  }
}

function vide() {}

function AddNewProdct() {
  let modle = document.getElementById("modleadd");
  let NbProudct = document.getElementById("nbprodct");

  let nb = parseInt(NbProudct.value) + 1;
  $.ajax({
    type: "GET",
    url: "http://localhost/CureCoj/traversymvc/categorie/getcategorie/",
    dataType: "json",
    success: function (result) {
      localStorage.setItem("data", JSON.stringify(result));
    },
    error: function (result) {
      console.log(result);
    },
  });
  let DataCatetgory = JSON.parse(localStorage.getItem("data"));
  var inputs =
    `<h1 class="modal-title fs-5" id="exampleModalLabel  "> Product` +
    nb +
    ` </h1>
<input name="name[]" type="text" class="form-control name" placeholder="name` +
    nb +
    `" aria-label="Username"
           aria-describedby="basic-addon1" >
       <input name="libelle[]" type="text" class="form-control libelle" placeholder="libelle" aria-label="Username" aria-describedby="basic-addon1">
       <input name="prix[]" type="text" class="form-control prix" placeholder="prix" aria-label="Recipient's username" aria-Dribedby="basic-addon2" >
       <input accept=".jpg,jpeg,.png" name="imageadd[]" type="file" class="form-control imageadd" >`;

  var select =
    "<select name='category[]' class='form-select category' aria-label='Default select example' >";

  for (let i = 0; i < DataCatetgory.length; i++) {
    var option =
      "<option value='" +
      DataCatetgory[i].id_c +
      "' selected>" +
      DataCatetgory[i].name_categorie +
      " </option>";
    select += option;
  }
  select += ' <option value="0" selected>Categorie </option> </select>';
  inputs += select;

  NbProudct.value = nb;
  modle.insertAdjacentHTML("afterend", inputs);
}

function validateEmail(email) {
  let res =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  if (res.test(email)) {
  } else {
  }
  return res.test(email);
}

function validatePassword(password) {
  let res =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return res.test(password);
}
function validatenuber(number) {
  let res = /^[0-9]*\.?[0-9]+$/;
  return res.test(number);
}
function validateText(text) {
  if (text != "") {
    return true;
  }
  return false;
}
function Save(event) {
  event.preventDefault();
  names = document.getElementsByClassName("name");
  categorys = document.getElementsByClassName("category");
  prixs = document.getElementsByClassName("prix");
  imageadds = document.getElementsByClassName("imageadd");
  libelles = document.getElementsByClassName("libelle");
  form = document.getElementById("FormAdd");
  console.log(document.getElementsByClassName("prix")[0]);
  //  for( let i = 0; i < names.length; i++) {

  //  }
  var bol = true;
  for (let i = 0; i < names.length; i++) {
    if (validatenuber(prixs[i].value)) {
      prixs[i].style.borderColor = "blue";
    } else {
      prixs[i].style.borderColor = "red";
      bol = false;
    }
    let name = names[i];

    if (validateText(name.value)) {
      name.style.borderColor = "blue";
    } else {
      name.style.borderColor = "red";
      bol = false;
    }
    let category = categorys[i];
    if (validateText(category.value)) {
      category.style.borderColor = "blue";
    }
    if (category.value == "0") {
      category.style.borderColor = "red";
      bol = false;
    }

    let libelle = libelles[i];
    if (validateText(libelle.value)) {
      libelle.style.borderColor = "blue";
    } else {
      libelle.style.borderColor = "red";
      bol = false;
    }
    let image = imageadds[i];
    if (validateText(image.value)) {
      image.style.borderColor = "blue";
    } else {
      image.style.borderColor = "red";
      bol = false;
    }

    if (bol == true) {
      form.submit();
      // event.preventDefault()
    } else if (bol == false) {
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          
          Swal.fire("Saved!", "", "success");
        } else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
    }

    let modle = document.getElementById("modleadd");
    modle.innerHTML = "";
  }
}

function validate(event) {
  let form = $("#formlogin");
  let erremail = $("#emailER");
  let errpassword = $("#paswordER");
  let email = $("#emaillog").val();
  let password = $("#paswordlog").val();
  event.preventDefault();

  let bol = true;

  erremail.text("");
  if (validateEmail(email)) {
    erremail.text(email + " is valid");
    erremail.css("color", "blue");
  } else {
    erremail.text(email + " is not valid");
    erremail.css("color", "red");
    bol = false;
  }

  errpassword.text("");
  if (validatePassword(password)) {
    errpassword.text("password  is valid");
    errpassword.css("color", "blue");
  } else {
    errpassword.text(" password is not valid");
    errpassword.css("color", "red");
    bol = false;
  }
  if (bol) {
    form.submit();
  }

  return false;
}

function validateupdate(event) {
  let formupdate = document.getElementById("formupdate");
  let name = document.getElementById("namep").value;
  let nameER = document.getElementById("namepER");
  let libellepER = document.getElementById("libellepER");
  let libellep = document.getElementById("libellep").value;
  let category = document.getElementById("catgoryp").value;
  let catgoryER = document.getElementById("catgorypER");
  let prix = document.getElementById("prixp").value;
  let prixER = document.getElementById("prixpER");

  event.preventDefault();

  let bol = true;
  libellepER.innerHTML = "";
  if (validateText(libellep)) {
    libellepER.innerHTML = libellep + " is valid";
    libellepER.style.color = "blue";
  } else {
    libellepER.innerHTML = libellep + " is not valid";
    libellepER.style.color = "red";
    bol = false;
  }
  nameER.innerHTML = "";
  if (validateText(name)) {
    nameER.innerHTML = name + " is valid";
    nameER.style.color = "blue";
  } else {
    nameER.innerHTML = name + " is not valid";
    nameER.style.color = "red";
    bol = false;
  }
  if (validateText(category)) {
    catgoryER.innerHTML = " is valid";
    catgoryER.style.color = "blue";
  } else {
    catgoryER.innerHTML = " is not valid";
    catgoryER.style.color = "red";
    bol = false;
  }
  if (validatenuber(prix)) {
    prixER.innerHTML = prix + " is valid";
    prixER.style.color = "blue";
  } else {
    prixER.innerHTML = prix + " is not valid";
    prixER.style.color = "red";
    bol = false;
  }
  if (bol) {
    formupdate.submit();
  } else {
    return false;
  }
}

// document.addEventListener("DOMContentLoaded",()=>{

//   console.log("ggggaaaggggggggg");
// })
