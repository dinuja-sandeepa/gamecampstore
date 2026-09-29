function haveAccount() {
  window.location = "signIn.php";
}

var ss;
function signUp() {
  var f = document.getElementById("f");
  var l = document.getElementById("l");
  var e = document.getElementById("e");
  var p = document.getElementById("p");
  var m = document.getElementById("m");
  var g = document.getElementById("g");

  var form = new FormData();
  form.append("f", f.value);
  form.append("l", l.value);
  form.append("e", e.value);
  form.append("p", p.value);
  form.append("m", m.value);
  form.append("g", g.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "success") {
        var s = document.getElementById("Successfully_signup");
        ss = new bootstrap.Modal(s);
        ss.show();
        // alert("Registration Successfull. Login Now");
        // window.location = "signIn.php";
      } else {
        document.getElementById("msg").innerHTML = text;
        document.getElementById("msgdiv").className = "d-block";
        //alert(text);
      }
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(form);
}

function signIn() {
  var email = document.getElementById("e2");
  var password = document.getElementById("p2");
  var rememberme = document.getElementById("rememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "home.php";
      } else {
        alert("Something Went Wrong. Please Try again.");
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(f);
}

var bm;
function forgotPassword() {
  var email = document.getElementById("e2");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert(
          "Verification code has sent to your email. Please check your inbox"
        );
        var m = document.getElementById("forgotPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
  r.send();
}

function showPassword1() {
  var i = document.getElementById("npi");
  var eye = document.getElementById("sp1");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function showPassword2() {
  var i = document.getElementById("rnp");
  var eye = document.getElementById("sp2");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function resetpw() {
  var email = document.getElementById("e2");
  var np = document.getElementById("npi");
  var rnp = document.getElementById("rnp");
  var vcode = document.getElementById("vc");

  var f = new FormData();
  f.append("e", email.value);
  f.append("n", np.value);
  f.append("r", rnp.value);
  f.append("v", vcode.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        bm.hide();
        alert("Password reset success");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "resetPassword.php", true);
  r.send(f);
}

var a1;
var a2;
var ls;
function addToCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "1") {
        var a = document.getElementById("Already_Added_Cart_Modal");
        a1 = new bootstrap.Modal(a);
        a1.show();
      } else if (t == "2") {
        var b = document.getElementById("Successfully_added_cart_Modal");
        a2 = new bootstrap.Modal(b);
        a2.show();
      } else if (t == "4") {
        var c = document.getElementById("LogIn_SignUp");
        ls = new bootstrap.Modal(c);
        ls.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToCartProcess.php?id=" + id, true);
  r.send();
}

var r1;
function deleteFromCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
  r.send();
}

var w1;
var w2;
function addToWishlist(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "1") {
        var a = document.getElementById("Already_added_Wishlist_Modal");
        w1 = new bootstrap.Modal(a);
        w1.show();
      } else if (t == "2") {
        var b = document.getElementById("Successfully_added_wishlist_Modal");
        w2 = new bootstrap.Modal(b);
        w2.show();
      } else if (t == "4") {
        var c = document.getElementById("LogIn_SignUp");
        ls = new bootstrap.Modal(c);
        ls.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToWishlistProcess.php?id=" + id, true);
  r.send();
}

function removeFromWishlist(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "removeWishlistProcess.php?id=" + id, true);
  r.send();
}

function changeImage() {
  var view = document.getElementById("viewImg"); //img tag
  var file = document.getElementById("profileimg"); //file chooser

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var image = document.getElementById("profileimg");

  var f = new FormData();
  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("m", mobile.value);
  f.append("image", image.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "updateProfileProcess.php", true);
  r.send(f);
}

function updateAdminProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var image = document.getElementById("profileimg");

  var f = new FormData();
  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("m", mobile.value);
  f.append("image", image.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "adminProfileUpdateProcess.php", true);
  r.send(f);
}

function basicSearch(x) {
  var txt = document.getElementById("basic_search_txt");

  var f = new FormData();
  f.append("t", txt.value);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("basicSearchResult").innerHTML = t;
    }
  };

  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);
}

