
/*
function Person(first, last, age, gender, interests) {
  this.name = {
    'first': first,
    'last' : last
  };
  this.age = age;
  this.gender = gender;
  this.interests = interests;
  this.bio = function() {
    alert(this.name.first + ' ' + this.name.last + ' is ' + this.age + ' years old. He likes ' + this.interests[0] + ' and ' + this.interests[1] + '.');
  };
  this.greeting = function() {
    alert('Hi! I\'m ' + this.name.first + '.');
  };
}
*/

function Persona(nombre, apellido, edad, genero, intereses) {
    this.nombre = {
      'primer_nombre': nombre,
      'primer_apellido' : apellido
    }; // si asignamos nombre a la propiedad dentro del array, despues debemos invocalo por su nombre
    this.edad = edad;
    this.genero = genero;
    this.intereses = intereses;
    this.info = function () {
          alert(this.nombre.primer_nombre + ' ' + 
          this.nombre.primer_apellido + ' tiene ' + 
          this.edad + ' años. Le gusta ' + 
          this.intereses[0] + ' y ' + 
          this.intereses[1] + '.');
    };
    this.saludo = function() {
      alert('Hola, Soy '+ this.nombre.primer_nombre + '. ');
    };
  }
  
  
  let p1 = new Persona('Juan', 'Pérez', 32, 'masculino', ['musica', 'esquiar']);
  
  document.write(p1.nombre.primer_nombre); // propiedad
  document.write("<br>"); 
  document.write(p1['nombre']['primer_nombre']); // propiedad
  document.write("<br>");
  document.write(p1.intereses[0]); // propiedad
  document.write("<br>");
  document.write(p1['edad']); // propiedad
  
  document.write("<br>");

  var person2 = Object.create(persona1);

  person2.__proto__.intereses()
  

  //p1.info();
  //p1.saludo();
  
  
  
  
  /*
  var persona = {
    nombre: ['Bob', 'Smith'],
    edad: 32,
    genero: 'masculino',
    intereses: ['música', 'esquí'],
    bio: function () {
      alert(this.nombre[0] + '' + this.nombre[1] + ' tiene ' + this.edad + ' años. Le gusta ' + this.intereses[0] + ' y ' + this.intereses[1] + '.');
    },
    saludo: function() {
      alert('Hola, Soy '+ this.nombre[0] + '. ');
    }
  };
  
  document.write(persona.nombre); // propiedad
  document.write(persona.nombre[0]); // propiedad
  document.write(persona.edad) // propiedad
  document.write(persona.intereses[1]) // propiedad
  document.write(persona.bio()) // método 
  document.write(persona.saludo()) // método
  */
  
  
  