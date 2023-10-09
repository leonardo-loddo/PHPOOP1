<?php
// Crea una classe Company che abbia i seguenti attributi pubblici:
// name: nome dell’azienda;
// location: stato in cui e' ubicata la sede dell’azienda;
// tot_employees: numero di dipedenti assunti in quella sede (di default, 0);
// Crea 5 istanze di 5 aziende diverse
// Crea un metodo che permetta di stampare a terminale la seguente frase: “L’ufficio Aulab con sede in Italia ha ben 50 dipendenti“; se la sede non ha dipendendi, allora stampa: “L’ufficio Aulab con sede in Italia non ha dipendenti“;
// Definisci un attributo statico
// avg_wage, con valore 1500.
// Implementa un nuovo metodo che, per ogni oggetto Company istanziati, calcoli la spesa annuale e la stampi per ogni oggetto.
// Implementa un nuovo metodo che e' in grado di calcolare di volta in volta tutti i totali, in relazione alle varie aziende create.
// Implementa un metodo statico che permetta di stampare a terminale il totale assoluto di tutte le aziende messe insieme.
class Company
{
  public $name;
  public $location;
  public $tot_employees;
  public static $avg_salary = 1500;
  public static $total = 0;

  public function __construct($nome, $sede, $dipendenti)
  {
    $this->name = $nome;
    $this->location = $sede;
    $this->tot_employees = $dipendenti;
  }
  
  public function checkIfGreater($int1, $int2)
  {
    if ($int1 > $int2) {
      return true;
    }
    return false;
  }

  public function printCheckEmployees($num = 0)
  {
    if ($this->checkIfGreater($this->tot_employees, $num)) {
      echo "L’azienda $this->name con sede in $this->location ha ben $this->tot_employees dipendenti.\n";
    } else {
      echo "L’azienda $this->name con sede in $this->location non ha abbastanza dipendenti.\n";
    }
  }
  
  public function calculateAnnualCost($int)
  {
    return $this->tot_employees * (self::$avg_salary * $int);
  }

  public function printCalculatedAnnualCost($month = 12)
  {
    echo "$this->name\n";
    echo "Il costo annuale dell'Ufficio $this->name è di " . $this->calculateAnnualCost($month) . " Euro \n";
    echo "Il costo totale per la holding attualmente è di " . $this->calculateProgressiveCost($month) . " Euro \n";
    echo "\n";
  }
  
  public function calculateProgressiveCost($month)
  {
    return self::$total += $this->calculateAnnualCost($month);
  }
  
  public function calculatedFinalTotal()
  {
    return self::$total;
  }
  public static function printCalculatedFinalTotal()
  {
    echo "| La holding ha una previsione di spesa pari a: " . self::$total . "\n";
  }

}

//Istanzio i 5 Oggetti
$company1 = new Company('Apple', 'USA', 3);
$company2 = new Company('Barilla', 'ITA', 3);
$company3 = new Company('Nintendo', 'JAP', 5);
$company4 = new Company('Nokia', 'FIN', 10);
$company5 = new Company('Xioami', 'CHI', 3);

$company1->printCheckEmployees();
$company2->printCheckEmployees();
$company3->printCheckEmployees();
$company4->printCheckEmployees();
$company5->printCheckEmployees();

$company1->printCalculatedAnnualCost();
$company2->printCalculatedAnnualCost();
$company3->printCalculatedAnnualCost();
$company4->printCalculatedAnnualCost();
$company5->printCalculatedAnnualCost();

Company::printCalculatedFinalTotal();