// function payNow(id) {

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function () {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             var obj = JSON.parse(t);

//             var mail = obj["mail"];
//             var amount = obj["amount"];

//             if (t == "1") {
//                 alert("Please log in or sign up");
//                 window.location = "index.php";
//             } else {
//                 // Payment completed. It can be a successful failure.
//                 payhere.onCompleted = function onCompleted(orderId) {

//                     console.log("Payment completed. OrderID:" + orderId);

//                     saveInvoice(orderId, id, mail, amount);
//                     // Note: validate the payment and show success or failure page to the customer
//                 };

//                 // Payment window closed
//                 payhere.onDismissed = function onDismissed() {
//                     // Note: Prompt user to pay again or show an error page
//                     console.log("Payment dismissed");
//                 };

//                 // Error occurred
//                 payhere.onError = function onError(error) {
//                     // Note: show an error page
//                     console.log("Error:" + error);
//                 };

//                 // Put the payment variables here
//                 var payment = {
//                     "sandbox": true,
//                     "merchant_id": "1221430",    // Replace your Merchant ID
//                     "return_url": "http://localhost/gamecamp/singleProductView.php?id" + id,     // Important
//                     "cancel_url": "http://localhost/gamecamp/singleProductView.php?id" + id,     // Important
//                     "notify_url": "http://sample.com/notify",
//                     "order_id": obj["id"],
//                     "items": obj["item"],
//                     "amount": amount,
//                     "currency": "LKR",
//                     "hash": obj["hash"],
//                     "first_name": obj["fname"],
//                     "last_name": obj["lname"],
//                     "email": mail,
//                     "phone": obj["mobile"],
//                     "address": "NotYet",
//                     "city": "NotYet",
//                     "country": "Sri Lanka",
//                     "delivery_address": "NotYet",
//                     "delivery_city": "NotYet",
//                     "delivery_country": "Sri Lanka",
//                     "custom_1": "",
//                     "custom_2": ""
//                 };

//                 // Show the payhere.js popup, when "PayHere Pay" is clicked
//                 // document.getElementById('payhere-payment').onclick = function (e) {
//                 payhere.startPayment(payment);
//                 // };
//             }

//         }
//     }

//     r.open("GET", "buyNowProcess.php?id=" + id, true);
//     r.send();

// }

function blockProduct(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("pb" + id).innerHTML = "Unblock";
        document.getElementById("pb" + id).classList = "btn btn-success";
      } else if (txt == "unblocked") {
        document.getElementById("pb" + id).innerHTML = "Block";
        document.getElementById("pb" + id).classList = "btn btn-danger";
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "gameBlockProcess.php?id=" + id, true);
  request.send();
}

function blockUser(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("ub" + id).innerHTML = "Unblock";
        document.getElementById("ub" + id).classList = "btn btn-success";
      } else if (txt == "unblocked") {
        document.getElementById("ub" + id).innerHTML = "Block";
        document.getElementById("ub" + id).classList = "btn btn-danger";
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "userBlockProcess.php?id=" + id, true);
  request.send();
}

function blockAdmin(id) {
  
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("ab" + id).innerHTML = "Unblock";
        document.getElementById("ab" + id).classList = "btn btn-success";
      } else if (txt == "unblocked") {
        document.getElementById("ab" + id).innerHTML = "Block";
        document.getElementById("ab" + id).classList = "btn btn-danger";
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "adminBlockProcess.php?id=" + id, true);
  request.send();
}

function changeGameImage() {
  var image = document.getElementById("imageuploader");

  image.onchange = function () {
    var file_count = image.files.length;

    if (file_count <= 3) {
      for (var x = 0; x < file_count; x++) {
        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("i" + x).src = url;
      }
    } else {
      alert("Please select 3 or less than 3 images.");
    }
  };
}

var addg;
function addGame() {
  var title = document.getElementById("title");
  var price = document.getElementById("price");
  var date = document.getElementById("date");
  var developer = document.getElementById("developer");
  var publisher = document.getElementById("publisher");
  var position = document.getElementById("position");
  var platform = document.getElementById("platform");
  var slo = document.getElementById("slo");
  var os = document.getElementById("os");
  var processor = document.getElementById("pro");
  var ram = document.getElementById("ram");
  var vcard = document.getElementById("vcard");
  var scard = document.getElementById("scard");
  var hdd = document.getElementById("hdd");
  var desc = document.getElementById("desc");
  var image = document.getElementById("imageuploader");
  var gamelink = document.getElementById("glink");
  var discount = document.getElementById("discount");

  var f = new FormData();

  f.append("de", developer.value);
  f.append("pu", publisher.value);
  f.append("po", position.value);
  f.append("pla", platform.value);
  f.append("os", os.value);
  f.append("pro", processor.value);
  f.append("ram", ram.value);
  f.append("vcard", vcard.value);
  f.append("scard", scard.value);
  f.append("hdd", hdd.value);
  f.append("slo", slo.value);
  f.append("desc", desc.value);
  f.append("t", title.value);
  f.append("p", price.value);
  f.append("date", date.value);
  f.append("discount", discount.value);
  f.append("glink", gamelink.value);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
    f.append("image" + x, image.files[x]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        var g = document.getElementById("successfully_added");
        addg = new bootstrap.Modal(g);
        addg.show();
      } else {
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };

  r.open("POST", "addGameProcess.php", true);
  r.send(f);
}

