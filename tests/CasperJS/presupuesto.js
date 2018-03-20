
casper.test.begin('Añadimos Parte', 3, function suite(test) {

casper.start("http://localhost:8000/presupuestos/1", function(){
  test.assertTitle('Modifase - Presupuesto Individual', 'El título de la página inicial es el esperado');
  this.fill('form#addParteForm', {
    'concepto':'TestParte'
  }, false);
  this.click("#addParteButton");
});
casper.waitUntilVisible('#parteDiv', function(){
  test.assertElementCount("#parteDiv", 1, "El número de partes es correcto");
});

casper.then(function(){
  test.assertElementCount("#parteDiv > table > tbody > tr", 0, "La tabla está vacía");
});

  casper.run(function() {
    this.clear();
    test.done();
  });
});

casper.test.begin('Añadimos Materiales', 4, function suite(test) {

casper.start("http://localhost:8000/presupuestos/1", function(){
  test.assertTitle('Modifase - Presupuesto Individual', 'El título de la página inicial es el esperado');
  test.assertElementCount("#parteDiv", 1, "El número de partes es correcto (1)");
  this.click("#parteDiv > div.row.justify-content-center.mb-4 > button:nth-child(1)"); // Añadir Madera
});
casper.waitUntilVisible('.modal-dialog', function(){
  test.assertEval(function() {
            return __utils__.findAll('#selectMaterial > tbody > tr').length > 0;
        }, 'La tabla de materiales tiene registros');
});

casper.then(function(){
  this.click('#selectMaterial > tbody > tr:nth-child(2)');
  this.click('#selectMaterial > tbody > tr:nth-child(4)');
  this.click('#añadir');
});

casper.waitUntilVisible('#parteDiv > div:nth-child(3) > table > tbody > tr', function(){
  test.assertElementCount("#parteDiv > div:nth-child(3) > table > tbody > tr", 3, "Header y materiales añadidos");
});

  casper.run(function() {
    this.clear();
    test.done();
  });
});
