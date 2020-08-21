'use strict'

//Задание№1

//пример 1
let a = 1, b = 1, c, d;
c = ++a;
alert(c); // ответ: 2
/* Префиксный инкремент увеличивает переменную "a" на единицу
и записывает в переменную "c" */

//пример 2
d = b++;
alert(d); //ответ: 1
/* Постфиксный инкремент вначале присвоит переменной "d"
значение переменной "b" и лишь потом увеличит переменную "b" на единицу */

//пример 3
c = 2 + ++a; alert(c); //ответ: 5
/* Оператор сложения имеет приоритет выше оператора присваивания,
поэтому вначале идет увеличение "a" на единицу (ответ а=3),
далее сложение с 2 и результат перезаписывает "c" */

//пример 4
d = 2 + b++; alert(d); //ответ: 4
/* "b" складывается с 2, результат пересаписывает "d" (d=4)
и вконце "b" увеличивается на единицу (ответ b=3) */

alert(a); //3
/* Изначально а=1, в примере 1 увеличилась на единицу
и в прмере 3 вновь увеличилась на единицу */
alert(b); //3
/* Изначально b=1, в примере 2 увеличилась на единицу
и в прмере 4 вновь увеличилась на единицу */
//__________________________________________________________________________
//Задание№2

 let y = 2; 
 let x = 1 + (y *= 2); // x=5, y=4
 /* В строке 22 в скобках y=4 (y=y*2), потом по приоритету сложение с 1
 и результат запишется в "x" */
//__________________________________________________________________________
//Задание№3
let n = -8;
let u = 2;

if (n >= 0 && u >= 0) {
  console.log(n - u);
} else if (n < 0 && u < 0) {
  console.log(n * u);
} else console.log(n + u)

//__________________________________________________________________________
//Задание№4

function operationSum (a, b) {
  return a + b;
}
console.log (operationSum(0,3));

function operationDiff (a, b) {
  return a - b;
}
console.log (operationDiff(0,3));

function operationMulti (a, b) {
  return a * b;
}
console.log (operationMulti(0,3));

function operationDivide (a, b) {
  return a / b;
}
console.log (operationDivide(15,3));
//__________________________________________________________________________
//Задание№5

function mathOperation(arg1, arg2, operation) {
  switch (operation) {
    case "Sum":
      return operationSum(arg1, arg2);
    case "Diff":
      return operationDiff(arg1, arg2);
    case "Multi":
      return operationMulti(arg1, arg2);
    case "Divide":
      return operationDivide(arg1, arg2);
  }
}
console.log(mathOperation(6, 3, "Sum"));
console.log(mathOperation(6, 3, "Diff"));
console.log(mathOperation(6, 3, "Multi"));
console.log(mathOperation(6, 3, "Divide"));