function sendId(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "updateGame.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "sendGameIdProcess.php?id=" + id, true);
  r.send();
}

var us;
function updateGame() {
  var title = document.getElementById("title");

  var title = document.getElementById("title");
  var price = document.getElementById("price");
  var date = document.getElementById("date");
  var position = document.getElementById("position");
  var platform = document.getElementById("platform");
  var slo = document.getElementById("slo");
  var os = document.getElementById("os");
  var processor = document.getElementById("pro");
  var ram = document.getElementById("ram");
  var vcard = document.getElementById("vcard");
  var scard = document.getElementById("scard");
  var hdd = document.getElementById("hdd");
  var desc = document.getElementById("desc");
  var discount = document.getElementById("discount");
  var images = document.getElementById("imageuploader");

  var f = new FormData();
  f.append("po", position.value);
  f.append("pla", platform.value);
  f.append("os", os.value);
  f.append("pro", processor.value);
  f.append("ram", ram.value);
  f.append("vcard", vcard.value);
  f.append("scard", scard.value);
  f.append("hdd", hdd.value);
  f.append("slo", slo.value);
  f.append("desc", desc.value);
  f.append("t", title.value);
  f.append("p", price.value);
  f.append("date", date.value);
  f.append("discount", discount.value);

  var img_count = images.files.length;

  for (var x = 0; x < img_count; x++) {
    f.append("i" + x, images.files[x]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        var u = document.getElementById("successfully_updated");
        us = new bootstrap.Modal(u);
        us.show();
      } else {
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };

  r.open("POST", "updateGameProcess.php", true);
  r.send(f);
}

var av;
function adminVerification() {
  var email = document.getElementById("Ae");

  var f = new FormData();
  f.append("Ae", email.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        var adminVerificationModal =
          document.getElementById("verificationModal");
        av = new bootstrap.Modal(adminVerificationModal);
        av.show();
      } else {
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msgdiv").className = "d-block";
        //alert(t);
      }
    }
  };

  r.open("POST", "adminVerificationProcess.php", true);
  r.send(f);
}

function verify() {
  var verification = document.getElementById("vcode");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        av.hide();
        window.location = "adminPanel.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "verificationProcess.php?v=" + verification.value, true);
  r.send();
}

function signOut() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if ((t = "success")) {
        window.location = "home.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "signoutProcess.php", true);
  r.send();
}

function createInvoice() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "Invoice.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "createInvoiceProcess.php", true);
  r.send();
}

function printInvoice() {
  var body = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = body;
}

function generatePDF() {
  // Choose the element that your content will be rendered to.
  const element = document.getElementById("page");
  // Choose the element and save the PDF for your user.
  html2pdf().from(element).save();
}

function addPublisher() {
  var newPub = document.getElementById("newPub");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      location.reload();
    }
  };

  r.open("GET", "addPublisherProcess.php?p=" + newPub.value, true);
  r.send();
}

function addDeveloper() {
  var newDev = document.getElementById("newDev");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      location.reload();
    }
  };

  r.open("GET", "addDeveloperProcess.php?d=" + newDev.value, true);
  r.send();
}

function userChatSend() {
  var msg = document.getElementById("userMessage");
  //alert(msg.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      //alert(t);
      location.reload();
    }
  };

  r.open("GET", "userChatSendProcess.php?msg=" + msg.value, true);
  r.send();
}

function adminChatSend(uid) {
  var msg = document.getElementById("adminMessage");
  //alert(uid);

  var f = new FormData();
  f.append("adminMessage", msg.value);
  f.append("userId", uid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      //alert(t);
      location.reload();
    }
  };

  r.open("POST", "adminChatSendProcess.php", true);
  r.send(f);
}

function viewMessages(id) {
  alert(id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("chat_box").innerHTML = t;
    }
  };

  r.open("GET", "viewMsgProcess.php?id=" + id, true);
  r.send();
}

var addA;
function addAdmin() {
  var e = document.getElementById("e");
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var mobile = document.getElementById("m");

  var f = new FormData();
  f.append("email", e.value);
  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("mobile", mobile.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if ((t = "Success")) {
        var a = document.getElementById("addAdmin");
        addA = new bootstrap.Modal(a);
        addA.show();
      } else {
        alert(t);
        window.location = "manageAdmin.php";
      }
    }
  };

  r.open("POST", "addAdminProcess.php", true);
  r.send(f);
}

function adminSignOut() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if ((t = "success")) {
        window.location = "adminSignIn.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "adminSignoutProcess.php", true);
  r.send();
}
