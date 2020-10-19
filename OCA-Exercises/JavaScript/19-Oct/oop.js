class Person {
  constructor(first, last, age) {
    this.first = first;
    this.last = last;
    this.age = age;
  }
  //   fullName() {
  //     return `${this.first} ${this.last}`;
  //   }
  fullName = () => `${this.first} ${this.last}`;
}
const person1 = new Person("Waed", "Dawaghreh", 22);
console.log(person1.fullName());

class Employee extends Person {
  constructor(first, last, age, job, nationality, salary) {
    super(first, last, age);
    this.job = job;
    this.nationality = nationality;
    this.salary = salary;
  }
  //   annualSalary() {
  //     return this.salary * 12;
  //   }
  annualSalary = () => this.salary * 12;
}

const emp1 = new Employee("waed", "dawaghreh", 22, "FSD", "JOrdanian", 800);
console.log(emp1.annualSalary());

class Animal {
  constructor(name, speed) {
    this.name = name;
    this.speed = speed;
  }
  //   run() {
  //     return `The ${this.name} speed is ${this.speed}.`;
  //   }
  run = () => `The ${this.name} speed is ${this.speed}.`;
}
const lion = new Animal("Lion", 80);
console.log(lion.run());

class Car {
  constructor(brand, model, year) {
    this.brand = brand;
    this.model = model;
    this.year = year;
  }
  // fullData(){
  //     return `The Car is ${this.brand} ${this.model} ${this.year}`;
  // }

  fullData = () => `The Car is ${this.brand} ${this.model} ${this.year}`;
  fullData(x) {
    return "This Is " + this.brand + " " + y;
  }
}
const car = new Car("Marcedes", "Benz", "2020");

function printAll(obj) {
  if (obj === person1) {
    return person1.fullName() + " " + person1.age;
  } else if (obj === lion) {
    return lion.name + " " + lion.run();
  } else if (obj === car) {
    return car.fullData("2019");
  }
}

console.log(printAll(person1));
