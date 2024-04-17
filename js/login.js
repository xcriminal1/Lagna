import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
import {
  getAuth,
  GoogleAuthProvider,
  signInWithPopup,
} from "https://www.gstatic.com/firebasejs/10.11.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyBD3gnATiaSFfYzlBwiYdWdftSpP4u9vu8",
  authDomain: "lagna-21508.firebaseapp.com",
  projectId: "lagna-21508",
  storageBucket: "lagna-21508.appspot.com",
  messagingSenderId: "1067218312636",
  appId: "1:1067218312636:web:a4e657dbdaabb77b251fb9",
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
