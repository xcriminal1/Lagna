import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
import {
  getAuth,
  GoogleAuthProvider,
  signInWithPopup,
} from "https://www.gstatic.com/firebasejs/10.11.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyD0z3Q4unnfkjk72siDBypp-q35u1di4TM",
  authDomain: "lagna-20f93.firebaseapp.com",
  projectId: "lagna-20f93",
  storageBucket: "lagna-20f93.appspot.com",
  messagingSenderId: "110175196813",
  appId: "1:110175196813:web:f9f45af38700dfdd43b4c4"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

auth.languageCode = "en";

const user = auth.currentUser;

const provider = new GoogleAuthProvider();

const googleLogin = document.getElementById("google-login-button");
googleLogin.addEventListener("click", function () {
  signInWithPopup(auth, provider)
    .then((result) => {
      const credential = GoogleAuthProvider.credentialFromResult(result);
      const token = credential.accessToken;
      const user = result.user;

      localStorage.setItem("username", user.displayName);
      localStorage.setItem("useremail", user.email);
      localStorage.setItem("userprofile", user.photoURL);

      location.reload();
    })
    .catch((error) => {
      const errorCode = error.code;
      const errorMessage = error.message;

      const email = error.customData.email;

      const credential = GoogleAuthProvider.credentialFromError(error);
    });
});

const username = localStorage.getItem("username");
const useremail = localStorage.getItem("useremail");
const userprofile = localStorage.getItem("userprofile");

if (username && useremail && userprofile) {
  document.getElementById("loginWrapper").style.display = "none";

  document.getElementById("username").textContent = "Username: " + username;
  document.getElementById("useremail").textContent = "Email: " + useremail;
  document.getElementById("userprofile").setAttribute("src", userprofile);

  document.getElementById("userInfo").style.display = "block";
}

function logout() {
  localStorage.removeItem("username");
  localStorage.removeItem("useremail");
  localStorage.removeItem("userprofile");

  window.location.href = "login.html";
}

if (username && useremail && userprofile) {
  document.getElementById("loginWrapper").style.display = "none";

  document.getElementById("username").textContent = "Username: " + username;
  document.getElementById("useremail").textContent = "Email: " + useremail;
  document.getElementById("userprofile").setAttribute("src", userprofile);

  document.getElementById("userInfo").style.display = "block";

  document.getElementById("logoutButton").addEventListener("click", logout);
}
var select = document.getElementById("selectCountry");
    
var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
    
//console.log(countries);
//console.log(select);
    
