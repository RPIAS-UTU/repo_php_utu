<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<script>

/*


PHP = Apache / nginx ....
JAVA = GlassFish / Jboos / WildFly ..... 
ASP = IIS : Internet Information Server 
ASP.NET Core 

APP WEB

HTML
CSS (Boostrap)
JS







document.write(new Date()); // imprime la fecha y hora actual

sumando1 = 23
sumando2 = 33
suma = sumando1 + sumando2

document.write(suma);
*/

//document.write(parseInt('101', 2)) // base 2 = 5
//document.write(parseInt('101')) // base 10 = 101

var sales = 'Toyota';

function carTypes(name) {
  if (name === 'Honda') {
    return name;
  } else {
    return "Lo sentimos, no vendemos " + name + ".";
  }
}

var car = { myCar: 'Saturn', getCar: carTypes('Honda'), special: sales };

console.log(car.myCar);   // Saturn
console.log(car.getCar);  // Honda
console.log(car.special); // Toyota

document.write(car.myCar);
document.write("<br>");
document.write(car.getCar);
document.write("<br>");
document.write(car.special);

var car = { manyCars: {a: 'Saab', b: 'Jeep'}, 7: 'Mazda' };

console.log(car.manyCars.b); // Jeep
console.log(car[7]); // Mazda

document.write("<br>");
document.write(car.myCar);
document.write("<br>");
document.write(car.getCar);
document.write("<br>");
document.write(car.special);

var unusualPropertyNames = {
  '': 'Una cadena vacía',
  '!': '¡Bang!'
}

// console.log(inusualPropertyNames.'');   // SyntaxError: Cadena inesperada
console.log(inusualPropertyNames['']);  // Una cadena vacía
// console.log(unusualPropertyNames.!);    // SyntaxError: símbolo inesperado !
console.log(unusualPropertyNames['!']); // ¡Bang!


</script>

</body>
</html>