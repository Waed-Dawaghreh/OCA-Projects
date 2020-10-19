function checkName() {
  let regex = /^[a-zA-Z]+ [a-xA-Z]+$/;
  let regex2 = /^[a-zA-Z]+ [Al][-][a-zA-z]+$/;
  let name = document.getElementById("name").value;

  if (!regex.test(name)) {
    alert("Invalid name");
  } else {
    alert("Valid name");
  }
}

function checkPhone() {
  let regex3 = /^\(?\d{3}\)?-?\s*-?\d{4}$/;
  let phone = document.getElementById("phoneNum").value;
  if (!regex3.test(phone)) {
    alert("Invalid phone num");
  } else {
    alert("Valid Number");
  }
}
function check_Email() {
  let regex = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
  let mail = document.getElementById("email").value;
  if (regex.test(mail)) {
    return true;
    alert(" This is a valid Email email");
  } else {
    alert("This is not a valid email address");
    return false;
  }
}
function checkPass() {
  let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
  let pass = document.getElementById("password").value;
  if (regex.test(pass)) {
    return true;
    alert(" This is a valid pass ");
  } else {
    alert("This is not a valid pass ");
    return false;
  }
}
function allChecks() {
  checkName();
  checkPass();
  checkPhone();
  check_Email();
}
var checkbox = document.querySelector("input[name= policy]");

checkbox.addEventListener("change", function () {
  if (this.checked) {
    // Checkbox is checked..
    allChecks();
  } else {
  }
});

// function Stopwatch() {
//   let startTime,
//     endTime,
//     running,
//     duration = 0;

//   this.start = function () {
//     if (running) throw new Error("Stopwatch Has Already Started");

//     running = true;
//     startTime = new Date();
//   };
//   this.stop = function () {
//     if (!running) throw new Error("Stopwatch Is Not Started");

//     running = false;

//     endTime = new Date();

//     const seconds = (endTime.getTime() - startTime.getTime()) / 1000;
//     duration += seconds;
//   };
//   this.reset = function () {
//     startTime = null;
//     endTime = null;
//     duration = 0;
//     running = false;
//   };
//   Object.defineProperty(this, "duration", {
//     get: function () {
//       return duration;
//     },
//   });
// }
// const sw = new Stopwatch();

// function Person(first, last, age, gender, interests) {
//   this.name = {
//     first: first,
//     last: last,
//   };
//   this.age = age;
//   this.gender = gender;
//   this.interests = interests;
//   this.bio = function () {
//     alert(
//       this.name.first +
//         " " +
//         this.name.last +
//         " is " +
//         this.age +
//         " years old. He likes " +
//         this.interests[0] +
//         " and " +
//         this.interests[1] +
//         "."
//     );
//   };
//   this.greeting = function () {
//     alert("Hi! I'm " + this.name.first + ".");
//   };
// }

// let person1 = new Person("Bob", "Smith", 32, "male", ["music", "skiing"]);
// console.log(person1);
// console.log(person1.bio());

// var rows = 5;

// for (let i = 1; i <= rows; i++) {
//   let str = "";

//   for (let j = 1; j <= i; j++) {
//     str += "*";
//   }

//   console.log(str);
// }

// //====================================================

// for (let i = 1; i <= rows; i++) {
//   let str = "";

//   for (let k = 1; k <= rows - i; k++) {
//     str += " ";
//   }

//   for (let j = 1; j <= i; j++) {
//     str += "*";
//   }

//   console.log(str);
// }
// //===============================================
// console.log("======================================");

// for (let i = 1; i <= rows; i++) {
//   let str = "";
//   for (let k = 1; k <= rows - i; k++) {
//     str += " ";
//   }

//   for (let j = 0; j != 2 * i - 1; j++) {
//     str += "*";
//   }

//   console.log(str);
// }
//   for (let k = i + 1; k <= rows; k++) {
//     str += " ";
//   }

// const circle = {
//   radius: 1,
//   location: {
//     x: 1,
//     y: 2,
//   },
//   draw: function () {
//     console.log("draw");
//   },
// }; //objects in a literal syntax
// circle.draw();
// // Factory Function
// function creatCircle(radius) {
//   return {
//     radius: radius,
//     draw: function () {
//       console.log("Draw");
//     },
//     location: {
//       x: 1,
//       y: 2,
//     },
//   };
// }

// const circle = creatCircle(1);
// circle.draw();

// //Constructor Function
// function Circle(radius) {
//   console.log("This =", this);
//   this.radius = radius; //reference to the object that executing this piece of code
//   this.draw = function () {
//     console.log("draw constructor");
//   };
// }
// const another = new Circle(1);
