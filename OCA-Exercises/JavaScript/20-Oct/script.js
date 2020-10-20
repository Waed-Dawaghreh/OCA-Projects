//==========================Class Person ===========================
class Person {
  constructor(id, name, age) {
    this.id = id;
    this.name = name;
    this.age = age;
  }
  greeting() {
    return `This is ${this.name} with id ${this.id} and my age is ${this.age}`;
  }
}

//================ Class Car =================================
class Car {
  constructor(id, type, year) {
    this.id = id;
    this.type = type;
    this.year = year;
  }
  start() {
    return `The Car ${this.type} is running`;
  }
}

//==========================Class Animal ============================

class Animal {
  constructor(id, name, isPet) {
    this.id = id;
    this.name = name;
    this.isPet = isPet;
  }
  homeAnimal(isPet) {
    let str;
    if (this.isPet != true) {
      str = "The " + this.name + " " + "is not a pet";
    } else {
      str = "The " + this.name + " " + "is a pet";
    }
    return str;
  }
}

//======================Class Teacher =============================
class Teacher extends Person {
  constructor(id, name, age, yearOfEmployment) {
    super(id, name, age);
    this.yearOfEmployment = yearOfEmployment;
  }
  greeting() {
    return `I'm a teacher my name is ${this.name} and I've had my job in ${this.yearOfEmployment}`;
  }
}

const person1 = new Person("31245", "Waed", 22);
const person2 = new Person("45673", "Reem", 23);
//==========================
const car1 = new Car("56748ZA", "Toyota", 2020);
const car2 = new Car("83982SD", "Ford", 2021);
//==========================
const animal1 = new Animal("lio980", "Lion", false);
const animal2 = new Animal("cat250", "Cat", true);
//=================================
const Sobhi = new Teacher("3568tsa1", "Sobhi", 30, 2010);
//=====================================================

console.log(person1.greeting());
console.log(person2.name);
//===========================
console.log(car1.start());
console.log(car2.type);
//===========================
console.log(animal1.homeAnimal());
console.log(animal2.homeAnimal());
//============================
console.log(Sobhi.greeting());
console.log(Sobhi.yearOfEmployment);
